@extends('layouts.app')
@section('content')
<h1>Détail du log</h1>

<h4>Date</h4>
<p>{{$log->created_at}}</p>

<h4>Description</h4>
<p>{{$log->description}}</p>

<a href="{{ url()->previous() }}" class="btn btn-dark">Retour</a>
@endsection