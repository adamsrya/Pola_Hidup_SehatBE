<?php

namespace App\Models;

use CodeIgniter\Model;

class PolaHidupModel extends Model
{
    protected $table = 'polahidup';
    protected $primaryKey = 'id_penyakit';
    
    // tentukan field yg boleh user isi

    public function getpolahidup($id_ketguladarah,$id_ketkolestrol,$id_ketasamurat)
    {
        if ($id_ketguladarah == 3){
            $ketguladarah = 1;
        }elseif ($id_ketguladarah != 3 ){
            $ketguladarah = 9; 
        }

         if ($id_ketkolestrol == 6 || $id_ketkolestrol == 5 ){
            $ketkolestrol = 1;
         }else{
             $ketkolestrol = 9;
         }
         
         if ($id_ketasamurat == 8){
             $ketasamurat = 1;
         }else{
             $ketasamurat = 9;
         }

         

        // $makanan = [];

         
         $makanan = $this
         ->like('guladarah', $ketguladarah)
         ->orLike('kolestrol', $ketkolestrol)
         ->orLike('asamurat', $ketasamurat)
        
         ->findAll();

        
         

        $makanan = [
            $makanan,
            
        ];

           $data = [
               'makanan'=>$makanan,
               
           ];

           return $data;
    }

    
}