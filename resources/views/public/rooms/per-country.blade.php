@extends('public.layouts.default')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					@foreach( $rooms as $room )
						<div class="col-md-6">
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
				</div>
			</div>

			<div class="col-md-5">
				<!-- display map -->
			</div>
		</div>
	</div>
@endsection