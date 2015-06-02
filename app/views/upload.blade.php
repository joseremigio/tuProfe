<!DOCTYPE HTML>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <!--cargamos los css-->
        {{ HTML::style('css/foundation.min.css') }}
        {{ HTML::style('css/normalize.css') }}
        <title>Título</title>
    </head>
    <body>
 
        <div class="row"> 
        	<h1 class="subheader">Profesor</h1>
        	<!--si el formulario contiene errores de validación-->
	        @if($errors->has())
	            <div class="alert-box alert">           
	                <!--recorremos los errores en un loop y los mostramos-->
	                @foreach ($errors->all('<p>:message</p>') as $message)
	                    {{ $message }}
	                @endforeach
	                 
	            </div>
	        @endif
	        
	        @if(Session::has('confirm'))
	            <div class="alert-box success round">
	                {{ Session::get('confirm') }}
	            </div>                    
	        @endif
        	<div class="form">
              
                {{ Form::open(array('url' => 'upload', 'files' => true)) }}
 
                
                {{ Form::label('nombres', 'Nombres') }}
                {{ Form::text('nombres', Input::old('name')) }}

                {{ Form::label('apellidos', 'Apellidos') }}
                {{ Form::text('apellidos', Input::old('lastname')) }}

                {{ Form::label('grado_academico_id', 'Grado Académico') }}
                {{ Form::select('grado_academico_id', $listaSelect['gradoAcademico'], $selected) }}

                {{ Form::label('profesion_id', 'Profesión') }}
                {{ Form::select('profesion_id',  $listaSelect['profesion'], $selected) }}

                {{ Form::label('universidad_id', 'Universidad') }}
                {{ Form::text('universidad_id') }}

                {{ Form::label('dni', 'DNI') }}
                {{ Form::text('dni') }}

                {{ Form::label('url_linkedin', 'LinkedIn') }}
                {{ Form::text('url_linkedin') }}

                {{ Form::label('cobro_hora', 'Cobro por Hora') }}
                {{ Form::text('cobro_hora') }}                

                {{ Form::label('correo', 'Correo') }}
                {{ Form::email('correo', Input::old('email')) }}

                {{ Form::label('celular', 'Celular') }}
                {{ Form::text('celular') }}

                {{ Form::label('descripcion', 'Descripción') }}
                {{ Form::text('descripcion') }}
 
                {{ Form::label('foto', 'Foto') }}
                {{ Form::file('foto') }}


<!--                 {{ Form::label('modalidad_id', 'Modalidad') }}
                {{ Form::select('modalidad_id', $listaSelect['modalidad'], $selected) }}

 -->


<!--                 {{ Form::label('nivel_ensenanza', 'Nivel de Enseñanza') }}
                {{ Form::text('nivel_ensenanza') }} -->

<!--                 {{ Form::label('localidades_ensenanza', 'Localidades de Enseñanza') }}
                {{ Form::text('localidades_ensenanza') }}    -->             


                <br />
                {{ Form::submit('Regístrarme', array("class" => "button expand round")) }}
 
                {{ Form::close() }}
 
            </div>    
             
        </div>
    </body>
</html>