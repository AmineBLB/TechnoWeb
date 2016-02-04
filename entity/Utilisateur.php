<?php

/**
 * Created by PhpStorm.
 * User: Mohamed-Amine
 * Date: 04/02/2016
 * Time: 20:46
 */
class Utilisateur
{
    private $login;
    private $firstname;
    private $lastname;
    private $password;
    private $email;
    private $telp;

    public function __construct($lg, $fn, $ln, $pass, $email, $telp)
    {
        $this->login = $lg;
        $this->firstname = $fn;
        $this->lastname = $ln;
        $this->password = $pass;
        $this->email = $email;
        $this->telp = $telp;
    }

    function __get($name)
    {
        if (property_exists($this, $name))
            return $this->$name;
    }

    function __set($name, $value)
    {
        if (property_exists($this, $name))
            $this->$name = $value;
    }


}