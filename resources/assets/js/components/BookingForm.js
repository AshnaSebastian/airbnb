var React = require('react');
var ReactDOM = require('react-dom');
var csrf_token = $('meta[name="csrf_token"]').attr('content');

var BookingForm = React.createClass({
	getInitialState() {
		return {
			checkIn: '',
			checkOut: '',
			guests: 1
		}
	},

	componentDidMount() {
	    $( "#checkIn" ).datepicker({
			changeMonth: false,
			numberOfMonths: 1,
			dateFormat: 'yy-mm-dd',
			minDate: 0, //Today's Date
			showAnim: 'slideDown',
			onSelect: function( selectedDate ) {
				var checkOutMinDate = $('#checkIn').datepicker('getDate');
				checkOutMinDate.setDate(checkOutMinDate.getDate() + window.room.minimum_stay);

				this.setState({ checkIn: selectedDate });

				$("#checkOut").datepicker( "option", "minDate", checkOutMinDate);
			}.bind(this)
	    });

	    $("#checkOut").datepicker({
			changeMonth: false,
			numberOfMonths: 1,
			dateFormat: 'yy-mm-dd',
			showAnim: 'slideDown',
			onSelect: function( selectedDate ) {
				console.log(selectedDate);
				this.setState({ checkOut: selectedDate });
				$("#checkIn").datepicker( "option", "maxDate", selectedDate );
			}.bind(this)
	    });
	},

	handleGuestsChange(e) {
		this.setState({ guests: e.target.value });
	},

	submitForm(e) {
		e.preventDefault();

		console.log(window.room.id, this.state.checkIn, this.state.checkOut, this.state.guests);
	},

	render() {
		var postUrl = '/bookings/' + window.room.id;

		return (
			<form method="POST" action={postUrl} 
				onSubmit={this.submitForm}>
				<div className="row">
					<div className="col-xs-12 col-md-4 clear-padding-right">
						<div className="form-group">
							<label>Check in</label>
							<input type="text" id="checkIn" 
								className="form-control" />
						</div>
					</div>
					<div className="col-xs-12 col-md-4 clear-padding-right">
						<div className="form-group">
							<label>Check out</label>
							<input type="text" id="checkOut" 							
								className="form-control" />
						</div>
					</div>
					<div className="col-xs-12 col-md-4">
						<div className="form-group">
							<label>Guests</label>
							<select className="form-control" 
								value={this.state.guests} 
								onChange={this.handleGuestsChange}
							>
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</div>
					</div>
					<div className="col-xs-12 col-md-12">
						<div className="form-group">
							<button type="submit" 
								className="btn btn-primary btn-lg btn-block"
								onClick={this.submitForm}
							>	
								Request to Book
							</button>
						</div>
					</div>
				</div>
			</form>
		)
	}
});

ReactDOM.render(
	<BookingForm />,
	document.getElementById('BookingForm')
);