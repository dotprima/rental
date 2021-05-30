<?php

namespace App\Controllers;
use Config\Services;
use Config\Email;
use CodeIgniter\Controller;
use Myth\Auth\Entities\User;
use App\Models\UserModel;
use App\Models\MobilModel;
use App\Models\MerkModel;
use App\Models\NotifModel;
use App\Models\PesanModel;
use App\Models\GrupModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Files\UploadedFile;

class Dashboard extends BaseController
{
	protected $auth;
	/**
	 * @var Auth
	 */
	protected $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
	}
	
	function user_id()
	{
		$authenticate = Services::authentication();
		$authenticate->check();
		return $authenticate->id();
	}
	
	public function index()
	{
        $notif = $this->notif();
		$data = [
			'notif' => $notif,
            'title' => 'Home',
            'active' => 'dashboard',	
			'url'	=> 'dashboard'
         ];
         return view('layout/dashboard/home',$data);
	}
	
	public function notifikasi($data,$id){
		$notif = new NotifModel();
		$data = [
			'notifikasi' => $data,
			'id_user' => $this->user_id(),
			'id_notif' => $id,
		];
		$notif->insert($data);
	}

	public function notif(){
		$notif = new NotifModel();
		$notif=$notif->where('id_user',$this->user_id())->orderBy('created_at', 'desc')->limit(5)->get();
		return $notif;
	}
	
	function convertdate($date){
		$date = date("Y/m/d", strtotime($date));  
		return $date;
	}


	public function driver(){
		$pesan = new PesanModel();
		$pesanan = $pesan->where('user_id', NULL)
                   ->findAll();
		$history = $pesan->where('user_id', $this->user_id())
                   ->findAll();		  

		$notif = $this->notif();
		$data = [
			'pesan' => $pesanan,
			'history' => $history,
			'notif' => $notif,
            'title' => 'Driver',
            'active' => 'driver',	
			'url'	=> 'driver'
         ];
        
		return view('layout/users/driver',$data);
	}

	public function konfirmasidriver(){
		var_dump($_POST);
	}

	public function profile()
	{
		$notif = $this->notif();
		$data = [
			'notif' => $notif,
			'title' => 'profile',
			'active' => 'profile',
			'url'	=> 'dashboard/profile'		
		];
		return view('layout/dashboard/profile',$data);
	}

	public function addprofileimage()
	{
		$id = $_POST['id'];
		$validated = $this->validate([
			'avatar' => [
				'uploaded[avatar]',
				'mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]',
				'max_size[avatar,4194]',
			],
		]);
		if ($validated) {
			 $user = new UserModel();
			 $users = $user->find($id);
			 $users = $users["image"];
			 $file = $this->request->getFile('avatar');
			 $name = $file->getName();
			 if($users=='default.png'){
				$file->move('assets/img/user/',"$id-$name");
				$data = [
				   'image' => "$id-$name",
			   ];
			 }else{
				unlink('assets/img/user/'. $users);
				$file->move('assets/img/user/',"$id-$name");
				$data = [
				   'image' => "$id-$name",
			   ];
			 }
			$notif='Edit Gambar Profile';
			$user->update($id, $data);
			$this->notifikasi($notif,1);
			 return redirect()->back()->withInput()->with('upload', $this->validator->getErrors());
		}else{
			 return redirect()->back()->withInput()->with('errorupload', $this->validator->getErrors());
		}  
	}


	public function editpassword(){
		$rules = [
			'login'	=> 'required',
			'password' => 'required',
		];
		if ($this->config->validFields == ['email'])
		{
			$rules['login'] .= '|valid_email';
		}

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors1', $this->validator->getErrors());
		}

		$login = $this->request->getPost('login');
		$password = $this->request->getPost('password');
		$remember = (bool)$this->request->getPost('remember');

		// Determine credential type
		$type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		// Try to log them in...
		if (! $this->auth->attempt([$type => $login, 'password' => $password], $remember))
		{
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}

	
		$id = $_POST["id"];
		$pw1 = $_POST["pw1"];
		$pw2 = $_POST["pw2"];
		
		$pw = model('UserModel');


		$cek = strcmp($pw1, $pw2);
		if ($cek)
		{
			return redirect()->back()->withInput()->with('same', $this->auth->error() ?? lang('Auth.badAttempt'));
		}

		$data = [
			'password' => $pw1
		];
		$user = new User($data);
		
		$data1 = [
			'password_hash' => $user->password_hash,
		];

		$pw->update($id, $data1);
		$notif='Kata Sandi Telah Di ubah';
		$this->notifikasi($notif,2);
		return redirect()->back()->withInput()->with('message1', $this->auth->error() ??  lang('Auth.loginSuccess'));
	}

	public function editprofil()
	{
		
		$rules = [
			'login'	=> 'required',
			'password' => 'required',
		];
		if ($this->config->validFields == ['email'])
		{
			$rules['login'] .= '|valid_email';
		}

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$login = $this->request->getPost('login');
		$password = $this->request->getPost('password');
		$remember = (bool)$this->request->getPost('remember');

		// Determine credential type
		$type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		// Try to log them in...
		if (! $this->auth->attempt([$type => $login, 'password' => $password], $remember))
		{
			return redirect()->back()->withInput()->with('error', $this->auth->error() ?? lang('Auth.badAttempt'));
		}

		$user = new UserModel();
		$id = $_POST["id"];
		$fullname = $_POST["fullname"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$notelepon = $_POST["notelepon"];

		$data = [
			'fullname' => $fullname,
			'email' => $email,
			'username' => $username,
			'notelepon'    => $notelepon
		];
		
		$user->update($id, $data);
		$notif='Data Profil Telah Di ubah';
		$this->notifikasi($notif,3);
		return redirect()->back()->withInput()->with('message', $this->auth->error() ??  lang('Auth.loginSuccess'));
	}


}