<?php

if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM bultenler WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:/bulten/yonetim.php?modul=ebulten&sayfa=ebulten");
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <!--form method="POST">       
         <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Haberler </span>
                    </div>
                    <div style="float: right;">
                        <input class="btn btn-primary" type="submit" value="Haberler Ekle">
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_3">
                        <thead>
                        <tr>
                            <th> Seç </th>
                            <th>  K.Tarihi </th>
                            <th> Baslik </th>
                            <th> Açiklama </th>
                        </tr>
                        </thead>
                        <tbody>

                        < ?php foreach($pdo->query("Select * from haberler order by id desc",PDO::FETCH_OBJ) as $haberler):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <input type="checkbox" name="habergonder[]" value="<?=$haberler->id?>"> </td>
                                <td style="vertical-align: middle;"> <?=$haberler->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$haberler->baslik?> </td>
                                <td style="vertical-align: middle;"> <?=$haberler->aciklama?> </td>
                            </tr>
                        < ?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form-->
        <form method="POST">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Bültenler </span>
                    </div>
                     <div style="float: right;">
        				<a class="btn btn-primary" href="yonetim.php?modul=ebulten&sayfa=bultenler" name="bulten"> Bülten Ölüştur</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_2">
                        <thead>
                        <tr>
                            <th> Sira </th>
                            <th> Tarihi </th>
                            <th> Başlik </th>
                            <th> Haber </th>
                            <th> Işlem </th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php $i = 1;
                         foreach($pdo->query("Select * from bultenler order by id asc",PDO::FETCH_OBJ) as $bultenler):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <p><?php echo "#".$i; ?></p> </td>
                                <td style="vertical-align: middle;"> <?=$bultenler->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$bultenler->baslik?> </td>
                                 <td style="vertical-align: middle;">
                                 	 <div>
        								<a class="btn btn-primary" href="yonetim.php?modul=ebulten&sayfa=haberekle&id=<?=$bultenler->id?>" name="bulten"> Haber Ekle</a>
                   				 	</div> 
                   				</td>
                                <td>
                                <div class="islem" style="margin-top: 7px;">
                                	<a href="javascript:sil('yonetim.php?modul=ebulten&sayfa=ebulten&islem=sil&id=<?=$bultenler->id?>')" class="btn red">Sil</a>
                                    <a href="yonetim.php?modul=ebulten&sayfa=gonder&id=<?=$bultenler->id?>" type="button" class="btn btn-primary">Gönder</a>
                                    <a href="yonetim.php?modul=ebulten&sayfa=bultenler&id=<?=$bultenler->id?>" type="button" class="btn purple">Düzenle</a>
                                    <a href="yonetim.php?modul=ebulten&sayfa=onizle&id=<?=$bultenler->id?>" type="button" class="btn green" style="width:10%;"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
					             </div>
                                </td>

                            </tr>
                            
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
          <!--div class="col-md-6">
            <!- BEGIN EXAMPLE TABLE PORTLET>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Emailler </span>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_3">
                        <thead>
                        <tr>
                            <th> Seç </th>
                            <th>  K.Tarihi </th>
                            <th> Ad Soyad </th>
                            <th> E-Mail </th>
                            <th> Sil </th>
                        </tr>
                        </thead>
                        <tbody>

                        < ?php foreach($pdo->query("Select * from ebulten order by id desc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <input type="checkbox" name="gonder[]" value="<?=$ebulten->email?>"> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->adsoyad?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->email?> </td>
                                <td><a href="javascript:sil('yonetim.php?modul=ebulten&sayfa=ebulten&islem=sil&id=<?=$ebulten->id?>')" class="btn red btn-xs">Sil</a></td>

                            </tr>
                        < ?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div-->
         <!-- END EXAMPLE TABLE PORTLET>
        <div class="col-md-6">
            < BEGIN EXAMPLE TABLE PORTLET>
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">E-Bulten Ölüştur</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">Başlık</label>
                    <div class="col-md-12">
                        <input type="text" name="baslik" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-12">İçerik</label>
                    <div class="col-md-12">
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
                </div>
                <button type="submit" name="btnkaydet" class="btn green btn-block"><i class="fa fa-pencil"></i> Gönder</button>
                </div>
            </div>
            < END EXAMPLE TABLE PORTLET-->
        </form>
        </div>
    </div>

<!-- END CONTENT BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        alert(inputValue);
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