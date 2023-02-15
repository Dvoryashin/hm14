<?php
    // $filed = "bd.txt";
    // $rez = "Записано в файлик";
    // file_put_contents($filed, $rez);
    // $bd = file_get_contents("bd.txt"); 
    // echo $bd file_get_contents() expects parameter 1 to be a valid path, resource given in C:\OSPanel\domains\localhost\hm14\index.php on line 33
    $file = file('bd.txt');
    $user = $_POST['user'];
    $pas = $_POST['pas'];

    $userin = $_POST['user_in'];
    $pasin = $_POST['pas_in'];

    $find_user = $_POST['find_user'];


    if(isset($_POST['user']) && isset($_POST['pas'])){
        if(strpos(file_get_contents("bd.txt"), $user)){
            echo "Такой пользователь уже есть";
        }else{
            $userpas = $user."+".password_hash($pas, PASSWORD_DEFAULT);
            fwrite($file, $userpas . PHP_EOL);
            fclose($file);
            header('Location: http://localhost/hm14/reg.html');
        }
        
    }

    if($userin && $pasin){
        $userpasin = $userin."+".password_hash($pasin, PASSWORD_DEFAULT);
        if(array_search($userin, $file)){
            header('Location: http://localhost/hm14/reg.html');
        }
        
    }

    if(isset($find_user)){
        if(strpos(file_get_contents("bd.txt"), $find_user)){
            echo "Да, есть такой";  
        }else{
            echo "Такого пользователя нет";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hr>
    <p>sign up</p>
    <form action="index.php" method="post">
        <input name="user" placeholder="username" type="text">
        <input name="pas" placeholder="password" type="password">
        <input type="submit">
    </form>
    <hr>
    <p>login in</p>
    <form action="index.php" method="post">
        <input name="user_in" placeholder="username" type="text">
        <input name="pas_in" placeholder="password" type="password">
        <input type="submit">
    </form>
    <hr>
    <p>find user</p>
    <form action="index.php" method="post">
        <input type="text" placeholder="user" name="find_user">
        <input type="submit">
    </form>
    <hr>
</body>
</html>