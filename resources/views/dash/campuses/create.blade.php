@extends('layouts.app')
@section('content')
<div class="alignement">
<h1 class="fondjaune">Création de campus</h1>

{!! Form::open(array('route' => 'campuses.store','method'=>'POST')) !!}

    <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('ville', 'Ville') !!}</label>

                <div class="col-md-6">
                {!! Form::text('ville') !!}
                </div>
    </div>

    <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{!! Form::label('pays', 'Pays') !!}</label>

                <div class="col-md-6">
                {!! Form::text('pays', 'France') !!}
                </div>
    </div>

    <div align="center">
            <div class="btn">
                {!! Form::submit('Créer', ['class' => 'btn btn-dark']) !!}
                {!! Form::close() !!}
            </div>

            <div class="btn">
                <a href="{{ route('campuses.index') }}" class="btn btn-dark">Retour</a>
            </div>
    </div>
</div>
@endsection