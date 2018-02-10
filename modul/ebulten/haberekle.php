<?php

if(isset($_GET["islem"])){
    $query = $pdo->prepare("DELETE FROM haberekl WHERE id = :id");
    $delete = $query->execute(array(
        'id' => $_GET['id']
    ));
    header ("Location:/bulten/yonetim.php?modul=ebulten&sayfa=haberekle&id=1");
}
?>

<style type="text/css">
/*input[type="file"] {
    display: none;
}*/
.custom-file-upload {
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    color: #fff;
    border-radius: 4px; 
    background-color: #c49f47;
    border-color: #c49f47;
    line-height: 1.60;
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
    	<div class="col-md-12">
    		
            <!-- END EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <form method="POST" enctype="multipart/form-data">      
		                <div class="portlet-title">
		                    <div class="caption font-dark">
		                        <i class="icon-settings font-dark"></i>
		                        <span class="caption-subject bold uppercase"> Haber ekleme </span>
		                    
		                    <!--div style="float: right;">
		                        <input class="btn btn-primary" type="button" name="ekle" id="ekle" value="Haberler Ekle">
		                    </div-->
		                    </div>
		                </div>
		                <?php if (isset($_GET['id'])) {
		                	$bultenid = $_GET['id'];
		                } ?>
		                <input type="hidden" name="bulteid" value="<?php echo $bultenid ?>">
		                <div style="margin-top: 50px;">  	
		               		   <div class="form-group">
				                    <label class="control-label col-md-2">Başlık</label>
				                    <div class="col-md-10"  style="margin-bottom: 10px;">
				                        <input type="text" name="baslik" id="baslik" class="form-control" >
				                    </div>
				                </div>
				                 <div class="form-group">
				                    <label class="control-label col-md-2">içerik</label>
				                    <div class="col-md-10"  style="margin-bottom: 10px;">
				                        <input type="text" name="aciklama" id="aciklama" class="form-control" >
				                    </div>
				                </div>
				                 <div class="form-group">
				                    <label class="control-label col-md-2">link</label>
				                    <div class="col-md-10"  style="margin-bottom: 10px;">
				                        <input type="text" name="link" id="link" class="form-control"  placeholder="https://orneklink.com">
				                    </div>
				                </div>
				                <div class="form-group">
								    <label  class="control-label col-md-2">Resim seç</label>
								    <div class="col-md-10"  style="margin-bottom: 10px;">
								   	     <input type="file" class="form-control-file"  name="resim" aria-describedby="fileHelp">
								   	</div>     
								</div>
		                </div>
		                 <button type="submit" name="btnhaber" class="btn green" style="width:25%; margin-left: 30%"><i class="fa fa-pencil"></i> Oluştur</button>
			        </form>
            </div>

    	</div>
             <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Mevcüt Haberler </span>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-colum" id="sample_1">
                        <thead>
                        <tr>
                            <th> sıra </th>
                            <th>  Başlık </th>
                            <th> içerik </th>
                            <th> link </th>
                            <th> Sil </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; 
                        foreach($pdo->query("Select * from haberekl order by id asc",PDO::FETCH_OBJ) as $haberekl):
                            ?>
                            <tr class="odd gradeX">
                                <td style="vertical-align: middle;"> #<?=$i?> </td>
                                <td style="vertical-align: middle;"> <?=$haberekl->baslik?> </td>
                                <td style="vertical-align: middle;"> <?=$haberekl->icerik?> </td>
                                <td style="vertical-align: middle;"> <?=$haberekl->link?> </td>
                                <td><a href="javascript:sil('yonetim.php?modul=ebulten&sayfa=haberekle&islem=sil&id=<?=$haberekl->id?>')" class="btn red btn-xs">Sil</a></td>

                            </tr>
                        <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </div>

<!-- END CONTENT BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!--script type="text/javascript">
$(document).ready(function(){
    $('#btnhaber').click(function(){
      swal({
		  title: "Başlik giriniz!",
		  text: "Haber Başlik yazin:",
		  type: "input",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  animation: "slide-from-top",
		  inputPlaceholder: "başlik yazin"
		},
		function(inputValue){
		  if (inputValue === false) return false;

		  if (inputValue === "") {
		    swal.showInputError("Başlik girmeniz gerek!");
		    return false
		  }

		   $.ajax({
						type: "post",
						url:  "c",
                        data: { 'inputValue': inputValue},
                        success: function(data){
                        	swal("Başarı!", "Haber: '" + inputValue +"' kayit edildi")
                        }
			   }).done(function(data) {
			   	//  swal("Başarı!", "Haber: '" + inputValue +"' kayit edildi");
			 	  //window.location.href = "/bulten/yonetim/yonetim.php?modul=ebulten&sayfa=haberekle";
		   	}).error(function(data) {
		   		  swal("Oops", "We couldn't connect to the server!", "error");
		   	});
		});
    });
});
</script-->
<!--script type="text/javascript">
    var i = 2;
	$("#ekle").on("click", function () {  
         $("#mytable").append("<tr><td><div class=\"input-group input-group-sm mb-3\"><input style=\"width: 250px; margin-top: 10px; margin-left: 25px;\" type=\"text\" class=\"form-control\" aria-label=\"Small\" aria-describedby\"inputGroup-sizing-sm\" name=\"baslik[]\"></div></td><td> <textarea class=\"form-control\" rows=\"2\" id=\"aciklama[]\"></textarea></td><td><div class=\"input-group mb-3\" style=\"margin-top: 14px;\"><span for=\"basic-url\">URL</span><input style=\"margin-left: 38px;margin-top: -24px;\" type=\"text\" class=\"form-control\" id=\"basic-url\" aria-describedby=\"basic-addon3\" name=\"link[]\"  placeholder=\"http://example.com\"></div></td><td><div style=\" margin-top: 10px; margin-left: 15px;\"><label style=\"margin-right: 3px;\"for=\"file-upload\" class=\"custom-file-upload\"> <i class=\"fa fa-picture-o\"></i></label><input id=\"file-upload\" type=\"file\" name=\"resim\"/><input type=\"button\" class=\"btn red\" name=\"sil\" id=\"sil\" value=\"Sil\"></div></td></tr>\"");
         i++;
    });
</script-->
<script type="text/javascript">
    $('#maintable').on('click','#sil',function(){
   		    $(this).closest('tr').remove();
	});
</script>
<script>
	$( "form" ).on('submit', function( event ) {
		  //console.log( $( this ).serializeArray() );
		  event.preventDefault();
		      $.ajax({
                url	:'modul/ebulten/ajax.php',
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
			     swal("Başarı!", "Haberler Eklendi");
			 	 window.location.href = "/bulten/yonetim.php?modul=ebulten&sayfa=haberekle&id=<?=$_GET['id']?>";
                }
            });
		});
</script>