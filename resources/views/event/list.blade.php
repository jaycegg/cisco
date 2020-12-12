@extends('layouts.app')
@section('content')

<body style="background-color: darkgray">
        
    <form>
        @csrf
            <label class="text-center" for="debut">Date début :</label>
            <input type="date" id="debut" name="trip-start">

            <label for="fin">Date fin :</label>
            <input type="date" id="fin" name="trip-end">

            <label for="debuttime">Heure début : </label>
            <input id="debuttime" type="time" name="debuttime">
        
            <label for="fintime">Heure fin : </label>
            <input id="fintime" type="time" name="fintime">

            <button type="submit">Réserver</button>

        </form>

    </body>
    
    <script>
    
        var debuttime = document.getElementById("debuttime");
        var valueSpan = document.getElementById("value");
        
        debutTime.addEventListener("input", function() {
          valueSpan.innerText = debuttime.value;
        }, false);
    
    </script>

<script>

    var fintime = document.getElementById("fintime");
    var valueSpan = document.getElementById("value");
    
    fintime.addEventListener("input", function() {
      valueSpan.innerText = fintime.value;
    }, false);

</script>

</html>

@endsection