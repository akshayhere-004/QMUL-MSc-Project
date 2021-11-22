
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="./js/app.js" defer></script>
    <script src="./js/template.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="./css/app.css" rel="stylesheet">
    <link href="./css/template.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        

        <main >
           
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div
                        class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4>
                                <div>Welcome,</div>
                                <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                            </h4>
                            <div>
                            <form class="" method="POST" action="{{ route('register') }}">
                                @csrf                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="email" class=""><span class="text-danger">*</span> Email</label>
                                                <input name="email" id="email" placeholder="Email here..." type="email" class="form-control">
                                                                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="name" class="">Name</label>
                                                <input name="name" id="name" placeholder="Name here..." type="text" class="form-control" " name="name" value="" required autocomplete="name" autofocus>
                                                                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="password" class=""><span class="text-danger">*</span> Password</label>
                                                <input name="password" id="password" placeholder="Password here..." type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="password-confirm" class=""><span class="text-danger">*</span> Repeat Password</label>
                                                <input name="password_confirmation" id="password-confirm" placeholder="Repeat Password here..." type="password" class="form-control">
                                                                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 position-relative form-check">
                                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label>
                                    </div>
                                    <div class="mt-4 d-flex align-items-center">
                                        <h5 class="mb-0">Already have an account? <a href="login" class="text-primary">Sign in</a></h5>
                                        <div class="ml-auto">
                                            <button type="submit" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg">Create Account </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-flex d-xs-none col-lg-5">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url('images/assets/4.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </main>
    </div>
</body>
</html>
