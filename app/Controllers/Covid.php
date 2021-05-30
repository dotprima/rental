<?php

namespace App\Controllers;

class Covid extends BaseController
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

	public function index()
	{
		$response = file_get_contents('https://covid19.mathdro.id/api');
		$response = json_decode($response ,true);

		return view('covid',$response);
	}

	public function getjson($url){
		$data = file_get_contents($url);
		$data = json_decode($data ,true);
		return $data;
	}

	public function search($url)
	{
		$negara = "https://covid19.mathdro.id/api/countries/$url";
		$name = "https://covid19.mathdro.id/api/countries/";

		$response = $this->getjson($negara);
		$name = $this->getjson($name);

		for ($i=0; $i < count($name["countries"]) ; $i++) { 
			try {
				if ($name["countries"][$i]['iso2']==$url) {
					$name = $name["countries"][$i]['name'];
					break;
				}
			} catch (\Throwable $th) {
				
			}
		}

		var_dump($response);

		$world = $this->getjson('https://covid19.mathdro.id/api');
		$confirmed = $this->getjson($response['confirmed']['detail']);
		$logo = "https://www.countryflags.io/$url/flat/64.png";
		$data = [
			'response' => $response,
			'negara' => $name,
			'confirmed'  => $confirmed,
			'world'  => $world,
			'logo'  => $logo
         ];
		 
		return view('searchcovid',$data);
	}
	
	
}