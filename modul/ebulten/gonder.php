<?php

if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM ebulten WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:/yonetim.php?modul=aboneler&sayfa=aboneler");
}
?>

<style type="text/css">
	.send{
		width: 20%;
		float: right;
	}
</style>
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
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_1">
                        <thead>
                        <tr>
                             <th><input type="checkbox" id="checkAll">Tüm Seç </th>
                            <th> Sira </th>
                            <th>  K.Tarihi </th>
                            <th> Ad Soyad </th>
                            <th> E-Mail </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i =1; 
                        foreach($pdo->query("Select * from ebulten order by id desc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <input type="checkbox" name="habergonder[]" value="<?=$ebulten->email?>"> </td>
                                <td style="vertical-align: middle;"> <?php echo "#".$i; ?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->adsoyad?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->email?> </td>

                            </tr>
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-9 hidden">
                        <textarea name="icerik"  id="summernote_1">
                        <header>
                                <div class="logo">
                                    <a href="indexbutem.html" title="Konya Haber | Bugunun Haber Konya">
                                    <img src="http://www.anadoludabugun.com.tr/assets/images/logo.png" class="img-responsive" alt="Konya Haber | Bugunun Haber Konya" style="margin: 0 auto;" >
                                    </a>
                                    <div class="headeryazi" style="text-align: center">
                                        <h1 style="font-size: 25px; font-weight: bold;">Anadolu'da Bugün - Konya'nın en büyük internet gazetesi</h1>
                                    </div>
                                </div>
                        </header>
                        <section class="gunun_haberler">
                            <div class="container">
                                 <?php $i =1; 
                        foreach($pdo->query("Select * from haberekl WHERE bultenid = '".$_GET['id']."' order by id desc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                                    <div class="lefthaber">
                                        <div class="col-md-6 col-xs-6">
                                            <a href="<?php echo $ebulten->link ?>" target="_blank" title="<?php echo $ebulten->baslik ?>">
                                                <div class="haberkutu" style=" min-height: 173px; background: #fff;float: left;width: 100%; margin: 10px 0;min-height: 260px;height: 320px;box-shadow: 0 1px 1px 0 #d3d3d3;">
                                                    <div class="haberkutuimg" style="  float: left;padding: 12px;margin-top: 14px;width: 100%; box-sizing: border-box; ">

                                                <img src="<?=SITEURL?>upload/<?php echo $ebulten->id ?>.jpg" alt="<?php echo $ebulten->baslik ?>" class="img-responsive" style="width:100%;height: 165px;">

                                                    </div>
                                                    <div class="haberkutubaslik" style=" float: left;width: 100%; padding: 10px;font-size: 22px;height: 36px; overflow: hidden; margin-top: 5px;font-weight: bold;"><?php  echo $ebulten->baslik ?></div>
                                                    <div class="haberkutuaciklama" style=" float: left;width: 100%;padding: 0 10px;font-size: 14px; height: 38px;overflow: hidden; margin-top: 10px;"><?php echo  $ebulten->icerik ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                        <?php $i++; endforeach ?>
                            </div>
                        </section>
                        <footer style="float: left;background: #1b1c21;margin-top: 50px;display: block;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="footerust" style="float: left;width: 100%;height: 40px;background: #222328;">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="footermarkalar" style="position: relative;float: left;width: 100%;height: 40px;background: url(../assets/images/markalar.png)no-repeat center;">
                                                            <a href="http://www.abkgrup.com/" target="_blank" class="linkF1"></a>
                                                            <a href="http://www.idealyurtlari.com" target="_blank" class="linkF2"></a>
                                                            <a href="http://kanalanadolu.tv/" target="_blank" class="linkF3"></a>
                                                            <a href="http://www.anadoludabugunspor.com/" target="_blank" class="linkF4"></a>
                                                            <a href="http://www.vavotomotiv.com" target="_blank" class="linkF5"></a>
                                                            <a href="http://www.bydrumi.com/" target="_blank" class="linkF6"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="leftfooter" style="width: 50%;float: left;">
                                            <div class="footerlogo" style="float: left;width: 150px;margin-top: 15px;"><img src="http://www.anadoludabugun.com.tr/assets/images/footerlogo.png" class="img-responsive"></div>
                                            <span class="copright" style="float: left;color: #fff;margin-left: -156px;margin-top: 70px;">© Copyright 2017 Anadoluda Bugün</span>
                                        </div>
                                        <div class="rightfooter" style="float: left; margin-top: 30px">
                                            <ul class="footeraltmenu" style="float: right; list-style: none;margin: 0; padding: 0; display: -webkit-inline-box;">
                                                <li style="margin-right: 25px;"><a href="http://www.anadoludabugun.com.tr/sayfa/hakkimizda/1" title="Hakkımızda" style="font-size: 15px; color: #ffffff;">Hakkımızda</a></li>
                                                <li style="margin-right: 25px;"><a href="http://www.anadoludabugun.com.tr/sayfa/kunye/2" title="Künye" style="font-size: 15px;color: #ffffff;">Künye</a></li>
                                                <li style="margin-right: 25px;"><a href="http://www.anadoludabugun.com.tr/sayfa/hizli-tren-saatleri/3" style="font-size: 15px;color: #ffffff;" title="Hızlı Tren Saatleri">Hızlı Tren Saatleri</a></li>
                                                <li style="margin-right: 25px;"><a href="http://www.anadoludabugun.com.tr/iletisim" style="color: #ffffff;font-size: 15px;" title="Bize Ulaşın">Bize Ulaşın</a></li>
                                                <li style="margin-right: 25px;"><a href="http://www.anadoludabugun.com.tr/iletisim" style="color: #ffffff;font-size: 15px;"  title="Bize Ulaşın">Listeden çikar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        </textarea>
                    </div>
                <button type="submit" name="btnkaydet" class="btn green btn-block send"><i class="fa fa-pencil"></i> Gönder</button>
        </form>
        </div>
    </div>

<!-- END CONTENT BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!--script type="text/javascript">
$(document).ready(function(){
     $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
});
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
    if(!empty($_POST["habergonder"])) {
        $habersayi = @count($_POST["habergonder"]);
        $kardasimsaysana = 0;
        while ($kardasimsaysana <= $habersayi) {

            mailgonderme(@$_POST["habergonder"][$kardasimsaysana]);

             echo "<script type=\"text/javascript\">alert(\"Gönderme ".$_POST["habergonder"][$kardasimsaysana]." İşlemi Başarı İle Yapılmıştır.\");</script>";
            $kardasimsaysana++;
        }
    }else{
        echo "<script type=\"text/javascript\">alert(\"Lütfen En Az Mailerden Birini Seçiniz.\");</script>";
    }

}



?>