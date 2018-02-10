<?php
if(isset($_GET["islem"])){
    $silin = $pdo->prepare("DELETE FROM grubabone WHERE aboneid = '".$_GET['id']."'");
    $deletei = $silin->execute(array(
        'id' => $_GET['id']
    ));
    $query = $pdo->prepare("DELETE FROM ebulten WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:/bulten/yonetim.php?modul=aboneler&sayfa=aboneler");
}
?>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="yonetim.php">Anasayfa</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>E-Bülten</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <form method="POST">
          <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Emailler </span>
                    </div>
                     <div style="float: right;">
                        <a class="btn btn-primary" href="yonetim.php?modul=aboneler&sayfa=aboneolus" name="bulten">Abone ekle</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_1">
                        <thead>
                        <tr>
                            <th> Sira </th>
                            <th>  K.Tarihi </th>
                            <th> Ad Soyad </th>
                            <th> E-Mail </th>
                            <th> Sil </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i =1; 
                        foreach($pdo->query("Select * from ebulten order by id asc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> #<?=$i?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->adsoyad?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->email?> </td>
                                <td><a href="javascript:sil('yonetim.php?modul=aboneler&sayfa=aboneler&islem=sil&id=<?=$ebulten->id?>')" class="btn red btn-xs">Sil</a></td>
                            </tr>
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </form>
        </div>
    </div>

<!-- END CONTENT BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
       // alert(inputValue);
    });
});
</script>
<!--script>
function myFunction() {
swal("Write something here:", {
  content: "input",
})
.then((value) => {
  swal(`You typed: ${value}`);
});
}
</script-->
<?php function mailgonderme($email){
    global $pdo;
    $ayar = $pdo->query('SELECT * FROM ayar WHERE  id = 1')->fetch(PDO::FETCH_OBJ);
    $baslik=$_POST["baslik"];
    $detay2=$_POST["icerik"];
    $from =$email;
    $to=$email;
    $subject=$ayar->siteadi." | E Bülten";
    $message="".$baslik."<br>";
    $message.="&nbsp;".$detay2."<br>";


    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=UTF-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "Return-Path: email@test.co.uk\n";
    $headers .= "Return-Receipt-To: email@test.co.uk\n";


    if(@mail($to, $subject, $message, $headers))
    {

    } else {
    }


}
if(isset($_POST["btnkaydet"])){
    if(!empty($_POST["gonder"])) {
        $saydirlo = @count($_POST["gonder"]);
        $habersayi = @count($_POST["habergonder"]);
        $kardasimsaysana = 0;
        while ($kardasimsaysana <= $saydirlo) {

            mailgonderme(@$_POST["gonder"][$kardasimsaysana]);

            $kardasimsaysana++;
        }
       // echo "<script type=\"text/javascript\">alert(\"Gönderme İşlemi Başarı İle Yapılmıştır.\");</script>";
    }else{
        echo "<script type=\"text/javascript\">alert(\"Lütfen En Az Mailerden Birini Seçiniz.\");</script>";
    }

}



?>