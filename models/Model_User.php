<?php


class Model_User extends Model_Base {
    public $id_u;
    public $name_u;
    public $email_u;
    protected $password_u;
    public $actor = 'user';

    public function tableFields(){
        return array(
            'Id_user' => $this->id_u,
            'Name_user' => $this->name_u,
            'Email_user' => $this->email_u,
            'Password_user' => $this->password_u,
            'Actor' => $this->actor
        );
    }
}