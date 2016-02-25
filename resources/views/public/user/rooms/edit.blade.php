@extends('public.layouts.default')
@inject('timings', 'Airbnb\Services\Timings')
@section('bodyClass', 'cream page')
@section('content')
	<div class="container">
		<div id="RoomInformationForm"></div>
	</div>
@endsection

@section('footer_scripts')
	<script src="/js/RoomInformationForm.js"></script>
	<script src="/js/RoomAmenities.js"></script>
@endsection	