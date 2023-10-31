<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPasienModel extends Model
{
    protected $table = 'riwayatkonsul';
    protected $primaryKey = 'id_riwayat';
    protected $useTimestamps = true;
    // tentukan field yg boleh user isi
    protected $allowedFields = ['id_pasien', 'guladarah', 'kolestrol', 'asamurat'];


    public function getRiwayat($id_pasien){

        return $this
                ->join('pasien','pasien.id_pasien=riwayatkonsul.id_pasien')
                ->where(['id_pasien' => $id_pasien])->first();
    }

}


