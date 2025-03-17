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
    {{-- end of main --}}

    {{-- login box --}}
        <div class="row border rounded-3 p-3 bg-white shadow box-area">
    {{-- end of login box --}}

    {{-- left box --}}
            <div class="col-md-6 rounded-2 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe">
                <div class="featured-image mb-3">
                  <img src="https://cdni.iconscout.com/illustration/premium/thumb/concept-of-reset-lost-password-in-mobile-illustration-download-svg-png-gif-file-formats--set-forgot-pin-flat-modern-pack-miscellaneous-illustrations-1598238.png" class="img-fluid w-100" style="max-width: 350px; height: auto;">
                </div>
                <p class="text-white fs-2 text-wrap text-center" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Trouble Logging In?</p>
            </div>

    {{-- end of left box --}}

    {{-- right box --}}
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Go Ahead!</h2>
                        <p>Reset your password</p>
                        <div class="text-danger" id="form-errors">
                            <form action="{{ route('reset-password.reset', ['user' => $user->id]) }}" method="post" id="resetpassword" name="resetpassword">
                                @csrf
                                <div class="input-group mb-3">
                                    @if (isset($user))
                                    <input type="email" class="form-control form-control-lg bg-light fs-6" name="email" id="email" form="resetpassword" placeholder="Email Address" value="{{ $user->email }}" disabled>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="new_password" id="new_password" form="resetpassword" placeholder="New Password" value="" required autofocus>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="new_password_confirmation" id="new_password_confirmation" form="resetpassword" placeholder="Confirm New Password" value="" required>
                                </div>
                                <div class="input-group mb-3">
                                    <button class="btn btn-lg btn-primary w-100 fs-6">Reset Password</button>
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
