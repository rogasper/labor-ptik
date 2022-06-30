<?php

namespace App\Models;

use CodeIgniter\Model;

class LaboratoriumModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'labs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_lab', 'kategori_lab', 'kapasitas', 'harga', 'fasilitas', 'foto_lab'];

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

    public function pencariansoft($kunci)
    {
        return $this->table('labs')->where('kategori_lab', 'Software Engineering')->like(array('nama_lab' => $kunci));
    }
    public function pencarianmul($kunci)
    {
        return $this->table('labs')->where('kategori_lab', 'Multimedia Studio')->like(array('nama_lab' => $kunci));
    }
    public function pencariancomp($kunci)
    {
        return $this->table('labs')->where('kategori_lab', 'Computer Network and Instrumentation')->like(array('nama_lab' => $kunci));
    }
}
