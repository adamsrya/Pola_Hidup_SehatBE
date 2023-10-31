<?php namespace App\Controllers;

use App\Models\KetKonsulModel;
use App\Models\PasienModel;
use App\Models\PolaHidupModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class polahidup extends ResourceController{

    protected $usermdl;
	protected $pasienmdl;
    protected $modelpolahidup;

    public function __construct()
    {
        $this->usermdl = new UserModel();
        
        $this->validation = \Config\Services::validation();

		$this->pasienmdl = new PasienModel();
        
        $this->modelpolahidup = new PolaHidupModel();
		
    }

    public function show($id_pasien = null)
    {
        $pasien = $this->pasienmdl->where(['id_pasien' => $id_pasien])->first();

        $id_ketguladarah = $pasien ['id_ketguladarah'];

        $id_ketkolestrol = $pasien ['id_ketkolestrol'];

        $id_ketasamurat = $pasien ['id_ketasamurat'];

        $hasil = $this->modelpolahidup->getpolahidup($id_ketguladarah,$id_ketkolestrol,$id_ketasamurat);

        return $this->respond($hasil);
    }
    
    }
