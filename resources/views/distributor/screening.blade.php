@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="text-body mb-0">Daftar Pasien</h6>
            
              <form class="d-flex align-items-center" action="{{ route('pasien.search') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="pasien" placeholder="Cari Nama Pasien">
                </div>
              </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No RM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rencana Monitoring</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diagnosis Medis</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Risiko</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prespektif Diet</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataScreening as $screening)
                    <tr>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->no_rm }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->nama }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->rencana_monitoring }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->diagnosis_medis }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->risiko }}</p>
                      </td>
                      <td >
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->preskripsi_diet }}</p>
                      </td>

                      <td class="align-middle">
                        <a href="{{ route('distributor.screeningDetail', ['id_screening' => $screening->id_screening]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail pasien">
                          Detail
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection