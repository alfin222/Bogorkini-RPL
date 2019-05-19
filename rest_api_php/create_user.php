<?php

    include 'db_connect.php';

      $postdata = file_get_contents("php://input");

      $username="";

      $email="";

      $password="";

      if (isset($postdata)) {

          $request = json_decode($postdata);

          $username = $request->username;

          $email = $request->email;

          $password=$request->password;

      }
      
      $sql = mysqli_query($connect,"INSERT INTO user ( username, email, password)
      VALUES ('$username','$email','$password')");

  if($sql){

      $getUserSql=mysqli_query($connect, "SELECT * from user WHERE username='$username' AND password = '$password'");

      if (mysqli_num_rows($getUserSql)) {

        $row = mysqli_fetch_assoc($getUserSql);

        $data =array(

            'message' => "Data have been recorded",

            'status' => "200"

        );

      }

      else{

        $data =array(

            'message' => "Register Failed!",

            'status' => "404"

        );

      }

  }

 else {

    $data =array(

        'message' => "No Data!",

        'status' => "503"

    );

  }

  echo json_encode($data);

?>