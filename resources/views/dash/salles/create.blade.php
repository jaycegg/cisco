@extends('layouts.app')
@section('content')
    <div class="alignement">
    <h1 class="fondjaune">Création de salles</h1>

    {!! Form::open(array('route' => 'salles.store','method'=>'POST')) !!}

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('nom', 'Nom de la salle') !!}</label>

                <div class="col-md-6">
                    {!! Form::text('nom') !!}
                </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('etat0', 'Disponibilité') !!}
        {!! Form::label('etat1', 'Disponible') !!}</label>

                <div class="col-md-6">
                {!! Form::radio('etat', '1') !!}
                </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('etat2', 'Non disponible') !!}</label>

                <div class="col-md-6">
                {!! Form::radio('etat', '0') !!}
                </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('campuses_id', 'Campus') !!}</label>

                <div class="col-md-6">
                {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}
                </div>
        </div>

        <div align="center">
            <div class="btn">
                {!! Form::submit('Créer', ['class' => 'btn btn-dark']) !!}
                {!! Form::close() !!}
            </div>

            <div class="btn">
                <a href="{{ route('salles.index') }}" class="btn btn-dark">Retour</a>
            </div>
        </div>

    </div>

@endsection