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

                return '
                <a href="https://wa.me/' . $formattedPhone . '?text=' . $message . '" target="_blank" class="btn btn-sm btn-success">
                    <i data-feather="message-square"></i>
                </a>
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" 
                        data-name="' . htmlspecialchars($data->name, ENT_QUOTES, 'UTF-8') . '" 
                        data-alamat="' . htmlspecialchars($data->alamat, ENT_QUOTES, 'UTF-8') . '" 
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
                        data-diganti="' . htmlspecialchars($data->diganti, ENT_QUOTES, 'UTF-8') . '">
                    <i data-feather="file"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteRow(`' . route('admin.customer.delete', $data->id) . '`)">
                    <i data-feather="trash-2"></i>
                </button>
            ';
            })
            ->editColumn('created_at', function ($data) {
                return \Carbon\Carbon::parse($data->created_at)->translatedFormat('d - F - Y');
            })
            ->rawColumns(['action', 'created_at'])
            ->make(true);
    }

    public function destroy($id)
    {
        $data = Customer::where('id', $id)->first();

        $data->delete();

        return response()->json(['warning' => 'Customer berhasil dihapus.']);
    }
}
