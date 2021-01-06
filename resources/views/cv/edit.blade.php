@extends('layouts.app')


@section('content')


@if(count($errors))
<div class="alert alert-danger" role="alert">
  <ul>
  	@foreach($errors->all() as $message)
  	<li>{{$message}}</li>
  	@endforeach
  </ul>
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<form action="{{url('cvs/'.$cv->id)}}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}
			

				<div class="form-group">
					<label for="">Titre</label>
					<input type="text" class="form-control" name="titre" value="{{$cv->titre}}">
				</div>


				<div class="form-group">
					<label for="">Présentation</label>
					<textarea class="form-control" name="presentation" >{{$cv->presentation}}</textarea>
				</div>

				<div class="form-group">
					<label for="">Image</label>
					<input type="file" name="image" class="form-control">
				</div>


				<div class="form-group">
					<input type="submit" class="form-control btn btn-danger" value="Modifier">
					<a href="{{ url('cvs')}}" class="form-control btn btn-primary">Retour</a>
				</div>


			</form>

		</div>
	</div>
</div>

@endsection