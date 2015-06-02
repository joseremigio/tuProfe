<form method="POST">
	Nombres: <input type="text" name="nombres"/><br/>
	Apellidos: <input type="text" name="apellidos"/><br/>
	Materias: <input type="text" name="materias"/><br/>
	Grado Académico : <input type="text" name="grado_academico_id"/><br/>
	Profesión: <input type="text" name="profesion_id"/><br/>
	Modalidad: <input type="text" name="modalidad_id"/><br/>
	Universidad: <input type="text" name="universidad_id"/><br/>
	Nivel de Enseñanza: <input type="text" name="nivel_ensenanza"/><br/>
	Localidades de Enseñanza: <input type="text" name="localidades_ensenanza"/><br/>
	LinkedIn: <input type="text" name="url_linkedin"/><br/>
	Cobro por Hora: <input type="text" name="cobro_hora"/><br/>
	Correo: <input type="text" name="correo"/><br/>
	Celular: <input type="text" name="celular"/><br/>
	Foto: <input type="text" name="foto"/><br/>
	Descripción: <input type="textarea" name="descripcion"/><br/>
 {{ Form::file('photo') }}
	<input type="submit" value="Grabar"/>
</form>