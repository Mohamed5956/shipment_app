@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shipments</h1>
        <div class="row mb-3">
            <div class="col-lg-3">
                <a href="{{ route('shipments.create') }}" class="btn btn-primary">Create Shipment</a>
            </div>
            <div class="col-lg-6">
                <form method="GET" action="{{ route('shipments.index') }}" class="d-flex">
                    <select class="form-select" name="status" aria-label="status-filter" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ request('status') == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Done" {{ request('status') == 'Done' ? 'selected' : '' }}>Done</option>
                    </select>
                </form>
            </div>
        </div>
        @foreach ($shipments as $shipper => $shipperShipments)
            <div class="mt-3 p-3">
                <h2 class="text-secondary fw-bold">{{ $shipper }}</h2>
                <table class="mt-2 table table-striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($shipperShipments as $shipment)
                        <tr class="border">
                            <td class="col-2">{{ $shipment->code }}</td>
                            <td class="col-2">{{ $shipment->weight }}</td>
                            <td class="col-2">{{ $shipment->price }}</td>
                            <td class="col-2">{{ $shipment->status }}</td>
                            <td class="col-2">
                                <a href="{{ route('shipments.show', $shipment) }}" class="btn m-1 btn-info">View</a>
                                @if($shipment->status != 'Done')
                                    <a href="{{ route('shipments.edit', $shipment) }}" class="btn m-1 btn-warning">Edit</a>
                                @endif
                                <form action="{{ route('shipments.destroy', $shipment) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="m-1 btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection
