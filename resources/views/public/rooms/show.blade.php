@extends('public.layouts.default')
@section('content')
	<div class="container">
		<h1>{{ $room->name }}</h1>
		<h3>{{ $room->price }}</h3>

		<form method="POST" action="{{ route('bookings.store', $room->id) }}">
			{!! csrf_field() !!}
			<input type="hidden" name="roomId" value="{{ $room->id }}" />
			<input type="date" name="checkIn" />
			<input type="date" name="checkOut" />
			<button type="button" class="btn btn-primary">Book Now</button>
		</form>
	</div>
@endsection