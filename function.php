<?php

$conn = mysqli_connect('bariskode.online','bariskod','passforlife9','bariskode_db_bisniskeluarga2');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows =[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;

}

function regis($data){
    global $conn;
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $telepon = $data["telepon"];
    $address = $data["address"];
    $query = "INSERT INTO tb_user VALUES
                ('', '$username','$password','$telepon','$email','$address')
            ";            
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


?>