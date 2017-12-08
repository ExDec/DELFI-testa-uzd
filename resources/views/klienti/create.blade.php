@extends('layouts.app')

@section('title', 'Pievienot klientu')

@section('content')
    <div class="container">
	    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pievienot klientu</div>
				<div class="panel-body">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div><br />
					@endif
					@if (\Session::has('success'))
					<div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					</div><br />
					@endif
					<form method="post" action="{{url('klienti')}}">
					{{csrf_field()}}
												<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="name">Nosaukums:</label>
								<input type="text" class="form-control" name="name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="email">E-pasts:</label>
								<input type="text" class="form-control" name="email">
							</div>
						</div><div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="phone">Telefons:</label>
								<input type="text" class="form-control" name="phone">
							</div>
						</div><div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="reg_nr">Reģistrācijas numurs:</label>
								<input type="text" class="form-control" name="reg_nr">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<button type="submit" class="btn btn-success" style="margin-left:38px">Pievienot</button>
								<a href="{{ url('klienti') }}" class="btn btn-danger">Atcelt</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
@endsection

