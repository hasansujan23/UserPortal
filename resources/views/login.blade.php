@extends('layouts.master')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(session()->get( 'error' ))
					<p class="alert alert-danger text-center mt-2">Wrong user-id or password</p>
				@endif
			</div>
			<div class="col-md-8 mx-auto mt-4">
				<div class="col-md-12 text-center">
					<i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
					<h4>Login Panel</h4>
				</div>
				<div class="col-md-12">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
				<form action="{{ route('checkUser') }}" method="post">
					{{ csrf_field()}}
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>

					<input type="submit" class="btn btn-success" name="submit" value="Login">
					<a href="" class="text-center mt-2"><p>Don't have any account? Register Here</p></a>
				</form>
			</div>
		</div>
	</div>

@endsection