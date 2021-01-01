@extends('layouts.app')
@section('content')
    
    @foreach ($salle_id as $salle)
        @if ($salle->etat == True)
            
            <p class='text-center text-success'>{{ $salle->nom }} : Disponible</p>

            <form enctype="multipart/form-data" method="POST" action="{{route('reservationSalles')}}" >
                @csrf

                @if($salle->etat == 1 )
                <input type="hidden" name="id" value="{{ $salle->id }}" />
                <input type="hidden" name="etat" value="0" />
                @endif
                
                <button class="btn btn-success" type="submit">
                    Réserver
                </button>
            </form>

        @else
          
            <p class='text-center text-danger'>{{ $salle->nom }} : Non disponible</p>
            
            <button class="btn btn-warning" disabled>Indisponible</button>

            <form enctype="multipart/form-data" method="POST" action="{{route('reservationSalles')}}" >
                @csrf

                @if($salle->etat == 0 )
                <input type="hidden" name="id" value="{{ $salle->id }}" />
                <input type="hidden" name="etat" value="1" />
                @endif
                
                <button class="btn btn-danger" type="submit">Rendre dispo</button>
            </form>

        @endif
        
    @endforeach

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection