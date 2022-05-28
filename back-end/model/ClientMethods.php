<?php


require_once __DIR__ . "/Connection.php";

class ClientMethods extends Connection
{


    public function Appointment()
    {

        $query = $this->connect()->prepare("SELECT * FROM my_appointment");
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }
    public function MyBooking($id_client)
    {
        $query = $this->connect()->prepare("SELECT my.service , my.id , A.* FROM `my_appointment` my,`client` C,`appointment` A WHERE my.id_client = '$id_client' and my.id_client = C.loginKey and my.id_appointment = A.id ");
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }
    public function SelectSingle($id)
    {

        $query = $this->connect()->prepare("SELECT * FROM appointment WHERE id = '$id' ");
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }
    public function SelectOne($id)
    {

        $query = $this->connect()->prepare("SELECT * FROM my_appointment WHERE id_appointment = '$id' ");
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 0;
        }
    }


    function add()
    {
        $query = $this->connect()->prepare("INSERT INTO `my_appointment`(`name`,`id_appointment`) VALUES ('parker' , (SELECT id FROM appointment WHERE status = 'disable' ))");
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function signIn($loginKey)
    {

        $query = "SELECT * FROM `client` WHERE loginKey = '$loginKey'";
        $log = $this->connect()->prepare($query);
        if ($log->execute()) {
            return $log->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
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

    public function SignUp($email, $loginKey, $Fname, $Lname, $age, $phone)
    {

        // if($this->check($email)==null)
        // {
        $query = "INSERT INTO client (email, loginKey, Fname, Lname, age,phone) VALUES ('$email', '$loginKey', '$Fname', '$Lname', '$age','$phone')";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log) {
            return true;
        } else {
            return false;
        }
        // }


    }

    public function Search($date)
    {
        // $query = "SELECT * FROM `appointment` WHERE `date` = '$date'";
        // $time_now = date("H:i:s");  AND start_date >= '$time_now' 
        $time =  date("H:i:s");
        $query = "SELECT * FROM appointment WHERE id NOT IN (SELECT id_appointment FROM my_appointment) AND date = '$date' AND start_date >= '$time' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        return $log->fetchAll(PDO::FETCH_ASSOC);
    }

    public function SearchTwo($date)
    {
        $query = "SELECT * FROM appointment WHERE id NOT IN (SELECT id_appointment FROM my_appointment) AND date = '$date' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        return $log->fetchAll(PDO::FETCH_ASSOC);
    }


    function Booking($id_client, $id_appointment, $service)
    {
        $query = $this->connect()->prepare("INSERT INTO `my_appointment` (`id`, `id_client`, `id_appointment`,`service`) VALUES (NULL, '$id_client', '$id_appointment','$service')");
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function cancel($id)
    {
        $query = "DELETE FROM `my_appointment` WHERE id_appointment = '$id' ";
        $log = $this->connect()->prepare($query);
        $log->execute();
        if ($log->execute()) {
            return true;
        }
    }

    public function update($id, $service)
    {
        $query = "UPDATE `my_appointment` SET `service`='$service' WHERE id = '$id' ";
        $log = $this->connect()->prepare($query);
        return $log->execute();
    }

    // check if appointment table already have filled
    public function CheckAppointment($date)
    {
        $query = $this->connect()->prepare("SELECT COUNT(date) FROM appointment WHERE date = '$date' ");
        if($query->execute()){
            return $query->fetch(PDO::FETCH_ASSOC);
        }else{
            return 0;
        }
    }



    // this Method is for inserte an appointements everyday
    public function AutoInsert()
    {
        $date = date("y-m-d");
        $count = $this->CheckAppointment($date);

        if ($count["COUNT(date)"] == 0) {
            $appointments = array(
                "0" => ["08:00", "09:00"],
                "1" => ["09:00", "10:00"],
                "2" => ["10:00", "11:00"],
                "3" => ["11:00", "12:00"],
                "4" => ["14:00", "15:00"],
                "5" => ["15:00", "16:00"],
                "6" => ["16:00", "17:00"],
                "7" => ["17:00", "18:00"],
            );


            foreach ($appointments as $appointement) {
                $query = ("INSERT INTO appointment(date, start_date, end_date) VALUES ('$date','$appointement[0]','$appointement[1]')");
                $log = $this->connect()->prepare($query);
                $log->execute();
            }
        }
    }


}
