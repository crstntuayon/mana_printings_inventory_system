<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login & Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <!-- Tabs -->
      <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
        </li>
      </ul>

      <div class="tab-content">
        <!-- Login Form -->
        <div class="tab-pane fade show active" id="login" role="tabpanel">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="text-2xl font-bold mb-4">Login</h2>

              @foreach (['success', 'error'] as $msg)
     @if(session($msg))
        <div id="{{ $msg }}-alert" class="alert alert-{{ $msg == 'success' ? 'success' : 'danger' }}" style="transition: opacity 0.5s ease;">
            {{ session($msg) }}
        </div>

        <script>
            setTimeout(function() {
                const alert = document.getElementById('{{ $msg }}-alert');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif
@endforeach

              <form method="post" action="{{ route('auth.login')}}">
              @csrf
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="mb-3">
                  <label for="loginEmail" class="form-label">Email Address</label>
                   <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>
                <div class="mb-3">
                  <label for="loginPassword" class="form-label">Password</label>
                   <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </form>
            </div>
          </div>
        </div>





        <!-- Register Form -->
        <div class="tab-pane fade" id="register" role="tabpanel">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="text-2xl font-bold mb-4">Register</h2>

              <form method="post" action="{{ route('auth.userRegister')}}">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="mb-3">
                  <label for="registerName" class="form-label">Name</label>
                 <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>
                <div class="mb-3">
                  <label for="registerEmail" class="form-label">Email Address</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"  required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>
                <div class="mb-3">
                  <label for="registerPassword" class="form-label">Password</label>
                 <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}"  required>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                </div>
                <div class="mb-3">
                  <label for="registerPasswordConfirm" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation"  required>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                </div>
                <button type="submit" class="btn btn-success w-100">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="social-profiles">
                <h3 class="profiles-title">
                    <i class="fab fa-facebook me-2"></i>
                    Meet Our Team
                </h3>
                
                
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="https://scontent.fceb1-3.fna.fbcdn.net/v/t39.30808-6/505629446_1022580173355984_1710824843001071140_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEU_uYLRAYzVn-Y-aFJoeWlDA1ro3d-oTEMDWujd36hMSe3RM9IL7Tjel4FuRyfX18J01uCRZ2j9LHlaBgNnUsB&_nc_ohc=W1E7gJ7-D-AQ7kNvwH4P_AS&_nc_oc=AdngWjpuDcngk9gSOo4YYeVQNNo5SQ3KI3uJjVDi0QVI8kEhKVebSx0XscjtoEuoQ1g&_nc_zt=23&_nc_ht=scontent.fceb1-3.fna&_nc_gid=TCNTwwaPBBieBHxl-8W3Vw&oh=00_AfO06RoQvrgHCF3p9NXAQtUU-JZ33cYGs7kJtvbaGLZJUg&oe=685849D7" alt="Cres Tuayon" class="profile-avatar">
                        <div class="profile-info">
                            <h5>Crestian Tuayon</h5>
                            <div class="role">Lead Developer</div>
                            <a href="https://www.facebook.com/cresttuayon" target="_blank" class="facebook-link">
                                <i class="fab fa-facebook-f"></i>
                                View Facebook Profile
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="profile-card">
                    <div class="profile-header">
                        <img src="" alt="Troilan Tuayon" class="profile-avatar">
                        <div class="profile-info">
                            <h5>Troilan Tuayon</h5>
                            <div class="role">Project Manager</div>
                            <a href="https://www.facebook.com/sirtroytuayon" target="_blank" class="facebook-link">
                                <i class="fab fa-facebook-f"></i>
                                View Facebook Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
