@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Shipment</h1>
        <form action="{{ route('shipments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}">
                @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="shipper">Shipper</label>
                <input type="text" name="shipper" id="shipper" class="form-control @error('shipper') is-invalid @enderror" value="{{ old('shipper') }}">
                @error('shipper')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="weight">Weight</label>
                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                @error('weight')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Progress" {{ old('status') == 'Progress' ? 'selected' : '' }}>Progress</option>
                    <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
