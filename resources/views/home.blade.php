@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu accueil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a class="btn btn-dark" href="{{route('dash')}}">Dashboard Admin</a>
                    
                    <a class="btn btn-danger" href="{{route('salleResa')}}">Réservations salles</a>
                    <a class="btn btn-success" href="{{route('materielResa')}}">Réservations matériels</a>
                    <a class="btn btn-primary" href="{{url('events')}}">Calendrier</a>


                    <!-- Bouton pour se déconnecter grâce à la fonction logout -->
                    <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit">Déconnecter</button>
                    </form>

                    {{ __('Vous êtes connecté(e) !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
