<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> @yield('title','Panel de Administración')</title>
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">-->
	{!!Html::style('https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css',array('integrity' => 'sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q','crossorigin' => 'anonymous'))!!}
	{!!Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array('integrity' => 'sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN','crossorigin' => 'anonymous'))!!}
	{!!Html::style('admin/css/main.css')!!}
	@yield('css')
	{!!Html::style('https://fonts.googleapis.com/css?family=Lobster+Two|Poiret+One')!!}
</head>
<body>
	@if(\Session::get('message'))
		@include('store.vistaparcial.message')
	@endif

	@include('admin.vistaparcial.menu')
	@yield('content')

	@include('admin.vistaparcial.footer')


	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',array('integrity' => 'sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa','crossorigin' => 'anonymous'))!!}
	{!!Html::script('js/pinterest_grid.js')!!}
	@yield('script')

</body>
</html>