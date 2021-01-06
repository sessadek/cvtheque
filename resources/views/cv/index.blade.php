@extends('layouts.app')


@section('content')
<div class="container">
	<h2 class="text-center">La liste de mes CV</h2>
	<a href="{{ url('cvs/create') }}" class="btn btn-success mb-3">Nouveau Cv</a>
	<!--search-->
	<form class="input-group mb-3" action="/search" method="get"> 			<!--action =/search --->
		<input type="search" name="search" class="form-control" value="" placeholder="search" >
		<button type="submit" class="btn btn-primary">Search</button>

	</form>
	<div class="row">
		@foreach($cvs as $cv)
			<div class="col-sm-6 col-md-4">
				<div class="card">
					<img src="{{ asset('storage/'.$cv->image) }}" class="card-img-top" height="250" alt="">
					<div class="card-body">
						<h5 class="card-title">{{ $cv->titre }}</h5>
						<p class="card-text">{{ $cv->presentation }}</p>
					</div>
					<div class="card-footer d-flex">
						<a href="{{ url('cvs/'.$cv->id.'/show') }}" class="btn btn-info">Details</a>
						<a href="{{ url('cvs/'.$cv->id.'/edit') }}" class="btn btn-warning">Editer</a>
						<form action="{{url('cvs/'.$cv->id)}}" mathod="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							@can('delete', $cv)
								<button type="submit" class="btn btn-danger">Supprimer</button>
							@endcan
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection

