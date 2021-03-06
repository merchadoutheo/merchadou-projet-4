@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Administration des commentaires
                </div>

                <div class="panel-body">
                    
                    @if($commentaires->isEmpty())
                        
                        <p>Il n'y a pas de commentaires</p>

                    @else
                        <div class="table-responsive">
                            <table class="table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">ID</th>
                                        <th class="col-md-2">Titre du Billet</th>
                                        <th class="col-md-2">Pseudo</th>
                                        <th class="col-md-2">Date d'ajout</th>
                                        <th class="col-md-3">Statut</th>
                                        <th class="col-md-1">Voir</th>
                                        <th class="col-md-1">Supprimer</th>
                                    </tr>
                                </thead>
                                @foreach($commentaires as $commentaire)
                                <tr>
                                    <td>{{ $commentaire->id }}</td>
                                    <td>{{ $commentaire->billet->titre }}</td>
                                    <td>{{ $commentaire->pseudo }}</td>
                                    <td>{{ $commentaire->created_at }}</td>
                                    <td class="statut">
                                        @if($commentaire->statut == 1)
                                            <a href="{{ route('commentaire.changeStatut', $commentaire->id) }}" class="btn btn-success btn">
                                            <span class="glyphicon glyphicon-ok"><span class="hidden-xs hidden-sm"> En ligne</span></span>
                                            </a>
                                        @else
                                            <a href="{{ route('commentaire.changeStatut', $commentaire->id) }}" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-time"><span class="hidden-xs hidden-sm"> En attente</span></span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('commentaire.voir', $commentaire->id) }}" class="btn btn-primary btn">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('commentaire.supprimer', $commentaire->slug) }}">
                                        <button class="btn btn-default btn" data-toggle='modal' data-billet-id="{{ $commentaire->id }}" data-target="#modal">
                                         <span class="glyphicon glyphicon-trash"></span>   
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{ $commentaires->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
