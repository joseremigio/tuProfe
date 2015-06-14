<!DOCTYPE html>
<html lang="en">

<head>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   <!--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="{{ asset('app/css/profile.css') }}" rel="stylesheet" id="bootstrap-css">

 

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    @include('home.navegation')

    <div class="container">
        <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img src="{{ asset(strlen($profesor->foto)>0? '/imgs/'.$profesor->foto:'/imgs/default.jpg')}}" class="img-responsive" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                {{$profesor->nombres.', '.$profesor->apellidos}}
              </div>
              <div class="profile-usertitle-job">
                {{$profesor->gradoAcademico->nombre}}
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm">Follow</button>
              <button type="button" class="btn btn-danger btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
              <ul class="nav">
                <li class="active">
                  <a href="#">
                  <i class="glyphicon glyphicon-home"></i>
                  Overview </a>
                </li>
                <li>
                  <a href="#">
                  <i class="glyphicon glyphicon-user"></i>
                  Account Settings </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                  <i class="glyphicon glyphicon-ok"></i>
                  Tasks </a>
                </li>
                <li>
                  <a href="#">
                  <i class="glyphicon glyphicon-flag"></i>
                  Help </a>
                </li>
              </ul>
            </div>
            <!-- END MENU -->
          </div>
        </div>
        <div class="col-md-9">
                <div class="profile-content">
                 <div class="info-card-details">
                    <p>{{$profesor->descripcion}}</p>
                 </div> 
                

                {{ explode(";",$profesor->niveles_materias)[0]}}
                
                {{ explode(";",$profesor->niveles_materias)[1]}}
                </div>
        </div>
      </div>
    </div>
    <center>
    <strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
    </center>
    <br>
    <br>

    
    <!--footer-->
    @include('home.footer')


    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->



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
</body>

</html>
