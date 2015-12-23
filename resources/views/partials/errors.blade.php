<div class="col-md-5 col-md-offset-5">
	<ul class="list list-group text-danger">
		@foreach ($errors->all() as $error)
			<li class="list-group-item">{{ $error }}</li>
		@endforeach
	</ul>
</div>