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

    <!-- DATA TABLES -->
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Validate Form -->
    <link href="{{ asset('/plugins/validate/screen.css') }}" rel="stylesheet" type="text/css">

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      @include('includes.header', array('profesor'=> $listaSelect['profesor']))
      @include('includes.sidebar', array('profesor'=> $listaSelect['profesor']))
      

      {{ Form::open(array('url' => 'publicacion/show/'.$listaSelect['profesor']->id, 'files' => true,'id'=>'formPublicacion')) }}

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Editar Publicaciones
          </h1>
          <div class="box-footer">
              <div style ="float:left; width:15%">
                          {{ Form::submit('Agregar', array("class" => "btn btn-primary")) }}
              </div>
<!--               <div style ="float:right; width:70%">
                    <div id="errorContainer" class="alert alert-error" style="display:none"></div>
                    @if(Session::has('confirm'))
                        <div id="successContainer" class="alert alert-success">{{ Session::get('confirm') }}</div>                    
                    @endif

              </div> -->
           </div> 
        </section>

        <!-- Main content -->
        <section class="content">


          @if($errors->has())
              <div id="errorContainer2" class="alert alert-error">           
                  <!--recorremos los errores en un loop y los mostramos-->
                  @foreach ($errors->all('<p>:message</p>') as $message)
                      {{ $message }}
                  @endforeach
                   
              </div>
          @endif
          
          <div id="errorContainer" class="alert alert-error" style="display:none"></div>
          
          @if(Session::has('confirm'))
              <div id="successContainer" class="alert alert-success">{{ Session::get('confirm') }}</div>                    
          @endif


          <div class="row">
            <!-- left column -->
              <div class="col-md-6" style="width: 100%; background-color:#FFFFFF">
                  <!-- general form elements -->
                  <div class="box box-primary">
                
                            <!-- form start -->
                            <!-- <form role="form"> -->
                              <div class="box-body" style="width: 50%; float: left;">

                                    <div class="form-group" >
                                        {{ Form::label('materia_id', 'Curso') }}
                                        {{ Form::select('materia_id', $listaSelect['materia'], '1', array('class' => 'form-control')) }}
                                      </br>
                                        {{ Form::label('modalidad_id', 'Modalidad') }}
                                        {{ Form::select('modalidad_id',  $listaSelect['modalidad'],  '1', array('class' => 'form-control')) }}
                                      </br>
                                        <label for="codigo_distrito">Distrito</label>
                                        <input
                                            id="distrito",
                                            name="distrito",
                                            type="text"
                                            class="form-control typeahead"
                                            name="distrito",
                                            placeholder="¿Qué Distrito quiero enseñar?"
                                            autocomplete="off"
                                            data-provide="typeahead"
                                            style ="width:100%"
                                        />
                                        <input type="hidden" class="span1" name="ubigeo" id="ubigeo" value="" />
                                    </div>

                              </div><!-- /.box-body -->

                              <div class="box-body" style="width: 50%; float: right;">
                                
                                {{ Form::label('nivel_ensenanza_id', 'Nivel de Enseñanza') }}
                                {{ Form::select('nivel_ensenanza_id', $listaSelect['nivelEnsenanza'],'2',array('class' => 'form-control')) }}
                                </br>
                                {{ Form::label('tipo_moneda_id', 'Tipo de Moneda') }}
                                {{ Form::select('tipo_moneda_id', $listaSelect['tipoMoneda'],'1',array('class' => 'form-control')) }}
                                </br>      
                                {{ Form::label('cobro_hora', 'Precio por Hora de Clase') }}
                                {{ Form::number('cobro_hora', Input::old('cobro_hora'), array('class' => 'form-control')) }}

                              </div> 
                  
                  </div>

              </div>

              <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Mis Publicaciones</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="publicacionesTable" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Curso</th>
                            <th>Nivel de Enseñanza</th>
                            <th>Modalidad</th>
                            <th>Moneda</th>
                            <th>Precio por Hora</th>
                            <th>Distrito</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($listaSelect['listPublicacion'] as $publicacion)
                            <tr>
                              <td>{{$publicacion->materia->nombre}}</td>
                              <td>{{$publicacion->nivelEnsenanza->nombre}}</td>
                              <td>{{$publicacion->modalidad->nombre}}</td>
                              <td>{{$publicacion->tipoMoneda->simbolo}}</td>
                              <td>{{$publicacion->cobro_hora}}</td>
                              <td>{{$publicacion->ubigeo->distrito.', '.$publicacion->ubigeo->provincia.', '.$publicacion->ubigeo->departamento}}</td>
                              <th><a class="btn btn-primary" href="{{URL::to('publicacion/delete/'.$publicacion->id)}}">Eliminar</a></th>

                            </tr>
                          @endforeach

                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Curso</th>
                            <th>Nivel de Enseñanza</th>
                            <th>Modalidad</th>
                            <th>Moneda</th>
                            <th>Precio por Hora</th>
                            <th>Distrito</th>
                            <th>Acción</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
              </div><!-- /.col -->

          </div><!-- /.row -->

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
 
    
    <!-- Validate Form -->
    <script src="{{ asset('/plugins/validate/jquery.validate.js') }}" type="text/javascript"></script>
 



<!-- <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 -->
    <!--typeahead-->
    <script src="{{ asset('/plugins/typeahead/bootstrap.js') }}"></script>
    <script src="http://underscorejs.org/underscore-min.js"></script>

    <!-- JS de validaciones del publicacion.update-->
    <script src="{{ asset('/app/js/app.js') }}"></script>

    <!-- DATA TABES SCRIPT -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
 
<style>

.tt-query,
.tt-hint {
    width: 396px;
    height: 30px;
    padding: 8px 12px;
    font-size: 24px;
    line-height: 30px;
    border: 2px solid #ccc;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    outline: none;
}

.tt-query {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
    color: #999
}

.tt-dropdown-menu {
    width: 422px;
    margin-top: 12px;
    padding: 8px 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
    -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
    padding: 3px 20px;
    font-size: 18px;
    line-height: 24px;
}

.tt-suggestion.tt-is-under-cursor {
    color: #fff;
    background-color: #0097cf;

}



.alert {
padding: 8px 35px 8px 14px;
margin-bottom: 18px;
color: #c09853;
text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
background-color: #fcf8e3;
border: 1px solid #fbeed5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}

.alert-heading {
color: inherit;
}

.alert-success {
color: #468847;
background-color: #dff0d8;
border-color: #d6e9c6;
}

.alert-error {
color: #b94a48;
background-color: #f2dede;
border-color: #eed3d7;
}

</style>

  </body>
</html>
