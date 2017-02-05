@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">


                    <section class="publicaciones-blog-home">
                        <div class="">
                          <h2>Derniers  <b>Billets</b></h2>
                          <div class="row-page row">
                             @if($billets->isEmpty())

                             <p>Il n'y a pas de billet</p>

                             @else
                             @foreach($billets as $billet)
                             <div class="col-page col-sm-4 col-md-3">
                              <a href="{{ route('billet.voir', $billet->id) }}"  class="fondo-publicacion-home">
                                <div class="img-publicacion-home">
                                  <img class="img-responsive" src="{{ $billet->urlImg }}">
                              </div>
                              <div class="contenido-publicacion-home">
                                  <h3>{{ $billet->titre }}</h3>
                                  <p>{!! str_limit($billet->contenu, $limit = 150, $end = '...') !!}</p><br/>
                                  <small>Publié {{ $billet->created_at->diffForHumans() }}</small>
                              </div>
                              <div class="mascara-enlace-blog-home">
                                  <span>Voir le billet</span>
                              </div>
                          </a>
                      </div>
                      @endforeach
                      @endif
                  </div>
              </div>
          </section>
          {{ $billets->links()}}
      </div>
  </div>
</div>
</div>
</div>
@endsection
