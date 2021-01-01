@extends('layouts.app')
@section('content')
<h1>Edition de matériel</h1>

{!! Form::model($materiel, ['method' => 'PATCH','route' => ['materiels.update', $materiel->id]]) !!}

{!! Form::label('nom', 'Nom du matériel') !!}
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

{!! Form::label('salles_id', 'Salle') !!}
{!! Form::select('salles_id', App\Models\Salle::pluck('nom', 'id')) !!}

    {!! Form::submit('Modifier', ['class' => 'btn btn-sm btn-success']) !!}
{!! Form::close() !!}

<a href="{{ route('materiels.index') }}" class="btn btn-dark">Retour</a>
@endsection