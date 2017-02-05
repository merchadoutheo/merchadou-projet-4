@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Administration des billets

                    <div class="btn-group pull-right">
                        <a href="{{ route('billet.formAjout') }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Ecrire un billet</a>
                    </div>
                </div>

                <div class="panel-body">
                    
                    @if($billets->isEmpty())
                        
                        <p>Il n'y a pas de billet</p>

                    @else
                        <div class="table-responsive">
                            <table class="table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">ID</th>
                                        <th class="col-md-3">Titre</th>
                                        <th class="col-md-3">Date d'ajout</th>
                                        <th class="col-md-3">Statut</th>
                                        <th class="col-md-1">Modifier</th>
                                        <th class="col-md-1">Supprimer</th>
                                    </tr>
                                </thead>
                                @foreach($billets as $billet)
                                <tr>
                                    <td>{{ $billet->id }}</td>
                                    <td class="titre-billet-admin"><a href="{{ route('billet.voir', $billet->id) }}">{{ $billet->titre }}</a></td>
                                    <td>{{ $billet->created_at }}</td>
                                    <td class="statut">
                                        @if($billet->statut == 1)
                                            <a href="{{ route('billet.changeStatut', $billet->id) }}" class="btn btn-success btn">
                                            <span class="glyphicon glyphicon-ok"> En ligne</span>
                                            </a>
                                        @else
                                            <a href="{{ route('billet.changeStatut', $billet->id) }}" class="btn btn-danger btn">
                                            <span class="glyphicon glyphicon-remove"> Brouillon</span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('billet.edition', $billet->id) }}" class="btn btn-primary btn">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('billet.supprimer', $billet->id) }}">
                                        <button class="btn btn-default btn" data-toggle='modal' data-billet-id="{{ $billet->id }}" data-target="#modal">
                                         <span class="glyphicon glyphicon-trash"></span>   
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        {{ $billets->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
