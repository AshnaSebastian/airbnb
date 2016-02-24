@extends('public.layouts.default')
@inject('timings', 'Airbnb\Services\Timings')
@section('bodyClass', 'cream page')
@section('content')
	<div class="container">
		
		<div id="RoomInformationForm"></div>

		<form method="POST" action="{{ route('user.rooms.update', [Auth::user()->id, $room->id]) }}">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}
			<div class="row">
				<div class="col-md-12">
					<h1 class="page__title">Update Room Information</h1>
					<hr />
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ $room->name }}" placeholder="What's your room name?" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Price</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" name="price" class="form-control" value="{{ $room->price }}" placeholder="Price per night" />
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Minimum Stay</label>
								<select name="minimumStay" class="form-control">
									@foreach( range(1, 5) as $index )
										<option value="{{ $index }}">{{ $index }} day{{ $index == 1 ? '' : 's'}}</option>
									@endforeach	
								</select>
							</div>		
						</div>
					</div>

					<div class="form-group">
						<label>About this listing</label>
						<textarea name="aboutListing" rows="10" class="form-control" placeholder="Brief description of the room"></textarea>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<h3>The Space</h3>
							<hr />
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Property Type</label>
								<select name="propertyType" class="form-control">
									<option value=""></option>
									<option value="Apartment">Apartment</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Room Type</label>
								<select name="roomType" class="form-control">
									<option value=""></option>
									<option value="Private Room">Private Room</option>
									<option value="Entire home/apt">Entire home/apt</option>
									<option value="Shared Room">Shared Room</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Accommodates</label>
								<select name="accommodates" class="form-control">
									@foreach( range(1, 5) as $index )
										<option value="{{ $index }}">{{ $index }} people</option>
									@endforeach	
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Bathrooms</label>
								<select name="bathrooms" class="form-control">
									@foreach( range(1, 5) as $index )
										<option value="{{ $index }}">{{ $index }} bathroom{{ $index == 1 ? '' : 's'}}</option>
									@endforeach	
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Bed Type</label>
								<input type="text" name="bedType" class="form-control" value="{{ $room->bedType }}" placeholder="Bed Type" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Bedrooms</label>
								<select name="bedrooms" class="form-control">
									@foreach( range(1, 5) as $index )
										<option value="{{ $index }}">{{ $index }} bedroom{{ $index == 1 ? '' : 's'}}</option>
									@endforeach	
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Beds</label>
								<select name="beds" class="form-control">
									@foreach( range(1, 5) as $index )
										<option value="{{ $index }}">{{ $index }} bed{{ $index == 1 ? '' : 's'}}</option>
									@endforeach	
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Check In</label>
								<select name="checkIn" class="form-control">
									@foreach( $timings->get() as $time )
										<option value="{{ $time }}">{{ $time }}</option>
									@endforeach	
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Check Out</label>
								<select name="checkOut" class="form-control">
									@foreach( $timings->get() as $time )
										<option value="{{ $time }}">{{ $time }}</option>
									@endforeach	
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Amenities</h3>
					<hr />
				</div>

				<div id="RoomAmenities"></div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Prices</h3>
					<hr />
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Extra People</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="text" name="extraPeopleFee" class="form-control" value="{{ $room->extraPeopleFee }}" placeholder="Extra People Fee" />
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Cleaning Fee</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="text" name="cleaningFee" class="form-control" value="{{ $room->cleaningFee }}" placeholder="Cleaning Fee" />
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Description</label>
				<textarea name="description" rows="10" class="form-control" placeholder="Description of the room"></textarea>
			</div>

			<hr />

			<div class="row">
				<div class="col-md-12">
					<button type="submit" name="submit" class="btn btn-primary btn-lg">Update Room Information</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('footer_scripts')
	<script src="/js/RoomInformationForm.js"></script>
	<script src="/js/RoomAmenities.js"></script>
@endsection	