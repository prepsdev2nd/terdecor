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
        $mergedRuangan = array_merge($existingRuangan, $newRuangan);
        if (($key = array_search('Other', $mergedRuangan)) !== false) {
            unset($mergedRuangan[$key]);
            $mergedRuangan[] = $anotherRuangan;
        }
        $mergedRuangan = array_unique($mergedRuangan);

        $existingDesainSuasana = $data->desain_suasana ? explode(';', $data->desain_suasana) : [];
        $newDesainSuasana = $request->input('desain_suasana', []);
        $anotherDesainSuasana = $request->input('desain_suasana_other');
        $mergedDesainSuasana = array_merge($existingDesainSuasana, $newDesainSuasana);
        if (($key = array_search('Other', $mergedDesainSuasana)) !== false) {
            unset($mergedDesainSuasana[$key]);
            $mergedDesainSuasana[] = $anotherDesainSuasana;
        }
        $mergedDesainSuasana = array_unique($mergedDesainSuasana);

        $existingDesainGaya = $data->desain_gaya ? explode(';', $data->desain_gaya) : [];
        $newDesainGaya = $request->input('desain_gaya', []);
        $anotherDesainGaya = $request->input('desain_gaya_other');
        $mergedDesainGaya = array_merge($existingDesainGaya, $newDesainGaya);
        if (($key = array_search('Other', $mergedDesainGaya)) !== false) {
            unset($mergedDesainGaya[$key]);
            $mergedDesainGaya[] = $anotherDesainGaya;
        }
        $mergedDesainGaya = array_unique($mergedDesainGaya);

        $existingFavoritPreferensi = $data->favorit_preferensi ? explode(';', $data->favorit_preferensi) : [];
        $newFavoritPreferensi = $request->input('favorit_preferensi', []);
        $anotherFavoritPreferensi = $request->input('favorit_preferensi_other');
        $mergedFavoritPreferensi = array_merge($existingFavoritPreferensi, $newFavoritPreferensi);
        if (($key = array_search('Other', $mergedFavoritPreferensi)) !== false) {
            unset($mergedFavoritPreferensi[$key]);
            $mergedFavoritPreferensi[] = $anotherFavoritPreferensi;
        }
        $mergedFavoritPreferensi = array_unique($mergedFavoritPreferensi);

        $existingFavoritWarna = $data->favorit_warna ? explode(';', $data->favorit_warna) : [];
        $newFavoritWarna = $request->input('favorit_warna', []);
        $anotherFavoritWarna = $request->input('favorit_warna_other');
        $mergedFavoritWarna = array_merge($existingFavoritWarna, $newFavoritWarna);
        if (($key = array_search('Other', $mergedFavoritWarna)) !== false) {
            unset($mergedFavoritWarna[$key]);
            $mergedFavoritWarna[] = $anotherFavoritWarna;
        }
        $mergedFavoritWarna = array_unique($mergedFavoritWarna);

        $data->name = $request->input('name');
        $data->alamat = $request->input('alamat');
        $data->kota = $request->input('kabupatenKota');
        $data->handphone = $request->input('handphone');
        $data->email = $request->input('email');
        $data->luas_ruangan = $request->input('luas_ruangan');
        $data->jumlah_ruangan = $request->input('jumlah_ruangan');
        $data->jenis_ruangan = $request->input('jenis_ruangan');
        if ($request->kebutuhan_ruangan == "others") {
            $data->kebutuhan_ruangan = $request->input('kebutuhan_ruangan_other');
        } else {
            $data->kebutuhan_ruangan = $request->input('kebutuhan_ruangan');
        }
        $data->kebutuhan_rencana = $request->input('kebutuhan_rencana');
        $data->kebutuhan_teknis = $request->input('kebutuhan_teknis');
        $data->proyek_akses = $request->input('proyek_akses');
        $data->ruangan = implode(';', $mergedRuangan);
        $data->pertahankan = $request->input('pertahankan');
        $data->diganti = $request->input('diganti');
        if ($request->desain_prioritas == "others") {
            $data->desain_prioritas = $request->input('desain_prioritas_other');
        } else {
            $data->desain_prioritas = $request->input('desain_prioritas');
        }
        $data->desain_ramah = $request->input('desain_ramah');
        $data->desain_suasana = implode(';', $mergedDesainSuasana);
        $data->desain_gaya = implode(';', $mergedDesainGaya);
        $data->favorit_pribadi = $request->input('favorit_pribadi');
        $data->favorit_preferensi = implode(';', $mergedFavoritPreferensi);
        $data->favorit_warna = implode(';', $mergedFavoritWarna);
        $data->favorit_tidak = $request->input('favorit_tidak');
        $data->favorit_tema = $request->input('favorit_tema');
        $data->favorit_tambahan = $request->input('favorit_tambahan');
        $data->favorit_desainer = $request->input('favorit_desainer');
        $data->tanggal_survey = $request->input('tanggal_survey');
        $data->survey = $request->has('survey') ? 'Ya' : 'Tidak';

        if ($data->survey == "Ya") {
            $data->status = "Menunggu DP";
        } else {
            $data->status = "Tidak Survey";
        }

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
                'target' => '081224377189',
                'message' => 'Halo, Ada client yang isi survey nih,' . PHP_EOL .
                    'Tolong di follow up ya.' . PHP_EOL .
                    'Data berikut.' . PHP_EOL . PHP_EOL .
                    '- Nama: ' . $data->name . PHP_EOL .
                    '- No HP: ' . $data->handphone . PHP_EOL . PHP_EOL .
                    'Terima Kasih!',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: bjX2An3Yuaz8fwTP84oA' //change TOKEN to your actual token
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
