<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>CESI - Caméras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="{{ asset('js/tracking-min.js') }}"></script>
    <script src="{{ asset('js/data/face-min.js') }}"></script>

  <style>
    video, canvas {
        margin-left: 10%;
        margin-top: 2%;
        position: absolute;
    }
  </style>

</head>
<body>
    <a href="{{route('home')}}" class="btn btn-warning">Menu</a>
    <h1>Sécurité</h1>
    <h4>Campus : Le Mans</h4>
  <div class="demo-frame">
    <div class="demo-container">
      <video id="video" width="500" height="500" preload autoplay loop muted></video>
      <canvas id="canvas" width="500" height="500"></canvas>
    </div>
  </div>

  <script>
    window.onload = function() {
      var video = document.getElementById('video');
      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');

      var tracker = new tracking.ObjectTracker('face');
      tracker.setInitialScale(4);
      tracker.setStepSize(2);
      tracker.setEdgesDensity(0.1);

      tracking.track('#video', tracker, { camera: true });

      tracker.on('track', function(event) {
        context.clearRect(0, 0, canvas.width, canvas.height);

        event.data.forEach(function(rect) {
          context.strokeStyle = '#a64ceb';
          context.strokeRect(rect.x, rect.y, rect.width, rect.height);
          context.font = '11px Helvetica';
          context.fillStyle = "#fff";
          context.fillText('x: ' + rect.x + 'px', rect.x + rect.width + 5, rect.y + 11);
          context.fillText('y: ' + rect.y + 'px', rect.x + rect.width + 5, rect.y + 22);
        });
      });

      var gui = new dat.GUI();
      gui.add(tracker, 'edgesDensity', 0.1, 0.5).step(0.01);
      gui.add(tracker, 'initialScale', 1.0, 10.0).step(0.1);
      gui.add(tracker, 'stepSize', 1, 5).step(0.1);
    };
  </script>

</body>
</html>