@extends('layouts.app')
@section('content')
    
    @foreach ($materiels_id as $materiel)
        @if ($materiel->etat == True)
            
            <p class='text-center text-success'>{{ $materiel->nom }} : Disponible</p>
            
            <form method="POST" action="{{ route('materielResa', $materiel->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="salle" value="0"/>
                <button class="btn btn-success" type="submit">
                    Réserver
                </button>
            </form>

        @else
            <p class='text-center text-danger'>{{ $materiel->nom }} : Indisponible</p>
            {{ Form::model(['route' => ['App\Http\Controllers\Admin\MaterielController@reserver', $materiel->id], 'method' => 'POST']) }}
                <button type="button" class="btn btn-warning" disabled>Indisponible</button>
                {{ Form::submit('Rendre dispo', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        @endif
        
    @endforeach

@endsection