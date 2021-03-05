<?php namespace App\Models;
 
use CodeIgniter\Model;
use app\Models\FilmModel;
 
class RoleModel extends Model{

    protected $table = 'role';
    protected $allowedFields = ['id_acteur','id_film ','nom_role'];

}
?>

