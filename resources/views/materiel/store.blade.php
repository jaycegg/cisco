@extends('layouts.app')

@section('content')

@foreach($materiels as $materiel)

<th>
     <tr>{{ $materiel->id }}</tr>
     <tr>{{ $materiel->nom }}</tr>
     <tr>{{ $materiel->categorie }}</tr>
     <tr>{{ $materiel->etat }}</tr>
</th>

@endforeach


@endsection