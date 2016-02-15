<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
</head>
<body>	
	<div class="container">
		<h1>{{ $room->name }}</h1>
		<h3>{{ $room->price }}</h3>

		<form method="POST" action="{{ route('bookings.store', $room->id) }}">
			{!! csrf_field() !!}
			<input type="hidden" name="roomId" value="{{ $room->id }}" />
			<button type="button" class="btn btn-primary">Book Now</button>
		</form>
	</div>
</body>
</html>