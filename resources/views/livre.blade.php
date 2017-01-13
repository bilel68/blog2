@extends('templates.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Voici vos livres de mangas :</div>


             <div class="panel-body">
               @if(! empty($livres))

                 @foreach ($livres as $livre)

                   {{ $livre->name }}

                   @foreach ($livre->genres as $genre)

                     {{ $genre->name}}

                   @endforeach
                  <a href='/livre/{{ $livre->id }}/update'>Update</a>
                  <a href='/livre/{{ $livre->id }}/delete'>Delete</a>

                   <br>

                 @endforeach
               @elseif(! empty($livre))

                 {{ $livre->name }}

                 @foreach ($livre->genres as $genre)

                   {{ $genre->name}}

                 @endforeach
               @else
                 Aucun livre affiché
               @endif
             </div>
         </div>



            </div>
        </div>
    </div>
</div>
@endsection
