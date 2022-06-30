<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['users_id', 'labs_id', 'tanggal_sewa', 'start_time', 'end_time', 'total_harga', 'status', 'kode'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllDataOrderPending()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->where('orders.status !=', 'lunas');
        $builder->where('orders.status !=', 'cancel');
        $builder->select('*');
        $builder->orderBy('orders.created_at', 'DESC');
        $query = $builder->get()->getResultArray();
        $query = array_map(function ($value) {
            $value['password'] = '';
            return $value;
        }, $query);

        return $query;
    }

    public function getAllDataOrderByUsername($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->where('orders.kode', $id);
        $builder->select('*');
        $query = $builder->get()->getResultArray();
        $query = array_map(function ($value) {
            $value['password'] = '';
            return $value;
        }, $query);

        return $query;
    }

    public function getAllDataOrder()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->select('*');
        $builder->orderBy('orders.created_at', 'DESC');
        $query = $builder->get()->getResultArray();
        $query = array_map(function ($value) {
            $value['password'] = '';
            return $value;
        }, $query);

        return $query;
    }

    public function getAllDataOrderJadwal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->where('orders.status !=', 'pending');
        $builder->where('orders.status !=', 'cancel');
        $builder->select('orders.id, orders.tanggal_sewa, orders.start_time, orders.end_time, orders.kode, labs.nama_lab, users.nama, labs.kategori_lab');
        $builder->orderBy('orders.created_at', 'DESC');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getAllDataRiwayatById($id, $page, $perPage)
    {
        $db         = \Config\Database::connect();
        $builder    = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->where('orders.users_id', $id);
        $builder->orderBy('orders.created_at', 'DESC');
        // $builder->limit();
        $query = $builder->get($perPage, $page)->getResultArray();
        return $query;
    }
    public function getAllDataRiwayatByIdAll($id)
    {
        $db         = \Config\Database::connect();
        $builder    = $db->table('orders');
        $builder->join('users', 'users.id = orders.users_id');
        $builder->join('labs', 'labs.id = orders.labs_id');
        $builder->where('orders.users_id', $id);
        $builder->orderBy('orders.created_at', 'DESC');
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
