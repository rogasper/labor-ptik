<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;
use App\Models\LaboratoriumModel;
use App\Models\OrderModel;

class SewaController extends BaseController
{
    protected $orderModel;
    protected $labModel;
    protected $fasModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->orderModel = new OrderModel();
        $this->labModel = new LaboratoriumModel();
        $this->fasModel = new FasilitasModel();
    }

    public function index()
    {
        $order = $this->orderModel->getAllDataOrderJadwal();
        $data = [
            'nav' => 'sewa',
            'title' => 'Sewa Laboratorium',
            'list' => $order
        ];
        return view('member/sewa/index', $data);
    }

    public function software()
    {
        // $order = $this->orderModel->getAllDataOrderJadwal();
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        if ($kunci) {
            $query = $this->labModel->pencariansoft($kunci);
        } else {
            $query = $this->labModel->where('kategori_lab', 'Software Engineering');
        }

        $data = [
            'nav' => 'sewa',
            'title' => 'Software Engineering',
            'list' => $query->paginate(9),
            'pager' => $this->labModel->pager,
            'page' => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'kunci' => $kunci
        ];
        return view('member/sewa/software', $data);
    }

    public function multimedia()
    {
        // $order = $this->orderModel->getAllDataOrderJadwal();
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        if ($kunci) {
            $query = $this->labModel->pencarianmul($kunci);
        } else {
            $query = $this->labModel->where('kategori_lab', 'Multimedia Studio');
        }

        $data = [
            'nav' => 'sewa',
            'title' => 'Multimedia Studio',
            'list' => $query->paginate(9),
            'pager' => $this->labModel->pager,
            'page' => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'kunci' => $kunci
        ];
        return view('member/sewa/multimedia', $data);
    }

    public function network()
    {
        // $order = $this->orderModel->getAllDataOrderJadwal();
        $pager = \Config\Services::pager();
        $kunci = $this->request->getVar('cari');
        if ($kunci) {
            $query = $this->labModel->pencariancomp($kunci);
        } else {
            $query = $this->labModel->where('kategori_lab', 'Computer Network and Instrumentation');
        }

        $data = [
            'nav' => 'sewa',
            'title' => 'Computer Network and Instrumentation',
            'list' => $query->paginate(9),
            'pager' => $this->labModel->pager,
            'page' => $this->request->getVar('page') ? $this->request->getVar('page') : 1,
            'kunci' => $kunci
        ];
        return view('member/sewa/network', $data);
    }

    public function sewa($id)
    {
        $query = $this->labModel->where('id', $id)->first();
        $data = [
            'nav' => 'sewa',
            'title' => $query['kategori_lab'],
            'list' => $query,
            'fasilitas' => $this->fasModel->find()
        ];

        // return json_encode($data);
        return view('member/sewa/sewa', $data);
    }

    public function booking()
    {
        $limasembilan = "59";
        $duasembilan = "29";

        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
        $kode = "RSV" . $today . $rand;

        $tanggal = $this->request->getPost('tanggal_sewa');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $total_harga = $this->request->getPost('total_harga');

        $timeexp = explode(":", $end_time);

        if ($timeexp[1] == "00") {
            $timeexp[1] = $limasembilan;
            $timeexp[0] = $this->gantiJam($timeexp[0]);
        } else {
            $timeexp[1] = $duasembilan;
        }

        $end_time = implode(":", $timeexp);

        $labs_id = $this->request->getPost('labs_id');
        $users_id = $this->request->getPost('users_id');
        $query = $this->db->query("SELECT * FROM orders WHERE status = 'lunas' AND orders.labs_id = $labs_id AND tanggal_sewa LIKE '$tanggal%' AND ('$start_time' BETWEEN start_time AND end_time)")->getResultArray();

        // $data = [
        //     'tanggal' => $tanggal,
        //     'start_time' => $start_time,
        //     'end_time' => $end_time,
        //     'users_id' => $users_id,
        //     'labs_id' => $labs_id,
        //     'total_harga' => $total_harga,
        //     'kode'      => $kode,
        //     'datafound' => $query
        // ];

        if (count($query) > 0) {
            // $ambil = $this->labModel->where('id', $labs_id)->first();
            // $datafail = [
            //     'nav' => 'sewa',
            //     'title' => $ambil['kategori_lab'],
            //     'list' => $ambil,
            //     'fasilitas' => $this->fasModel->find()
            // ];

            // return json_encode($data);
            session()->setFlashdata('warning', "<b>Untuk tanggal " . $tanggal . " dan jam " . $start_time . "-" . $end_time . " sudah di booking</b>");
            return redirect()->to("/member/sewa/$labs_id");
            // return view('member/sewa/sewa', $datafail);
        }

        $input = [
            'users_id'      => $users_id,
            'labs_id'       => $labs_id,
            'tanggal_sewa'  => $tanggal,
            'start_time'    => $start_time,
            'end_time'      => $end_time,
            'total_harga'   => $total_harga,
            'status'        => 'pending',
            'kode'          => $kode
        ];

        $this->orderModel->save($input);


        // return json_encode($input);
        if (session()->get('civitas') == 0) {
            return view('success-nonuns', ['id' => $users_id, 'kode' => $kode]);
        }

        return view('success-uns', ['id' => $users_id]);
    }

    public function gantiJam($angka)
    {
        switch ($angka) {
            case '08':
                return "07";
                break;
            case '09':
                return "08";
                break;
            case '10':
                return "09";
                break;
            case '11':
                return "10";
                break;
            case '12':
                return "11";
                break;
            case '13':
                return "12";
                break;
            case '14':
                return "13";
                break;
            case '15':
                return "14";
                break;
            case '16':
                return "15";
                break;
            case '17':
                return "16";
                break;
            case '18':
                return "17";
                break;
            case '19':
                return "18";
                break;
            case '20':
                return "19";
                break;
            case '21':
                return "20";
                break;
        }
    }
}
