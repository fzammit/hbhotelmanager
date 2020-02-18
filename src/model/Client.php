<?php

namespace App\Model;

class User
{

    private $id;
    private $firstname;
    private $lastname;
    private $entry_date;
    private $departure_date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEntry_date()
    {
        return $this->entry_date;
    }

    public function setEntry_date($entry_date)
    {
        $this->entry_date = $entry_date;
    }

    public function getDeparture_date()
    {
        return $this->departure_date;
    }

    public function setDeparture_date($departure_date)
    {
        $this->departure_date = $departure_date;
    }
}
