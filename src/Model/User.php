<?php

namespace App\Model;

class User{

    private ?int $id;
    private string $username;
    private string $password;
    
    public function __construct(int|null $id, string $username, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}