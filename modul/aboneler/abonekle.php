<?php

if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM ebulten WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:../yonetim.php?modul=aboneler&sayfa=aboneler");
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
                             <th> Seç </th>
                            <th> Sira </th>
                            <th>  K.Tarihi </th>
                            <th> Ad Soyad </th>
                            <th> E-Mail </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i =1; 
                        foreach($pdo->query("Select * from ebulten order by id asc",PDO::FETCH_OBJ) as $ebulten):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <input type="checkbox" name="habergonder[]" value="<?=$ebulten->id?>"> </td>
                                <td style="vertical-align: middle;"> <?php echo "#".$i; ?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->adsoyad?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->email?> </td>
                            </tr>
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" name="btnhaber" class="btn green" style="width:25%; margin-left: 25%; margin-bottom: 20px"><i class="fa fa-pencil"></i> Ekle</button>

             </div>
         
        </form>
                  <div class="col-md-6">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Mevcüt Aboneler </span>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_1">
                        <thead>
                        <tr>
                            <th> Sira </th>
                            <th>  K.Tarihi </th>
                            <th> Ad Soyad </th>
                            <th> E-Mail </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i =1; 
               // $abonasay = $pdo->query("Select aboneid from grubabone  where grupid = '".$_GET['id']."'")->fetch(PDO::FETCH_OBJ);
                       
            foreach ($pdo->query("Select aboneid from grubabone where grupid = '".$_GET['id']."'",PDO::FETCH_OBJ) as $value) {
                    $ebulten = $pdo->query("Select * from ebulten WHERE id = '".$value->aboneid."' order by id asc")->fetch(PDO::FETCH_OBJ);
                        ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> <?php echo "#".$i ?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->tarih?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->adsoyad?> </td>
                                <td style="vertical-align: middle;"> <?=$ebulten->email?> </td>
                            </tr>
                        <?php $i++; 
                        }   ?>
                        </tbody>
                    </table>
                </div>
             </div>
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
    if (!empty($_POST['habergonder'])) {
                            $abone =  "";
                            $aboneta = "";    
                            $habersayi = @count($_POST["habergonder"]);
                            $kardasimsaysana = 0;
                            while ($kardasimsaysana < $habersayi) {
                                $abone .= $_POST["habergonder"][$kardasimsaysana].",";

                                $kardasimsaysana++;
                            }
                            $aboneta = rtrim($abone,",");
                              $query = $pdo->prepare("UPDATE grupler SET
                                                    aboneler = :aboneler
                                                    WHERE id = :id");
                                                    $updatedefault = $query->execute(array(
                                                        "aboneler" =>  $aboneta,
                                                        "id" => $_GET['id']
                                                    ));
                                    if($updatedefault) {
                                        echo "<script type=\"text/javascript\">

                                        swal({
                                          title: \"Başari!\",
                                          text: \"Aboneler Grupa Eklendi.\",
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