<?php
include '../config/koneksi.php';
$inputs = file_get_contents("php://input");
parse_str($inputs,$post);
//var_dump($post);

$strheader = "insert into tb_headerttinv (invoice_no,customer,jenis,tujuan,date_inv) VALUES ('".$post[invoice]."','".$post[customer]."','".$post[jenis_muatan]."','".$post[tujuan]."',NOW())";
if ($dbs->query($strheader) === TRUE) {
    $last_id = mysqli_insert_id($dbs);
    //echo $last_id;
    $job_order = $post['job_order'];
    $si = $post['si'];
    $surat_jalan = $post['surat_jalan'];
    $trucking_co = $post['trucking_co'];
    $nomor_polisi = $post['nomor_polisi'];
    $sopir = $post['sopir'];
    $rit = $post['rit'];
    $teus = $post['teus'];
    $admt = $post['admt'];
    $harga_jual = $post['harga_jual'];
    $revenue = $post['revenue'];
    $pendapatan = $post['pendapatan'];
    $bbm = $post['bbm'];
    $other = $post['other'];
    $subcon = $post['subcon'];
    $grossmargin = $post['grossmargin'];
    for ($i = 0; $i < count($post['job_order']); $i++){
        $str = '('.$last_id.','.$post["job_order"][$i].','.$post["si"][$i].','.$post["surat_jalan"][$i].','.$post["trucking_co"][$i].','.$post["nomor_polisi"][$i].','.$post["sopir"][$i].','.$post["rit"][$i].','.$post["teus"][$i].','.$post["admt"][$i].','.$post["harga_jual"][$i].','.$post["revenue"][$i].','.$post["pendapatan"][$i].','.$post["bbm"][$i].','.$post["others"][$i].','.$post["subcon"][$i].','.$post["grossmargin"][$i].')';
        //echo $str;
        $strdetail = "insert into tb_detail_inv (id_tt,jo_no,si,no_sj,truck_co,nopol,sopir,rit,teus,admt,uom,revenue,trucking_allowance,fuel,others,subcon,grossmargin)
             VALUES ('".$last_id."','".$post[job_order]."','".$post[si]."','".$post[surat_jalan]."','".$post[trucking_co]."','".$post[nomor_polisi]."','".$post[sopir]."','".$post[rit]."','".$post[teus]."','".$post[admt]."','".$post[harga_jual]."','".$post[revenue]."','".$post[pendapatan]."','".$post[bbm]."','".$post[other]."','".$post[subcon]."','".$post[grossmargin]."')";
        $dbs->query($strdetail);
//echo $post['surat_jalan'][];
    }

    //var_dump($hasil);
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;}

//$dbs->query($strquery);
//$dbs->query("insert into tb_headerttinv (invoice_no,customer,jenis,tujuan,date_inv) VALUES ($post[invoice])");
//echo  $strquery;

//var_dump($post);
//echo $str;
//$sql =$dbs->query("insert into tb_detail_inv_tmp ('')")
?>