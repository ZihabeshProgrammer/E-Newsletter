 <!-- END EXAMPLE TABLE PORTLET-->
 <style type="text/css">
 .haberkutu {
    background: #fff;
    float: left;
    width: 100%;
    margin: 10px 0;
    min-height: 260px;
    height: 320px;
    box-shadow: 0 1px 1px 0 #d3d3d3;
}
.haberkutuimg {
    float: left;
    padding: 12px;
    margin-top: 14px;
    width: 100%;
    box-sizing: border-box; 
}
.haberkutuimg img{
    width:100%;
    height: 165px;
}
.haberkutubaslik {
    float: left;
    width: 100%;
    padding: 10px;
    font-size: 22px;
    height: 36px;
    overflow: hidden;
    margin-top: 5px;
    font-weight: bold;
}
.haberkutuaciklama {
    float: left;
    width: 100%;
    padding: 0 10px;
    font-size: 14px;
    height: 38px;
    overflow: hidden;
    margin-top: 10px;
}
 </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="yonetim.php">Anasayfa</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Ön İzleme</span>
                    </li>
                </ul>
            </div>

    <div class="row">     
        <div class="col-md-8">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered" style="margin-left: 40%;">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">E-Bulten Ölüştur</span>
                    </div>
                </div>
                <!--div class="form-group">
                    <label class="control-label col-md-12">Başlık</label>
                    <div class="col-md-12">
                        <input type="text" name="baslik" class="form-control" >
                    </div>
                </div-->
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
                        <section class="gunun_haberler">
                            <div class="container">
                                 <?php $i =1; 
                        foreach($pdo->query("Select * from haberekl WHERE bultenid = '".$_GET['id']."' order by id desc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                                    <div class="lefthaber">
                                        <div class="col-md-6 col-xs-6">
                                            <a href="<?php echo $ebulten->link ?>" target="_blank" title="<?php echo $ebulten->baslik ?>">
                                                <div class="haberkutu" style=" min-height: 173px;">
                                                    <div class="haberkutuimg">

                                                        <img src="upload/<?php echo $ebulten->id ?>.jpg" alt="<?php echo $ebulten->baslik ?>" class="img-responsive">

                                                    </div>
                                                    <div class="haberkutubaslik"><?php  echo $ebulten->baslik ?></div>
                                                    <div class="haberkutuaciklama"><?php echo  $ebulten->icerik ?></div>
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
                </div>
                <button type="button" name="btnkaydet" id="btnkaydet" class="btn green btn-block"><i class="fa fa-pencil"></i> Gönder</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('#btnkaydet').on('click',function(){
                 swal({
                          title: "Başari!",
                          text: "Bülten Başari ile Düzenlendi.",
                          type: "success",
                          //timer: 3000
                         }, 
                          function(){
                               window.location.href = "/bulten/yonetim/yonetim.php?modul=ebulten&sayfa=gonder&id=<?=$_GET['id']?>";
                              });
        });
    </script>

