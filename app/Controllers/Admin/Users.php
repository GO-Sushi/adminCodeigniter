<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Users extends BaseController
{

	public function index(){

			/** exemple de passage de variable a une vue */ 
			$data = [
				'page_title' => 'Admin > User Liste' ,
				'aff_menu'  => true
			];
	

		echo view('common/HeaderAdmin' , 	$data);
		echo view('Admin/Users');
		echo view('common/FooterSite');

	}

	

}
