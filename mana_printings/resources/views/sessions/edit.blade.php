@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($session) ? 'Edit Session' : 'Add New Session' }}</h1>
    <form method="POST" action="{{ isset($session) ? route('sessions.update', $session) : route('sessions.store') }}">
        @csrf
        @if(isset($session))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $session->customer_name ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Job Description</label>
            <textarea name="job_description" class="form-control">{{ old('job_description', $session->job_description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $session->quantity ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Printer Used</label>
            <input type="text" name="printer_used" class="form-control" value="{{ old('printer_used', $session->printer_used ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Printed At</label>
            <input type="datetime-local" name="printed_at" class="form-control" value="{{ old('printed_at', isset($session) ? date('Y-m-d\TH:i', strtotime($session->printed_at)) : '') }}">
        </div>

        <button type="submit" class="btn btn-success">{{ isset($session) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('sessions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

