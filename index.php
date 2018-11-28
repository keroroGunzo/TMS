<?php
session_start();

if ( isset($_SESSION['JABATAN_PENGGUNA']) && $_SESSION['JABATAN_PENGGUNA'] != '' ) {
    $halaman = $_SESSION['JABATAN_PENGGUNA'];

    header('location:on-'. $halaman);
    exit();
} else {
    header('location:login.php');
    exit();
}