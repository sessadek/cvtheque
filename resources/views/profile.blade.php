@extends('layouts.app')



@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<img src="/uploads/avatars/{{ $user->avatar }}" alt="" style="width:200px; height: 200px; float: left; border-radius:50%; margin-right: 25px; ">
		<small>Profile de : <h3>{{ $user->name }}</h3></small>
		<form enctype="multipart/form-data" action="/profile" method="post">
			<p>Modifier la photo de profil</p>
			<input type="file" name="avatar">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" class="pull-right btn btn-success btn-sm">
			<a href="{{ url('cvs')}}" class="btn btn-sm btn-primary">La page d'accueil</a>
		</form>
		</div>
	</div>
</div>
@endsection