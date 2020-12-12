@extends('layouts.app')
@section('content')
<h1>Création de tickets</h1>

    {!! Form::open(array('route' => 'tickets.store','method'=>'POST')) !!}

        {!! Form::label('type', 'Type') !!}
        {!! Form::text('type') !!}
        
        {!! Form::label('description', 'Description') !!}
        {!! Form::text('description') !!}
        
        {!! Form::label('etat0', 'Etat') !!}
        {!! Form::label('etat1', 'Ouvert') !!}
        {!! Form::radio('etat', '1') !!}

        {!! Form::label('etat2', 'Fermé') !!}
        {!! Form::radio('etat', '0') !!}
    
        {!! Form::label('materiels_id', 'Materiel') !!}
        {!! Form::select('materiels_id', App\Models\Materiel::pluck('nom', 'id')) !!}
       
        {!! Form::label('salles_id', 'Salle') !!}
        {!! Form::select('salles_id', App\Models\Salle::pluck('nom', 'id')) !!}
       
        {!! Form::label('users_id', 'Utilisateur') !!}
        {!! Form::select('users_id', App\Models\User::pluck('name', 'id')) !!}

        {!! Form::submit('Créer', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}

    <a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection