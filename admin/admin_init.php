<?php 


    /* Veritabanı Baglantı Bilgileri */
   $hostname = "localhost";
    $username = "kullanıcıadı";
    $pass = "Password";
    $database = "firmalar";

    /* MySQL Bağlantısı */
    try {
       $db = new PDO("mysql:host=localhost;"  . "dbname=firmalar;" .  " charset=utf8", "kullanıcıadı", "Password");
    } catch (PDOException $error) {
        print $error->getMessage();
        exit();
    }
    
    error_reporting(E_ALL);
    ini_set("display_errors", 0);
    