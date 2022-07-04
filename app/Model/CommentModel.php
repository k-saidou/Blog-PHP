<?php
namespace App\Model;

use Core\Model\Model;
class CommentModel extends Model{

    protected $model = 'comment';

    /**
     * Récupère tous les commentaires
     * @return array
     */
     public function all(){
        return $this->query(" SELECT * FROM `comment` ");
    }
}