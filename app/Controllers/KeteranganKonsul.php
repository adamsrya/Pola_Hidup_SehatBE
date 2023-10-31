<?php namespace App\Controllers;

use App\Models\KetKonsulModel;
use App\Models\PasienModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class keteranganKonsul extends ResourceController{

    protected $usermdl;
	protected $pasienmdl;
    protected $ketkonsul;

    public function __construct()
    {
        $this->usermdl = new UserModel();
        
        $this->validation = \Config\Services::validation();

		$this->pasienmdl = new PasienModel();
        
        $this->ketkonsul = new KetKonsulModel();
		
    }

    public function show($id_pasien= null)
    {
        $pasien = $this->pasienmdl->where(['id_pasien' => $id_pasien])->first();

        $id_ketguladarah = $pasien ['id_ketguladarah'];

        $id_ketkolestrol = $pasien ['id_ketkolestrol'];

        $id_ketasamurat = $pasien ['id_ketasamurat'];

        $hasil = $this->ketkonsul->gethasil($id_ketguladarah,$id_ketkolestrol,$id_ketasamurat);

        return $this->respond($hasil);
    }
    
    }
