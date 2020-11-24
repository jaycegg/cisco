@extends('layouts.app')
@section('content')
    
    @foreach ($salles_id as $salle)
        @if ($salle->etat == True)
            
            <p class='text-center text-success'>{{ $salle->nom }} : Disponible</p>
            
            {{ Form::model(['route' => ['App\Http\Controllers\Admin\SalleController@reserver', $salle->id], 'method' => 'PATCH']) }}
                {{ Form::submit('Réserver', array('class' => 'btn btn-success')) }}
            {{ Form::close() }}


        @else
            <p class='text-center text-danger'>{{ $salle->nom }} : Indisponible</p>

        @endif
        
    @endforeach

@endsection