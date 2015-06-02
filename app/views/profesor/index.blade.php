<hi1>Profesores</h1>

@if($profesores)
<ul>
	@foreach ($profesores as $profesor)
		
	<li>{{$profesor->nombres}}</li>

	@endforeach
</ul>	
@else
Todavia no hay profesores.
@endif