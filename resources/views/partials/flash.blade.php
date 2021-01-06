@if(session()->has('success'))
			<!--<div class="alert alert-success">
				{{session()->get('success')}}
			</div>-->
			<div class="alert alert-info alert-dismissible fade show">
			<button class="close" type="button" data-dismiss="alert">&times;</button> <!-- &times = ( x ) --->
			<h5 class="alert-link">{{session()->get('success')}} !</h5>
		</div>
			@endif




