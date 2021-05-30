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
use App\Models\PembayaranModel;
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
	
    public function konfirmasi()
	{
		$date = date('Y-m-d');
		$pesan = new PesanModel();
		$pending = new PesanModel();
		$nodriver = new PesanModel();
		$pending = $pending->where('user_id', NULL)->where('supir', '1')
                ->findAll();
		$pesan->db->table('tbl_pesanan');
		$pesan->select('*, tbl_pesanan.status as status_pesan , tbl_pesanan.id as id_pesan , tbl_pesanan.status as status_pesan');
		$pesan->join('users', 'users.id = tbl_pesanan.user_id');
		$pesan->join('tbl_mobil', 'tbl_mobil.id = tbl_pesanan.id_mobil');

		
		$nodriver = $nodriver->where('supir', '0')->where('status', 'running')
				->findAll();
		$pesan = $pesan->where('tbl_pesanan.status', 'running')->where('tbl_pesanan.supir', '1')->findAll();

	
		
		$notif = $this->notif();
		$data = [
			'date' => $date,
			'nodriver' => $nodriver,
			'pending' => $pending,
			'pesan' => $pesan,
			'notif' => $notif,
			'title' => 'History',
			'active' => 'history',	
			'url'	=> 'dashboard/history'	
		];
		return view('layout/admin/history_pesan',$data);
	}

	public function boking()
	{
		$car = new MobilModel();
		$merk = new MerkModel();
		$car->db->table('tbl_mobil');
		$car->select('*, tbl_mobil.id as mobil_id');
		$car->join('tbl_merk', 'tbl_merk.id = tbl_mobil.id_merk');
		$car = $car->findAll();
		$notif = $this->notif();
		$data = [
			'notif' => $notif,
			'title' => 'Tambah Pesanan',
			'active' => 'boking',
			'car' =>	$car,
			'url'	=> 'dashboard/boking'		
		];
		return view('layout/admin/tambah_pesanan',$data);
	}

	function convertdate($date){
		$date = date("Y/m/d", strtotime($date));  
		return $date;
	}

	public function addboking()
	{
		$pesan = new PesanModel();
		$nama_pemesanan = $_POST["nama_pemesanan"];
		$jk = $_POST["jk"];
		$id_mobil = $_POST["id_mobil"];
		$supir = $_POST["supir"];
		$alamat = $_POST["alamat"];
		$tujuan = $_POST["tujuan"];
		$tglmulai = $_POST["tglmulai"];
		$tglakhir = $_POST["tglakhir"];
		$jammulai = $_POST["jammulai"];

		$tglmulai =  $this->convertdate($tglmulai);
		$tglakhir =  $this->convertdate($tglakhir);

		if ($supir=='0') {
			$add = [
				'nama_pemesan' => $nama_pemesanan,
				'jk' => $jk,
				'id_mobil' => $id_mobil,
				'supir' => $supir,
				'alamat' => $alamat,
				'tujuan' => $tujuan,
				'tglmulai' => $tglmulai,
				'tglakhir' => $tglakhir,
				'jammulai' => $jammulai,
				'status' => 'running',
			];
		}else {
			$add = [
				'nama_pemesan' => $nama_pemesanan,
				'jk' => $jk,
				'id_mobil' => $id_mobil,
				'supir' => $supir,
				'alamat' => $alamat,
				'tujuan' => $tujuan,
				'tglmulai' => $tglmulai,
				'tglakhir' => $tglakhir,
				'jammulai' => $jammulai,
			];
		}

		if($pesan->insert($add)){
			return redirect()->back()->withInput()->with('input', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}
	}

	public function driver(){
		$pesan = new PesanModel();
		$user = new UserModel();

		$user = $user->where('id', $this->user_id())
                   ->findAll();
		if ($user[0]['supir']==1) {
			$array = array('user_id' => NULL);
			$pesanan = $pesan->where('supir', '1')->findAll();
			$history = $pesan->where('user_id', $this->user_id())->where('status','sukses')
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
		}else{
			$notif = $this->notif();
			$data = [
				'notif' => $notif,
				'title' => 'Driver',
				'active' => 'driver',	
				'url'	=> 'driver'
			];
			return view('layout/users/driver',$data);
		}
		
	}

	public function konfirmasidriver(){
		$pesan = new PesanModel();
		$pesanid = $_POST['id'];

		
		$data = [
			'user_id' => $this->user_id(),
			'status' => 'running'
		];
		

		if($pesan->update($pesanid, $data)){
			return redirect()->back()->withInput()->with('message', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}
		
	}

	public function konfirmasibayar(){
		$bayar = new PembayaranModel();
		$pesan = new PesanModel();
		$pesanid = $_POST['id'];
		$total = $_POST['jumlahbayar'];
		$tanggalbayar = $_POST['tanggalbayar'];


		//tabel bayar
		$data1 = [
			'pesan_id' => $pesanid,
			'total_bayar' => $total,
			'tanggalbayar' => $tanggalbayar,
		];


		// tabel pesan
		$data2 = [
			'status' => 'sukses'
		];
		
				
		$bayar->transBegin();
		$pesan->transBegin();
		
		$bayar->insert($data1);
		$pesan->update($pesanid, $data2);
		$bayar->transComplete();
		
		if ($bayar->transStatus() === FALSE){
			$bayar->transRollback();
			return redirect()->back()->withInput()->with('error2', $this->auth->error() ?? lang('Auth.badAttempt'));
		}else {
			if ($pesan->transStatus() === FALSE)
				{
					$pesan->transRollback();
					$bayar->transRollback();
					return redirect()->back()->withInput()->with('error2', $this->auth->error() ?? lang('Auth.badAttempt'));
				}
				else
				{
					$pesan->transCommit();
					return redirect()->back()->withInput()->with('message1', $this->auth->error() ??  lang('Auth.loginSuccess'));
				}
		}

	}




	public function ubahdriverpesan(){
		$pesan = new PesanModel();
		$pesanid = $_POST['id'];

		$data = [
			'user_id' => NULL,
			'status' => 'pending'
		];
		
		
		if($pesan->update($pesanid, $data)){
			return redirect()->back()->withInput()->with('message', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
		}
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

	public function mobil()
	{
		$car = new MobilModel();
		$merk = new MerkModel();
		$car->db->table('tbl_mobil');
		$car->select('*, tbl_mobil.id as mobil_id');
		$car->join('tbl_merk', 'tbl_merk.id = tbl_mobil.id_merk');
		$car->orderBy('mobil_id', 'ASC');
		$car = $car->findAll();
		$merk = $merk->findAll();
		$notif = $this->notif();
		$data = [
			'notif' => $notif,
			'title' => 'Tambah Mobil',
			'active' => 'mobil',
			'car' =>	$car,
			'merk' =>	$merk,	
			'url'	=> 'dashboard/mobil'	
		];
		return view('layout/admin/tambah_mobil',$data);
	}

	public function detailmobil($id)
	{
		
		$car = new MobilModel();
		$merk = new MerkModel();
		$car->db->table('tbl_mobil');
		$car->select('*, tbl_mobil.id as mobil_id');
		$car->join('tbl_merk', 'tbl_merk.id = tbl_mobil.id_merk');
		$car = $car->find($id);
		$merk = $merk->findAll();
		
		if ($car==null) {
			$redirectURL = '/dashboard/mobil';
			return redirect()->to($redirectURL)->withInput()->with('notfound', $this->auth->error() ?? lang('Auth.badAttempt'));
		}else{
			$notif = $this->notif();
			$data = [
				'notif' => $notif,
				'title' => 'Tambah Mobil',
				'active' => 'Tambah Mobil',
				'car' =>	$car,
				'merk' =>	$merk,
				'url'	=> 'dashboard/detailmobil'	
			];
			return view('layout/admin/detail_mobil',$data);
		}	
	}

	public function merkmobil()
	{
		$merk = new MerkModel();
		$merk = $merk->findAll();
		$notif = $this->notif();
		$data = [
			'notif' => $notif,
			'title' => 'Tambah Mobil',
			'active' => 'Merk Mobil',
			'merk' =>	$merk,
			'url'	=> 'dashboard/merkmobil'	
		];
		return view('layout/admin/tambah_merk',$data);
	}


	public function addmerkmobil()
	{
		//add
		$merk = new MerkModel();
		$addmerk = $_POST["merk"];
		$add = [
			'merk' => $addmerk,
		];

		if($merk->insert($add)){
			return redirect()->back()->withInput()->with('input', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}
	}

	public function addmobil()
	{
		$id_merk = $_POST["id_merk"];
		$nama = $_POST["nama"];
		$warna = $_POST["warna"];
		$jumlah_kursi = $_POST["jumlah_kursi"];
		$no_polisi = $_POST["no_polisi"];
		$tahun_beli = $_POST["tahun_beli"];
		$harga = $_POST["harga"];
		
		$car = new MobilModel();
		$add = [
			'id_merk' => $id_merk,
			'nama' => $nama,
			'warna' => $warna,
			'harga' => $harga,
			'jumlah_kursi' => $jumlah_kursi,
			'no_polisi' => $no_polisi,
			'tahun_beli' => $tahun_beli
		];

		if($car->insert($add)){
			return redirect()->back()->withInput()->with('input', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}
	}

	public function hapusmerk($id)
	{
		//add
		$merk = new MerkModel();

		if($merk->delete($id)){
			return redirect()->back()->withInput()->with('input', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}
	}

	public function updatemerkmobil()
	{
		//add
		$merk = new MerkModel();
		$addmerk = $_POST["merk"];
		$id = $_POST["id"];
		$update = [
			'merk' => $addmerk,
		];

		if($merk->update($id,$update)){
			return redirect()->back()->withInput()->with('update', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}

		//shows
		
	}

	public function updatemobil()
	{
		//add 

		$id = $_POST["mobil_id"];
		$id_merk = $_POST["id_merk"];
		$nama = $_POST["nama"];
		$warna = $_POST["warna"];
		$jumlah_kursi = $_POST["jumlah_kursi"];
		$no_polisi = $_POST["no_polisi"];
		$tahun_beli = $_POST["tahun_beli"];
		$harga = $_POST["harga"];
		
		$car = new MobilModel();
		
		$validated = $this->validate([
			'mobil' => [
				'uploaded[mobil]',
				'mime_in[mobil,image/jpg,image/jpeg,image/gif,image/png]',
				'max_size[mobil,4194]',
			],
		]);
		if ($validated) {
			 $cars = $car->find($id);
			 $cars = $cars["image"];
			 $file = $this->request->getFile('mobil');
			 $name = $file->getName();
			 if($cars=='mobildefault.png'){
				$file->move('assets/img/mobil/',"$id-$name");
				$data = [
				   'image' => "$id-$name",
			   ];
			 }else{
				if(unlink('assets/img/mobil/'. $cars)){
					
				}
				$file->move('assets/img/mobil/',"$id-$name");
				$data = [
				   'image' => "$id-$name",
			   ];
			 }
			 $update = [
				'id_merk' => $id_merk,
				'nama' => $nama,
				'warna' => $warna,
				'harga' => $harga,
				'jumlah_kursi' => $jumlah_kursi,
				'no_polisi' => $no_polisi,
				'tahun_beli' => $tahun_beli,
				'image' => "$id-$name"
			];
		}else{
			$update = [
				'id_merk' => $id_merk,
				'nama' => $nama,
				'warna' => $warna,
				'harga' => $harga,
				'jumlah_kursi' => $jumlah_kursi,
				'no_polisi' => $no_polisi,
				'tahun_beli' => $tahun_beli,
			];
		}
		
		if($car->update($id,$update)){
			return redirect()->back()->withInput()->with('update', $this->auth->error() ??  lang('Auth.loginSuccess'));
		}else {
			return redirect()->back()->withInput()->with('error1', $this->auth->error() ?? lang('Auth.badAttempt'));
		}	
	}

	public function changeuser(){
		$user = new UserModel();
		$id = $_POST['id'];
		$users = $user->find($id);
		
		if($users['supir']){
			$data = [
				'supir' => 0,
			];
			if ($user->update($id, $data)) {
				return redirect()->back()->withInput()->with('change', $this->auth->error() ??  lang('Auth.loginSuccess'));
			}else {
				return redirect()->back()->withInput()->with('errorchange', $this->validator->getErrors());
			}
		}else{
			$data = [
				'supir' => 1,
			];
			if ($user->update($id, $data)) {
				return redirect()->back()->withInput()->with('change', $this->auth->error() ??  lang('Auth.loginSuccess'));
			}else {
				return redirect()->back()->withInput()->with('errorchange', $this->validator->getErrors());
			}
		}
	}
	
	public function supir()
	{
		$user = new UserModel();
		$grup = new GrupModel();
		$supir = $user->where('supir', 1)->get()->getResult();
		
		$grup->db->table('auth_groups_users');
		$grup->select('*');
		$grup->join('users', 'users.id = auth_groups_users.user_id');
		$array = array('group_id' => 1, 'supir' => 0);
		$grups = $grup->where($array)->get()->getResult();

		$notif = $this->notif();
		$data = [
			'supir' => $supir,
			'user'  => $grups,
			'notif' => $notif,
			'title' => 'profile',
			'active' => 'supir',	
			'url'	=> 'dashboard/supir'	
		];
		return view('layout/admin/tambah_supir',$data);
	}

	public function tuneup()
	{
		$data = [
			'title' => 'profile',
			'active' => 'profile',	
			'url'	=> 'dashboard/tuneup'	
		];
		return view('layout/admin/tuneup',$data);
	}

	public function analisis()
	{
		$data = [
			'title' => 'profile',
			'active' => 'profile',		
		];
		return view('layout/admin/home',$data);
	}

    public function gajisupir()
	{
		$data = [
			'title' => 'profile',
			'active' => 'profile',		
		];
		return view('layout/admin/gaji_supir',$data);
	}

    public function bensin()
	{
		$data = [
			'title' => 'profile',
			'active' => 'profile',		
		];
		return view('layout/admin/bensin',$data);
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