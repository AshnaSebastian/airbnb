var React = require('react');
var classNames = require('classnames');

var Gallery = React.createClass({

	render() {
		var carousel_id = 'carousel-' + this.props.id;
		var carousel_href = '#' + carousel_id;

		var count = 1;
		var photos = this.props.photos.map(function(photo) {
			var itemClass = classNames({
				'item'	: true,
				'active' : count == 1 ? true : false
			});

			count = count + 1;

			return (
				<div key={photo.id} className={itemClass}>
					<a href="#">
						<img src={ photo.path } className="img-responsive" alt="" />
					</a>
				</div>
			)
		});


		return (
			<div id={carousel_id} className="carousel slide" data-ride="carousel">
				<div className="carousel-inner" role="listbox">
					{ photos }
			  	</div>

				<a className="left carousel-control" href={carousel_href} role="button" data-slide="prev">
					<span className="glyphicon glyphicon-chevron-left glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					<span className="sr-only">Previous</span>
				</a>
				<a className="right carousel-control" href={carousel_href} role="button" data-slide="next">
					<span className="glyphicon glyphicon-chevron-right glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					<span className="sr-only">Next</span>
				</a>
			</div>
		)
	}
});

export default Gallery;