@extends('layouts.app')
@section('content')

    <div class="card text-center mx-auto" style="width: 25rem;">
        <img class="card-img-top" src="{!! asset('images/logoLarge.jpg') !!}" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><B>Netacad et tickets</B></h5>

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <!-- Si connecté, menu du haut mène à l'accueil -->
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-lg" style="background-color : #ffc853;">Accueil</a>
                <!-- Sinon menu du haut par défaut -->
                @else
                    <a href="{{ route('login') }}" class="btn" style="background-color : #ffc853;">Se connecter</a>                
                    <!-- Si la route existe dans web.php -->
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn" style="background-color : #ffc853;">S'inscrire</a>
                    @endif
                @endif
            </div>
         @endif

        </div>
    </div>

@endsection
