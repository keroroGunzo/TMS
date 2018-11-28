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
    $cost_revenue = $post['cost_revenue'];
    $pendapatan = $post['pendapatan'];
    $bbm = $post['bbm'];
    $other = $post['other'];
    $subcon = $post['subcon'];
    $grossmargin = $post['grossmargin'];
    $strdetail = "insert into tb_detail_inv (id_tt,jo_no,si,no_sj,truck_co,nopol,sopir,rit,teus,admt,uom,revenue,cost_rev,trucking_allowance,fuel,others,subcon,grossmargin)VALUES ";
    //$strdetail = "insert into tb_detail_inv (id_tt,jo_no,si,no_sj,truck_co,nopol,sopir,rit,teus,admt,uom,revenue,trucking_allowance,fuel,others,subcon,grossmargin)VALUES ";
    for ($i = 0; $i < count($post['job_order']); $i++){
        $strdetail .= "('{$last_id}','{$job_order[$i]}','{$si[$i]}','{$surat_jalan[$i]}','{$trucking_co[$i]}','{$nomor_polisi[$i]}','{$sopir[$i]}','{$rit[$i]}','{$teus[$i]}',
        '{$admt[$i]}','{$harga_jual[$i]}','{$revenue[$i]}','{$cost_revenue[$i]}','{$pendapatan[$i]}','{$bbm[$i]}','{$other[$i]}','{$subcon[$i]}','{$grossmargin[$i]}')";
        $strdetail .= ",";
    }
    $strdetail = rtrim($strdetail,",");
    $dbs->query($strdetail);
    //var_dump($hasil);
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbs->error;}
?>