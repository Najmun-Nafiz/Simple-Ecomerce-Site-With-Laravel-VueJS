<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Online Cart..</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('frontend\images\favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('frontend\images\apple-touch-icon.png')}}">
    
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('css\app.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend\css\bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend\css\style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend\css\responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend\css\custom.css')}}">
</head>

<body>

	
    <div id="app">

        <main>
            @yield('content')
        </main>

		<div>	
		    <router-view />
		</div>

	</div>
    
    <script src="{{asset('js\app.js')}}"></script>
    <script src="{{asset('frontend\js\jquery.superslides.min.js')}}"></script>
    <script src="{{asset('frontend\js\bootstrap-select.js')}}"></script>
    <script src="{{asset('frontend\js\popper.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('frontend\js\inewsticker.js')}}"></script>
    <script src="{{asset('frontend\js\images-loded.min.js')}}"></script>
    <script src="{{asset('frontend\js\isotope.min.js')}}"></script>
    <script src="{{asset('frontend\js\owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend\js\baguetteBox.min.js')}}"></script>
    <script src="{{asset('frontend\js\form-validator.min.js')}}"></script>
    <script src="{{asset('frontend\js\contact-form-script.js')}}"></script>
    <script src="{{asset('frontend\js\custom.js')}}"></script>
</body>

</html>