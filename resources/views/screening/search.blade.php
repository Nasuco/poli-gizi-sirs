@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="text-body mb-0">Daftar Screening</h6>
              <!-- seacrh screening -->
              <form class="d-flex align-items-center" action="{{ route('screening.search') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="screening" placeholder="Cari Screening Pasien">
                </div>
              </form>
            @if(auth()->user()->type === 'ahligizi')
            <a href="{{ route('screening.create') }}" class="btn btn-sm btn-primary">Tambah Screening</a>
            @endif

                
              </form>
            </div>
            <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
              <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No RM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bangsal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rencana Monitoring</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Risiko</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prespektif Diet</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataScreening as $screening)
                    <tr>
                    <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->id_screening}}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->no_rm }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->nama }}</p>
                      </td>
                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->pasien->bangsal }}</p>
                      </td>
                      <td>
                        @if($screening->rencana_monitoring == null)
                                                            <p class="text-xs text-center font-weight-bold opacity-7 mb-0">Rencana Monitoring tidak diisi</p>
                                                        @else
                                                            <?php
                                                                $labels = ['Parameter yang dimonitor: ', 'Evaluasi: ', 'Target akhir intervensi: '];

                                                                $rencana_monitoring = $screening->rencana_monitoring;

                                                                foreach ($labels as $label) {
                                                                    $rencana_monitoring = str_replace($label . ' ', $label, $rencana_monitoring);
                                                                }
                                                            ?>
                                                            <p class="text-xs text-center font-weight-bold mb-0">{!! nl2br(e($rencana_monitoring)) !!}</p>
                                                        @endif
                      </td>

                      <td>
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->risiko }}</p>
                      </td>
                      <td >
                        <p class="text-xs text-center font-weight-bold mb-0">{{ $screening->preskripsi_diet }}</p>
                      </td>
                      <td>
                        <a href="{{ route('screening.detail', ['id' => $screening->id_screening]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail pasien">
                          Detail
                        </a>
                      </td>
                      <td>
                      {{-- nambahin if buat ahligizi aja yang bisa liat --}}
                        @if(auth()->user()->type === 'ahligizi')
                        <a href="{{ route('screening.edit', ['id' => $screening->id_screening]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit screening">
                          Edit
                        </a>
                        @endif
                        
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="mt-3 text-center">
                <p class="text-muted mb-1">Menampilkan halaman {{ $dataScreening->currentPage() }} dari {{ $dataScreening->lastPage() }}</p>
                <div class="d-flex justify-content-around align-items-center">
                  <a href="{{ $dataScreening->previousPageUrl() }}" class="btn btn-sm btn-outline-secondary @if($dataScreening->onFirstPage()) disabled @endif"><i class="fas fa-chevron-left"></i></a>
                  <a href="{{ $dataScreening->nextPageUrl() }}" class="btn btn-sm btn-outline-secondary @if(!$dataScreening->hasMorePages()) disabled @endif"><i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
