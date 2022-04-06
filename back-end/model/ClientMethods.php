<?php


require_once __DIR__."/Connection.php";

class ClientMethods extends Connection{


    public function getProduct(){

        $query=$this->connect()->prepare("SELECT * FROM contact");
            if($query->execute()){
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return 0;
            }
    
    }


    function add($email,$message)
    {
    
       
            $query=$this->connect()->prepare("INSERT INTO `contact`(`email`,`message`) VALUES ('$email','$message')");
            if($query->execute()){
                return true;
                
            }else{
                return false;
            }
    }


    public function signInClient($data)
    {
        
        if(isset($_POST['submit'])){
           
            $query = "SELECT (`email`, `loginKey`) FROM `client` WHERE `email` = '$data[email]' AND `loginKey` = '$data[loginKey]'";
            $log = $this->connect()->prepare($query);
            $log->execute();
            $res = $log->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
        
        
    }

    public function signInClient2($email,$password)
    {
        if(isset($_POST['submit']))
        {
            
            $query = "SELECT FROM `client` WHERE  email='$email' AND password='$password'";
            // $query = "SELECT * FROM `client` WHERE  email='$email'";
            $log = $this->connect()->prepare($query);
            $log->execute();
            $res = $log->fetch(PDO::FETCH_ASSOC);
            return $res;
              
         
        }
    }


    // public function check($email)
    // {
    //     $query = "SELECT * FROM `client` WHERE  email='$email'";
    //     $log = $this->connect()->prepare($query);
    //     $log->execute();
    //     $res = $log->fetch(PDO::FETCH_ASSOC);
    //     return $res;
    // }

    // public function SignUp($email,$hashed_password,$Fname,$Lname,$age)
    // {

    //     if($this->check($email)==null)
    //     {
    //         $query = "INSERT INTO client (email, loginKey, Fname, Lname, age) VALUES ('$email', '$hashed_password', '$Fname', '$Lname', '$age')";
    //         $log = $this->connect()->prepare($query);
    //         $log->execute();
    //         if($log){
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }
        
        
    // }


    // public function SignUpC($email,$hashed_password, $Fname, $Lname, $age)
    // {

    //     $query = "INSERT INTO client(email, loginKey, Fname, Lname, age) VALUES ('$email, '$hashed_password', '$Fname', '$Lname', '$age')";
    //     $log = $this->connect()->prepare($query);
    //     $log->execute();
    //     if($log){
    //         return true;
    //     }else{
    //         return false;
    //     }

    // }


    public function SignUp($data)
    {

        $query = "INSERT INTO client(email, loginKey, Fname, Lname, age) VALUES ('$data[email]','$data[loginKey]','$data[Fname]','$data[Lname]','$data[age]')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if($log){
            return true;
        }else{
            return false;
        }

    }

    

    


    

}