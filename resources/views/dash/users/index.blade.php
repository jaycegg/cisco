@extends('layouts.app')
@section('content')
<h1>Dashboard Utilisateur</h1>
    
<table>
    <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Mail</th>
        <th>Campus</th>
        <th>Actions</th>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{ App\Models\Campus::find($user->campuses_id)->ville}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('users.edit', $user->id)}}">Editer</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id]]) !!}
                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                    {!! Form::close() !!}
                    <a class="btn btn-sm btn-dark" href="{{route('users.show', $user->id)}}">Voir</a>
                </td>
            </tr>   
        @endforeach
    </tbody>
</table>
    
<a class="btn btn-success btn-sm" href="{{ route('users.create') }}">Créer un utilisateur</a>

<a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>

<!-- Créer le template CSV -->
<div class="row">
    <div class="col-sm-3">
        <p>Télécharger la liste des utilisateurs</p>
    </div>
    <div class="col-sm-3">
        <span data-href="/liste/users/csv" id="export" class="btn btn-success" onclick="exportTasks(event.target);">Exporter</span>
    </div>
</div>

<!-- JS pour télécharger le template de CSV -->
<script>
    function exportTasks(_this) {
        let _url = $(_this).data('href');
        window.location.href = _url;
    }
</script>

@endsection