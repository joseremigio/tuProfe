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

    <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      @include('includes.header', array('profesor'=> $listaSelect['profesor']))
      @include('includes.sidebar', array('profesor'=> $listaSelect['profesor']))
      

      {{ Form::open(array('url' => 'profesor/update/'.$listaSelect['profesor']->id, 'files' => true)) }}

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar Perfil
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
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Personal</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <!-- <form role="form"> -->
                  <div class="box-body">

                        <div class="form-group">
                            {{ Form::label('nombres', 'Nombres') }}
                            {{ Form::text('nombres', Input::old('nombres') ? Input::old('nombres') : $listaSelect['profesor']->nombres, array('class' => 'form-control')) }}


                            {{ Form::label('apellidos', 'Apellidos') }}
                            {{ Form::text('apellidos', Input::old('apellidos') ? Input::old('apellidos') : $listaSelect['profesor']->apellidos, array('class' => 'form-control')) }}


                            {{ Form::label('sexo', 'Sexo') }}
                            <br />
                            @if ($listaSelect['profesor']->sexo === 'M')
                                
                            {{  Form::radio('sexo', 'M', true)}}
                            {{ Form::label('masculino', 'Masculino') }}

                            {{  Form::radio('sexo', 'F')}}
                            {{ Form::label('femenino', 'Femenino') }}  

                            @else
                               
                            {{  Form::radio('sexo', 'M')}}
                            {{ Form::label('masculino', 'Masculino') }}

                            {{  Form::radio('sexo', 'F', true)}}
                            {{ Form::label('femenino', 'Femenino') }}  

                            @endif


                            <br />

                            <div class="form-group">
                             <label>Fecha de Nacimiento:</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                {{ Form::text('fecha_nacimiento', Input::old('fecha_nacimiento') ? Input::old('fecha_nacimiento') : $listaSelect['profesor']->fecha_nacimiento, array('class' => 'form-control', 'data-inputmask'=>"'alias': 'dd/mm/yyyy'",  'data-mask')) }}
                              </div>
                            </div>

                            {{ Form::label('grado_academico_id', 'Grado Académico') }}
                            {{ Form::select('grado_academico_id', $listaSelect['gradoAcademico'], $listaSelect['profesor']->gradoAcademico->id, array('class' => 'form-control')) }}

                            {{ Form::label('profesion_id', 'Profesión') }}
                            {{ Form::select('profesion_id',  $listaSelect['profesion'],  $listaSelect['profesor']->profesion->id, array('class' => 'form-control')) }}

                            {{ Form::label('universidad_id', 'Universidad') }}
                            {{ Form::select('universidad_id', $listaSelect['universidad'],  $listaSelect['profesor']->universidad->id,array('class' => 'form-control')) }}

                            {{ Form::label('dni', 'DNI') }}
                            {{ Form::text('dni',Input::old('dni') ? Input::old('dni') : $listaSelect['profesor']->dni, array('class' => 'form-control','placeholder' => 'Mi DNI es...')) }}

                            {{ Form::label('foto', 'Foto') }}
                            {{ Form::file('foto',array('accept'=>'image/x-png, image/jpeg')) }}                                  

                            {{ HTML::image('imgs/'.$listaSelect['profesor']->foto, 'a picture',array('width' => '80%' , 'height' => '80%')) }}

                            <br />
                        </div>
                  </div><!-- /.box-body -->
                <!-- </form> -->
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Contacto</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <!--  <form role="form"> -->
                    <!-- text input -->
                    <div class="form-group">

                      {{ Form::label('celular', 'Celular') }}
                      
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          {{ Form::text('celular',Input::old('celular') ? Input::old('celular') : $listaSelect['profesor']->celular,array('class' => 'form-control', 'data-inputmask'=>'"mask": "999-999-999"', 'data-mask')) }}

                      </div>

                      {{ Form::label('url_linkedin', 'LinkedIn') }}
                      {{ Form::text('url_linkedin', Input::old('url_linkedin') ? Input::old('url_linkedin') : $listaSelect['profesor']->url_linkedin, array('class' => 'form-control','placeholder' => 'wwww.ejemplo.com')) }}
                          
                      {{ Form::label('url_twiiter', 'Twitter') }}
                      {{ Form::text('url_twiiter', Input::old('url_twiiter') ? Input::old('url_twiiter') : $listaSelect['profesor']->url_twiiter , array('class' => 'form-control','placeholder' => '@ejemplo')) }}

                      {{ Form::label('url_sitio_web', 'Pagina Web') }}
                      {{ Form::text('url_sitio_web', Input::old('url_sitio_web') ? Input::old('url_sitio_web') : $listaSelect['profesor']->url_sitio_web, array('class' => 'form-control','placeholder' => 'www.ejemplo.com')) }}

                    </div>
                <!--   </form> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Sobre ti</h3>
                </div>
                <div class="box-body">

                    {{ Form::label('descripcion', 'Descripción') }}
                    {{ Form::textarea ('descripcion', $listaSelect['profesor']->descripcion, array('class' => 'form-control','rows'=>'5')) }}

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!--/.col (right) -->
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

    <!-- InputMask -->
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
 

    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

       
      });
    </script>

  </body>
</html>
