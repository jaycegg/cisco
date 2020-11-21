@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification vous a été envoyé par mail.') }}
                        </div>
                    @endif

                    {{ __('Merci de vérifier la réception du mail de vérification.') }}
                    {{ __('Si vous n\avez pas reçu le mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquer ici pour une autre demande') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
