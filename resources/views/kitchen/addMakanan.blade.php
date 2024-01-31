@extends('layouts.user_type.auth')


@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Detail Menu Makan Pasien</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('kitchen.addMakanan') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                            <div class="mb-3">
                                <label for="penanggung_jawab" class="form-label">Nama Penanggung Jawab</label>
                                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
                            </div>
                            <div class="mb-3">
                                <label for="pasien_id" class="form-label">Pilih Pasien</label>
                                <select class="form-select" id="pasien_id" name="pasien_id" required>
                                    @foreach($pasien as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
