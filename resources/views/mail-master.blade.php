<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	{{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
	{{-- @yield('styles') --}}
</head>
<body>

	@yield('mail-content')


	<div class="row">
	<div class="gap">
		
	</div>
		<div class="col-md-3 col-md-offset-3">
			<a href="{{ url('pdf-download') }}" class="btn btn-primary" title="">Download pdf</a>
		</div>
		<div class="col-md-3"></div>
	</div>
	
</body>
</html>