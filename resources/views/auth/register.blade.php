@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('S\'inscrire') }}</div>           
                <div class="card-body">

                        <!-- Formulaire de Laravel Collective-->
                        {!! Form::open(['route' => 'register', 'method' => 'post']) !!}                   
                            <!-- Token pour éviter les actions non sécurisées -->               
                            {!! Form::token() !!}
                                <!-- Fonction pluck de laravel collective qui va afficher les noms et prendre en value l'id-->
                                {!! Form::label('campuses_id', 'Campus') !!}
                                {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id'), null) !!}
                                
                                {!! Form::label('roles_id', 'Rôle') !!}
                                {!! Form::select('roles_id', App\Models\Role::pluck('nom', 'id'), '4') !!}

                                {!! Form::label('name', 'Nom') !!}
                                {!! Form::text('name', old('name')) !!}

                                {!! Form::label('prenom', 'Prénom') !!}
                                {!! Form::text('prenom', old('prenom')) !!}
                                
                                {!! Form::label('email', 'Adresse mail') !!}
                                {!! Form::text('email', old('email')) !!}

                                {!! Form::label('password', 'Mot de passe') !!}
                                {!! Form::password('password') !!}

                                <label for="password-confirm">{{ __('Confirmer le mot de passe') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                
                                {!! Form::submit('S\'inscrire') !!}  
                        
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection