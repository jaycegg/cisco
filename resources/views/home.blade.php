@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="card">
                <!--Menu selon le rôle-->
                @if (Auth::user()->roles_id === 1)
                    <div class="card-header text-center" style="background-color : #ffc853;"><B>{{ __('Menu principal - Droits Administrateur') }}</B></div>
                    <div class="card-body">
                    
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-1"></div>

                            <!--Droits Admin-->
                            <div class="card mt-1 col-sm-4" style="width: 15rem;">
                                <img class="card-img-top" src="{!! asset('images/administrateur.png') !!}" alt="Card image cap">
                                <div class="card-body">                                
                                    <h5 class="card-text"><B>Accèder à la gestion administrative</B></h5>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('dash')}}">Dashboard Admin</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{url('admin/user-activity')}}" target="_blank">Logs</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('gestionTickets')}}">Gestion tickets</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('cam')}}" target="_blank">Caméra</a>
                                    <!--Lien grafana-->
                                    <a class="btn" style="background-color : #ffc853;" href="http://localhost:3000" target="_blank">Monitoring</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{url('netacad')}}">Netacad</a>
                                </div>
                            </div>

                            <!--Prévoir la responsivité avec les écarts entres les cartes-->
                            <div class="col-sm-2"></div>

                            <!--Réservation-->
                            <div class="card mt-1 col-sm-4" style="width: 15rem;">
                                <img class="card-img-top" src="{!! asset('images/calendar.png') !!}" alt="">
                                <div class="card-body">
                                    <h5 class="card-text"><B>Menu des réservations</B></h5>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('listeSalle')}}">Salles</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('demande')}}">Vos demandes</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('listeMateriel')}}">Matériels</a>
                                    <a class="btn" style="background-color : #ffc853;" href="{{route('fullcalendar')}}" target="_blank">Calendrier</a>
                                </div>
                            </div>

                            <div class="col-sm-1"></div>

                        </div>
                    </div>
                @endif

                @if (Auth::user()->roles_id === 2)
                <div class="card-header"><B>{{ __('Menu principal - Droits Pilote') }}</B></div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4"></div>

                        <!--Réservation-->
                        <div class="card mt-1 col-sm-4" style="width: 15rem;">
                            <img class="card-img-top" src="{!! asset('images/calendar.png') !!}" alt="">
                            <div class="card-body">
                                <h5 class="card-text"><B>Menu des réservations</B></h5>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeSalle')}}">Salles</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('demande')}}">Vos demandes</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeMateriel')}}">Matériels</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('fullcalendar')}}" target="_blank">Calendrier</a>
                            </div>
                        </div>

                        <div class="col-sm-4"></div>

                    </div>
                </div>
                @endif
                
                @if (Auth::user()->roles_id === 3)
                <div class="card-header"><B>{{ __('Menu principal - Droits Intervenant') }}</B></div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4"></div>

                        <!--Réservation-->
                        <div class="card mt-1 col-sm-4" style="width: 15rem;">
                            <img class="card-img-top" src="{!! asset('images/calendar.png') !!}" alt="">
                            <div class="card-body">
                                <h5 class="card-text"><B>Menu des réservations</B></h5>        
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeSalle')}}">Salles</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('demande')}}">Vos demandes</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeMateriel')}}">Matériels</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('fullcalendar')}}" target="_blank">Calendrier</a>
                            </div>
                        </div>

                        <div class="col-sm-4"></div>

                    </div>
                </div>
                @endif

                @if (Auth::user()->roles_id === 4)
                <div class="card-header"><B>{{ __('Menu principal - Droits Apprenant') }}</B></div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4"></div>

                        <!--Réservation-->
                        <div class="card mt-1 col-sm-4" style="width: 15rem;">
                            <img class="card-img-top" src="{!! asset('images/calendar.png') !!}" alt="">
                            <div class="card-body">
                                <h5 class="card-text"><B>Menu des réservations</B></h5>     
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeSalle')}}">Salles</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('demande')}}">Vos demandes</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('listeMateriel')}}">Matériels</a>
                                <a class="btn" style="background-color : #ffc853;" href="{{route('fullcalendar')}}" target="_blank">Calendrier</a>
                            </div>
                        </div>

                        <div class="col-sm-4"></div>

                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
