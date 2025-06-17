@extends('layouts.app')
@section('title', 'Printing Sessions')


@section('content')
<div class="container">
    <h1>Printing Sessions</h1>
    <a href="{{ route('sessions.create') }}" class="btn btn-primary mb-3">Add New Session</a>

    @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif
   
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertBox = document.getElementById('success-message');
        if (alertBox) {
            setTimeout(() => {
                alertBox.style.transition = 'opacity 0.5s ease';
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 500); // remove from DOM after fade
            }, 3000); // disappears after 3 seconds
        }
    });
</script>

   

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Printer</th>
                <th>Printed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sessions as $session)
                <tr>
                    <td>{{ $session->customer_name }}</td>
                    <td>{{ $session->job_description }}</td>
                    <td>{{ $session->quantity }}</td>
                    <td>{{ $session->printer_used }}</td>
                    <td>{{ $session->printed_at }}</td>
                    <td>
                        <a href="{{ route('sessions.edit', $session) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sessions.destroy', $session) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
                        <script>
                            function confirmDelete(event) {
                                if (!confirm('Are you sure you want to delete this session?')) {
                                    event.preventDefault();
                                }
                            }
                        </script>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any JavaScript needed for the page here
    }); 
</script>
@endsection

