<?php

if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM grupler WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:yonetim.php?modul=aboneler&sayfa=guruplandir");
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
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Grup Oluştur </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2">Grup adi</label>
                        <div class="col-md-8" style="margin-bottom: 10px;">
                             <input type="text" name="baslik" id="baslik" class="form-control" >
                        </div>
                    </div> 
                 <button type="submit" name="btnhaber" class="btn green" style="width:25%; margin-left: 30%"><i class="fa fa-pencil"></i> Oluştur</button>
                </div>
            </div> 
         </div>
          <div class="col-md-6">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Grupler </span>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_1">
                        <thead>
                        <tr>
                            <th> Sira </th>
                            <th> Adi </th>
                            <th> Işlem </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i =1;
                        foreach($pdo->query("Select * from grupler order by id desc",PDO::FETCH_OBJ) as $grupler):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <?=$grupler->id?> </td>
                                <td style="vertical-align: middle;"> <?=$grupler->adi?> </td>
                                <td><a href="javascript:sil('yonetim.php?modul=aboneler&sayfa=guruplandir&islem=sil&id=<?=$grupler->id?>')" class="btn red">Sil</a>
                                <a href="yonetim.php?modul=aboneler&sayfa=abonekle&id=<?=$grupler->id?>" type="button" class="btn btn-primary">Abone ekle</a>
                                </td>
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
<?php
if(isset($_POST["btnhaber"])){
    if (!empty($_POST['baslik'])) {
        
        $query = $pdo->prepare("INSERT grupler  SET
                        adi = :adi
                    ");
                    $updatedefault = $query->execute(array(
                             "adi" => $_POST['baslik']
                    ));
                    if ($updatedefault) {
                            echo "<script type=\"text/javascript\">

                                    swal({
                                      title: \"Başari!\",
                                      text: \"Grup ".$_POST['baslik']." Başari ile Oluştu.\",
                                      type: \"success\",
                                      //timer: 3000
                                     }, 
                                      function(){
                                           window.location.href = \"/bulten/yonetim.php?modul=aboneler&sayfa=guruplandir\";
                                          });

                                     </script>";
                                    }
                         }
    else{
        echo "<script type=\"text/javascript\">alert(\"Lütfen En Az Mailerden Birini Seçiniz.\");</script>";
    }
}
?>