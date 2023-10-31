<?php

namespace App\Controllers;

use App\Models\KetKonsulModel;
use App\Models\PasienModel;
use App\Models\RiwayatPasienModel;
use App\Models\UserModel;

use DateTime;

class Pasien extends BaseController
{
	protected $pasienmdl;
    protected $usermdl;
    protected $riwayatmdl;
    protected $ketkonsul;
    public function __construct()
    {
		$this->pasienmdl = new PasienModel();
        $this->usermdl = new UserModel();
        $this->riwayatmdl = new RiwayatPasienModel();
        $this->ketkonsul = new KetKonsulModel();
		
    }
    public function index()
    {
        
        $user = $this->pasienmdl->Getpasien(); 
        //dd($user);
        $data = [
            'title' => 'List Pasien',
            
            'pasien' => $user
        ];

        return view('pasien/list', $data);
        
    }
    
    public function users()
    {
         $user = $this->usermdl->findAll();

        $data = [
            'title' => 'List Users',
            'pasien' => $user
        ];

        return view('users/list', $data);
    }

    public function detail($id_user)
    {
        $detail = $this->pasienmdl->Getdetail($id_user);
        $riwayat = $this->riwayatmdl->where(['id_pasien' => $detail['id_pasien']])->findAll();

        $id_ketguladarah = $detail ['id_ketguladarah'];

        $id_ketkolestrol = $detail ['id_ketkolestrol'];

        $id_ketasamurat = $detail ['id_ketasamurat'];
        
        
        $hasil = $this->ketkonsul->gethasil($id_ketguladarah,$id_ketkolestrol,$id_ketasamurat);
        
        
        //hitungumur
        $tgl = $detail['tgllahir'];
        $tgllhr = new DateTime($tgl);
        $today = new DateTime("today");
        $y = $today->diff($tgllhr)->y;
        
        //dd($riwayat);
        

        //dd($detail);
        $data = [
            'title' => 'Detail Pasien',
            'detail'=> $detail,
            'umur' => $y,
            'riwayat' => $riwayat,
            'ketpenyakit' => $hasil
        
        ];
        return view('pasien/detail',$data);
    }

    

}
