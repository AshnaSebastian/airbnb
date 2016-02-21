var React = require('react');
var ReactDOM = require('react-dom');

import Room from './Room';

var RoomsPerCountry = React.createClass({
	getInitialState() {
		return {
			country: window.country,
			rooms: window.rooms
		}
	},

	render() {
		var rooms = window.rooms.map(function(room) {
			return (				
				<div key={room.id} className="col-xs-12 col-md-6">
					<Room room={room} isLikeable={true} />
				</div>
			)
		});

		return (
			<div className="row">
				{ rooms }
			</div>
		)
	}
});

ReactDOM.render(
	<RoomsPerCountry />,
	document.getElementById('RoomsPerCountry')
);