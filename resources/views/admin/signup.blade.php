<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up - Admin</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sign Up Form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('admin.signup') }}" class="register-form" id="register-form">
                          @csrf
                          @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          <div class="form-group">
                              <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}" required/>
                          </div>
                          <div class="form-group">
                              <label for="email"><i class="zmdi zmdi-email"></i></label>
                              <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}" required/>
                          </div>
                          <div class="form-group">
                              <label for="password"><i class="zmdi zmdi-lock"></i></label>
                              <input type="password" name="password" id="password" placeholder="Password" required/>
                          </div>
                          <div class="form-group">
                              <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                              <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required/>
                          </div>
                          <div class="form-group form-button">
                              <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                          </div>
                      </form>                      
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('admin/images/signup-image.jpg')}}" alt="sign up image"></figure>
                        <a href="{{ route('admin.login') }}" class="signup-image-link">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
</body>
</html>
