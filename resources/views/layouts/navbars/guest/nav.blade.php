<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-8 end-8 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 {{ (Request::is('static-sign-up') ? 'text-white' : '') }}" href="{{ url('/') }}">
      <i class="fas fa-hospital-alt me-2"></i> <!-- Ganti ikon sesuai kebutuhan, misalnya ikon rumah sakit -->
      Sistem Informasi Rumah Sakit (SIRS)
    </a>
    {{-- <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1 bg-primary"></span>
        <span class="navbar-toggler-bar bar2 bg-primary"></span>
        <span class="navbar-toggler-bar bar3 bg-primary"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto">
        @if (auth()->user())
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ url('dashboard') }}">
              <i class="fas fa-chart-line me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{ url('profile') }}">
              <i class="fas fa-user-circle me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
              Profile
            </a>
          </li>
        @endif
      </ul>
    </div> --}}
  </div>
</nav>
<!-- End Navbar -->
