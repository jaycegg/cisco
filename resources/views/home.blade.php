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
                    
                    <!-- Bouton pour se déconnecter grâce à la fonction logout -->
                    <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit">Déconnecter</button>
                    </form>

<<<<<<< HEAD
=======
                    <!-- Bouton pour se déconnecter grâce à la fonction logout -->
                    <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit">Déconnecter</button>
                    </form>

>>>>>>> 4d4e7c5387456ffd7275796d2863773c7c526dbe
                    {{ __('Vous êtes connecté(e) !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
