<?php

function Upload2Gambar($fupload_name, $direktori, $width){
  //direktori gambar
  $vdir_upload = $direktori;
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = $width;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}   

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}


date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

// GLOBAL ID //
global $periode_saat_ini;

global $login_id;
$login_id=0;

$nama_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "May", 
                    "Jun", "Jul", "Aug", "Sep", 
                    "Oct", "Nov", "Dec");

function repJK($var){
	if($var == 1) return "Pria";
	else return "Wanita";
}

// fungsi untuk men-generate ID pelanggan, 
// Ex: P0001, S011300001
function countID($tabel, $inisial){
	$struktur = mysql_query("SELECT * FROM $tabel") or die("query tidak dapat dijalankan!");

	$field = mysql_field_name($struktur,0); //mengambil kolom id dari tiap tabel 
	$panjang = mysql_field_len($struktur,0); //cek panjang karakter kolom id
	$row = mysql_num_rows($struktur); //cek banyak baris pada kolom id
	$panjanginisial = strlen($inisial); //cek panjanginisial 
	$posisi_awal = $panjanginisial + 1; //cek awal angka untuk countid
	$bnyk = $panjang-$panjanginisial; //cek awal angka untuk countid

	if ($row >= 1){
	  $query = mysql_query("SELECT max(substring($field,$posisi_awal,$bnyk))+1 as max 
	  						FROM $tabel 
							WHERE substring($field,1,$panjanginisial) = '$inisial'") or die("query tidak dapat dijalankan!");
	  $hasil = mysql_fetch_assoc($query); 
	  $angka = intval($hasil['max']); //cek nilai maksimal kolom id
	}
	else{
	  $angka = 1;
	}
			
	$nol= "";
	for ($i=0; $i < ($bnyk-(strlen($angka))) ; $i++){
 	 $nol = $nol."0";
	}
	return strval($inisial.$nol.$angka);
}


function FetchScalar($query) {
	$data = mysql_fetch_row(mysql_query($query));
	return $data[0];
}
	
?>
