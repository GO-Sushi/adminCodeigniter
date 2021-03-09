<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\FilmModel;
use App\Models\GenreModel;
use App\Models\RoleModel;
use App\Models\ArtisteModel;


class Home extends BaseController
{
	public $genresModel = null;
	public $filmsModel = null;
	public $rolesModel = null;
	public $artisteModel = null;

	public function __construct()
	{
		/******** Initialisation des models appelés  *****/
		 $this->rolesModel = new RoleModel();
         $this->filmsModel = new FilmModel();
		 $this->genresModel = new GenreModel();
		 $this->artistesModel = new ArtisteModel();
	}
	

	
	public function index($type=null , $elementRecherche=null )
	{
		$marecherche=$this->filmsModel->orderBy('id', 'DESC')->paginate(12);
		if(!empty($type) && (!empty($elementRecherche))){
		$marecherche=$this->filmsModel->where("id_realisateur",$elementRecherche )->orderBy('id', 'DESC')->paginate(12);
		}

		$nameGenre = $this->genresModel;
		$nameActeurs = $this->artistesModel;
		$titre=null;

	
		/**************************************************************** 
		  ** data corresponds au données que je souhaite passer a ma vue 
		*****************************************************************/ 
		$data = [
			'page_title' => 'Les differents films du site' ,
			'aff_menu'  => true, 
			'tabFilms'=> $marecherche,
			'pager'=>  $this->rolesModel->pager,
		];
		
		echo view('common/HeaderSite' , $data);
		echo view('Site/Index' , $data);
		echo view('common/FooterSite');

	}

}