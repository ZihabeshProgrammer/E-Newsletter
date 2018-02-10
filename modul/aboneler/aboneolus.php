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
   <div class="container">
    <div class="row">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <form method="POST">
        <!-- END EXAMPLE TABLE PORTLET-->
        <div class="col-md-6">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <?php if(isset($_GET['id'])){ 
            	$query = $pdo->query("Select * from bultenler WHERE id = '".$_GET['id']."' order by id asc")->fetch(PDO::FETCH_OBJ);
            	?>
          	    <div class="portlet light bordered">
		                <div class="portlet-title">
		                    <div class="caption font-dark">
		                        <i class="icon-settings font-dark"></i>
		                        <span class="caption-subject bold uppercase">Abone Ölüştur</span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="control-label col-md-12">Ad Soyadi</label>
		                    <div class="col-md-12">
		                        <input type="text" name="baslik" class="form-control" value="<?php echo $query->baslik; ?>">
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="control-label col-md-12">Mail</label>
		                    <div class="col-md-12" style="margin-bottom: 10px;">
		                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
		                            <input type="text" name="date" id="date" class="form-control" value=" <?php echo $query->tarih; ?>">
		                            <div class="input-group-addon">
		                                <span class="glyphicon glyphicon-th"></span>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <br>
		                <div style="margin-left: 150px;">
		                <button type="submit" name="btnkaydet" class="btn green btn-block" style="width:50%;"><i class="fa fa-pencil"></i>Düzenle</button>
		             </div>
         		</div>
           		<?php } else { ?>
          	    <div class="portlet light bordered">
		                <div class="portlet-title">
		                    <div class="caption font-dark">
		                        <i class="icon-settings font-dark"></i>
		                        <span class="caption-subject bold uppercase">Abone Ölüştu</span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="control-label col-md-12"><strong>Ad Soyadi</strong></label>
		                    <div class="col-md-12">
		                        <input type="text" name="adi" class="form-control" >
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="control-label col-md-12"><strong>Mail</strong>:</label>
		                      <div class="col-md-12" style="margin-bottom: 12px;">
                            <input type="text" name="mail" class="form-control" placeholder="example@mail.com">
                          </div>
		                </div>
                    <div class="form-group col-md-12">
                      <label for="multi-append" class="control-label"><strong>Grubu Seç</strong></label>
                      <div class="input-group col-md-12">
                        <select id="multi-append" name="multiselect" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                          <option></option>
                          <?php $i =1; 
                        foreach($pdo->query("Select * from grupler order by id asc",PDO::FETCH_OBJ) as $grupler):?>
                          <option value="<?=$grupler->id?>"><?=$grupler->adi?></option>
                          <?php $i++; endforeach ?>
                        </select><span class="selection"></span>
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button" data-select2-open="multi-append">
                            <span class="glyphicon glyphicon-search"></span>
                          </button>
                        </span>
                      </div>
                    </div>
		                <div style="margin-left: 150px;">
		                <button type="submit" name="btnkaydet" class="btn green btn-block" style="width:50%;"><i class="fa fa-pencil"></i> Ölüştur</button>
		              </div>
         		</div>
         		<?php } ?>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </form>
        <form method="post" enctype="multipart/form-data">
          <div class="col-md-4">
          <div class="row">
            <div class="portlet light bordered">
              <div class="portlet-title">
                  <div class="caption font-dark">
                      <i class="icon-settings font-dark"></i>
                      <span class="caption-subject bold uppercase">Excelden Aktar</span>
                  </div>
              </div>
              <div class="form-group col-md-12">
                <label for="multi-append" class="control-label"><strong>Grubu Seç</strong></label>
                <div class="input-group col-md-12">
                  <select id="multi-append" name="multiselectgrup" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true">
                    <option></option>
                    <?php $i =1; 
                  foreach($pdo->query("Select * from grupler order by id asc",PDO::FETCH_OBJ) as $grupler):?>
                    <option value="<?=$grupler->id?>"><?=$grupler->adi?></option>
                    <?php $i++; endforeach ?>
                  </select><span class="selection"></span>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" data-select2-open="multi-append">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div>
                <div class="form-group">
                  <label class="control-label col-md-12"><strong>Excel/cvs</strong>:</label>
                    <div class="col-md-12" style="margin-bottom: 12px;">
                      <input type="file" name="file"/>
                    </div>  
                </div>

             <div style="margin-left: 150px;">
                <input class="btn btn-success" type="submit" name="submit_file" value="Yukle"/>
            </div>
            </div> 
            </div>
          </div>
        </form>
        </div>
    </div>
  </div> 
<!-- END CONTENT BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<?php
if(isset($_POST["btnkaydet"])){
    if(!empty($_POST["adi"]) && !empty($_POST["mail"])) {   
    	if(isset($_GET['id'])){
                                $query = $pdo->prepare("UPDATE bultenler SET
								                  tarih = :tarih,
            												baslik = :baslik
            												WHERE id = :id");
            								        $updatedefault = $query->execute(array(
            								             "tarih" => $_POST["date"],
            								            "baslik" => $_POST["baslik"],
            								            "id" => $_GET['id']
            								        ));
                                 	if($updatedefault) {
                                 		echo "<script type=\"text/javascript\">

                                    swal({
                                      title: \"Başari!\",
                                      text: \"Bülten ".$_POST['multiselect']." Başari ile Düzenlendi.\",
                                      type: \"success\",
                                      //timer: 3000
                                     }, 
                                      function(){
                                           window.location.href = \"/bulten/yonetim.php?modul=aboneler&sayfa=aboneolus\";
                                          });

                                    </script>";
                                 	}
    	}
    	else{
    		   // $query = $pdo->query("INSERT INTO bultenler ('tarih','baslik') VALUES ('".$_POST["baslik"]."','".$_POST["date"]."')");swal(\"Bülten ".$_POST['baslik']." Başari ile Ölüşturuldu.\");
                $smtin = "";
                $grupid = $_POST['multiselect'];
                $query = $pdo->prepare("INSERT ebulten  SET
                                    adsoyad = :adsoyad,
                                    email = :email
                                ");
                                $updatedefault = $query->execute(array(
                                         "adsoyad" => $_POST["adi"],
                                         "email" => $_POST['mail']
                                ));
                $lastid = $pdo->lastInsertId(); 
                        $updat = $pdo->prepare("INSERT grubabone  SET
                                    grupid = :grupid,
                                    aboneid = :aboneid
                                ");
                            $updatede = $updat->execute(array(
                                "grupid" =>  $grupid,
                                "aboneid" =>  $lastid
                            ));  
                        if ($updatede) {
                          echo "<script type=\"text/javascript\">
                        
                                            swal({
                                              title: \"Başari!\",
                                              text: \"Abone ".$_POST["adi"]." Başari ile kayit edildi.\",
                                              type: \"success\",
                                              //timer: 3000
                                             }, 
                                              function(){
                                                   window.location.href = \"/bulten/yonetim.php?modul=aboneler&sayfa=aboneolus\";
                                                  });

                        </script>";
                      }
                      else{
                            echo "<script type=\"text/javascript\">
                        
                                            swal({
                                              title: \"Dikkat!\",
                                              text: \"Abone ".$_POST["adi"]." Herhabgibir Gruba ait degil.\",
                                              type: \"warning\",
                                              //timer: 3000
                                             }, 
                                              function(){
                                                   window.location.href = \"/bulten/yonetim.php?modul=aboneler&sayfa=aboneolus\";
                                                  });

                        </script>";
                      }
    	}
    }else{
        echo "<script type=\"text/javascript\">swal(\"Lütfen En Az Mailerden Birini Seçiniz.\");</script>";
    }

}


if(isset($_POST["submit_file"]))
{
 $grup = $_POST["multiselectgrup"]; 
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
  $employee_name = $csv[0];
  $employee_designation = $csv[1];
  echo "<script type=\"text/javascript\">alert(\"Lütfen En Az ".$employee_name." Mailerden ".$grup." Birini Seçiniz.\");</script>";
  $stmt = $pdo->prepare("INSERT INTO ebulten(adsoyad, email) VALUES(:adsoyad,:email)");

  $stmt->bindparam(':adsoyad', $employee_name);
  $stmt->bindparam(':email', $employee_designation);
  $stmt->execute();
  $lastid = $pdo->lastInsertId(); 
  $updat = $pdo->prepare("INSERT grubabone  SET
                                 grupid = :grupid,
                                 aboneid = :aboneid
                                ");
                            $updatede = $updat->execute(array(
                                "grupid" =>  $grup,
                                "aboneid" =>  $lastid
                            ));  
 }
}
?>

