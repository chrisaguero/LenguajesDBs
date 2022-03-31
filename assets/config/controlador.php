<?php
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    $data = json_decode(file_get_contents('data.json'));

    echo 'working';

    if($data -> username == $user){
        if($data -> password == $pass){
            echo json_encode("contrase;a ok");
        }else{
            echo json_enconde("pass incorrect");
         

        }
        echo json_encode("user ok");
    }else{
        echo json_enconde("incorrect user");
    }
?>