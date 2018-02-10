<?php
if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM ebulten WHERE id = :id");
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
        <form method="POST">
        <!-- END EXAMPLE TABLE PORTLET-->
        <div class="col-md-6" style="left: 25%; right: 25%;">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <?php if(isset($_GET['id'])){ 
            	$query = $pdo->query("Select * from bultenler WHERE id = '".$_GET['id']."' order by id asc")->fetch(PDO::FETCH_OBJ);
            	?>
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
		                        <input type="text" name="baslik" class="form-control" value="<?php echo $query->baslik; ?>">
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="control-label col-md-12">Tarih</label>
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
		                    <label class="control-label col-md-12">Tarih</label>
		                    <div class="col-md-12" style="margin-bottom: 10px;">
		                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
		                            <input type="text" name="date" id="date" class="form-control">
		                            <div class="input-group-addon">
		                                <span class="glyphicon glyphicon-th"></span>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <br>
		                <div style="margin-left: 150px;">
		                <button type="submit" name="btnkaydet" class="btn green btn-block" style="width:50%;"><i class="fa fa-pencil"></i> Ölüştur</button>
		             </div>
         		</div>
         		<?php } ?>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
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
<?php
if(isset($_POST["btnkaydet"])){
    if(!empty($_POST["baslik"]) && !empty($_POST["date"])) {   
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
                                      text: \"Bülten ".$_POST['date']." Başari ile Düzenlendi.\",
                                      type: \"success\",
                                      //timer: 3000
                                     }, 
                                      function(){
                                           window.location.href = \"/bulten/yonetim.php?modul=ebulten&sayfa=ebulten\";
                                          });

                                    </script>";
                                 	}
    	}
    	else{
    		   // $query = $pdo->query("INSERT INTO bultenler ('tarih','baslik') VALUES ('".$_POST["baslik"]."','".$_POST["date"]."')");swal(\"Bülten ".$_POST['baslik']." Başari ile Ölüşturuldu.\");
                $query = $pdo->prepare("INSERT bultenler  SET
                                    tarih = :tarih,
                                    baslik = :baslik
                                ");
                                $updatedefault = $query->execute(array(
                                         "tarih" => $_POST["date"],
                                         "baslik" => $_POST['baslik']
                                ));

                echo "<script type=\"text/javascript\">

                                    swal({
                                      title: \"Başari!\",
                                      text: \"Bülten ".$_POST['date']." Başari ile Ölüşturuldu.\",
                                      type: \"success\",
                                      //timer: 3000
                                     }, 
                                      function(){
                                           window.location.href = \"/bulten/yonetim.php?modul=ebulten&sayfa=ebulten\";
                                          });

                </script>";
    	}
    }else{
        echo "<script type=\"text/javascript\">swal(\"Lütfen En Az Mailerden Birini Seçiniz.\");</script>";
    }

}
?>

