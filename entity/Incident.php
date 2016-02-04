<?php

/**
 * Created by PhpStorm.
 * User: Mohamed-Amine
 * Date: 29/01/2016
 * Time: 09:24
 */
class Incident
{
    //private $_id;
    private $_description;
    private $_type;
    private $_adresse;
    private $_severite;
    private $_reference;
    private $_imgURI;

    public function __construct($descr, $type, $adresse, $sev, $ref, $imgURI)
    {
        $this->_description = $descr;
        $this->_type = $type;
        $this->_adresse = $adresse;
        $this->_severite = $sev;
        $this->_reference = $ref;
        $this->_imgURI = $imgURI;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function getSeverite()
    {
        return $this->_severite;
    }

    public function getReference()
    {
        return $this->_reference;
    }

    public function getImgURI()
    {
        return $this->_imgURI;
    }

}