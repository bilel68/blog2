@extends('templates.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">{{ isset($updatedLivre) ? 'Update : ' . $updatedLivre->name : 'Creer un livre' }}</div>
                <div class="panel-body">
                @if(isset($updatedLivre))
                {{ Form::open(['url' => 'livre/update']) }}
                {{ Form::hidden('id', $updatedLivre->id)}}
                @else
                {{ Form::open(['url' => 'livre/new']) }}
                @endif

               {{ Form::open(['url' => 'livre/new']) }}
                                {{ Form::label('name', 'Nom du livre') }}
                                  {{ Form::text('name',isset($updatedLivre) ? $updatedLivre->name : '') }}
                                  {{ Form::label('date', 'Date de sortie du livre') }}
                                  {{ Form::text('date',isset($updatedLivre) ? $updatedLivre->date : '') }}
                                  {{ Form::label('genres', 'Genres')}}
                                  {{ Form::select('genres[]',$genres, $genresId, ['multiple' => true])}}
                                  {{ Form::submit('Créer') }}
                                {{ Form::close() }}




            </div>
        </div>
    </div>
</div>
@endsection
