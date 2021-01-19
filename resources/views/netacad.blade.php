@extends('layouts.app')
@section('content')
    <!-- Message -->
    @if(Session::has('messageP'))
        <p class="alert alert-success">{{ Session::get('messageP') }}</p>
    @elseif(Session::has('messageN'))
        <p class="alert alert-danger">{{ Session::get('messageN') }}</p>
    @endif

    <!-- Formulaire pour importer les utilisateurs -->
    <h4>Utilisateurs</h4>
    <form method='post' action='/upload' enctype='multipart/form-data' >
        {!! Form::token() !!}
        <input type='file' name='file' >
        <input type='submit' name='submit' value='Importer'>

        {!! Form::label('campuses_id', 'Choisissez un campus CESI') !!}
        {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}

        {!! Form::label('roles_id', 'Choisissez un rôle') !!}
        {!! Form::select('roles_id', ['1' => 'Administrateur', '2' => 'Pilote', '3' => 'Intervenant', '4' => 'Apprenant'], '4') !!}
    </form>

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

    <!-- Créer le template CSV -->
    <p>Télécharger le template "Promotion"</p>
    <span data-href="/netacad/csv/promo" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Exporter CSV</span>

    <!-- Formulaire pour importer les salles -->
    <h4>Salles</h4>
    <form method='post' action='/upload/salles' enctype='multipart/form-data' >
        {!! Form::token() !!}
        <input type='file' name='file' >
        <input type='submit' name='submit' value='Importer'>

        {!! Form::label('campuses_id', 'Choisissez un campus CESI') !!}
        {!! Form::select('campuses_id', App\Models\Campus::pluck('ville', 'id')) !!}

    </form>

    <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

    <!-- Créer le template CSV -->
    <p>Télécharger le template "Salle"</p>
    <span data-href="/netacad/csv/salle" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Exporter CSV</span>

   <!-- Formulaire pour importer les salles -->
   <h4>Matériel</h4>
   <form method='post' action='/upload/materiels' enctype='multipart/form-data' >
       {!! Form::token() !!}
       <input type='file' name='file' >
       <input type='submit' name='submit' value='Importer'>
   </form>

   <a href="{{ url()->route('home') }}" class="btn btn-dark">Retour</a>

   <!-- Créer le template CSV -->
   <p>Télécharger le template "Matériel"</p>
   <span data-href="/netacad/csv/materiel" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Exporter CSV</span>


    <!-- JS pour telecharger le template de CSV -->
    <script>
        function exportTasks(_this) {
           let _url = $(_this).data('href');
           window.location.href = _url;
        }
    </script>

@endsection