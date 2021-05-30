<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


//=========================================================
    public  function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    // Regsiter user
    public function insertMultiUsers($data){


        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1;
        $password = '';
       foreach ($data as $val){
           $n = rand(0, $alphaLength);
//           $pass[] = $alphabet[$n];
//           $password = implode($pass);


           $password = $this->random_password(8);

           if($this->findUserByEmail($val->email) == false) {


               $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
               // Bind values
               $this->db->bind(':name', $val->name);
               $this->db->bind(':email', $val->email);
               $this->db->bind(':password', $password);

               // Execute
               if ($this->db->execute()) {
                   continue;
               } else {
                   return false;
               }

           }

       }


    }

//=========================================================

   // Regsiter user
   public function addUser($data){
    $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
    // Bind values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if($this->db->execute()){

      return true;
    } else {
      return false;
    }
  }

//=========================================================
    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
//=========================================================
    // Login User
    public function login($email, $password){

      $return = '';

      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

     $return = $this->db->single();

     if($return){
         $this->db->query('SELECT * FROM users WHERE password = :password');
         $this->db->bind(':password', $password);
     }

        if($return = $this->db->single()){
            return $return;
        } else {
            return false;
        }

      $hashed_password = $return->password;
      if(password_verify($password, $hashed_password)){
        return $return;
      } else {
        return false;
      }
    }
//=========================================================
    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
//=========================================================
    // Get User by ID
    public function getUserById($id){


      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id,'');

      $row = $this->db->single();

      return $row;
    }

//=========================================================
     public function getUsers() {

      $this->db->query('SELECT * FROM users');
      $result = $this->db->resultSet();
      return $result;
     }


  }
