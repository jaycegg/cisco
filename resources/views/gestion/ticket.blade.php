@extends('layouts.app')
@section('content')

<p>Tickets en cours (liste)</p>



<p>Filtrer par catégorie (matos, salle)</p>



<p>choisir le type (motif : défectueux, manquant, autre, reservation)</p>



<p>Créer un ticket (bouton)</p>

<a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

@endsection
