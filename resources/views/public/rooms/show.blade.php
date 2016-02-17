@extends('public.layouts.default')
@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/datepicker.css') }}"></script>
@endsection
@section('content')
	<div class="SingleRoom">
		@include('public.rooms._gallery', ['photos' => $room->photos])
		<div class="whiteBg">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="SingleRoom__description row">
							<div class="col-md-2">
								<div class="SingleRoom__user">
									<img src="http://www.avatarsdb.com/avatars/Shailene_here_i_am.jpg" 
									width="100" height="100"
									class="img-circle" 
									alt="Room user" alt="{{ $room->user->name }}" 
									title="{{ $room->user->name }}" />
									<span>{{ $room->user->name }}</span>
								</div>
							</div>
							<div class="col-md-9">
								<h1 class="SingleRoom__name">{{ $room->name }}</h1>
								<h3 class="SigleRoom__country">{{ $room->country->name }}</h3>
								<div class="SingleRoom__includes row">
									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-users fa-2x"></i>
											Entire home/apt
										</p>
									</div>

									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-users fa-2x"></i>
											Entire home/apt
										</p>
									</div>

									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-users fa-2x"></i>
											Entire home/apt
										</p>
									</div>

									<div class="col-xs-6 col-md-3">
										<p class="text-center">
											<i class="fa fa-users fa-2x"></i>
											Entire home/apt
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="SingleRoom__booking">
							<div class="SingleRoom__booking--header">
								<div class="row">
									<div class="col-md-7">
										<p class="SingleRoom__booking--price"><span class="currency">$</span>{{ $room->price }}</p>
									</div>
									<div class="col-md-5">
										<p class="SingleRoom__booking--perNight">Per Night</p>
									</div>
								</div>
							</div>

							<form method="POST" action="{{ route('bookings.store', $room->id) }}">
								{!! csrf_field() !!}
								<input type="hidden" name="roomId" value="{{ $room->id }}" />

								<div class="form-group">
									<label>Check in</label>
									<input type="text" id="checkIn" class="form-control" name="checkIn" />
								</div>
								<div class="form-group">
									<label>Check in</label>
									<input type="text" id="checkOut" class="form-control" name="checkOut" />
								</div>
								<div class="form-group">
									<label>Guests</label>
									<select name="guests" class="form-control">
										@foreach( range(1, 20) as $count )
											<option value="{{ $count }}">{{ $count }}</option>
										@endforeach		
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Book Now</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="creamBg">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h2>About this listing</h2>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<p><strong><a href="#">Contact Host</a></strong></p>

						<div class="SingleRoom__info">
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>The Space</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>Accomodates: <strong>2</strong></li>
													<li>Bathrooms: <strong>1</strong></li>
													<li>Bed Type: <strong>Real Bed</strong></li>
													<li>Bedrooms: <strong>1</strong></li>
													<li>Beds: <strong>1</strong></li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>Check In: <strong>3:00 PM</strong></li>
													<li>Check Out: <strong>12:00 PM(noon)</strong></li>
													<li>Property Type: <strong>Apartment</strong></li>
													<li>Room Type: <strong>Entire home/apt</strong></li>
												</ul>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Amenities</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>Accomodates: <strong>2</strong></li>
													<li>Bathrooms: <strong>1</strong></li>
													<li>Bed Type: <strong>Real Bed</strong></li>
													<li>Bedrooms: <strong>1</strong></li>
													<li>Beds: <strong>1</strong></li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>Check In: <strong>3:00 PM</strong></li>
													<li>Check Out: <strong>12:00 PM(noon)</strong></li>
													<li>Property Type: <strong>Apartment</strong></li>
													<li>Room Type: <strong>Entire home/apt</strong></li>
												</ul>	
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Prices</p>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-6">
												<ul>
													<li>Accomodates: <strong>2</strong></li>
													<li>Bathrooms: <strong>1</strong></li>
													<li>Bed Type: <strong>Real Bed</strong></li>
													<li>Bedrooms: <strong>1</strong></li>
													<li>Beds: <strong>1</strong></li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul>
													<li>Check In: <strong>3:00 PM</strong></li>
													<li>Check Out: <strong>12:00 PM(noon)</strong></li>
													<li>Property Type: <strong>Apartment</strong></li>
													<li>Room Type: <strong>Entire home/apt</strong></li>
												</ul>	
											</div>
										</div>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Description</p>
									</div>
									<div class="col-md-9">
										<h4>The Space</h4>
										<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>House Rules</p>
									</div>
									<div class="col-md-9">
										<ul>
											<li>Accomodates: <strong>2</strong></li>
											<li>Bathrooms: <strong>1</strong></li>
											<li>Bed Type: <strong>Real Bed</strong></li>
											<li>Bedrooms: <strong>1</strong></li>
											<li>Beds: <strong>1</strong></li>
										</ul>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--each">
								<div class="row">
									<div class="col-md-3">
										<p>Availability</p>
									</div>
									<div class="col-md-9">
										<p><strong>2 nights</strong> minimum stay</p>
									</div>
								</div>	
							</div>
							<div class="SingleRoom__info--gallery">
								<?php
								$photosCount = count($room->photos);
								$photoCount = 1;
								$needsRow = false;
								?>
								<div class="row">
									@foreach( $room->photos->take(5) as $photo )
										<div class="col-md-{{ $photoCount > 2 ? '4' : '6' }} {{ $photoCount == 5 ? 'lastPhoto' : '' }}">
											<img src="{{ $photo->path }}" class="img-responsive" alt="{{ $room->name }}" title="{{ $room->name }}" />
											@if( $photoCount == 5 )
												<div class="viewPhotos">
													<p><a href="#">View all {{ $photosCount }} photos</a></p>
												</div>
											@endif
										</div>	
										<?php 
										$photoCount++;
										$needsRow = $photoCount === 3 ? true : false;
										?>
									@endforeach
								</div>								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/datepicker.js') }}"></script>
@endsection