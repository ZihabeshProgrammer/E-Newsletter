
<?php 
    ob_start();
    session_start();
    include "../../sistem/ayarlar.php";
    include "../../sistem/fonksiyonlar.php";
    $user = $pdo->query('SELECT * FROM admin  where id="'.$_SESSION['login'].'"')->fetch(PDO::FETCH_OBJ);
    $useryetki = $pdo->query('SELECT * FROM adminyetki  where id="'.$user->yetki.'"')->fetch(PDO::FETCH_OBJ);
    $ayar = $pdo->query('SELECT * FROM ayar WHERE  id = 1')->fetch(PDO::FETCH_OBJ);
if (!kullanici()) {
    header("Location:index.php");
}


         if (!empty($_POST["baslik"]) && !empty($_POST["aciklama"]) && !empty($_POST["link"])) {

                                 $query = $pdo->prepare("INSERT haberekl  SET
                                            baslik = :baslik,
                                            icerik = :icerik,
                                            bultenid   = :bultenid,
                                            link  = :link
                                        ");
                                        $updatedefault = $query->execute(array(
                                                 "baslik" => $_POST["baslik"],
                                                 "icerik" => $_POST["aciklama"],
                                                 "bultenid" => $_POST["bulteid"],
                                                 "link" => $_POST["link"]
                                        ));
                                        echo "string";
                    }

                    $lastid = $pdo->lastInsertId();
                  if(!empty($_FILES["resim"]["name"])){
                           move_uploaded_file($_FILES["resim"]["tmp_name"],"../../upload/".$lastid.".jpg");
                      }

             
        

   ?>     