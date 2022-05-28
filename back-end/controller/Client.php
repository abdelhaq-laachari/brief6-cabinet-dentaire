<?php


header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
// header('Content-Type: multipart/form-data'); // ** FormData, for image uploading
header("Access-Control-Allow-Methods: *"); // TODO: POST,GET,DELETE,PUT
// header("Access-Control-Max-Age: 600");
header("Access-Control-Allow-Headers:*");


require __DIR__ . "../../model/ClientMethods.php";

session_start();

class Client
{

    // function for fill table auto
    public function __construct()
    {
        $operation = new ClientMethods();
        $operation->AutoInsert();
    }

    // get client page
    public function get()
    {
        $methods = new ClientMethods();
        $json = json_encode($methods->Appointment());
        echo $json;
    }

    public function MyBooking($id)
    {
        $hashed_key = $id;
        $id_client = md5($hashed_key);
        $methods = new ClientMethods();

        $var = $methods->MyBooking($id_client);

        if ($var) {
            echo json_encode($var);
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    public function cancel($id)
    {
        // $id = $_POST['id'];
        $cancel = new ClientMethods();
        $cancel->cancel($id);
        echo json_encode(array("message" => "canceled"));
    }

    public function SelectSingle($id)
    {
        // $id = $_GET['id'];
        $methods = new ClientMethods();
        $json = json_encode($methods->SelectSingle($id));
        echo $json;
    }

    public function SelectOne($id)
    {
        // $id = $_GET['id'];
        $methods = new ClientMethods();
        $json = json_encode($methods->SelectOne($id));
        if ($json) {
            http_response_code(200);
            echo $json;
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }



    public function add()
    {
        echo "add";
        $methods = new ClientMethods();

        if ($methods->add()) {
            http_response_code(200);
            echo json_encode(array("message" => "inserted"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }


    public function SignUp()
    {
        $email = $_POST['email'];
        $randomKey = strtoupper($_POST['Lname']) . '-' . rand(1000, 9999);

        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $loginKey = md5($randomKey);

        $logC = new ClientMethods();
        $var = $logC->SignUp($email, $loginKey, $Fname, $Lname, $age, $phone);

        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "signUp", "loginKey" => $randomKey));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    public function logIn()
    {
        $hashed_key = $_POST['loginKey'];
        $loginKey = md5($hashed_key);
        echo $loginKey;

        $client = new ClientMethods();

        $var = $client->SignIn($loginKey);

        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "you're logged in"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "login key is wrong"));
        }
    }


    public function Search()
    {
        $date = $_POST['date'];
        $day = date("Y-m-d");
        // echo $day;
        if ($date == $day) {
            $method = new ClientMethods();
            $var = $method->Search($date);
            if ($var) {
                http_response_code(200);
                echo json_encode($var);
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "No results found for this date"));
            }
        } else {
            $method = new ClientMethods();
            $var = $method->SearchTwo($date);
            if ($var) {
                http_response_code(200);
                echo json_encode($var);
            } else {
                http_response_code(400);
                echo json_encode(array("message" => "No results found for this date"));
            }
        }
    }

    public function update()
    {
        $id = $_POST['id'];
        $service = $_POST['service'];

        $edit = new ClientMethods();
        $var = $edit->update($id, $service);
        if ($var) {
            http_response_code(200);
            echo json_encode(array("message" => "updated"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }

    public function Booking()
    {
        $hashed_key = $_POST['id_client'];
        $id_client = md5($hashed_key);
        $id_appointment = $_POST['id_appointment'];
        $service = $_POST['service'];
        $methods = new ClientMethods();

        if ($methods->Booking($id_client, $id_appointment, $service)) {
            http_response_code(200);
            echo json_encode(array("message" => "inserted"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "error"));
        }
    }
}
