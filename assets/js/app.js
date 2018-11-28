/*mulai block load halaman*/
/*function loadviewInvoice(){
    $.ajax({
        url:"../views/tambahInvoice.php",
        type:"POST",
        dataType:"html",
        success:function(data){
            $(".content").html(data);
        },
        cache:false
    })
}*/
$(document).ready(function(){
    $('ul.sub-menu li a').click(function(){
        var halaman = $(this).attr('href');
        //alert (halaman);
        $('.content').load('../views/' + halaman +'.php');
        return false;
    })
})
function hitung(count){
    /*var cor  = $("#cost_revenue_"+count);
    var pendapatan = $("#pendapatan_"+count);
    var bbm    = $("#bbm_"+count);
    var other    = $("#other_"+count).val();
    var subcon    = $("#subcon_"+count).val();
    var gross   = $("#grossmargin_"+count);
    var hasilCor = $("#hasilCor_"+count);*/

    //hasilCor.value = parseInt(cor.value) + parseInt(pendapatan.value) + parseInt(pendapatan.value) + parseInt(bbm.value) + parseInt(other.value) + parseInt(subcon.value);
    /*hasilCor.value = parseInt($(other)) + parseInt($(subcon));
    gross.value = parseInt(cor.value) - parseInt(hasilCor.value);*/
    //var other =parseInt($('#other_'+ count).val());
    //var subcon =parseInt($('#subcon'+ count).val());
    //var total_bayar = other + subcon;
    //$('#hasilCor_'+count).val(total_bayar);
    //console.log(total_bayar);
    var a = $("#cost_revenue_"+ count).val();
    var b = $("#pendapatan_"+ count).val();
    var c = $("#bbm_"+ count).val();
    var d = $("#other_"+ count).val();
    var e = $("#subcon_"+ count).val();
    //var bb = $("#hasilCor_"+count).val;
    //var f = $("#grossmargin_"+ count).val();

    //totalCost = parseInt(b)+parseInt(c)+parseInt(d)+parseInt(e);
    //gross = parseInt(b)+parseInt(c)+parseInt(d)+parseInt(e)-parseInt(f);
    $("#grossmargin_"+count).val(parseInt(b)+parseInt(c)+parseInt(d)+parseInt(e)-parseInt(a));
    //$("#grossmargin_"+count).val();
}
function gross(count){
    var a = $("#cor_"+ count).val();
    var b = $("#hasilCor_"+ count).val();
    //margin = parseInt(a) - parseInt(b);
    $("#grossmargin_"+count).val(parseInt(a)-parseInt(b));
}
function simpan() {
    var frm = $("#invoice_frm").serializeArray();
    $.ajax({
        url:"../models/mdl_invoice3.php",
        data:frm,
        type:"POST",
        dataType:"html",
        success:function (data) {
            alert(data);
            $('form :input').val('');
        }
    })
}