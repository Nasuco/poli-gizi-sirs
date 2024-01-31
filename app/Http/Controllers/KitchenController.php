<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AhliGizi;
use App\Models\Pasien;
use App\Models\Kitchen;
use App\Models\Distributor;
use App\Models\Screening;
use TCPDF;

class KitchenController extends Controller
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

    public function kitchenHome()
{
    $title = 'Kitchen';

    $pasienCount = Pasien::count();
    $screeningCount = Screening::count();
    $masakCount = Screening::where('statusMakanan', 0)->count();
    $selesaiCount = Screening::where('statusMakanan', 1)->count();

    return view('kitchen.index', compact('title', 'pasienCount', 'screeningCount', 'masakCount','selesaiCount')); 

}

    public function pasienData()
    {
        $title = 'Kitchen | Data Pasien';
        
        $dataPasien = Screening::all();
        $dataPasien = Screening::paginate(10);

        return view('kitchen.menumakan', compact('dataPasien', 'title'));
    }

    public function detailPasien($id)
    {
        $title = 'Kitchen | Detail Pasien';

        $pasien = Screening::findOrFail($id);
        return view('kitchen.detail', compact('pasien'), compact('title'));
    }

    public function searchPasien(Request $request)  
    {
        $title = 'Kitchen | Menu Makan Pasien';

        $pasien = $request->input('pasien');
        $dataPasien = Pasien::where('nama', 'like', "%$pasien%")->paginate(10);
    
        return view('kitchen.search', ['dataPasien' => $dataPasien], compact('title'));
    }

    public function printPasien($id)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Kitchen');
        $pdf->SetTitle('Data Menu Makan Pasien');
        $pdf->SetSubject('SIRS Poli Gizi');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Atur tampilan header
        $pdf->SetHeaderData('../public/assets/img/logo-pku.png', PDF_HEADER_LOGO_WIDTH, 'Data Menu Makan Pasien', 'RS PKU Muhammadiyah Gamping');

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('helvetica', 'B', 20);

        // add a page
        $pdf->AddPage();

        // Menambahkan judul
        $pdf->Cell(0, 10, 'Data Pasien', 0, 1, 'C');
        $pdf->Ln(5);

        $pdf->SetFont('helvetica', '', 8);

        // -----------------------------------------------------------------------------
        $pasien = Pasien::findOrFail($id);
        $screening = Screening::findOrFail($id);
        $tbl = '<table cellspacing="0" cellpadding="10" border="1">
            <thead>
                <tr>
                    <th>NO. RM</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>BANGSAL</th>
                    <th>DIAGNOSIS GIZI</th>
                    <th>TANGGAL SCREENING</th>
                </tr>
            </thead>
            <tbody>';
    
            $tbl .= '<tr>';
            $tbl .= '<td>' . $pasien->no_rm . '</td>';
            $tbl .= '<td>' . $pasien->nama . '</td>';
            $tbl .= '<td>' . $pasien->tgl_lahir . '</td>';
            $tbl .= '<td>' . $pasien->bangsal . '</td>';
            $tbl .= '<td>' . $screening->diagnosis_gizi . '</td>';
            $tbl .= '<td>' . $pasien->tgl_periksa . '</td>';
            $tbl .= '</tr>';
    
        $tbl .= '</tbody></table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->Ln(20);
        $pdf->Cell(0, 5, 'Yang bertanggung jawab', 0, 1, 'C');
        $pdf->Cell(0, 5, '', 0, 1, 'C');
        $pdf->Cell(0, 5, '', 0, 1, 'C');
        $pdf->Cell(0, 5, '', 0, 1, 'C');
        $pdf->Cell(0, 1, 'Nama Orang', 0, 1, 'C');
        $pdf->Cell(0, 0, '__________________________', 0, 1, 'C');

        //Menyimpan dan menampilkan file PDF
        $pdf->Output('Data Menu Makan Pasien.pdf', 'I');
    }

    public function updateMakanan(Request $request)
    {
        Screening::whereNull('id_screening')
        ->update([
            
            'keterangan' => $request->keterangan,
            'statusMakanan' => $request->status

        ]);
        Screening::where('id_screening', $request->id)
        ->update([
            'keterangan' => $request->keterangan,
            'statusMakanan' => $request->status
        ]);


        return redirect()->route('kitchen.menumakan');
    }

    public function addMakanan()
    {
        $ahligizi = AhliGizi::all();
        $screening = Screening::all();
        $pasien = Pasien::all();
        $dapur = Kitchen::all();
        $distributor = Distributor::all();

        return view('kitchen.addMakanan', compact('ahligizi','pasien', 'screening' ,'dapur', 'distributor'));
    }
}
