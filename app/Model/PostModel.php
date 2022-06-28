<?php
namespace App\Model;

use Core\Model\Model;
class PostModel extends Model{

    protected $model = 'articles';

    /**
     * Récupère les derniers article
     * @return array
     */
     public function all(){
        return $this->query(" SELECT * FROM `articles` ");
    }
}