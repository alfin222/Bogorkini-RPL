<?php



  include 'db_connect.php';



    $postdata = file_get_contents("php://input");

    $username="";

    $password="";

    if (isset($postdata)) {

        $request = json_decode($postdata);

        $username = $request->username;

        $password = $request->password;

    }



    $query_login = mysqli_query($connect,"SELECT * FROM user WHERE   username='$username' AND password='$password'");

    if(mysqli_num_rows($query_login)){



        $row=mysqli_fetch_assoc($query_login);

        $data =array(

            'message' => "Login Success",


            'status' => "200"

        );

    }

    else{

        $data =array(

            'message' => "Login Failed, Username or Password Wrong",

            'status' => "404"



        );

    }

    echo json_encode($data);

?>