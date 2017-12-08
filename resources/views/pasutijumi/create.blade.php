@extends('layouts.app')

@section('title', 'Pievienot pasūtījumu')

@section('content')
    <div class="container">
	    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pievienot pasūtījumu</div>
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
					<form method="post" action="{{url('pasutijumi')}}">
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
								<label for="client">Klients:</label><br />
								<select name="client">
									@foreach($klienti as $klients)
									<option value="{{ $klients }}">{{ $klients }}</option>
									@endforeach
								</select>
							</div>
						</div><div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="info">Apraksts:</label>
								<input type="text" class="form-control" name="info">
							</div>
						</div><div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<label for="price">Cena:</label>
								<input type="text" class="form-control" name="price">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="form-group col-md-4">
								<button type="submit" class="btn btn-success" style="margin-left:38px">Pievienot</button>
								<a href="{{ route('pasutijumi.index') }}" class="btn btn-danger">Atcelt</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
@endsection

