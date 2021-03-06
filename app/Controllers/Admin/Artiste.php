<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ArtisteModel;

class Artiste extends BaseController
{
	public $artisteModel = null;

    public function __construct(){

		$this->artisteModel = new ArtisteModel();
    
    }

	public function index(){

		

		$listeArtistes = $this->artisteModel->findAll();

			//dd($listeArtistes);

			/** exemple de passage de variable a une vue */ 
			$data = ['artistes'=>$listeArtistes,
						'artistes' => $this->artisteModel->orderBy('id','DESC')->paginate(10),
            			'pager' => $this->artisteModel->pager,
						'page_title' => 'Admin > Artiste Liste' ,
						'aff_menu'  => true ,
					];
						echo view('common/HeaderAdmin' , 	$data);
						echo view('Admin/Artiste/Liste' ,         $data);
						echo view('common/FooterSite');

	}

	public function edit($id=null){

		
		

			//dd($listeArtistes);
			//je controle si je viens de mon formulaire 
			/********************************************************************
			 * 
			 * on verifie que la variable save existe 
			 * si elle existe ça veux dire que quelqu'un a poster un formulaire 
			 * 
			 * ******************************************************************/
			if(!empty($this->request->getVar('save'))){
				//$rules permet de controller les données saisie dans le formulaire 
				//exemple : nom , est requis , longueur min=3 , longueur max = 20 
				$rules = [
					'nom'          => 'required',
					'prenom'         => 'required',
					'annee_naissance'      => 'required'
				];
				 //this validate va traiter $rules 
				 //dd($rules);
				if($this->validate($rules)){
					$data = [
				//les clée conrespondeent aux champ dans Artiste model
						'nom'     => $this->request->getVar('nom'),
						'prenom'    => $this->request->getVar('prenom'),
						'annee_naissance'    => $this->request->getVar('annee_naissance')
					]; 
				//dd($data);
				if($save == "update")
				{
						$file = $this->request->getFile('imageArtiste'); //1. JE RECUPERE LES INFOS DE L'IMAGE
						if($file)
						{	
							if ($file->isValid() && ! $file->hasMoved())
							{
								$newName = $file->getRandomName();
								$file->move(ROOTPATH.'/public/uploads', $newName);
								$dataSave["image"] = $newName;
							}
						} 
						$this->artistesModel->where('id', $id)
						->set($dataSave)
						->update();
						//return redirect()->to('/admin/Artistes');
					} else { 
						$this->artistesModel->save($dataSave);
						return redirect()->to('/admin/Artistes');
					}
					
				}
			}
			/** exemple de passage de variable a une vue */ 
			$formArtiste=$this->artisteModel->where('id',$id)->first();
			$data = [
				'formArtiste'=>$formArtiste,
				'page_title' => 'Admin > Artiste Liste' ,
				'aff_menu'  => true ,
			];
	
			echo view('common/HeaderAdmin' , 	$data);
			echo view('Admin/Artiste/Edit' ,         $data);
			echo view('common/FooterSite');
		}

		public function delete($id=0){
		
			$this->artisteModel->where('id',$id)->delete();
				return redirect()->to('/admin/artiste/');
		}
		
}
?>