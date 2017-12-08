@extends('layouts.app')

@section('title', 'Pasūtījumu saraksts')

@section('content')
    <div class="container">
	    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pasūtījumu saraksts</div>
				<div class="panel-body">
					@if (\Session::has('success'))
					<div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					</div><br />
					@endif
					<a href="{{ url('/') }}" class="btn btn-primary">Izvēlne</a>
					<a href="{{ route('pasutijumi.create') }}" class="btn btn-primary">Jauns pasūtījums</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nosaukums</th>
								<th>Klients</th>
								<th>Apraksts</th>
								<th>Cena</th>
								<th colspan="2">Darbība</th>
							</tr>
						</thead>
						<tbody>
						@foreach($pasutijumi as $pasutijums)
							<tr>
								<td>{{$pasutijums['name']}}</td>
								<td>{{$pasutijums['client']}}</td>
								<td>{{$pasutijums['info']}}</td>
								<td>{{$pasutijums['price']}}</td>
								<td><a href="{{action('PasutijumiController@edit', $pasutijums['id'])}}" class="btn btn-warning">Labot</a></td>
								<td>
									<form action="{{action('PasutijumiController@destroy', $pasutijums['id'])}}" method="post">
									{{csrf_field()}}
										<input name="_method" type="hidden" value="DELETE">
										<button class="btn btn-danger" type="submit">Dzēst</button>
									</form>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
@endsection
