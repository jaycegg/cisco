@extends('layouts.app')
@section('content')
    
    @foreach ($salles_id as $salle)
        @if ($salle->etat == True)
            
            <p class='text-center text-success'>{{ $salle->nom }} : Disponible</p>
            
            <form method="post" action="/reservation/salles">
                @csrf
                <input type="hidden" name="id" value="$salle->id"/>
                <button class="btn btn-success" type="submit">
                    Réserver
                </button>
            </form>

        @else
            <p class='text-center text-danger'>{{ $salle->nom }} : Indisponible</p>
            {{ Form::model(['route' => ['App\Http\Controllers\Admin\SalleController@reserver', $salle->id], 'method' => 'POST']) }}
                <button type="button" class="btn btn-warning" disabled>Indisponible</button>
                {{ Form::submit('Rendre dispo', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        @endif
        
    @endforeach

@endsection