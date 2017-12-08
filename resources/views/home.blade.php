@extends('layouts.app')

@section('title', 'Izvēlne')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Izvēlne</div>

                <div class="panel-body" align="center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('klienti.index') }}" class="btn btn-primary">Klientu saraksts</a>
					<a href="{{ route('pasutijumi.index') }}" class="btn btn-primary">Pasūtījumu saraksts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
