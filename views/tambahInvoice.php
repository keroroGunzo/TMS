<?php
/*    include "../models/mdl_komen.php";
    include "../models/mdl_materi.php";
    $komen = new Komen($connection);
    $mtr = new Materi($connection);
*/
$connect = new PDO("mysql:host=localhost;dbname=db_tms", "root", "");
function fill_unit_select_box($connect)
{
    $output = '';
    $query = "SELECT * FROM tb_unit";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '<option value="'.$row["Nopol"].'">'.$row["Nopol"].'</option>';
    }
    return $output;
}
?>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li><a href="javascript:;">Trucking Management</a></li>
    <li class="active">Input Invoice</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Invoice<small> Masukan invoice disini.....</small></h1>
<!-- end page-header -->

<!-- begin panel -->
<form class="form-horizontal form-bordered" data-parsley-validate="true" id="invoice_frm" name="invoice_frm">
<div class="panel panel-inverse" data-sortable-id="form-validation-1">
    <div class="panel-heading">
        <h4 class="panel-title">Form Invoice</h4>
    </div>
    <div class="panel-body panel-form">

            <div class="form-group">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nomor Sales Invoice</label>
                        <input type="text" name="invoice" id="invoice" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Invoice</label>
                        <input type="text" name="tanggal_invoice" id="tanggal_invoice" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Customer</label>
                        <input type="text" name="customer" id="customer" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jenis Muatan</label>
                        <input type="text" name="jenis_muatan" id="jenis_muatan" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" name="tujuan" id="tujuan" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        &nbsp; <br><br><br>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-xs" onclick="simpan()">Submit</button>
                        <input type="button" id="add_btn" value="Tambah Item JO" class="btn btn-primary btn-xs">
                    </div>
                </div>
            </div>
            </div>
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-tables" class="table table-striped table-bordered">
                            <tbody class="temp">
                                <thead>
                                    <th>Action [1]</th>
                                    <th>Job Order [2]</th>
                                    <th>SI / Vessel [3]</th>
                                    <th>Surat Jalan [4]</th>
                                    <th>Trucking Co [5]</th>
                                    <th>Nomor Polisi [6]</th>
                                    <th>Sopir [7]</th>
                                    <th>Rit [8]</th>
                                    <th>Teus [9]</th>
                                    <th>Admt / Pulp [10]</th>
                                    <th>Selling Price [11]</th>
                                    <th>Revenue [12]</th>
                                    <th>Cost Revenue [13]</th>
                                    <th>Pendapatan Trucking [14]</th>
                                    <th>BBM / Solar [15]</th>
                                    <th>Lain - Lain [16]</th>
                                    <th>Subcontruck [17]</th>
                                    <th>Grossmargin [18]</th>
                                </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</form>                    <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>

</div>

<script src="../assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        //App.init();
        TableManageDefault.init();
        var count = 0;
        $("#add_btn").click(function(){
            count += 1;
            $('.temp').append(
                '<tr class="records" id="row">'
                + '<td><a class="btn btn-danger btn-icon btn-circle btn-sm remove_item" href="javascript:;" ><i class="fa fa-times"></i></a>'
                + '<td><input id="job_order_' + count + '" name="job_order[]"  type="text" placeholder="nomor JO" required></td>'
                + '<td><input id="si_' + count + '" name="si[]" type="text" placeholder="si / Vessel" required></td>'
                + '<td><input id="surat_jalan_' + count + '" name="surat_jalan[]" type="text" placeholder="suratjalan" required></td>'
                + '<td><input id="trucking_co_' + count + '" name="trucking_co[]" type="text" placeholder="trucking" required></td>'
                //+ '<td><input id="nomor_polisi_' + count + '" name="nomor_polisi[]" type="text" required></td>'
                + '<td><select name="item_unit[]" class="item_unit"><option value="">Select Unit</option><?php echo fill_unit_select_box($connect); ?></select></td>'
                + '<td><input id="sopir_' + count + '" name="sopir[]" type="text" required></td>'
                + '<td><input id="rit_' + count + '" name="rit[]" type="number" required></td>'
                + '<td><input id="teus_' + count + '" name="teus[]" type="number" required></td>'
                + '<td><input id="admt_' + count + '" name="admt[]" type="number" required></td>'
                + '<td><input id="harga_jual_' + count + '" name="harga_jual[]" type="number" required></td>'
                + '<td><input id="revenue_' + count + '" name="revenue[]" type="number" required></td>'
                + '<td><input id="cost_revenue_' + count + '" name="cost_revenue[]" type="number" required onkeyup="hitung('+count+')"></td>'
                + '<td><input id="pendapatan_' + count + '" name="pendapatan[]" onkeyup="hitung('+count+')" type="number" required></td>'
                + '<td><input id="bbm_' + count + '" name="bbm[]" type="number" onkeyup="hitung('+count+')" required></td>'
                + '<td><input id="other_' + count + '" name="other[]" type="number" onkeyup="hitung('+count+')" required></td>'
                + '<td><input id="subcon_' + count + '" name="subcon[]" type="number" onkeyup="hitung('+count+')" required></td>'
                + '<td><input id="grossmargin_' + count + '" name="grossmargin[]" type="text" readonly></td>'
                + '<td><a class="btn btn-danger btn-icon btn-circle btn-sm remove_item" href="javascript:;" ><i class="fa fa-times"></i></a>'
            );
        });
        $(".remove_item").live('click', function (ev) {
            if (ev.type == 'click') {
                $(this).parents("#row").fadeOut();
                //$(this).parents("#row").remove();
            }
        });
    });
</script>
<script>
    //$(document).ready(function(){

