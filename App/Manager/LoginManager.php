<?php


namespace App\Manager;


use App\Core\Model;
use App\Model\User;

class LoginManager extends Model

{
    /**
     * @var string
     */
    protected $model = User::class;
    /**
     * @var string
     */
    protected $table_name = 'users';

    public function getLogin($user_name)
    {
        $req = 'SELECT * FROM ' . $this->table_name . ' WHERE user_name =' . $user_name .';' ;
        //$sql = 'SELECT * FROM ' . $this->table_name . ';';
        return $this->custom_query($req);
    }

    public function getStatus($user_name)
    {
        $req = 'SELECT user_status FROM ' . $this->table_name . ' WHERE user_name ="' . $user_name .'";' ;
        return $this->custom_query($req);
    }

    public function findByUsername($name)
    {
        $req = 'SELECT * FROM users WHERE name = ' . $name ;
        return $this->custom_query($req);
    }

    public function checkEmail()
    {

    }

    public function checkPassword($password, $user)
    {


    }

    public function registerUser()
    {

    }



    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setEmail($row['email']);
        $user->setStatus($row['status']);

        return $user;
    }





}