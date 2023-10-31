<?php namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\RiwayatPasienModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class RiwayatPasien extends ResourceController{

    protected $usermdl;
	protected $pasienmdl;
	protected $riwayatmdl;

    public function __construct()
    {
        $this->usermdl = new UserModel();
        
        $this->validation = \Config\Services::validation();

		$this->pasienmdl = new PasienModel();

		$this->riwayatmdl = new RiwayatPasienModel();

		
    }

    public function show($id_pasien= null)
    {
        $pasien = $this->riwayatmdl->where(['id_pasien' => $id_pasien])->findAll();
        return $this->respond($pasien);
    }
    

    }
