<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 

		$this->affichageFormLogin('connexion à wwww.site.com',false);
	}

	public function connexion()
    {
        //include helper form
        //helper('form');
        //set rules validation form
        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
           
            $users = $model->where('userEmail',$this->request->getVar('email'))
                             
                               ->findAll();
            d($users);
            foreach ($users as $user) 
            {
            /************************** On boucle jusqu'a ce que l'on trouve un mot de passe correcte ********************************/
               if(password_verify($this->request->getVar('password'), $user['userPassword']))
               {
                $this->session->set(['id'=>[$user['userId']]]);
                return redirect()->to('/Admin/Acceuil');
            }
            }
            
            /******* Si il ne trouve pas de mot de passe correcte apres avoir parcouru la boucle ou qu'il n'y a pas de resultats ***********/
           
        }else{
            
            $data = [
                'page_title' => 'Register à wwww.site.com' ,
                'aff_menu'  => false,
                'validation' => $this->validator
            ];
    
            $this->affichageFormLogin('connexion à wwww.site.com',false);
        }
         
    }

    private function affichageFormLogin($pagetitle='',$affmenu=false,$validation=null){

        $data = [
            'page_title' =>  $pagetitle,
            'aff_menu'  => $affmenu,
            'validation' => $validation
        ];
        echo view('common/HeaderAdmin' , 	$data);
        echo view('Site/Login', $data);
        echo view('common/FooterSite');
    }
}