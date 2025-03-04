<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Metronomo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
          //===
          // METRÓNOMO
          // Variables
          //---
          let reproduciendo = false;
          let PPM = 50;
          let intervalo = undefined;
          const textoReproduciendose = "Empezar";
          const textoParado = "Pausar";
          const tituloPPM = document.querySelector('#ppm');
          const botonDecrecer5PPM = document.querySelector('#boton-decrecer-5-ppm');
          const botonDecrecer1PPM = document.querySelector('#boton-decrecer-1-ppm');
          const botonCrecer1PPM = document.querySelector('#boton-crecer-1-ppm');
          const botonCrecer5PPM = document.querySelector('#boton-crecer-5-ppm');
          const botonReproducir = document.querySelector('#boton-reproducir');
          const audioMetronomo = document.querySelector('#audio-metronomo');

          //---
          // Funciones
          //---


          /**
           * Dibuja los cambios
           *
           * @param {number} ppm Pulsaciones por Minuto
           * @param {boolean} isPlay ¿Esta reproduciendose?
           * @return {boolean} Se ha renderizado
           */
          function renderizarCambios(ppm, isPlay) {
              // Texto PPM
              tituloPPM.textContent = ppm;
              // Texto boton reproducir
              botonReproducir.textContent = reproduciendo ? textoParado : textoReproduciendose;

              return true;
          }

          /**
           * Dibuja los cambios
           *
           * @param {number} ppm Pulsaciones por Minuto
           * @param {HTMLAudioElement} audio
           * @param {boolean} isPlay ¿Esta reproduciendose?
           * @param {intervalID} intervaloActual Intervalo
           * @return {intervalID} Intervalo nuevo
           */
          function reproducirOPausar(ppm, audio, isPlay, intervaloActual) {
              let miIntervalo;
              // Para intervalo
              clearInterval(intervaloActual);
              // Empieza intervalo nuevo
              if (isPlay) {
                  miIntervalo = setInterval(function() {
                      // Reproduce audio
                      audio.play();
                  }, PPMToMiliseconds(ppm));
              }
              return miIntervalo;
          }

          /**
           * Transforma los PPM a milesimas
           *
           * @param {number} ppm
           * @return {number} Milesimas
           */
          function PPMToMiliseconds(ppm) {
              return (60 / ppm) * 1000;
          }

          /**
           * Decrecer PPM
           *
           * @param {number} actualPPM
           * @param {number} cantidad
           * @return {number} Resultado
           */
          function decrecerPPM(actualPPM, cantidad=1) {
              const resultado = actualPPM - cantidad;
              return resultado < 0 ? 0 : resultado;
          }

          /**
           * Aumentar PPM
           *
           * @param {number} actualPPM
           * @param {number} cantidad
           * @return {number} Resultado
           */
          function crecerPPM(actualPPM, cantidad=1) {
              return actualPPM + cantidad;
          }

          /**
           * Evento reproduce audio
           *
           * @param {event}
           */
          function eventoReproducir(event) {
              // Inicia o pausa
              reproduciendo = !reproduciendo;
              // Reproduce
              intervalo = reproducirOPausar(PPM, audioMetronomo, reproduciendo, intervalo);
              renderizarCambios(PPM, reproduciendo);
          }

          /**
           * Evento decrecer 5 PPPM
           *
           * @param {event}
           */
          function eventoDecrecer5PPM(event) {
              PPM = decrecerPPM(PPM, 5);
              intervalo = reproducirOPausar(PPM, audioMetronomo, reproduciendo, intervalo);
              renderizarCambios(PPM, reproduciendo);
          }

          /**
           * Evento decrecer 1 PPPM
           *
           * @param {event}
           */
          function eventoDecrecer1PPM(event) {
              PPM = decrecerPPM(PPM);
              intervalo = reproducirOPausar(PPM, audioMetronomo, reproduciendo, intervalo);
              renderizarCambios(PPM, reproduciendo);
          }

          /**
           * Evento crecer 1 PPPM
           *
           * @param {event}
           */
          function eventoCrecer1PPM(event) {
              PPM = crecerPPM(PPM);
              intervalo = reproducirOPausar(PPM, audioMetronomo, reproduciendo, intervalo);
              renderizarCambios(PPM, reproduciendo);
          }

          /**
           * Evento crecer 5 PPPM
           *
           * @param {event}
           */
          function eventoCrecer5PPM(event) {
              PPM = crecerPPM(PPM, 5);
              intervalo = reproducirOPausar(PPM, audioMetronomo, reproduciendo, intervalo);
              renderizarCambios(PPM, reproduciendo);
          }

          //---
          // Eventos
          //---
          botonDecrecer5PPM.addEventListener('click', eventoDecrecer5PPM);
          botonDecrecer1PPM.addEventListener('click', eventoDecrecer1PPM);
          botonCrecer1PPM.addEventListener('click', eventoCrecer1PPM);
          botonCrecer5PPM.addEventListener('click', eventoCrecer5PPM);
          botonReproducir.addEventListener('click', eventoReproducir);

          //---
          // Inicio
          //---
          renderizarCambios(PPM, reproduciendo);

        });
    </script>
</head>
<body>
    <section id="metronomo" class="text-center w-25 mt-5 mx-auto">
        <!-- Informacion -->
        <h1 id="ppm"></h1>
        <h2>PPM</h2>
        <!-- Controles -->
        <div>
            <p class="d-flex justify-content-between gap-1">
                <!-- Botones para variar los PPM (Pulsaciones por minutos) -->
                <button id="boton-decrecer-5-ppm" class="btn btn-secondary flex-grow-1">-5</button>
                <button id="boton-decrecer-1-ppm" class="btn btn-secondary flex-grow-1">-</button>
                <button id="boton-crecer-1-ppm" class="btn btn-secondary flex-grow-1">+</button>
                <button id="boton-crecer-5-ppm" class="btn btn-secondary flex-grow-1">+5</button>
            </p>
            <p>
                <!-- Boton para iniciar o pausar -->
                <button id="boton-reproducir" class="d-block btn btn-primary w-100">Empezar</button>
            </p>
        </div>
        <!-- Reproductor (será invisible) -->
        <audio id="audio-metronomo">
            <!-- Para conseguir la mayor compatibilidad, se usa tanto OGG como MP3 -->
            <source src="{{asset('js/tick.ogg')}}" type="audio/ogg">
            <source src="{{asset('js/tick.mp3')}}" type="audio/mpeg">
        </audio>
    </section>
</body>
</html>
