@extends('layouts.app')
@section('content')
    
    <!--Ici interface de réservation de Matériel-->
    @foreach ($materiel_id as $materiel)
        @if ($materiel->etat == True)
            
            <p class='text-center text-success'>{{ $materiel->nom }} : Disponible</p>

            <form enctype="multipart/form-data" method="POST" action="{{route('reservationMateriels')}}" >
                @csrf

                @if($materiel->etat == 1 )
                    <input type="hidden" name="id" value="{{ $materiel->id }}" />
                    <input type="hidden" name="etat" value="0" />
                @endif
                
                <button class="btn btn-success" type="submit">
                    Réserver
                </button>
            </form>

        @else
          
            <p class='text-center text-danger'>{{ $materiel->nom }} : Non disponible</p>
            
            <button class="btn btn-warning" disabled>Indisponible</button>

            <form enctype="multipart/form-data" method="POST" action="{{route('reservationMateriels')}}" >
                @csrf

                @if($materiel->etat == 0 )
                <input type="hidden" name="id" value="{{ $materiel->id }}" />
                <input type="hidden" name="etat" value="1" />
                @endif
                
                <button class="btn btn-danger" type="submit">Rendre dispo</button>
            </form>

        @endif
        
    @endforeach

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>
    
@endsection