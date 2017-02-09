@extends('layouts.app')
<script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea#contenu'
  });
</script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Modification d'un billet</div>

                <div class="panel-body">

                    <form action="{{ route('billet.update', $billet->slug) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" class="form-control" value="{{ $billet->titre }}">
                            @if($errors->has('titre'))
                            <span class="help-block">{{ $errors->first('titre') }}</span>
                            @endif
                        </div>
                         <div class="form-group{{ $errors->has('contenu') ? ' has-error' : '' }}">
                            <label for="contenu">Contenu</label>
                            <textarea id="contenu" name="contenu" class="form-control">{{ $billet->contenu }}</textarea>
                            @if($errors->has('contenu'))
                            <span class="help-block">{{ $errors->first('contenu') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="auteur">Auteur</label>
                            <input disabled type="text" name="auteur" class="form-control" value="{{ $billet->user->name }}">
                        </div>
                        <div class="form-group">
                          <label for="statut">Statut</label>
                            <select id="statut" name="statut" class="form-control">
                              <option value="1">En ligne</option>
                              <option value="0">Brouillon</option>
                            </select>
                        </div>  
                        <div class="form-group{{ $errors->has('vignette') ? ' has-error' : '' }}">
                            <label for="vignette">Vignette</label>
                            <img src="{{ url('/'.$billet->urlImg) }}" alt="vignette" class="img-responsive" width="300">
                            <input type="file" name="vignette" id="vignette">Choisissez une image</input>
                            @if($errors->has('vignette'))
                            <span class="help-block">{{ $errors->first('vignette') }}</span>
                            @endif
                        </div>                     
                        <button type="submit" class="btn btn-primary">Modifier le billet</button>
                    </form>

                </div>
                
            </div>
         
        </div>
    </div>
</div>

@endsection
