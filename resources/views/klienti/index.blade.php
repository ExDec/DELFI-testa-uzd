@extends('layouts.app')

@section('title', 'Klientu saraksts')

@section('content')
    <div class="container">
	    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Klientu saraksts</div>
				<div class="panel-body">
					@if (\Session::has('success'))
					<div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					</div><br />
					@endif
					<a href="{{ url('/') }}" class="btn btn-primary">Izvēlne</a>
					<a href="{{ route('klienti.create') }}" class="btn btn-primary">Jauns klients</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nosaukums</th>
								<th>E-pasts</th>
								<th>Telefons</th>
								<th>Reģistrācijas numurs</th>
								<th colspan="2">Darbība</th>
							</tr>
						</thead>
						<tbody>
						@foreach($klienti as $klients)
							<tr>
								<td>{{$klients['name']}}</td>
								<td>{{$klients['email']}}</td>
								<td>{{$klients['phone']}}</td>
								<td>{{$klients['reg_nr']}}</td>
								<td><a href="{{action('KlientiController@edit', $klients['id'])}}" class="btn btn-warning">Labot</a></td>
								<td>
									<form action="{{action('KlientiController@destroy', $klients['id'])}}" method="post">
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
