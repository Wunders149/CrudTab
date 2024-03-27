<?php
require 'config.php';
if(isset($_POST["action"])){
    if($_POST["action"]=="insert"){
        insert();
    }
    else if($_POST["action"]=="edit"){
        edit();
    }
    else{
        delete();
    }
}

function insert(){
    global $conn;
    $name=$_POST["name"];
    $email=$_POST["email"];
    $gender=$_POST["gender"];
    $check = $_POST["check_insert"];
    $radio = $_POST["radio_insert"];

    $query= "INSERT INTO user(name,email,gender,chec, radio) VALUES('{$name}','{$email}','{$gender}','{$check}', '{$radio}')";
    mysqli_query($conn,$query);
    echo "ENREGISTREMENT REUSSIE!";
}
function edit(){
    global $conn;
    $id = $_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $check = $_POST["check_insert"];
    $radio = $_POST["radio_insert"];

    $query="UPDATE `user` SET name='$name',email='$email',gender='$gender' ,chec='$check',radio=' $radio' WHERE id='$id' ";
    mysqli_query($conn,$query);
    echo "MISE A JOUR REUSSIE!";
}
function delete(){
    global $conn;
    $id=$_POST["action"];
    
    $query="DELETE FROM user WHERE id=$id ";
    mysqli_query($conn,$query);
    echo "SUPPRESSION REUSSIE!";
}
?>