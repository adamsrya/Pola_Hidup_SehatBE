<?php namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthAPI extends ResourceController{

    protected $usermdl;
	protected $pasienmdl;

    public function __construct()
    {
        $this->usermdl = new UserModel();
        
        $this->validation = \Config\Services::validation();

		$this->pasienmdl = new PasienModel();

		
    }

    public function index()
    {
        return $this->respond($this->usermdl->findAll());
    }
    public function create()
    {
		$data = $this->request->getPost();
        if (!$this->validate([
			'nama' => [
				'label'  => 'Name',
				'rules' => 'required',
			],
            'tmptlahir' => [
				'label'  => 'Tempat Lahir',
				'rules' => 'required',
			],
            'tgllahir' => [
				'label'  => 'Tanggal lahir',
				'rules' => 'required',
			],
            'alamat' => [
				'label'  => 'Alamat',
				'rules' => 'required',
			],
            'jk' => [
				'label'  => 'Jenis Kelamin',
				'rules' => 'required',
			],
            'username' => [
				'label'  => 'username',
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'is_unique' => 'This username has already exist.'
				]
			],
			'email' => [
				'label'  => 'Email',
				'rules' => 'required|valid_email|is_unique[user.email]',
				'errors' => [
					'is_unique' => 'This Email has already registered.'
				]
			],

			'password' => [
				'label'  => 'Password',
				'rules' => 'required|min_length[8]',
				'errors' => [
					'matches' => 'Password dont match.',
					'min_length' => 'Password too short.',
				]
			]

		])) {

			$validation = \Config\Services::validation();
            return $this->fail($validation->getErrors());
			
			
		}

		$this->usermdl->save([
			'nama' => htmlspecialchars($this->request->getVar('nama')),
            'tmptlahir' => htmlspecialchars($this->request->getVar('tmptlahir')),
            'tgllahir' => htmlspecialchars($this->request->getVar('tgllahir')),
			'alamat' => htmlspecialchars($this->request->getVar('alamat')),
            'jk' => htmlspecialchars($this->request->getVar('jk')),
            'username' => htmlspecialchars($this->request->getVar('username')),
            'email' => htmlspecialchars($this->request->getVar('email')),
			'password' => htmlspecialchars($this->request->getVar('password')),
			'role_id' => 2
		]);

		$data = [
			'status' => true,
			'message' => "anda berhasil membuat akun",
			'data' => $this->request->getVar()
			
		];

		return $this->respondCreated($data);
	}
	public function login(){

		if (!$this->validate([
			'username' => [
				'label'  => 'Username',
				'rules' => 'required'
			],

			'password' => [
				'label'  => 'Password',
				'rules' => 'required'
			]

		])) {
			

			$validation = \Config\Services::validation();
            return redirect()->to('/Home/login')->withInput();
			
			
			
		
		}

		// KETIKA VALIDASI SUKSES
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');

		$user = $this->usermdl->where(['username' => $username])->first();
		
		// user ada
		if ($user) {

			

				// cek password
				if (($password == $user['password'])) {
					
					$pasien = $this->pasienmdl->cekpasien($user['id_user']);

					$id_pasien = null;

					if($pasien){
						$id_pasien = $pasien['id_pasien'];
					}

					$data = [
							'status' => true,
							'message'=> "anda berhasil login",
							'data' => [
							'id_pasien' => $id_pasien,
							'id_user' => $user['id_user'],
							'nama' => $user['nama'],
							'username' => $user['username'],
							'email' => $user['email']
							]
						
					];
					
				 return $this->respond($data);
					return redirect()->to('/Home/index');

				} else {
					$data = [
							'status' => false,
							'password' => 'Wrong password!'
							
						
					];
					return $this->fail($data);
				}
			
		} else {

			$data =  [
					'status' => false,
					'username' => 'Username is not exist!'
				
				
			];
			return $this->fail($data);
		}
	}

	public function createapi()
	{
		if (!$this->validate([
			'nama' => [
				'label'  => 'Name',
				'rules' => 'required',
			],
            'tmptlahir' => [
				'label'  => 'Tempat Lahir',
				'rules' => 'required',
			],
            'tgllahir' => [
				'label'  => 'Tanggal lahir',
				'rules' => 'required',
			],
            'alamat' => [
				'label'  => 'Alamat',
				'rules' => 'required',
			],
            'jk' => [
				'label'  => 'Jenis Kelamin',
				'rules' => 'required',
			],
            'username' => [
				'label'  => 'username',
				'rules' => 'required|is_unique[user.username]',
				'errors' => [
					'is_unique' => 'This username has already exist.'
				]
			],
			'email' => [
				'label'  => 'Email',
				'rules' => 'required|valid_email|is_unique[user.email]',
				'errors' => [
					'is_unique' => 'This Email has already registered.'
				]
			],

			'password' => [
				'label'  => 'Password',
				'rules' => 'required|min_length[8]',
				'errors' => [
					'matches' => 'Password dont match.',
					'min_length' => 'Password too short.',
				]
			]

		])) {

			// $validation = \Config\Services::validation();

			// return redirect()->to('/product/create')->withInput()->with('validation', $validation);
			// return redirect()->to('/auth/registration')->withInput();
			$validation = \Config\Services::validation();
			
			$data = [
				'status' => false,
				'error' => 400,
				'messages' => $validation->getErrors()
				
			];
			return json_encode($data);
			// return json_encode($validation->getErrors());
		}

		$this->usermdl->save([
			'nama' => $this->request->getPost('nama'),
            'tmptlahir' => $this->request->getPost('tmptlahir'),
            'tgllahir' => $this->request->getPost('tgllahir'),
			'alamat' => $this->request->getPost('alamat'),
            'jk' => $this->request->getPost('jk'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'role_id' => 2
		]);

		$data = [
			'status' => true,
				'error' => 400,
			'data' => $this->request->getPost()
			
		];

		return $json = json_encode($data);
	}

}



?>