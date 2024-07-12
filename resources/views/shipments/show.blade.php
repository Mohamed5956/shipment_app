@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="shipment-details col-lg-6">
                <h1>Shipment Details</h1>
                <div class="card">
                    <div class="card-header">
                        Shipment Code: {{ $shipment->code }}
                    </div>
                    <div class="card-body">
                        <p><strong>Shipper:</strong> {{ $shipment->shipper }}</p>
                        <p><strong>Weight:</strong> {{ $shipment->weight }}</p>
                        <p><strong>Price:</strong> {{ $shipment->price }}</p>
                        <p><strong>Status:</strong> {{ $shipment->status }}</p>
                        <p><strong>Description:</strong> {{ $shipment->description }}</p>
                        <p>
                            <strong>Image:</strong><br>
                            @if($shipment->image)
                                <img src="{{ asset('storage/' . $shipment->image) }}" alt="{{ $shipment->code }}" width="200">
                            @else
                                No image
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="journal-entries mt-5 mt-lg-0 col-lg-6">
                <h1>Journal Entries</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shipment->journalEntries as $entry)
                        <tr>
                            <td>{{ $entry->type }}</td>
                            <td>{{ $entry->amount }}</td>
                            <td>{{ $entry->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a class="w-auto ms-lg-auto btn btn-primary" href="{{ url()->previous() }}">Go Back</a>
        </div>
    </div>
@endsection
