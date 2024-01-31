@extends('layouts.user_type.auth')

@section('title', $title)
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-body mb-0">Menu Makan Pasien</h6>

                        <form class="d-flex align-items-center" action="{{ route('kitchen.search') }}"
                            method="GET">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="pasien" placeholder="Cari Nama Pasien">
                            </div>
                        </form>
                        <!-- <a href="{{ route('kitchen.addMakanan') }}"
                            class="btn btn-sm btn-primary">Tambah Menu Makan
                        </a> -->
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 ms-4 me-4">
                        <div class="table-responsive p-0">
                            <table class="table table-hover align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No. RM</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bangsal</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alergi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keterangan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataPasien as $pasien)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $pasien->pasien->no_rm }}</h6>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $pasien->pasien->nama }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">
                                                    {{ $pasien->pasien->bangsal }}</p>
                                            </td>
                                            <td style="max-width: 150px;">
                                                <p class="text-xs text-center font-weight-bold mb-0"
                                                    style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal;">
                                                    {{ $pasien->alergi_makanan }}</p>
                                            </td>
                                            <td>
                                                @if($pasien->keterangan == NULL)
                                                    <p class="text-xs text-center font-weight-normal mb-0 "> Belum ada
                                                        Keterangan</p>
                                                @else
                                                    <p class="text-xs text-center font-weight-bold mb-0"
                                                        style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal;">
                                                        {{ $pasien->keterangan }}</p>
                                                @endif
                                            </td>
                                            <td class="text-xs text-center font-weight-bold mb-0">
                                                <div>
                                                    <span
                                                        class="badge rounded-pill bg-{{ $pasien->statusMakanan == 1 ? 'success' : 'danger' }}"
                                                        id="statusBadge{{ $pasien->id }}">
                                                        {{ $pasien->statusMakanan == 1 ? 'Sudah Dimasak' : 'Belum Dimasak' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-xs text-center font-weight-bold mb-0">
                                                <a type="button"
                                                    href="{{ route('kitchen.detail', ['id' => $pasien->id_screening]) }}"
                                                    class="btn btn-secondary btn-sm text-light font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Detail pasien">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mt-3 text-center">
                            <p class="text-muted mb-1">Menampilkan halaman {{ $dataPasien->currentPage() }} dari
                                {{ $dataPasien->lastPage() }}</p>
                            <div class="btn-group">
                                <a href="{{ $dataPasien->previousPageUrl() }}"
                                    class="btn btn-sm btn-outline-secondary {{ $dataPasien->previousPageUrl() == null ? 'disabled' : '' }}">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="{{ $dataPasien->nextPageUrl() }}"
                                    class="btn btn-sm btn-outline-secondary {{ $dataPasien->nextPageUrl() == null ? 'disabled' : '' }}">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function updateStatus(id) {
        var statusBadge = document.getElementById("statusBadge" + id);
        var newStatus = statusBadge.textContent === "Belum Dimasak" ? 1 : 0;

        // Ubah data di kolom status menjadi newStatus melalui AJAX atau fetch
        var url = "/kitchen/update-status/" + id;
        fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(response => {
                if (response.ok) {
                    console.log("Status konfirmasi makanan berhasil diperbarui");
                } else {
                    console.error("Terjadi kesalahan saat memperbarui status konfirmasi makanan");
                }
            })
            .catch(error => {
                console.error("Terjadi kesalahan saat memperbarui status konfirmasi makanan:", error);
            });
    }

</script>

@endsection
