@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des billets</div>

                <div class="panel-body">
                    
                    @if($billets->isEmpty())
                        
                        <p>Il n'y a pas de billet</p>

                    @else
                        
                        @foreach($billets as $billet)
                            <h2>{{ $billet->titre }}</h2>
                            <p>
                                {{ str_limit($billet->contenu, $limit = 150, $end = '...') }}<br>
                                <small>Publié {{ $billet->created_at->diffForHumans() }}</small>
                                <a href="/showBillet/{{ $billet->id }}">Voir le billet</a>
                            </p>

                            
                        @endforeach

                        {{ $billets->links() }}

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
