@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Détail du commentaire</div>

                <div class="panel-body">

                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <a data-toggle="collapse" href="#infos-commentaire">
                                <h4 class="panel-title">
                                    Informations sur le commentaire
                                </h4>
                            </a>
                          </div>
                          <div id="infos-commentaire" class="panel-collapse">
                            <div class="panel-body">
                                <h5>Commentaire posté par <strong>{{ $commentaire->pseudo }}</strong> le <em>{{ $commentaire->created_at }}</em></h5>
                                <div class="well">
                                    <p>{{ $commentaire->contenu }}</p>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <a data-toggle="collapse" href="#infos-billet">
                                <h4 class="panel-title">
                                  Informations sur le billet
                                </h4>
                            </a>
                          </div>
                          <div id="infos-billet" class="panel-collapse collapse">
                            <div class="panel-body">
                            <h5>Titre : <strong>{{ $commentaire->billet->titre }}</strong></h5>
                            <em>Posté le {{ $commentaire->billet->created_at }}</em> par {{ $commentaire->billet->user->name }}.
                                <div class="well">
                                    <p>{!! $commentaire->billet->contenu !!}</p>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                
            </div>
         
        </div>
    </div>
</div>

@endsection
