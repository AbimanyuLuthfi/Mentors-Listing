<?php

namespace App\Models;

use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class MentorsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mentors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'uuid',

        'email',
        'password',
        'role',
        'is_active',

        'gambar',
        'nama',
        'bidang_keahlian',
        'deskripsi_profil',
        'waktu_tersedia',
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function getAllItem() {
        return $this->findAll();
    }

    public function createItem($array_mentors) {
        $uuid4 = Uuid::uuid4();
        $generateUUID = $uuid4;
        $data = [
            'uuid' => $generateUUID,
            'role' => $generateUUID,
            'is_active' => $generateUUID,
            'gambar' => $array_mentors['gambar'],
            'nama' => $array_mentors['nama'],
            'bidang_keahlian' => $array_mentors['bidang_keahlian'],
            'deskripsi_profil' => $array_mentors['deskripsi_profil'],
            'waktu_tersedia' => $array_mentors['waktu_tersedia'],
        ];
        $this->save($data);
        return $this->getInsertID();
    }


    // Function Delete Items Experts
    public function deleteItem($mentors_uuid) {
        $getItem = $this->where('uuid', $mentors_uuid)->first();
        if (!empty($getItem)) {
            $this->where('uuid', $mentors_uuid)->delete();
            return true;
        } else return false;
    }

}
