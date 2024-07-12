@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shipments</h1>
        <a href="{{ route('shipments.create') }}" class="btn btn-primary">Create Shipment</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Code</th>
                <th>Shipper</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->code }}</td>
                    <td>{{ $shipment->shipper }}</td>
                    <td>{{ $shipment->weight }}</td>
                    <td>{{ $shipment->price }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>
                        <a href="{{ route('shipments.show', $shipment) }}" class="btn btn-info">View</a>
                        @if($shipment->status != 'Done')
                            <a href="{{ route('shipments.edit', $shipment) }}" class="btn btn-warning">Edit</a>
                        @endif
                        <form action="{{ route('shipments.destroy', $shipment) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
