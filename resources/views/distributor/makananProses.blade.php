@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="text-body mb-0">Daftar Pasien</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No RM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bangsal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pengantaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($makananProses as $proses)

                    @if($proses->statusPengantaran == 0 and $proses->statusMakanan == 1)
                    <tr>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $proses->id_screening }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $proses->pasien->no_rm }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $proses->pasien->nama }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $proses->pasien->bangsal }}</p> 
                      <td>
                        @if($proses->statusPengantaran == 0)
                        <p class="text-xs text-center font-weight-bold mb-0 text-danger">Belum Diantarkan</p>
                        @else
                        <p class="text-xs text-center font-weight-bold mb-0">Telah Diantarkan</p>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="{{ route('distributor.makananProsesDetail', ['id' => $proses->id_screening]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail pasien">
                          Detail
                          </a>
                        </a>
                      </td>
                    </tr>
                    @endif
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