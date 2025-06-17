@extends('base')
@section('title', 'Login')

<div class="centered-div">
    <div class="container">
        <div class="col" style="width: 80vh;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left;"><strong>Login</strong></h4>
                    </div>

                  @if(session('success'))
    <div id="logout-alert" class="alert alert-success" style="transition: opacity 0.5s ease;">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            const alert = document.getElementById('logout-alert');
            if (alert) {
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500); // remove after fade
            }
        }, 3000); // hide after 3 seconds
    </script>
@endif


                    

                    @if(Session("error"))
                    <span class="alert alert-danger">
                        {{ session('error') }}
                    </span>
        <script>
        setTimeout(function() {
            const message = document.getElementById('successMessage');
            if (message) {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(() => message.remove(), 500);
            }
        }, 3000); // vanish after 3 seconds
    </script>
@endif

                    

                    <div class="card-body">
                        <form method="post" action="{{ route('auth.login')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                       <a href="{{ route('auth.register') }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>