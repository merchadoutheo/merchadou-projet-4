@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Auteur :  {{ $billet->user->name }}</div>

                <div class="panel-body">
                    <img style="margin:auto" src="{{ url('/'.$billet->urlImg) }}" alt="vignette" class="img-responsive">
                    <h2>{{ $billet->titre }}</h2>
                    <p>
                        {!! $billet->contenu !!}<br>
                        <small>Publié {{ $billet->created_at->diffForHumans() }}</small>
                    </p>
                    <a href='{{ route("accueil") }}'>Retour à la liste des billets</a>
                    
                    <h3>Commentaires</h3>

                    @if ($commentaires->isEmpty())

                        <p>Aucun commentaires pour ce billet</p>

                    @else

                        @foreach($commentaires as $commentaire)
                            @if($commentaire->statut == 1)
                                <div class="well well-sm">
                                    <h3>{{ $commentaire->pseudo }}</h3>
                                    <p>
                                        {{ $commentaire->contenu }}
                                        <small>Publié {{ $commentaire->created_at->diffForhumans() }}</small>
                                    </p>
                                </div>
                            @endif
                        @endforeach

                    @endif

                    <hr />

                    <form action="{{ route('billet.comment', $billet->slug) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('pseudo') ? ' has-error' : '' }}">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" value="{{ old('pseudo') }}">
                            @if($errors->has('pseudo'))
                            <span class="help-block">{{ $errors->first('pseudo') }}</span>
                            @endif
                        </div>
                         <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                            <label for="contenu">Commentaire</label>
                            <textarea name="contenu" class="form-control">{{ old('contenu') }}</textarea>
                            @if($errors->has('contenu'))
                            <span class="help-block">{{ $errors->first('contenu') }}</span>
                            @endif
                        </div>
                        <button class="btn btn-primary">Commenter</button>
                    </form>

                </div>
                
            </div>
         
        </div>
    </div>
</div>

@endsection
