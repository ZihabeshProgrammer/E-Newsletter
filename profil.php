<?php $admin = $pdo->query('SELECT * FROM admin  where id="'.$_SESSION['login'].'"')->fetch(PDO::FETCH_OBJ); ?>

		<?php 
	if(isset($_POST["btnkaydet"])){
		if(!empty($_POST["sifre"])){
			$sifre = md5($_POST["sifre"]);
		}else{
			$sifre = $admin->sifre;
		}
		$update = $pdo->prepare("UPDATE admin SET
				kullaniciadi = :kullaniciadi,
				sifre = :sifre,
				eposta = :eposta
			WHERE id = :id");
			$update = $update->execute(array(
					 "kullaniciadi" => $_POST["kullaniciadi"],
					 "sifre" => $sifre,
					 "eposta" => $_POST["eposta"],
					 "id" => $admin->id
			));
		
		if($update){
			$error = "<strong>Başarılı!</strong> Kullanıcı Bilgileriniz Düzenlendi";
			$type = "success";
		}else{
			$error = "<strong>Hatalı!</strong> Kullanıcı Bilgileriniz Düzenlenemedi";
			$type = "danger";
		}
	}
	?>
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
                                 <a href="#">Kullanıcılar</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Kullanıcı Ayarları</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <h3 class="page-title"> Kullanıcı Ayarları
                    </h3>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                    <div class="col-md-12">
											<?php if(isset($error) and !empty($error)):?>
												<div class="alert alert-block alert-<?php echo $type; ?> fade in">
													<button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
													 <?php echo $error; ?>
												</div>
											<?php endif ?>
					<div class="portlet">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form method="POST" class="form-horizontal form-row-seperated"  enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kullanıcı Adı</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="kullaniciadi" class="form-control" value="<?php echo $admin->kullaniciadi; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Şifre</label>
                                                            <div class="col-md-9">
                                                                <input type="password" name="sifre" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">E-Posta</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="eposta" class="form-control" value="<?php echo $admin->eposta; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" name="btnkaydet" class="btn green"><i class="fa fa-pencil"></i> Kaydet</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                        </div>
                        </div>
                        </div>
