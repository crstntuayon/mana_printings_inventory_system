@extends('layouts.app')
@section('title', 'Printing Sessions')


@section('content')

 <style>
        :root {
           
            
            --shadow-light: 0 2px 15px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-heavy: 0 20px 60px rgba(0, 0, 0, 0.15);
            
            --border-radius: 12px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--primary-gradient);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            animation: backgroundFloat 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes backgroundFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(1deg); }
            66% { transform: translateY(15px) rotate(-1deg); }
        }

        /* Floating particles */
        .particle {
            position: fixed;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
            animation: float 15s infinite linear;
            z-index: -1;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) translateX(0px) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px) rotate(360deg);
                opacity: 0;
            }
        }

        .centered-div {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            gap: 30px;
        }

        .main-content {
            display: flex;
            align-items: center;
            gap: 30px;
            max-width: 1200px;
            width: 100%;
        }

        .login-section {
            flex: 1;
            max-width: 500px;
        }

        .social-profiles {
            flex: 1;
            max-width: 400px;
            margin-left: 560px;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-heavy);
            padding: 25px;
            margin-bottom: 20px;
            transition: var(--transition);
            position: center;
            overflow: hidden;
            
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #1877f2 0%, #42a5f5 100%);
            
        }

        .profile-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .profile-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid #1877f2;
            margin-right: 15px;
            object-fit: cover;
            transition: var(--transition);
        }

        .profile-avatar:hover {
            transform: scale(1.05);
            border-color: #42a5f5;
        }

        .profile-info h5 {
            margin: 0;
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .profile-info .role {
            color: #667eea;
            font-size: 0.9rem;
            font-weight: 500;
            margin: 2px 0;
        }

        .facebook-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #1877f2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            margin-top: 8px;
        }

        .facebook-link:hover {
            color: #42a5f5;
            transform: translateX(3px);
        }

        .facebook-link i {
            font-size: 1.1rem;
        }

        .profiles-title {
            color: white;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.3rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
                gap: 20px;
            }
            
            .social-profiles {
                max-width: 500px;
            }
        }

        @media (max-width: 768px) {
            .centered-div {
                gap: 15px;
            }
            
            .main-content {
                gap: 15px;
            }
            
            .profile-card {
                padding: 20px;
            }
        }

        /* Enhanced Card Styling */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-heavy);
            transition: var(--transition);
            overflow: hidden;
            position: relative;
            
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            padding: 24px 30px;
            position: relative;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 30px;
        }

        /* Enhanced Form Controls */
        .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: var(--border-radius);
            padding: 12px 16px;
            font-size: 16px;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: white;
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: #9ca3af;
        }

        /* Enhanced Buttons */
        .btn {
            border-radius: var(--border-radius);
            padding: 12px 24px;
            font-weight: 500;
            font-size: 16px;
            transition: var(--transition);
            border: none;
            position: relative;
            overflow: hidden;
            
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: #5a6fd8;
            box-shadow: var(--shadow-light);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            color: white;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Enhanced Alerts */
        .alert {
            border: none;
            border-radius: var(--border-radius);
            padding: 16px 20px;
            margin: 20px 30px 0;
            font-weight: 500;
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(34, 197, 94, 0.05) 100%);
            color: #15803d;
            border-left: 4px solid #22c55e;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
            color: #dc2626;
            border-left: 4px solid #ef4444;
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            color: #d97706;
            border-left: 4px solid #f59e0b;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
            color: #2563eb;
            border-left: 4px solid #3b82f6;
        }

        /* Error Messages */
        .text-danger {
            color: #dc2626 !important;
            font-size: 0.875rem;
            margin-top: 6px;
            font-weight: 500;
        }

        .is-invalid {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
        }

        /* Links */
        a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        a:hover {
            color: #5a6fd8;
            text-decoration: none;
        }

        /* Loading Animation */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .centered-div {
                padding: 15px;
            }
            
            .card-header, .card-body {
                padding: 20px;
            }
            
            .card {
                margin: 10px;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }

        /* Page transition */
        .page-enter {
            opacity: 0;
            transform: translateY(20px);
        }

        .page-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: var(--transition);
        }
    </style>

    @stack('styles')
    
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
                <th>Payment</th>
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

