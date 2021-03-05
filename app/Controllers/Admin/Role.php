<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\ArtisteModel;

class Role extends BaseController
{
	public $roleModel = null;
    public $artisteModel = null;


    public function __construct(){

		$this->roleModel = new RoleModel();
        $this->artisteModel = new ArtisteModel();
    
    }
	public function index(){

		

		$listeroles = $this->roleModel->findAll();

			//dd($listeroles);

			/** exemple de passage de variable a une vue */ 
			$data = [   'artisteModel'=>$this->artisteModel,
						'roles' => $this->roleModel->orderBy('id_acteur','DESC')->paginate(10),
            			'pager' => $this->roleModel->pager,
						'page_title' => 'Admin > roles Liste' ,
						'aff_menu'  => true ,
					];
						echo view('common/HeaderAdmin' , 	$data);
						echo view('Admin/Role/Liste' ,         $data);
						echo view('common/FooterSite');

	}

    public function edit($id=null){
        if(!empty($this->request->getVar('save'))){
            //$rules permet de controller les données saisie dans le formulaire 
            //exemple : nom , est requis , longueur min=3 , longueur max = 20 
            $rules = [
                'id_film'          => 'required',
                'nom_role'         => 'required',
            ];
             //this validate va traiter $rules 
             //dd($rules);
            if($this->validate($rules)){
               
                $data = [
            //les clée conrespondeent aux champ dans Artiste model
                    'id_film'     => $this->request->getVar('id_film'),
                    'nom_role'    => $this->request->getVar('nom_role'),
                ]; 
            //dd($data);
                if($this->request->getVar('save')=='update'){
                    $this->roleModel->where('id_film',$id)->set($data)->update();
                }else{
                    $this->roleModel->save($data);
            //return redirect()->to('/Admin/Artiste');
                }
                
            }
        }
        /** exemple de passage de variable a une vue */ 
        $data = [
            'roles'=>$roles,
            'page_title' => 'Admin > Artiste Liste' ,
            'aff_menu'  => true ,
        ];

        echo view('common/HeaderAdmin' , 	$data);
        echo view('Admin/Artiste/Edit' ,         $data);
        echo view('common/FooterSite');
    }


}






