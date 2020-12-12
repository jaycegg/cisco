@extends('layouts.app')
@section('content')
<h1>Création de materiels</h1>

{!! Form::open(array('route' => 'materiels.store','method'=>'POST')) !!}

    {!! Form::label('nom', 'Nom') !!}
    {!! Form::text('nom') !!}

    {!! Form::label('categorie', 'Catégorie') !!}
    {!! Form::text('categorie') !!}

    {!! Form::label('etat0', 'Disponibilité') !!}
    {!! Form::label('etat1', 'Disponible') !!}
    {!! Form::radio('etat', '1') !!}

    {!! Form::label('etat2', 'Non disponible') !!}
    {!! Form::radio('etat', '0') !!}

    {!! Form::label('campuses_id', 'Campus') !!}
    {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}

    {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection