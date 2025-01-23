<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index() {}

    public function form()
    {
        return view('survey');
    }

    public function store(Request $request)
    {

        $data = new Survey();

        $existingRuangan = $data->ruangan ? explode(';', $data->ruangan) : [];
        $newRuangan = $request->input('ruangan', []);
        $anotherRuangan = $request->input('other_ruangan');
        $mergedRuangan = array_merge($existingRuangan, $newRuangan, [$anotherRuangan]);
        $mergedRuangan = array_unique($mergedRuangan);

        $data->name = $request->input('name');
        $data->alamat = $request->input('alamat');
        $data->handphone = $request->input('handphone');
        $data->email = $request->input('email');
        $data->luas_ruangan = $request->input('luas_ruangan');
        $data->jumlah_ruangan = $request->input('jumlah_ruangan');
        $data->jenis_ruangan = $request->input('jenis_ruangan');
        $data->kebutuhan_ruangan = $request->input('kebutuhan_ruangan');
        $data->kebutuhan_rencana = $request->input('kebutuhan_rencana');
        $data->kebutuhan_teknis = $request->input('kebutuhan_teknis');
        $data->proyek_akses = $request->input('proyek_akses');
        $data->ruangan = implode(';', $mergedRuangan);
        $data->pertahankan = $request->input('pertahankan');
        $data->diganti = $request->input('diganti');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => '087785588007',
                'message' => 'Halo, Ada client yang isi survey nih,' . PHP_EOL .
                    'Tolong di follow up ya.' . PHP_EOL .
                    'Data berikut.' . PHP_EOL . PHP_EOL .
                    '- Nama: ' . $data->name . PHP_EOL .
                    '- No HP: ' . $data->handphone . PHP_EOL . PHP_EOL .
                    'Terima Kasih!',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: h3J8Sm7U4j88R7z691Rz' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        $data->save();

        return redirect()->route('survey.form')->with('success', 'Survey berhasil disubmit.');
    }
}
