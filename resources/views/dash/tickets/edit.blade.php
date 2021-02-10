@extends('layouts.app')
@section('content')
<h1>Edition de tickets</h1>

    {!! Form::model($ticket, ['method' => 'PATCH','route' => ['salles.update', $salle->id]]) !!}

        {!! Form::label('nom', 'Nom de la salle') !!}
        {!! Form::text('nom') !!}

        {!! Form::label('created_at', 'Date de création) !!}
        {!! Form::date('created_at', Carbon\Carbon::now()->format('H:i')) !!}

        {!! Form::label('dateEcheance', 'Date d\'échéance') !!}
        {!! Form::date('dateEcheance', Carbon\Carbon::now()->format('H:i')) !!}

        {!! Form::label('etat0', 'Disponibilité') !!}
        {!! Form::label('etat1', 'Disponible') !!}
        {!! Form::radio('etat', '1') !!}

        {!! Form::label('etat2', 'Non disponible') !!}
        {!! Form::radio('etat', '0') !!}

        {!! Form::label('campuses_id', 'Campus') !!}
        {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}

        {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}

    <a href="{{ route('tickets.index') }}" class="btn btn-dark">Retour</a>
@endsection