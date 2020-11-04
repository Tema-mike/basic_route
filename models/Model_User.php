<?php


class _ModelUser {
    public $id_user;
    public $name_user;
    public $email;
    protected $password;
    public $actor;

    public function setActor($actor) {
        $this->actor = $actor;
        $this->actor = 'admin';

    }
    public function showModel() {
        echo $this->id_user . '<br>';
        echo $this->name_user . '<br>';
        echo $this->email . '<br>';
        echo $this->actor . '<br>';
    }
}