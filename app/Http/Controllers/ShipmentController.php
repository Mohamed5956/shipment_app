<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\JournalEntry;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Shipment::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        $shipments = $query->get()->groupBy('shipper');

        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(StoreShipmentRequest $request)
    {
        try {
            $validated = $request->validated();

            // Handle the image upload
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('images', 'public');
            }

            $shipment = Shipment::create($validated);

            if ($validated['status'] == 'Done') {
                $this->createJournalEntries($shipment);
            }

            return redirect()->route('shipments.index')->with('success', 'Shipment created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create shipment. Please try again.']);
        }
    }

    public function show(Shipment $shipment)
    {
        return view('shipments.show', compact('shipment'));
    }

    public function edit(Shipment $shipment)
    {
        return view('shipments.edit', compact('shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        try {
            $validated = $request->validated();
            if ($shipment->status === 'Done') {
                return redirect()->route('shipments.index')->withErrors(['error' => 'Shipment cannot be updated once it is marked as Done.']);
            }

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('images', 'public');
            }

            $shipment->update($validated);
            if ($validated['status'] == 'Done') {
                $this->createJournalEntries($shipment);
            }

            return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update shipment. Please try again.']);
        }
    }

    public function destroy(Shipment $shipment)
    {
        if ($shipment->image) {
            Storage::disk('public')->delete($shipment->image);
        }
        $shipment->delete();
        return redirect()->route('shipments.index');
    }

    private function createJournalEntries($shipment)
    {
        $price = $shipment->price;
        $entries = [
            ['type' => 'Debit Cash', 'amount' => $price],
            ['type' => 'Credit Revenue', 'amount' => $price * 0.2],
            ['type' => 'Credit Payable', 'amount' => $price * 0.8]
        ];
        foreach ($entries as $entry) {
            JournalEntry::create([
                'shipment_id' => $shipment->id,
                'type' => $entry['type'],
                'amount' => $entry['amount']
            ]);
        }
    }
}
