<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
    {{ Form::open(array('url' => 'usuario/update/'. $listaSelect['usuario']->profesor_id, 'files' => false)) }}


      @include('includes.header', array('profesor'=>  $listaSelect['profesor']))
      @include('includes.sidebar', array('profesor'=>  $listaSelect['profesor']))
 

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar Usuario
          </h1>
          <div class="box-footer">
                      {{ Form::submit('Guardar', array("class" => "btn btn-primary")) }}
          </div>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          @if($errors->has())
              <div class="form-group has-error">           
                  <!--recorremos los errores en un loop y los mostramos-->
                  @foreach ($errors->all('<p>:message</p>') as $message)
                      {{ $message }}
                  @endforeach
                   
              </div>
          @endif
          
          @if(Session::has('confirm'))
              <div class="form-group has-warning">
                  {{ Session::get('confirm') }}
              </div>                    
          @endif


          <div class="row">
            <!-- left column -->
           <!--  <div class="col-md-6"> -->
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Personal</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!-- <form role="form"> -->
                  <div class="box-body">

                        <div class="form-group">

                            {{ Form::label('email', 'Correo') }}
                            {{ Form::text('email', Input::old('email') ? Input::old('email') : $listaSelect['usuario']->email, array('class' => 'form-control', 'disabled')) }}

                            {{ Form::label('password', 'Contraseña') }}
                           {{Form::password('password',array('class'=>'form-control','placeholder'=>'******','title'=>'Ingresar Contraseña'))}}
                           
                            {{ Form::label('password_confirmation', 'Repetir Contraseña') }} 
                            {{Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'******','title'=>'Ingresar nuevamente Contraseña'))}}

                           
                            <br />
                        </div>
                  </div><!-- /.box-body -->
                <!-- </form> -->
              

            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      {{ Form::close() }}
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
      
      @include('includes.sidebarLeft')

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/dist/js/demo.js') }}" type="text/javascript"></script>
  </body>
</html>
