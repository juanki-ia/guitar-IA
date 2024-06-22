<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,user-scalable=no"
    />
    <title>Online Tuner</title>
    <link rel="stylesheet" href="{{asset('js/style.css')}}" />
  </head>
  <body>
    <canvas class="frequency-bars"></canvas>
    <div>
      <br><br><br>
      <!-- DO RE MI FA SOL LA SI
      C  D  E  F  G   A  B -->
      Afinación estándar<br>
      6ta cuerda = E2<br>
      5ta cuerda = A2<br>
      4ta cuerda = D3<br>
      3ra cuerda = G3<br>
      2da cuerda = B3<br>
      1ra cuerda = E4<br>

    </div>
    <div class="meter">
      <div class="meter-dot"></div>
      <div class="meter-pointer"></div>
    </div>
    <div class="notes">
      <div class="notes-list"></div>
      <div class="frequency">
        <span>Hz</span>
      </div>
    </div>
    <div class="a4">A<sub>4</sub> = <span>440</span> Hz</div>
    <label class="auto">
      Auto
      <input type="checkbox" checked />
    </label>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/aubiojs@0.1.1/build/aubio.min.js"></script>
    <script src="{{asset('js/tuner.js')}}"></script>
    <script src="{{asset('js/meter.js')}}"></script>
    <script src="{{asset('js/frequency-bars.js')}}"></script>
    <script src="{{asset('js/notes.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
