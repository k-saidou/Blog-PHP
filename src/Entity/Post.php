<?php
namespace App\Entity;


class Post 
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $titre;

    /**
     * @var string
     */
    private string $chapo;

    /**
     * @var string
     */
    private string $contenu;

    /**
     * @var string
     */
    private string $creationTime;

    /**
     * @var string
     */
    private string $updateTime;


    /**
     * @var int
     */
    private int $id_user;

    public function __construct($datas = [])
    {
        if (!empty($datas))
        {
            $this->hydrate($datas);
        }
    }

    public function hydrate($datas): void
    {
        foreach ($datas as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Post
     */
    public function setTitre(string $titre): Post
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }

    /**
     * @param string $chapo
     * @return Post
     */
    public function setChapo(string $chapo): Post
    {
        $this->chapo = $chapo;
        return $this;
    }

    /**
     * @return string 
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     * @return Post
     */
    public function setContenu(string $contenu): Post
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreationTime(): string
    {
        return $this->creationTime;
    }

    /**
     * @param string $creationTime
     * @return Post
     */
    public function setCreationTime(string $creationTime): Post
    {
        $this->creationTime = $creationTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateTime(): string
    {
        return $this->updateTime;
    }

    /**
     * @param string $updateTime
     * @return Post
     */
    public function setUpdateTime(string $updateTime): Post
    {
        $this->updateTime = $updateTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     * @return Post
     */
    public function setIdUser(int $id_user): Post
    {
        $this->id_user = $id_user;
        return $this;
    }



}