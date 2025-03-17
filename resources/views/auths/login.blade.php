<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}">
    <title>Gov-Emp | Login</title>
</head>
<body>
    {{-- main --}}
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        @if(session()->has('success'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
          </svg>
          <div class="alert alert-success alert-dismissible d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        @endif

        @if(session()->has('loginError'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
          </svg>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        @endif
    {{-- end of main --}}

    {{-- login box --}}
        <div class="row border rounded-3 p-3 bg-white shadow box-area">
    {{-- end of login box --}}

    {{-- left box --}}
            <div class="col-md-6 rounded-2 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe">
                <div class="featured-image mb-3">
                  <img src="https://cdni.iconscout.com/illustration/premium/thumb/authentication-code-illustration-download-in-svg-png-gif-file-formats--web-protection-password-protected-secure-website-pack-seo-illustrations-3726252.png"
                  class="img-fluid w-100" style="max-width: 350px; height: auto;">
                </div>
                <p class="text-white fs-2 text-wrap text-center" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Let's Authenticate</p>
            </div>

    {{-- end of left box --}}

    {{-- right box --}}
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hey there,</h2>
                        <p>Great to see you again!</p>
                        <div class="text-danger" id="form-errors">
                            <form action="{{ route('login.login') }}" method="post" name="loginform" id="loginform">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" @if (Cookie::has('email')) @endif class="form-control form-control-lg bg-light fs-6
                                    @error('email') is-invalid @enderror" name="email" id="email" form="loginform" placeholder="Email Address" value="{{ old('email') }}"
                                    value="{{ Cookie::get('email') }}" required autofocus autocomplete="email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-1">
                                    <input type="password" @if (Cookie::has('password')) @endif class="form-control form-control-lg bg-light fs-6
                                    @error('password') is-invalid @enderror" name="password" id="password" form="loginform" placeholder="Password" value="{{ old('password') }}"
                                    value="{{ Cookie::get('password') }}" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-group mb-5 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input type="checkbox" @if (Cookie::has('email')) @endif class="form-check-imput"
                                        name="rememberme" id="rememberme">
                                        <label for="rememberme" class="form-check-label text-secondary"><small>Remember Me</small></label>
                                    </div>
                                    <div class="forgot">
                                        <small><a href="{{ route('forgot-password.index') }}">Forgot Password?</a></small>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                                </div>
                                <div class="input-group mb-3">
                                    <a href="{{ route('register.index') }}" class="btn btn-lg btn-light w-100 fs-6">Signup</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of right box --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>
</html>
