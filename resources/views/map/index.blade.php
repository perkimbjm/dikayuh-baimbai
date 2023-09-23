@extends('layouts.apps')

  
@section('content')
<main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/"><b><i class="fas fa-map-marker-alt"></i> Dikayuh Baimbai</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="/ded" target="_blank"><i class="fas fa-file-alt"></i> Form Input DED</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="https://docs.google.com/spreadsheets/d/1KAWaSMvZIu_FKmHO9rH0XlvnjZwPIzzh6PGTPet03Xw/edit?usp=sharing" target="_blank"><i class="fas fa-table"></i> Data DED</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="/usulan" target="_blank"><i class="fas fa-file-alt"></i> Form Verifikasi Usulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="https://docs.google.com/spreadsheets/d/16JwuNGY4lQeKiOuthP2ActIyC0iDdMD3Pl9h3XEswic/edit?usp=sharing" target="_blank"><i class="fas fa-table"></i> Data Musrenbang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#" data-toggle="modal" data-target="#infoModal"><i class="fas fa-info-circle"></i> Info</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header alert-dark">
            <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-info-circle"></i> Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-sm">
              <tr>
                <td>Disclaimer : WebGIS dalam pengembangan, batas daerah hanya berupa data indikatif.</td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>


  <div id="map"></div>

  <div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title text-primary" id="feature-title"></h4>
        </div>
        <div class="modal-body" id="feature-info"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</main>
@endsection

@push('after-script')

  <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="{{ asset('js/L.Control.Fullscreen.min.js') }}"></script>
  <script src="{{ asset('js/leaflet.markercluster141.js') }}"></script>
  <script src="{{ asset('js/basemap.js') }}"></script>
  <script src="{{ asset('js/leaflet.groupedlayercontrol.js') }}"></script>
  <script src="{{ asset('js/L.Geoserver.js') }}"></script>
  <script>
    window.bearerToken = "Bearer {{ config('services.bearer_token') }}";
  </script>
  <script src="{{ asset('js/webgis.js') }}"></script>
  <script>
    feather.replace();
        
        // Toogle Class Active
        const navbarNav = document.querySelector('.navbar-nav');
        
        const hamburger = document.querySelector('#hamburger');
        
        // ketika hamburger menu d klik
        hamburger.onclick = () => {
        navbarNav.classList.toggle('active');
        };
        
        // Klik di luar Hamburger menu
        document.addEventListener('click', function (e) {
        if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
        }
        })
</script>

@endpush