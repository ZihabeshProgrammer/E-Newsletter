<?php
	ob_start();
	session_start();
	include "sistem/ayarlar.php";
	include "sistem/fonksiyonlar.php";
	$user = $pdo->query('SELECT * FROM admin  where id="'.$_SESSION['login'].'"')->fetch(PDO::FETCH_OBJ);
	$useryetki = $pdo->query('SELECT * FROM adminyetki  where id="'.$user->yetki.'"')->fetch(PDO::FETCH_OBJ);
	$ayar = $pdo->query('SELECT * FROM ayar WHERE  id = 1')->fetch(PDO::FETCH_OBJ);
if (!kullanici()) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?=$ayar->siteadi?> Yönetim Paneli | Temel Bilişim</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jquery-nestable/jquery.nestable.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="yonetim.php" style="color: #fff;font-weight: bold;margin-top: 13px;font-size: 18px;text-decoration: none;">Yönetim Paneli</a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"> <?=$user->kullaniciadi?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="yonetim.php?sayfa=profil">
                                        <i class="icon-user"></i> Profili Düzenle</a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="yonetim.php?sayfa=cikis">
                                        <i class="icon-key"></i> Çıkış Yap </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li class="nav-item start <?php if(!isset($_GET["modul"]) || !isset($_GET["sayfa"]) ):?>active open <?php endif ?>">
                            <a href="yonetim.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Anasayfa</span>
                                <?php if(!isset($_GET["modul"]) || !isset($_GET["sayfa"]) ):?><span class="selected"></span><?php endif ?>
                        </li>
                            </a>
						<?php 
						$ustmenuler= explode(",", $useryetki->modul);
						foreach ($ustmenuler as $sayfaid):
							$modul = $pdo->query("Select * from moduls where  durum='1' and id='".$sayfaid."' order by sira asc")->fetch(PDO::FETCH_OBJ); 
							$sayfa = $pdo->query("Select * from moduls where ustid='".$modul->id."'  and durum='1' order by sira asc"); 
							$sayfasay = $sayfa->rowCount();
						if ($sayfasay > 0):
							?>
						
                        <li class="nav-item <?php if(isset($_GET["modul"])): if($_GET["modul"] == $modul->modul ): ?>active open <?php endif ; endif ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="<?=$modul->icon?>"></i>
                                <span class="title"><?=$modul->baslik?></span>
                                <span class="arrow"></span>
                                <?php if(isset($_GET["modul"])): if($_GET["modul"] == $modul->modul ): ?><span class="selected"></span><?php endif ; endif ?>
                            </a>
                            <ul class="sub-menu">
							<?php foreach($pdo->query("Select * from moduls where ustid='".$modul->id."'  and durum='1' order by sira asc",PDO::FETCH_OBJ) as $sayfa): ?>
                                <li class="nav-item  <?php if(isset($_GET["sayfa"])): if($_GET["sayfa"] == $sayfa->modul ): ?>active open <?php endif ; endif ?> ">
                                    <a href="yonetim.php?modul=<?=$modul->modul?>&sayfa=<?=$sayfa->modul?>" class="nav-link ">
                                        <span class="title"><?=$sayfa->baslik?></span>
                                <?php if(isset($_GET["sayfa"])): if($_GET["sayfa"] == $sayfa->modul ): ?><span class="selected"></span><?php endif ; endif ?>
                                    </a>
                                </li>
							<?php endforeach ?>
                            </ul>
                        </li>
						<?php else : ?>
                        <li class="nav-item <?php if(isset($_GET["modul"])): if($_GET["modul"] == $modul->modul ): ?>active open <?php endif ; endif ?>">
                            <a href="yonetim.php?modul=<?=$modul->modul?>&sayfa=<?=$modul->modul?>" class="nav-link nav-toggle">
                                <i class="<?=$modul->icon?>"></i>
                                <span class="title"><?=$modul->baslik?></span>
                                <span class="arrow"></span>
                                <?php if(isset($_GET["modul"])): if($_GET["modul"] == $modul->modul ): ?><span class="selected"></span><?php endif ; endif ?>
                            </a>
                        </li>
						<?php endif ?>
						<?php endforeach ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
				<?php
				$sayfa="";
			if ((isset($_GET['sayfa'])) and (!isset($_GET['modul']))) {
					include($_GET['sayfa'] . ".php");
				} elseif ((isset($_GET['sayfa'])) and (isset($_GET['modul']))) {
					$ustmenuler= explode(",", $useryetki->modul); 
					foreach ($ustmenuler as $sayfaid){
					$modul = $pdo->query("Select * from moduls where  durum='1' and id='".$sayfaid."' order by sira asc")->fetch(PDO::FETCH_OBJ); 
					
					if($_GET["modul"] == $modul->modul){ 
						$sayfa=include("modul/" . $_GET['modul'] . "/" . $_GET['sayfa'] . ".php");
					}
					}
					if(!empty($sayfa)){ 
						echo $sayfa;
					}else{
						include("yetkisiz.php");	
					}
					
				} else {
					include("modul/ebulten/ebulten.php");
				}
				?>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> <?=date("Y")?> &copy; <?=$ayar->siteadi?>
                <a href="http://temelbilisim.com.tr" title="Temel Bilişim" target="_blank">Temel Bilişim</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
		
        <script src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/form-samples.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script> 
		<script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>
		<script src="assets/pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
		 <script src="ajax/menu/functions.js"></script>
		 <script src="ajax/menu/jquery.nestable.js"></script>
<script>
$(function () {
  $('[data-title="tooltip"]').tooltip()
})
    $(document).ready(function()
    {

        /* The output is ment to update the nestableMenu-output textarea
         * So this could probably be rewritten a bit to only run the menu_updatesort function onchange
         */

        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list menu
        $('#nestableMenu').nestable({
            group: 1
        })
            .on('change', updateOutput);



        // output initial serialised data
        updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

        $('#nestable-menu').on('click', function(e)
        {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();

    });
</script>
<script>
	function sil(adres)
	{
		if(confirm("Kaydi Silmek Istediginden Emin misin ?"))
		{
			document.location = adres;
		}
	}
</script> 
<script type="text/javascript" language="javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAU33He5odeoqcfmAcqlBk6XcbOPNu3g_g"></script>
<script type="text/javascript">
    var map;

    function initialize() {
        var myLatlng = new google.maps.LatLng(37.872667, 32.493121);

        var myOptions = {
            zoom: 8,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var marker = new google.maps.Marker({
            draggable: true,
            position: myLatlng,
            map: map,
            title: "Your location"
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {

			  document.getElementById("lat").value = this.getPosition().lat();
				document.getElementById("long").value = this.getPosition().lng();
        });
    }
    google.maps.event.addDomListener(window, "load", initialize());
</script>

<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
});
</script>
    </body>

</html>