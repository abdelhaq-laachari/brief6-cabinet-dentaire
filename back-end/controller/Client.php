<?php


header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");


require __DIR__."../../model/ClientMethods.php";

session_start();

 class Client
{

    // Home Page
    public function index()
    {
        require_once __DIR__."/../view/home.php";
        
    }
   
    // get client page
    public function get()
    {
        $methods = new ClientMethods();
        $json= json_encode($methods->getProduct());
        echo $json;
        
    }



    public function add()
    {
        $methods = new ClientMethods();
        // $email = json_decode(file_get_contents("php://input"));
        // $message = json_decode(file_get_contents("php://input"));
        $email = $_POST['email'];
        $message = $_POST['message'];
        // if($methods->add($email->email,$message->message) )
        if($methods->add($email,$message) )
       {
           http_response_code(200);
           echo json_encode(array("message" => "inserted"));
       }
       else{
           http_response_code(400);
           echo json_encode(array("message" => "error"));
       }
    }





    // dashboard client page
    public function dashboard()
    {
        $error = '';
    
        if(!empty($_SESSION['id_client']))
        {    
            require_once __DIR__."/../view/dashboard.php";
        }
        else{
            require_once __DIR__."/../view/signIn.php";
        }
    }



    // sign in form
    public function signIn()
    {
        // error msg
        $error = "";
        // require sign in form from view
        // require_once __DIR__."/../view/signIn.php";

        $email = $_POST['email'];
        $password = $_POST['password'];

        $logC = new ClientMethods();

        $var=$logC->signInClient2($email,$password);
        
        if($var)
        {   
            $_SESSION['id_client'] =$var['id_client'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
                
            // header("Location: http://localhost/youcode/back-end/client/dashboard");
            echo json_encode(array("message" => "true"));
            
        }
        else{
            $error = "Password or email is incorrect";
            // require_once __DIR__."/../view/signIn.php";
            echo json_encode(array("message" => "false"));
        }

       
    }



    public function SignUp()
    {
        $methods = new ClientMethods();
        $data = array(
            "email" => $_POST['email'],
            "loginKey" => strtoupper($_POST['Fname']) . '-' . rand(1000, 9999),
            // "loginKey" => $_POST['loginKey'],
            "Fname" => $_POST['Fname'],
            "Lname" => $_POST['Lname'],
            "age" => $_POST['age']
        );

        if($methods->SignUp($data) )
        {
            http_response_code(200);
            echo json_encode(array("message" => "signUp"));
        }
        else
        {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }


    // log in function 
    public function logIn()
    {
        $methods = new ClientMethods();
        $data = array(
            "email" => $_POST['email'],
            "loginKey" => $_POST['loginKey']
        );
       
        if($methods->signInClient($data) )
        {
            http_response_code(200);
            echo json_encode(array("message" => "logIn"));
        }
        else
        {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }
                                                  

}




?>