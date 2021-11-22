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
    <link rel="dns-prefetch" href="/fonts.gstatic.com">
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
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('images/assets/1.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Perfect Balance</h3>
                                            <p>ArchitectUI is like a dream. Some think it's too good to be true! Extensive
                                                collection of unified React Boostrap Components and Elements.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('images/assets/2.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('images/assets/3.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span>
                            </h4>
                            <h6 class="mt-3">No account? <a href="register" class="text-primary">Sign up now</a></h6>
                            <div class="divider row"></div>
                            <div>
                            <form class="" method="POST" action="{{ route('login') }}">
                                @csrf
                              <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="email" class="">Email</label>
                                                <input name="email" id="email" placeholder="Email here..." type="email" class="form-control"" name="email" value="" required autocomplete="email" autofocus>

                                                                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="password" class="">Password</label>
                                                <input name="password" id="password" placeholder="Password here..." type="password" class="form-control" " name="password" required autocomplete="current-password">

                                                                                                </div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" >
                                        <label for="remember" class="form-check-label">Keep me logged in</label>
                                    </div>
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            <a href="./password/reset" class="btn-lg btn btn-link">Recover Password</a>
                                            <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
                                        </div>
                                    </div>
                                </form>
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