<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    
    // tentukan field yg boleh user isi
    protected $allowedFields = ['id_user','guladarah', 'kolestrol', 'asamurat','id_ketguladarah','id_ketkolestrol','id_ketasamurat'];
    
    public function cekpasien($id_user)
    {
            $data = $this->where(['id_user' => $id_user])->first();
             

            return $data;
            // if()
            //     if  ($this->where(['email' => $email])
            //     ->where(['statusJemaah' => 'pulang'])
            //     ->findAll()){
            //         return false;
            //     }

            //     return $this
            //         ->where(['email' => $email])
            //         ->first();
    }
    public function Getdetail($id_user)
    {
                return $this
                    ->join('user','user.id_user=pasien.id_user')
                    ->where(['pasien.id_user' => $id_user])
                    ->first();
            
    }
    public function Getpasien()
    {
        
                return $this
                    ->join('user','user.id_user=pasien.id_user')
                    ->findAll();
            
    }
    /*public function getUsers()
    {
                return $this
                    ->join('user_role','user_role.idRole=user.role_id')
                    ->get()->getResultArray();
            
    }

    public function getUsersId($id)
    {
                return $this
                    ->where(['id' => $id])
                    ->first();
            
    }*/

}
