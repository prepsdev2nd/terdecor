<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Survey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function getData()
    {

        $data = Survey::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $formattedPhone = '+62' . substr($data->handphone, 1);
                $message = urlencode("Halo, kami tim dari Terdecor.com, ingin melakukan pengecekan data survey .....");

                if ($data->status == "Selesai" || $data->status == "Tidak Survey") {
                    return '
                    <a href="https://wa.me/' . $formattedPhone . '?text=' . $message . '" target="_blank" class="btn btn-sm btn-success">
                        <i data-feather="message-square"></i>
                    </a>
                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" 
                            data-name="' . htmlspecialchars($data->name, ENT_QUOTES, 'UTF-8') . '" 
                            data-alamat="' . htmlspecialchars($data->alamat, ENT_QUOTES, 'UTF-8') . '" 
                            data-kota="' . ucwords(strtolower(htmlspecialchars($data->kota, ENT_QUOTES, 'UTF-8'))) . '" 
                            data-whatsapp="' . htmlspecialchars($data->handphone, ENT_QUOTES, 'UTF-8') . '" 
                            data-email="' . htmlspecialchars($data->email, ENT_QUOTES, 'UTF-8') . '"
                            data-luasruangan="' . htmlspecialchars($data->luas_ruangan, ENT_QUOTES, 'UTF-8') . '"
                            data-jumlahruangan="' . htmlspecialchars($data->jumlah_ruangan, ENT_QUOTES, 'UTF-8') . '"
                            data-jenisruangan="' . htmlspecialchars($data->jenis_ruangan, ENT_QUOTES, 'UTF-8') . '"
                            data-kebutuhanruangan="' . htmlspecialchars($data->kebutuhan_ruangan, ENT_QUOTES, 'UTF-8') . '"
                            data-kebutuhanrencana="' . htmlspecialchars($data->kebutuhan_rencana, ENT_QUOTES, 'UTF-8') . '"
                            data-kebutuhanteknis="' . htmlspecialchars($data->kebutuhan_teknis, ENT_QUOTES, 'UTF-8') . '"
                            data-proyekakses="' . htmlspecialchars($data->proyek_akses, ENT_QUOTES, 'UTF-8') . '"
                            data-ruangan="' . htmlspecialchars($data->ruangan, ENT_QUOTES, 'UTF-8') . '"
                            data-pertahankan="' . htmlspecialchars($data->pertahankan, ENT_QUOTES, 'UTF-8') . '"
                            data-diganti="' . htmlspecialchars($data->diganti, ENT_QUOTES, 'UTF-8') . '"
                            data-desainprioritas="' . htmlspecialchars($data->desain_prioritas, ENT_QUOTES, 'UTF-8') . '"
                            data-desainramah="' . htmlspecialchars($data->desain_ramah, ENT_QUOTES, 'UTF-8') . '"
                            data-desainsuasana="' . htmlspecialchars($data->desain_suasana, ENT_QUOTES, 'UTF-8') . '"
                            data-desaingaya="' . htmlspecialchars($data->desain_gaya, ENT_QUOTES, 'UTF-8') . '"
                            data-favoritpribadi="' . htmlspecialchars($data->favorit_pribadi, ENT_QUOTES, 'UTF-8') . '"
                            data-favoritpreferensi="' . htmlspecialchars($data->favorit_preferensi, ENT_QUOTES, 'UTF-8') . '"
                            data-favoritwarna="' . htmlspecialchars($data->favorit_warna, ENT_QUOTES, 'UTF-8') . '"
                            data-favorittidak="' . htmlspecialchars($data->favorit_tidak, ENT_QUOTES, 'UTF-8') . '"
                            data-favorittema="' . htmlspecialchars($data->favorit_tema, ENT_QUOTES, 'UTF-8') . '"
                            data-favorittambahan="' . htmlspecialchars($data->favorit_tambahan, ENT_QUOTES, 'UTF-8') . '"
                            data-favoritdesainer="' . htmlspecialchars($data->favorit_desainer, ENT_QUOTES, 'UTF-8') . '"
                            data-tanggalsurvey="' . htmlspecialchars($data->tanggal_survey, ENT_QUOTES, 'UTF-8') . '"
                            data-survey="' . htmlspecialchars($data->survey, ENT_QUOTES, 'UTF-8') . '"
                            data-status="' . htmlspecialchars($data->status, ENT_QUOTES, 'UTF-8') . '">
                        <i data-feather="file"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.customer.delete', $data->id) . '`)">
                        <i data-feather="trash-2"></i>
                    </button>';
                } else {
                    return '
                <button class="btn btn-sm btn-warning update-status" data-id="' . htmlspecialchars($data->id, ENT_QUOTES, 'UTF-8') . '">
                    <i data-feather="arrow-right"></i>
                </button>
                <a href="https://wa.me/' . $formattedPhone . '?text=' . $message . '" target="_blank" class="btn btn-sm btn-success">
                    <i data-feather="message-square"></i>
                </a>
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" 
                        data-name="' . htmlspecialchars($data->name, ENT_QUOTES, 'UTF-8') . '" 
                        data-alamat="' . htmlspecialchars($data->alamat, ENT_QUOTES, 'UTF-8') . '" 
                        data-kota="' . ucwords(strtolower(htmlspecialchars($data->kota, ENT_QUOTES, 'UTF-8'))) . '" 
                        data-whatsapp="' . htmlspecialchars($data->handphone, ENT_QUOTES, 'UTF-8') . '" 
                        data-email="' . htmlspecialchars($data->email, ENT_QUOTES, 'UTF-8') . '"
                        data-luasruangan="' . htmlspecialchars($data->luas_ruangan, ENT_QUOTES, 'UTF-8') . '"
                        data-jumlahruangan="' . htmlspecialchars($data->jumlah_ruangan, ENT_QUOTES, 'UTF-8') . '"
                        data-jenisruangan="' . htmlspecialchars($data->jenis_ruangan, ENT_QUOTES, 'UTF-8') . '"
                        data-kebutuhanruangan="' . htmlspecialchars($data->kebutuhan_ruangan, ENT_QUOTES, 'UTF-8') . '"
                        data-kebutuhanrencana="' . htmlspecialchars($data->kebutuhan_rencana, ENT_QUOTES, 'UTF-8') . '"
                        data-kebutuhanteknis="' . htmlspecialchars($data->kebutuhan_teknis, ENT_QUOTES, 'UTF-8') . '"
                        data-proyekakses="' . htmlspecialchars($data->proyek_akses, ENT_QUOTES, 'UTF-8') . '"
                        data-ruangan="' . htmlspecialchars($data->ruangan, ENT_QUOTES, 'UTF-8') . '"
                        data-pertahankan="' . htmlspecialchars($data->pertahankan, ENT_QUOTES, 'UTF-8') . '"
                        data-diganti="' . htmlspecialchars($data->diganti, ENT_QUOTES, 'UTF-8') . '"
                        data-desainprioritas="' . htmlspecialchars($data->desain_prioritas, ENT_QUOTES, 'UTF-8') . '"
                        data-desainramah="' . htmlspecialchars($data->desain_ramah, ENT_QUOTES, 'UTF-8') . '"
                        data-desainsuasana="' . htmlspecialchars($data->desain_suasana, ENT_QUOTES, 'UTF-8') . '"
                        data-desaingaya="' . htmlspecialchars($data->desain_gaya, ENT_QUOTES, 'UTF-8') . '"
                        data-favoritpribadi="' . htmlspecialchars($data->favorit_pribadi, ENT_QUOTES, 'UTF-8') . '"
                        data-favoritpreferensi="' . htmlspecialchars($data->favorit_preferensi, ENT_QUOTES, 'UTF-8') . '"
                        data-favoritwarna="' . htmlspecialchars($data->favorit_warna, ENT_QUOTES, 'UTF-8') . '"
                        data-favorittidak="' . htmlspecialchars($data->favorit_tidak, ENT_QUOTES, 'UTF-8') . '"
                        data-favorittema="' . htmlspecialchars($data->favorit_tema, ENT_QUOTES, 'UTF-8') . '"
                        data-favorittambahan="' . htmlspecialchars($data->favorit_tambahan, ENT_QUOTES, 'UTF-8') . '"
                        data-favoritdesainer="' . htmlspecialchars($data->favorit_desainer, ENT_QUOTES, 'UTF-8') . '"
                        data-tanggalsurvey="' . htmlspecialchars($data->tanggal_survey, ENT_QUOTES, 'UTF-8') . '"
                        data-survey="' . htmlspecialchars($data->survey, ENT_QUOTES, 'UTF-8') . '"
                        data-status="' . htmlspecialchars($data->status, ENT_QUOTES, 'UTF-8') . '">
                    <i data-feather="file"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.customer.delete', $data->id) . '`)">
                    <i data-feather="trash-2"></i>
                </button>';
                }
            })
            ->editColumn('status', function ($data) {
                if ($data->status == "Menunggu DP") {
                    return '<span class="badge bg-warning">Menunggu DP</span>';
                } elseif ($data->status == "Sudah DP") {
                    return '<span class="badge bg-primary">' . $data->status . '</span>';
                } elseif ($data->status == "Selesai") {
                    return '<span class="badge bg-success">' . $data->status . '</span>';
                } elseif ($data->status == "Tidak Survey") {
                    return '<span class="badge" style="background-color: #808080">' . $data->status . '</span>';
                }
            })
            ->editColumn('tanggal_survey', function ($data) {
                return \Carbon\Carbon::parse($data->tanggal_survey)->translatedFormat('d - F - Y');
            })
            ->editColumn('created_at', function ($data) {
                return \Carbon\Carbon::parse($data->created_at)->translatedFormat('d - F - Y');
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function updateStatus($id)
    {
        try {
            $data = Survey::findOrFail($id);

            if ($data->status == "Menunggu DP") {
                $data->status = "Sudah DP";
            } elseif ($data->status == "Sudah DP") {
                $data->status = "Selesai";
            } else {
                return response()->json(['error' => 'Status tidak valid'], 400);
            }

            $data->save();

            return response()->json(['success' => 'Status berhasil diubah.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $data = Survey::where('id', $id)->first();

        $data->delete();

        return response()->json(['warning' => 'Customer berhasil dihapus.']);
    }
}
