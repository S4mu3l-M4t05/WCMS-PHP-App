<?php
class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $active;
    private $firstname;
    private $lastname;
    
    public function __construct(array $userData) {
        if (isset($userData['id'])) {
            $this->id = $userData['id'];
        }
        if (isset($userData['username'])) {
            $this->username = $userData['username'];
        }
        if (isset($userData['password'])) {
            $this->password = $userData['password'];
        }
        if (isset($userData['email'])) {
            $this->email = $userData['email'];
        }
        if (isset($userData['active'])) {
            $this->active = $userData['active'];
        }
        if (isset($userData['firstname'])) {
            $this->firstname = $userData['firstname'];
        }
        if (isset($userData['lastname'])) {
            $this->lastname = $userData['lastname'];
        }
        if (isset($userData['level'])) {
            $this->level = $userData['level'];
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getactive() {
        return $this->active;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }
    
    public function getLastname() {
        return $this->lastname;
    }
    
    public function setUsername(string $username) {
        $this->username = $username;
    }
    
    public function setPassword(string $password) {
        $this->password = $password;
    }
    
    public function setEmail(string $email) {
        $this->email = $email;
    }
    
    public function setactive(int $active) {
        $this->active = $active;
    }
    
    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    
    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }
    
    public function getLevel() {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }
}
