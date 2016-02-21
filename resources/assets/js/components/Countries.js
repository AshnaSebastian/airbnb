var React = require('react');
var ReactDOM = require('react-dom');

var googlemap_key = $('meta[name="googlemap_key"]').attr('content');

import Rooms from './Rooms';
import Gallery from './Gallery';

var Countries = React.createClass({
	getInitialState() {
		return {
			countries: window.countries
		}
	},

	render() {
		var countries = window.countries.map(function(country) {
			var google_map = `https://maps.googleapis.com/maps/api/staticmap?center=${country.name}&zoom=5&size=400x215&key=${googlemap_key}`
			return (
				<div key={country.id} className="Country col-md-12">
					<h2>{ country.name }</h2>
					<div className="row">
						<div className="Country__gallery col-md-8">
							<Gallery id={country.id} photos={country.photos} />
						</div>
						<div className="Country__why-visit col-md-4">
							<h4 className="Country__why-visit-title">Why Visit?</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							</p>
							<p>&nbsp;</p>
							<div>
								<img src={google_map} 
									alt={country.name} title={country.name} 
									className="img-responsive" />
							</div>
						</div>
					</div>
					<div className="row">
						<div className="Country__available-in col-md-12">
							<h3>Available in { country.name }</h3>
							<div className="row">
								<Rooms rooms={country.rooms} />
								<div className="col-md-12">
									<p>&nbsp;</p>
									<p className="text-center">
										<a href="#" className="btn btn-danger btn-lg">See all available places</a>
									</p>
									<p>&nbsp;</p>
									<hr />
								</div>
							</div>
						</div>	
					</div>
				</div>
			)
		});

		return (
			<div>{ countries }</div>
		)
	}
});

ReactDOM.render(
	<Countries />,
	document.getElementById('Countries')
);