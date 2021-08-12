<?php

echo "\e[91m";
echo "  ___  __    ____  __  ____  __ _  ____ \n";
echo " / __)(  )  (  __)/  \(  _ \(  ( \(  _ \\\n";
echo "( (__ / (_/\\ ) _)(  O )) _ (/    / ) _ (\n";
echo " \\___)\\____/(____)\__/(____/\\_)__)(____/\n";

echo "\e[33m";
echo "================\e[1mCLI Helper\e[0m\e[33m==============\n\n";
echo "\e[39m";


$username = '';
$password = '';

function createDatabase() {
    global $username, $password;
    $conn = new mysqli('localhost', $username, $password);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    echo "[INFO] Creating table\n";
    if($conn->query("CREATE DATABASE cleobnb") === TRUE){
        echo "[INFO] Database created successfully\n";
    }else {
        echo "[ERRO] Failed to create database\n";
    }
    $conn->close();
}

function insertTables(){
    global $username, $password;
    $conn = new mysqli('localhost', $username, $password, 'cleobnb');
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    $create_query = file_get_contents("./scripts/cleobnb.sql");
    $res = $conn->multi_query($create_query);
    if($res){
        echo "[INFO] Tables created successfully\n";
    }else {
        echo "[ERRO] Failed to create tables\n";
    }
    $conn->close();
}

function dropAllTables(){
    global $username, $password;
    $conn = new mysqli('localhost', $username, $password, 'cleobnb');
    $conn->query('SET foreign_key_checks = 0');
    if($conn->connect_error){
        die("[ERRO] Connection failed: ".$conn->connect_error);
    }

    if ($result = $conn->query("SHOW TABLES"))
    {
        while($row = $result->fetch_array(MYSQLI_NUM))
        {
            $conn->query('DROP TABLE IF EXISTS '.$row[0]);
        }
    }
    
    echo "[INFO] Tables drop successfully\n";
    $conn->query('SET foreign_key_checks = 1');
    $conn->close();
}

function dropDatabase(){
    global $username, $password;
    $conn = new mysqli('localhost', $username, $password);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    echo "[INFO] Dropping table\n";
    if($conn->query("DROP DATABASE cleobnb") === TRUE){
        echo "[INFO] Database dropped successfully\n";
    }else {
        echo "[ERRO] Failed to drop database\n";
    }
    $conn->close();
}

function getCreds(){
    global $username, $password;
    $username = readline('Input DB username (default: root): ');
    $password = readline('Input DB password: ');
    if(strlen($username) < 1){
        $username = 'root';
    }
    echo "\e[0m";
}


if(isset($argv[1])){
    if (strpos($argv[1], 'migrate') !== false) {
        $exp = explode(':',$argv[1]);
        if(isset($exp[1])){
            if($exp[1] == 'full'){
                getCreds();
                createDatabase();
                insertTables();
            }else if($exp[1] == 'fresh'){
                getCreds();
                dropAllTables();
                insertTables();
            }else if($exp[1] == 'drop'){
                getCreds();
                dropDatabase();
            }else {
                echo "Usage: bnb migrate:<operation>    Example: bnb migrate:full \n";
                echo "\e[1mmigrate:full\e[0m      Create database and insert all table\n";
                echo "\e[1mmigrate:fresh\e[0m     Drop all table and insert all table\n";
                echo "\e[1mmigrate:drop\e[0m      Drop database\n";
            }
        } else {
            echo "Usage: bnb migrate:<operation>    Example: bnb migrate:full \n";
            echo "\e[1mmigrate:full\e[0m      Create database and insert all table\n";
            echo "\e[1mmigrate:fresh\e[0m     Drop all table and insert all table\n";
            echo "\e[1mmigrate:drop\e[0m      Drop database\n";
        }
    } else if(strpos($argv[1], 'serve') !== false){
        system('php -S localhost:8080');
    } else {
        echo "Usage: php bnb <command>\n\n";
        echo "commands:\n";
        echo "\e[1mmigrate:<operation>\e[0m   Database helper\n";
        echo "\e[1mserve\e[0m                 Start local server\n";
    }
}else {
    echo "Usage: php bnb <command>\n";
    echo "commands:\n";
    echo "\e[1mmigrate:<operation>\e[0m   Database helper\n";
    echo "\e[1mserve\e[0m                 Start local server\n";
}

echo "\e[0m";
?>