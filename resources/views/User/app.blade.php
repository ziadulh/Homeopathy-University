	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="colorlib">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="UTF-8">
		<title>@yield('title')</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ asset('adventure/css/linearicons.css') }}">
			<link rel="stylesheet" href="{{ asset('adventure/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ asset('adventure/css/bootstrap.css') }}">
			<link rel="stylesheet" href="{{ asset('adventure/css/magnific-popup.css') }}">
			<link rel="stylesheet" href="{{ asset('adventure/css/animate.min.css') }}">
			<link rel="stylesheet" href="{{ asset('adventure/css/owl.carousel.css') }}">
            <link rel="stylesheet" href="{{ asset('adventure/css/main.css') }}">

		</head>
		<body>


            @include('User.nav')


            @yield('content')


            @include('User.footer')


			<script src="{{ asset('adventure/js/vendor/jquery-2.2.4.min.js') }}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="{{ asset('adventure/js/vendor/bootstrap.min.js') }}"></script>
			<script src="{{ asset('adventure/js/jquery.ajaxchimp.min.js') }}"></script>
			<script src="{{ asset('adventure/js/jquery.magnific-popup.min.js') }}"></script>
			<script src="{{ asset('adventure/js/owl.carousel.min.js') }}"></script>
			<script src="{{ asset('adventure/js/jquery.sticky.js') }}"></script>
			<script src="{{ asset('adventure/js/slick.js') }}"></script>
			<script src="{{ asset('adventure/js/jquery.counterup.min.js') }}"></script>
			<script src="{{ asset('adventure/js/waypoints.min.js') }}"></script>
            <script src="{{ asset('adventure/js/main.js') }}"></script>

            @yield('jsscript')

        </body>
	</html>
