var React = require('react');
var ReactDOM = require('react-dom');

var RoomInformationForm = React.createClass({

	getInitialState() {
		return {
			user: window.user,
			room: window.room
		}
	},

	render() {
		return(
			<form method="POST">
				<div className="row">
					<div className="col-md-12">
						<h1 className="page__title">Update Room Information</h1>
						<hr />
						<div className="row">
							<div className="col-md-4">
								<div className="form-group">
									<label>Name</label>
									<input type="text" name="name" className="form-control" value={ this.state.room.name } placeholder="What's your room name?" />
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Price</label>
									<div className="input-group">
										<div className="input-group-addon">$</div>
										<input type="text" name="price" className="form-control" value={ this.state.room.price } placeholder="Price per night" />
									</div>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Minimum Stay</label>
									<select name="minimumStay" className="form-control">
										@foreach( range(1, 5) as $index )
											<option value="{{ $index }}">{{ $index }} day{{ $index == 1 ? '' : 's'}}</option>
										@endforeach	
									</select>
								</div>		
							</div>
						</div>

						<div className="form-group">
							<label>About this listing</label>
							<textarea name="aboutListing" rows="10" className="form-control" placeholder="Brief description of the room"></textarea>
						</div>
						
						<div className="row">
							<div className="col-md-12">
								<h3>The Space</h3>
								<hr />
							</div>
							<div className="col-md-4">
								<div className="form-group">
									<label>Property Type</label>
									<select name="propertyType" className="form-control">
										<option value=""></option>
										<option value="Apartment">Apartment</option>
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Room Type</label>
									<select name="roomType" className="form-control">
										<option value=""></option>
										<option value="Private Room">Private Room</option>
										<option value="Entire home/apt">Entire home/apt</option>
										<option value="Shared Room">Shared Room</option>
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Accommodates</label>
									<select name="accommodates" className="form-control">
										@foreach( range(1, 5) as $index )
											<option value="{{ $index }}">{{ $index }} people</option>
										@endforeach	
									</select>
								</div>
							</div>
						</div>

						<div className="row">
							<div className="col-md-4">
								<div className="form-group">
									<label>Bathrooms</label>
									<select name="bathrooms" className="form-control">
										@foreach( range(1, 5) as $index )
											<option value="{{ $index }}">{{ $index }} bathroom{{ $index == 1 ? '' : 's'}}</option>
										@endforeach	
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Bed Type</label>
									<input type="text" name="bedType" className="form-control" value="{{ $room->bedType }}" placeholder="Bed Type" />
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Bedrooms</label>
									<select name="bedrooms" className="form-control">
										@foreach( range(1, 5) as $index )
											<option value="{{ $index }}">{{ $index }} bedroom{{ $index == 1 ? '' : 's'}}</option>
										@endforeach	
									</select>
								</div>
							</div>
						</div>

						<div className="row">
							<div className="col-md-4">
								<div className="form-group">
									<label>Beds</label>
									<select name="beds" className="form-control">
										@foreach( range(1, 5) as $index )
											<option value="{{ $index }}">{{ $index }} bed{{ $index == 1 ? '' : 's'}}</option>
										@endforeach	
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Check In</label>
									<select name="checkIn" className="form-control">
										@foreach( $timings->get() as $time )
											<option value="{{ $time }}">{{ $time }}</option>
										@endforeach	
									</select>
								</div>
							</div>

							<div className="col-md-4">
								<div className="form-group">
									<label>Check Out</label>
									<select name="checkOut" className="form-control">
										@foreach( $timings->get() as $time )
											<option value="{{ $time }}">{{ $time }}</option>
										@endforeach	
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div className="row">
					<div className="col-md-12">
						<h3>Amenities</h3>
						<hr />
					</div>

					<div id="RoomAmenities"></div>

				</div>

				<div className="row">
					<div className="col-md-12">
						<h3>Prices</h3>
						<hr />
					</div>

					<div className="col-md-3">
						<div className="form-group">
							<label>Extra People</label>
							<div className="input-group">
								<div className="input-group-addon">$</div>
								<input type="text" name="extraPeopleFee" className="form-control" value="{{ $room->extraPeopleFee }}" placeholder="Extra People Fee" />
							</div>
						</div>
					</div>

					<div className="col-md-3">
						<div className="form-group">
							<label>Cleaning Fee</label>
							<div className="input-group">
								<div className="input-group-addon">$</div>
								<input type="text" name="cleaningFee" className="form-control" value="{{ $room->cleaningFee }}" placeholder="Cleaning Fee" />
							</div>
						</div>
					</div>
				</div>

				<div className="form-group">
					<label>Description</label>
					<textarea name="description" rows="10" className="form-control" placeholder="Description of the room"></textarea>
				</div>

				<hr />

				<div className="row">
					<div className="col-md-12">
						<button type="submit" name="submit" className="btn btn-primary btn-lg">Update Room Information</button>
					</div>
				</div>
			</form>
		);	
	}
});

ReactDOM.render(
	<RoomInformationForm />,
	document.getElementById('RoomInformationForm')
);