<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()	{
		echo 'Hello';
	}

	public function checkRole($username) {
		$_SESSION['admin'] = $username;
	}

  public function dashboard() {
		var_dump($_SESSION['admin']);
	}
}
