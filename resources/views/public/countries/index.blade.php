@extends('public.layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			@foreach( $countries as $country )
			<div class="col-md-12">
				<h2>{{ $country->name }}</h2>
				<div class="row">
					<div class="col-md-8">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php $count = 1; ?>
								@foreach( range(1,5) as $photo )
									<div class="item {{ $count == 1 ? 'active' : '' }}">
										<a href="#">
											<img src="http://lorempixel.com/800/475" class="img-responsive" alt="" />
										</a>
									</div>
								<?php $count++ ?>
								@endforeach
						  	</div>

							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<h4>Why Visit?</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>

						<div>
							<img src="https://maps.googleapis.com/maps/api/staticmap?center=41.01974502322511%2C28.98038830944819&size=314x214&zoom=10&client=gme-airbnbinc&channel=monorail-prod&signature=N51IUEAR-tfKnWNLFRD-ZfrDhX8%3D" alt="" title="" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3>Available in {{ $country->name }}</h3>
						<div class="row">
							@foreach( $country->rooms->take(3) as $room )
								<div class="col-md-4">
									<div class="Room">
										<div class="Room__header">
											<a href="#">
												<i class="fa fa-heart-o fa-2x"></i>
											</a>
										</div>
										<div class="Room__gallery">
											@include('public.rooms._gallery', ['photos' => $room->photos])
											<h4 class="Room__price">
												<span class="currency">$</span> {{ $room->price }}
											</h4>
											<div class="Room__user">
												<a href="#">
													<img src="http://lorempixel.com/70/70/people" 
														width="70" height="70"
														class="img-circle" 
														alt="Room user" alt="{{ $room->user->name }}" 
														title="{{ $room->user->name }}" />
												</a>
											</div>
										</div>
										<div class="Room__footer">
											<h3 class="Room__name">
												<a href="{{ route('room', $room->slug) }}">
													{{ $room->name }}
												</a>
											</h3>
											<h5 class="Room__type">Private Room</h5>
										</div>
									</div>
								</div>
							@endforeach

							<div class="col-md-12">
								<p>&nbsp;</p>
								<p class="text-center">
									<a href="#" class="btn btn-danger btn-lg">See all available places</a>
								</p>
								<p>&nbsp;</p>
								<hr />
							</div>
						</div>
					</div>	

				

				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection