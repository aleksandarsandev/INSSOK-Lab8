@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Jet</h1>
        <form action="{{ route('jets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="hourly_rate">Hourly Rate</label>
                <input type="number" step="0.01" name="hourly_rate" id="hourly_rate" class="form-control" min="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Jet</button>
        </form>
    </div>
@endsection
