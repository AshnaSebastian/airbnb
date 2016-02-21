var React = require('react');

import Room from './Room';

var Rooms = React.createClass({
	render() {
		var count = 1;
		var rooms = this.props.rooms.map(function(room) {
			while( count++ <= 3 )
			{			
				return (
					<div key={room.id} className="col-md-4">
						<Room room={room} />
					</div>
				)
			}
		});

		return (
			<div>{ rooms }</div>
		)
	}
});

export default Rooms;