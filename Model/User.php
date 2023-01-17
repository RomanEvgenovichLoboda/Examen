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
        return "<p>Id - ".$this->id."</p>
            <p>Name - ".$this->login."</p>
            <p>Prc(grn) - ".$this->password."</p>
            <p>eMail - ".$this->email."</p>
            <p>Tel - ".$this->telephone."</p>
            <p>Adr- ".$this->adress."</p>";
    }
    public function Edit(){
        return" <input class='w-100 form-control' name='uspas' value='".$this->password."'>Password</input>
            <input type='number' class='w-100 form-control' name='ustel' value='".$this->telephone."'>Telephone</input>
            <input class='w-100 form-control' name='usmail' value='".$this->email."'>eMail</input>
            <input class='w-100 form-control' name='usadr' value='".$this->adress."'>Adress</input><p></p>";
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