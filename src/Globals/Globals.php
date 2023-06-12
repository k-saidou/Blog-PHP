<?php 

class Globals{

    private $POST;
    private $SESSION;

    public function __construct()
    {
        $this->POST = filter_input_array(INPUT_POST) ?? null;
        //$this->SESSION = filter_input_array(INPUT_SESSION) ?? null;
    }

    public function getPOST($key = null){
        if(null !== $key){
            return $this->POST[$key] ?? null;
        }
        return $this->POST;
    }    
    
    public function getSESSION($key = null){
        if(null !== $key){
            return $this->SESSION[$key] ?? null;
        }
        return $this->SESSION;
    }
} 