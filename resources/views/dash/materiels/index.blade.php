@extends('layouts.app')
@section('content')
<h1>Dashboard matériels</h1>
    
    <table>
        <thead>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Etat</th>
            <th>Campus</th>
            <th>Salle</th>
            <th>Actions</th>
        </thead>

        <tbody>
            @foreach ($materiels as $materiel)
                <tr>
                    <td>{{$materiel->nom}}</td>
                    <td>{{$materiel->categorie}}</td>               
                    @if ($materiel->etat == 1)
                        <td>Disponible</td>
                    @else
                        <td>Indisponible</td>
                    @endif
                    <td>{{ App\Models\Campus::find($materiel->campuses_id)->ville}}</td>
                    <td>{{ App\Models\Salle::find($materiel->salles_id)->nom}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('materiels.edit', $materiel->id)}}">Editer</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['materiels.destroy', $materiel->id]]) !!}
                            <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                        {!! Form::close() !!}
                        <a class="btn btn-sm btn-dark" href="{{route('materiels.show', $materiel->id)}}">Voir</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
        
    <a class="btn btn-success btn-sm" href="{{ route('materiels.create') }}">Créer un matériel</a>

    <a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>

    <!-- Créer le template CSV -->
    <div class="row">
        <div class="col-sm-3">
            <p>Télécharger la liste des matériels</p>
        </div>
        <div class="col-sm-3">
            <span data-href="/liste/materiels/csv" id="export" class="btn btn-success" onclick="exportTasks(event.target);">Exporter CSV</span>
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