<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	
	<title>Poses-404 Website Template | Home :: W3layouts</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="{{ asset('error/css/style.css')}}">


	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('home/css/agency.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('home/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Home CSS -->
    <link href="{{ asset('app/css/home.css') }}" rel="stylesheet">

    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="wrap">
	    <!-- Navigation -->
    @include('home.navegation')

	<div class="banner">
		<img src="{{ asset('error/images/banner.png')}}" alt="" />
	</div>
	<div class="page">
		<h2>¡Lo sentimos!, no podemos encontrar esta pagina.</h2>
	</div>

    <!--footer-->
    @include('home.footer')

    <!-- jQuery -->
    <script src="{{ asset('/home/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/home/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('/home/js/classie.js') }}"></script>
    <script src="{{ asset('/home/js/cbpAnimatedHeader.js') }}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('/home/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('/home/js/contact_me.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/home/js/agency.js') }}"></script>

    <!-- JS de validaciones de home.index-->
    <script src="{{ asset('/app/js/home.js') }}"></script>

    <!--typeahead-->
    <script src="{{ asset('/plugins/typeahead/bootstrap.js') }}"></script>
    <script src="http://underscorejs.org/underscore-min.js"></script>

</div>
</body>
</html>

