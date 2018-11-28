<?php
session_start();
require 'config.php';

if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT NAMA_PENGGUNA,
                         JABATAN_PENGGUNA, 
                         NOMOR_INDUK 
                  FROM tabel_pengguna
                  WHERE 
                       NOMOR_INDUK=? 
                       AND 
                       PASSWORD=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($nama, $level_user, $id_user);

        while ( $check_log->fetch() ) {
            $_SESSION['JABATAN_PENGGUNA'] = $level_user;
            $_SESSION['NOMOR_INDUK'] = $id_user;
            $_SESSION['NAMA_PENGGUNA'] = $nama;
            
        }

        $check_log->close();

        header('location:on-'.$level_user);
        exit();

    } else {
		echo "<script> alert('Maaf Username/Password Anda Salah')</script>";
        echo "<script> document.location.href='index.php'; </script>";
        exit();
    }

   
} 