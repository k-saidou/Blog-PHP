<?php
namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\String\StringExtension;
use Twig\Extra\CssInliner\CssInlinerExtension;
use src\models;
use Src\models\Post;
use Src\models\PostModel;

abstract class AbstractController{

    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
       // require_once(ROOT.'src/models/'.$model.'.php');
        
        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new PostModel();
        }

    private $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(ROOT. '/src/views');
        $this->twig = new Environment($this->loader);
        $this->twig->addExtension(new StringExtension());
        $this->twig->addExtension(new CssInlinerExtension());
    }

    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){

        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'src/views/'.strtolower(get_class($this)).'/'.$fichier.'.html.twig');
    }
}