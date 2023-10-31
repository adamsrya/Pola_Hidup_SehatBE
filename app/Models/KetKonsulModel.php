<?php

namespace App\Models;

use CodeIgniter\Model;

class KetKonsulModel extends Model
{
    protected $table = 'keterangan_konsul';
    protected $primaryKey = 'id_keterangan';
    
    // tentukan field yg boleh user isi

    public function gethasil($id_ketguladarah,$id_ketkolestrol,$id_ketasamurat)
    {
           
           $guladarah = $this
           ->join('konsul', 'konsul.id_penyakit=keterangan_konsul.id_penyakit')
           ->where(['id_keterangan' => $id_ketguladarah])
           ->first();

           $kolestrol = $this
           ->join('konsul', 'konsul.id_penyakit=keterangan_konsul.id_penyakit')
           ->where(['id_keterangan' => $id_ketkolestrol])
           ->first();

           $asamurat = $this
           ->join('konsul', 'konsul.id_penyakit=keterangan_konsul.id_penyakit')
           ->where(['id_keterangan' => $id_ketasamurat])
           ->first();

           $data = [
               'guladxarah'=>$guladarah,
               'kolestrol'=>$kolestrol,
               'asamurat'=>$asamurat
           ];

           return $data;
    }

    
/*
    public function getUsersId($id)
    {
                return $this
                    ->where(['id' => $id]
                    ->first();
            
    }*/

}