@extends('public.layouts.default')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class="row">
					@foreach( range(1, 10) as $index )
					<div class="col-md-6">
						<div class="Room">
							<div class="Room__header">
								<i class="fa fa-heart-o fa-2x"></i>
							</div>
							<div class="Room__gallery">
								@include('public.rooms._gallery')
							</div>
							<div class="Room__footer">
								<div class="Room__name">
									<h4>Room Name</h4>
								</div>
								<div class="Room__user">
									<img src="http://placehold.it/70x70" class="img-circle" alt="Room user" />
								</div>
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