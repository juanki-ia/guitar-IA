@extends('layouts.estilo')

@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">
                <i class="fas fa-user-circle"></i> <span>Herramientas:</span>
              </h3>
              </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="mdi mdi-calendar"></i> <span id="currentDateTime"></span>
                  </button>

      <script>
        function updateCurrentDateTime() {
          const now = new Date();
          const formattedDateTime = now.toLocaleString();
          document.getElementById("currentDateTime").textContent = formattedDateTime;
          }

    // Actualiza la hora cada segundo
        setInterval(updateCurrentDateTime, 1000);
    
    // Llama a la función una vez para mostrar la hora inmediatamente
        updateCurrentDateTime();
      </script>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">Enero - Marzo</a>
                      <a class="dropdown-item" href="#">Marzo - Junio</a>
                      <a class="dropdown-item" href="#">Junio - Agosto</a>
                      <a class="dropdown-item" href="#">Agosto - Noviembre</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4 grid-margin stretch-card">
    <a href="{{ route('turner') }}" class="card" style="text-decoration: none; color: inherit;">
        <div class="card-body text-center">
            <i class="ti-music-alt" style="font-size: 6rem;"></i> 
            <p class="card-title mt-3" style="font-size: 3rem;">Afinador</p> 
        </div>
    </a>
</div>

<div class="col-md-4 grid-margin stretch-card">
    <a href="{{ route('metronomo') }}" class="card" style="text-decoration: none; color: inherit;">
        <div class="card-body text-center">
            <i class="ti-headphone" style="font-size: 6rem;"></i> 
            <p class="card-title mt-3" style="font-size: 3rem;">Metronomo</p> 
        </div>
    </a>
</div>
        </div>

          
                
    </div>
  </div>
</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
@endsection
