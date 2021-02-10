@extends('layouts.app')
@section('content')
    
    <h1>Dashboard salles</h1>
    
    <table>
        <thead>
            <th>Nom</th>
            <th>Etat</th>
            <th>Campus</th>
            <th>Actions</th>
        </thead>

        <tbody>
            @foreach ($salles as $salle)
                <tr>
                    <td>{{$salle->nom}}</td>
                    @if ($salle->etat == 1)
                        <td>
                            <button type="button" class="btn btn-success" disabled>Disponible</button>
                        </td>
                    @else
                        <td>
                            <form enctype="multipart/form-data" method="POST" action="{{route('dispoSal')}}" >
                                @csrf
                
                                <input type="hidden" name="idSa" value="{{$salle->id }}" />
        
                                <button class="btn btn-warning" type="submit">Rendre Disponible</button>
                            </form>
                        </td>
                    @endif

                    <td>{{ App\Models\Campus::find($salle->campuses_id)->ville}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('salles.edit', $salle->id)}}">Editer</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['salles.destroy', $salle->id]]) !!}
                            <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Supprimer</button>
                        {!! Form::close() !!}
                        <a class="btn btn-sm btn-dark" href="{{route('salles.show', $salle->id)}}">Voir</a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
        
    <a class="btn btn-success btn-sm" href="{{ route('salles.create') }}">Créer une salle</a>
    
    <a href="{{ route('dash') }}" class="btn btn-dark">Retour</a>

    <!-- Créer le template CSV -->
    <div class="row">
        <div class="col-sm-3">
            <p>Télécharger la liste des salles</p>
        </div>
        <div class="col-sm-3">
            <span data-href="/liste/salles/csv" id="export" class="btn btn-success" onclick="exportTasks(event.target);">Exporter CSV</span>
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