@if($errors->any())
	<div class="alert alert-warning">
		<ul class="list-unstyled">
		@foreach($errors->all() as $rec)
			<li>{{ $rec }}</li>
		@endforeach
		</ul>
	</div>
@endif