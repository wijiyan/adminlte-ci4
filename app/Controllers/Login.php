<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		session()->setFlashdata('TEST');
		return view('login');
	}
}
