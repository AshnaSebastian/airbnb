@extends('public.layouts.default')

@section('bodyClass', 'cream')

@section('content')
	<div class="container">
		<form method="POST" action="{{ route('user.rooms.store', Auth::user()->id) }}">
			{!! csrf_field() !!}
			<div class="row">
				<div class="col-md-12">
					<h1>Add New Room</h1>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="What's your room name?" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Price</label>
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<input type="text" name="price" class="form-control" placeholder="Price per night" />
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Where is it located?</label>						
								<select name="country" class="form-control">
									<option value="0"></option>
									@foreach( $countries as $country )
										<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
								</select>	
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>About this Listing</label>
						<textarea name="aboutListing" class="form-control" rows="10" placeholder="Brief description of your room"></textarea>
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
								<input type="text" name="accommodates" class="form-control" placeholder="Accommodates" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Bathrooms</label>
								<input type="text" name="bathrooms" class="form-control" placeholder="Bathrooms" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Bed Type</label>
								<input type="text" name="bedType" class="form-control" placeholder="Bed Type" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Bedrooms</label>
								<input type="text" name="bedrooms" class="form-control" placeholder="Bedrooms" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Beds</label>
								<input type="text" name="beds" class="form-control" placeholder="Beds" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Check In</label>
								<input type="text" name="checkIn" class="form-control" placeholder="Check In" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Check Out</label>
								<input type="text" name="checkOut" class="form-control" placeholder="Check Out" />
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

				@foreach( $amenities as $amenity )
					<div class="col-xs-6 col-md-3">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="amenities[]" id="amenities" value="{{ $amenity->id }}" /> {{ $amenity->name }}
							</label>
						</div>
					</div>
				@endforeach	
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Prices</h3>
					<hr />
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Extra People</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="text" name="extraPeopleFee" class="form-control" placeholder="Extra People Fee" />
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Cleaning Fee</label>
						<div class="input-group">
							<div class="input-group-addon">$</div>
							<input type="text" name="cleaningFee" class="form-control" placeholder="Cleaning Fee" />
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Description</h3>
					<hr />
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<textarea name="description" class="form-control" rows="10" placeholder="Description of your room"></textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>House Rules</h3>
					<hr />
				</div>
				<div class="col-md-12">

				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Safety Features</h3>
					<hr />
				</div>
				<div class="col-md-12">
				
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Availability</h3>
					<hr />
				</div>
				<div class="col-md-3">
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

			<hr />

			<div class="row">
				<div class="col-md-12">
					<button type="submit" name="submit" class="btn btn-primary btn-lg">Save Room Information</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@section('footer_scripts')

@endsection	