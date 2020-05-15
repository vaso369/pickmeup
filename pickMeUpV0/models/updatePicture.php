<?php 

if(isset($_POST['btnSavePh'])){
    require_once "../config/connection.php";
    require_once "functions.php";
    $fajl_naziv = $_FILES['userPhoto']['name'];
    $fajl_tmpLokacija = $_FILES['userPhoto']['tmp_name'];
    $fajl_tip = $_FILES['userPhoto']['type'];
    $fajl_velicina = $_FILES['userPhoto']['size'];
    $id=$_POST['userId'];
    var_dump($id);

    $greske = [];


    if($fajl_velicina > 9000000){
        array_push($greske, "Maksimalna velicina fajla je 9MB. - Profil slika");
    }

    
    if(count($greske) == 0){


         $dimenzije = getimagesize($fajl_tmpLokacija);
         $sirina = $dimenzije[0];
         $visina = $dimenzije[1];

        $postojecaSlika = null;
        switch($fajl_tip){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                break;
        }

         $novaSirina = 250;
         $novaVisina = 250;


        $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);

        imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);


        // UPLOAD NOVE SLIKE
        $naziv = time().$fajl_naziv;
        $putanjaNovaSlika = 'assets/images/nova_'.$naziv;

        switch($fajl_tip){
            case 'image/jpeg':
                imagejpeg($novaSlika, '../'.$putanjaNovaSlika, 75);
                break;
            case 'image/png':
                imagepng($novaSlika, '../'.$putanjaNovaSlika);
                break;
        }

        $putanjaOriginalnaSlika = 'assets/images/'.$naziv;

        if(move_uploaded_file($fajl_tmpLokacija, '../'.$putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $isUpdated = update($putanjaNovaSlika,$putanjaOriginalnaSlika,$id);

                if($isUpdated){
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location:../index.php?page=login");
                    
                }
                
            } catch(PDOException $ex){
                
                echo $ex->getMessage();
                catchErrors("updatePicture.php ->".$e->getMessage());
            }
        }

        // brisanje iz memorije
        imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);

    } else {
        var_dump($greske);
    }
}else{
    header("Location:index.php?page=login");
}