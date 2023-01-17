<?php

class User
{
    public $id;
    public $login;
    public $password;
    public $email;
    public $telephone;
    public $adress;
    public function __construct($login,$password,$email='',$telephone='',$adress='',$id=0)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->adress = $adress;

    }
    public function Show()
    {
        return "<div>
                    <p>Hallo ".$this->login."</p>
                 
                </div>";
    }


    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        unset($this->id);
        unset($this->login);
        unset($this->password);
        unset($this->email);
        unset($this->telephone);
        unset($this->adress);
    }
}