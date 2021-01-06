@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<form action="{{url('cvs')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('POST') }}
				<div class="form-group @if($errors->get('titre')) 'has-error @endif">
					<label for="">Titre</label>
					<input type="text" class="form-control" name="titre" value="{{old('titre')}}">
					@if($errors->get('titre'))

						@foreach($errors->get('titre') as $message)
						<li>{{$message}}</li>
						@endforeach
						
					@endif

				</div>


				<div class="form-group @if($errors->get('presentation')) 'has-error @endif">
					<label for="">Présentation</label>
					<textarea class="form-control" name="presentation">{{old('presentation')}}</textarea>

					@if($errors->get('presentation'))

						@foreach($errors->get('presentation') as $message)
						<li>{{$message}}</li>
						@endforeach
						
					@endif
				</div>

				<div class="form-group">
					<label for="">Image</label>
					<input type="file" name="image" class="form-control">
					@if($errors->get('image'))

						@foreach($errors->get('image') as $message)
						<li>{{$message}}</li>
						@endforeach
						
					@endif
				</div>


				<div class="form-group">
					<input type="submit" class="form-control btn btn-success" value="Enregistrer">
					<a href="{{ url('cvs')}}" class="form-control btn btn-primary">Retour (Page d'accueil)</a>
				</div>
				</div>


			</form>

		</div>
	</div>
</div>

@endsection