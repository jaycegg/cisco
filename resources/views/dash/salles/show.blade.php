@extends('layouts.app')
@section('content')
    <h1>Détail de la salle</h1>

    <h4>Nom de la salle</h4>
    <p>{{$salle->nom}}</p>

    <h4>Disponibilité</h4>
    @if ($salle->etat == 1)
        <td>
            <button type="button" class="btn btn-success" disabled>Disponible</button>
        </td>
    @else
        <td>
            <form enctype="multipart/form-data" method="POST" action="{{route('dispoSal')}}" >
                @csrf

                <input type="hidden" name="idSa" value="{{$salle->id }}" />

                <button class="btn btn-warning" type="submit">Rendre Disponible</button>
            </form>
        </td>
    @endif

    <h4>Campus</h4>
    <p>{{ App\Models\Campus::find($salle->campuses_id)->ville}}</p>

    <a href="{{ route('salles.index') }}" class="btn btn-dark">Retour</a>
@endsection