@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>           
                <div class="card-body">

                        <!-- Formulaire de Laravel Collective-->
                        {!! Form::open(['route' => 'register', 'method' => 'post']) !!}                            
                            {!! Form::token() !!}
                                {!! Form::label('campuses_id', 'Campus') !!}
                                {!! Form::select('campuses_id', $campuses_id, null) !!}

                                {!! Form::label('role', 'Rôle') !!}
                                {!! Form::select('role', ['apprenant' => 'Apprenant', 'intervenant' => 'Intervenant', 'pilote' => 'Pilote', 'admin' => 'Administarteur'], 'apprenant') !!}

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