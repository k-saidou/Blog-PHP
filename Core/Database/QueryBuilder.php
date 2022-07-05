<?php
namespace Core\Database;

class QueryBuilder{

    private $fields = [];
    private $conditions = [];
    private $from = [];

    public function select(){
        $this->fields = func_get_args();
        return $this;
    }

    public function where(){
        foreach(func_get_args() as $arg){
            $this->conditions[] = $arg;
        }
        return $this;
    }

    public function from($model, $alias = null){
        if(is_null($alias)){
            $this->from[] = $model;
        }else{
            $this->from[] = "$model AS $alias";
        }
        return $this;
    }

    public function __toString(){
        return 'SELECT '. implode(', ', $this->fields)
            . ' FROM ' . implode(', ', $this->from)
            . ' WHERE ' . implode(' AND ', $this->conditions);
    }

}