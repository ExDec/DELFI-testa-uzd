@extends('layouts.app')

@section('title', 'Labot pasūtījuma datus')

@section('content')
    <div class="container">
	    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Labot pasūtījuma datus</div>
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
					<form method="post" action="{{action('PasutijumiController@update', $id)}}">
					{{csrf_field()}}
					<input name="_method" type="hidden" value="PATCH">
						<div class="row">
						  <div class="col-md-4"></div>
						  <div class="form-group col-md-4">
							<label for="name">Nosaukums:</label>
							<input type="text" class="form-control" name="name" value="{{$pasutijums->name}}">
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
						  </div>
						  <div class="row">
						  <div class="col-md-4"></div>
							<div class="form-group col-md-4">
							  <label for="info">Apraksts:</label>
							  <input type="text" class="form-control" name="info" value="{{$pasutijums->info}}">
							</div>
						  </div>
						  <div class="row">
						  <div class="col-md-4"></div>
							<div class="form-group col-md-4">
							  <label for="price">Cena:</label>
							  <input type="text" class="form-control" name="price" value="{{$pasutijums->price}}">
							</div>
						  </div>
						<div class="row">
						  <div class="col-md-4"></div>
						  <div class="form-group col-md-4">
							<button type="submit" class="btn btn-success" style="margin-left:38px">Labot datus</button>
							<a href="{{ url('pasutijumi') }}" class="btn btn-danger">Atcelt</a>
						  </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
@endsection
