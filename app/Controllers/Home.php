<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$data['user'] = $this->db->table('user')->getWhere(['id' => session('id')])->getRow();

		$data['title'] = 'Home';
		return view('home', $data);
	}

	public function generate()
	{

		echo password_hash('12345', PASSWORD_DEFAULT);
	}
}
