@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="banniere">Bienvenue au CESI</div><br /><br /><br /><br />
            <div class="card">
                <div class="card-header text-center" style="background-color : #ffc853;">{{ __('S\'inscrire') }}</div>           
                <div class="card-body">

                        <!-- Formulaire de Laravel Collective-->
                        {!! Form::open(['route' => 'register', 'method' => 'post']) !!}                   
                            <!-- Token pour éviter les actions non sécurisées -->               
                            {!! Form::token() !!}
                                <!-- Fonction pluck de laravel collective qui va afficher les noms et prendre en value l'id-->
                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('campuses_id', 'Campus') !!}</div>

                                    <div class="col-md-6">
                                    {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id'), null) !!}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('roles_id', 'Rôle') !!}</div>

                                    <div class="col-md-6">
                                    {!! Form::select('roles_id', App\Models\Role::pluck('nom', 'id'), '4') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('name', 'Nom') !!}</div>

                                    <div class="col-md-6">
                                        {!! Form::text('name', old('name')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('prenom', 'Prénom') !!}</div>

                                    <div class="col-md-6">
                                    {!! Form::text('prenom', old('prenom')) !!}
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('email', 'Adresse mail') !!}</div>

                                    <div class="col-md-6">
                                    {!! Form::text('email', old('email')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{!! Form::label('password', 'Mot de passe') !!}</div>

                                    <div class="col-md-6">
                                    {!! Form::password('password') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</div>

                                    <div class="col-md-6">
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn" style="background-color : #ffc853">
                                                {{ __('S\'inscrire') }}
                                            </button>
                                    </div>
                                </div>
                        
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection