@extends('templates.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenu, Veuillez vous connecter pour accéder à la Biblio</div>

                <div class="panel-body">
                  @if(Auth::check())
                    Hello : {{ Auth::user()->name }}, Welcome Home!
                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
