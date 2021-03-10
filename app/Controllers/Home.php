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

			switch ($type){

				case "realisateur":
					//affichage des realisateur en fonction de leurs films
						$marecherche=$this->filmsModel->like("id_realisateur")
						->orderBy('id', 'DESC')->paginate(12);
					break;
				
				case "genre": 
					//affichage des realisateur en fonction des genres
					//utiliser la fonction lower pour convertir en minuscule la chaine reçus :
					// SELECT * FROM `films` WHERE lower(genre)=lower('Drame')

						$marecherche=$this->filmsModel->like("genre",$elementRecherche ,'both',null,true)
						->orderBy('id', 'DESC')->paginate(12);
					break;

				case"pays":
					//affichage des realisateur en fonction des genres
					$marecherche=$this->filmsModel->like("code_pays",$elementRecherche ,'both',null,true)
					->orderBy('id', 'DESC')->paginate(12);
					break;

				case "recherche":
					//navigateur de recherche pour trouver un element par rapport au type 
					$marecherche=$this->filmsModel->like( "titre",$elementRecherche ,'both',null,true)->orlike("resume",$elementRecherche ,'both',null,true)
						->orderBy('id', 'DESC')->paginate(12);


				
			}
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