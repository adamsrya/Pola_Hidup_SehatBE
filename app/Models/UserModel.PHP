<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    
    // tentukan field yg boleh user isi
    protected $allowedFields = ['nama', 'tmptlahir', 'tgllahir', 'alamat', 'jk', 'username',
    'email','password','role'];


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


