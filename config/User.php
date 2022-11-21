<?php

    class User{

        public $id;
        public $usuario;
        public $password;
    }



    
    interface userInterface{

        public function create(User $user);
        
        


    }