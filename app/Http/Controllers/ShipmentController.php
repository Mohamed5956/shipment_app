<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::all();
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

            Shipment::create($validated);

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

            // Handle the image upload
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('images', 'public');
            }

            // Update the shipment attributes
            $shipment->update($validated);

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
}
