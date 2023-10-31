<?php namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\RiwayatPasienModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class PasienAPI extends ResourceController{

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
        $pasien = $this->pasienmdl->where(['id_pasien' => $id_pasien])->first();
        return $this->respond($pasien);
    }
    public function create()
    {
        if (!$this->request->getPost('id_user')){
            return $this->fail('id_user is not exist');
        }

        if (!$this->validate([

			'guladarah' => [
				'label'  => 'Gula Darah',
				'rules' => 'required',
			],
            'kolestrol' => [
				'label'  => 'Kolestrol',
				'rules' => 'required',
			],
            'asamurat' => [
				'label'  => 'Asam Urat',
				'rules' => 'required',
            ]

		])) {

			$validation = \Config\Services::validation();
            return $this->fail($validation->getErrors());
			
		}
        
        $guladarah = $this->request->getPost('guladarah');
        $kolestrol = $this->request->getPost('kolestrol');
        $asamurat = $this->request->getPost('asamurat');

        if ($guladarah < 80 ){
            $guladarah = 2;
        }elseif ($guladarah > 125){
            $guladarah = 3;
        }else{
            $guladarah = 1;
        }

        if ($kolestrol  < 200 ){
            $kolestrol = 4;
        }elseif ($kolestrol >= 240){
            $kolestrol = 5;
        }else{
            $kolestrol = 6;
        }

        if ($asamurat  >=8 ){
            $asamurat = 8;
        }else{
            $asamurat = 7;
        }

		$this->pasienmdl->save([
            
            'id_user' => $this->request->getVar('id_user'),
            'guladarah' => $this->request->getVar('guladarah'),
            'kolestrol' => $this->request->getVar('kolestrol'),
            'asamurat' => $this->request->getVar('asamurat'),
            'id_ketguladarah' => $guladarah,
            'id_ketkolestrol' => $kolestrol,
            'id_ketasamurat' => $asamurat
        ]);

		$data = [
			'status' => 'ok',
			'data' => $this->request->getVar()
			
		];

		return $this->respondCreated($data);
	}

    public function update($id = null)
    {
       

        if (!$this->validate([

			'guladarah' => [
				'label'  => 'Gula Darah',
				'rules' => 'required',
			],
            'kolestrol' => [
				'label'  => 'Kolestrol',
				'rules' => 'required',
			],
            'asamurat' => [
				'label'  => 'Asam Urat',
				'rules' => 'required',
            ]

		])) {

			$validation = \Config\Services::validation();
            return $this->fail($validation->getErrors());
			
		}
        
        $guladarah = $this->request->getVar('guladarah');
        $kolestrol = $this->request->getVar('kolestrol');
        $asamurat = $this->request->getVar('asamurat');

        if ($guladarah < 80 ){
            $guladarah = 2;
        }elseif ($guladarah > 125){
            $guladarah = 3;
        }else{
            $guladarah = 1;
        }

        if ($kolestrol  < 200 ){
            $kolestrol = 4;
        }elseif ($kolestrol >= 240){
            $kolestrol = 5;
        }else{
            $kolestrol = 6;
        }

        if ($asamurat  >=8 ){
            $asamurat = 8;
        }else{
            $asamurat = 7;
        }


        $pasien = $this->pasienmdl->where(['id_pasien' => $id])->first();

        $this->riwayatmdl->save([
            'id_pasien' => $id,
            'guladarah' => $pasien['guladarah'],
            'kolestrol' => $pasien['kolestrol'],
            'asamurat' => $pasien['asamurat'],
        ]);



		$this->pasienmdl->save([
            'id_pasien' => $id,
            'guladarah' => $this->request->getVar('guladarah'),
            'kolestrol' => $this->request->getVar('kolestrol'),
            'asamurat' => $this->request->getVar('asamurat'),
            'id_ketguladarah' => $guladarah,
            'id_ketkolestrol' => $kolestrol,
            'id_ketasamurat' => $asamurat
        ]);

		$data = [
			'status' => 'berhasil update',
			'data' => $this->request->getVar()
			
		];

		return $this->respondCreated($data);
	}

    }
