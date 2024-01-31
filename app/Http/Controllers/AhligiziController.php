<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Screening;
use App\Models\AhliGizi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class AhligiziController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ahligiziHome()
    {

        $pasienCount = Pasien::count();
        $screeningCount = Screening::count();  // Corrected: Use Screening model
        return view('ahligizi.index', compact('pasienCount', 'screeningCount')); // Pass both variables
    }

    
    public function ahligiziScreening()
    {
        $dataPasien = Pasien::all();
        $dataAhliGizi = AhliGizi::all();

        return view('ahligizi.create', compact('dataPasien', 'dataAhliGizi'));
    }

    public function dataScreening($id)
    {
        $dataScreening = Screening::where('id_pasien', $id)->get();
        return view('screening.show', compact('dataScreening'));
    }

    public function ahligiziTables()
    {
        return view('ahligizi.tables');
    }

    public function pasienData()
    {
        $dataPasien = Pasien::paginate(10);
        $dataScreening = Screening::all();

        return view('pasien.index', compact('dataPasien', 'dataScreening'));
    }

    public function detailPasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.detail', compact('pasien'));
    }

    public function searchPasien(Request $request)  
    {
        $pasien = $request->input('pasien');
        $dataPasien = Pasien::where('nama', 'like', "%$pasien%")->get();

        return view('pasien.search', compact('dataPasien'));
    }
}
