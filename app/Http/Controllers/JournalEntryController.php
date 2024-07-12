<?php

namespace App\Http\Controllers;

use App\Models\JournalEntry;
use App\Models\Shipment;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    public function index()
    {
        $journalEntries = JournalEntry::all();
        return view('journal-entries.index', compact('journalEntries'));
    }

    public function create()
    {
        $shipments = Shipment::all();
        return view('journal-entries.create', compact('shipments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'type' => 'required|in:Debit Cash,Credit Revenue,Credit Payable',
            'amount' => 'required|numeric',
        ]);

        JournalEntry::create($request->all());
        return redirect()->route('journal-entries.index');
    }

    public function show(JournalEntry $journalEntry)
    {
        return view('journal-entries.show', compact('journalEntry'));
    }

    public function edit(JournalEntry $journalEntry)
    {
        $shipments = Shipment::all();
        return view('journal-entries.edit', compact('journalEntry', 'shipments'));
    }

    public function update(Request $request, JournalEntry $journalEntry)
    {
        $request->validate([
            'shipment_id' => 'required|exists:shipments,id',
            'type' => 'required|in:Debit Cash,Credit Revenue,Credit Payable',
            'amount' => 'required|numeric',
        ]);

        $journalEntry->update($request->all());
        return redirect()->route('journal-entries.index');
    }

    public function destroy(JournalEntry $journalEntry)
    {
        $journalEntry->delete();
        return redirect()->route('journal-entries.index');
    }
}
