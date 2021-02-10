@extends('layouts.app')
@section('content')

<div class="alignement">
<h1 class="fondjaune">Création d'une vidéo</h1>

{!! Form::open(array('route' => 'videos.store','method'=>'POST')) !!}

    <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('created_at', 'Créé le') !!}</label>

                <div class="col-md-6">
                    {!! Form::date('created_at', \Carbon\Carbon::now()) !!}
                </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('chemin', 'Chemin') !!}</label>

                <div class="col-md-6">
                {!! Form::text('chemin') !!}
                </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('nom', 'Nom') !!}</label>

                <div class="col-md-6">
                {!! Form::email('nom') !!}
                </div>
    </div>

    <div align="center">
            <div class="btn">
                {!! Form::submit('Créer', ['class' => 'btn btn-dark']) !!}
                {!! Form::close() !!}
            </div>

            <div class="btn">
                <a href="{{ route('videos.index') }}" class="btn btn-dark">Retour</a>
            </div>
    </div>

</div>

@endsection