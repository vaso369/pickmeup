<?php 
define("OFFSET", 3); 
define("OFFSET_USERS", 12); 
function getOneUser($id) {

    $user=executeQueryOneRow("SELECT u.id,u.username,u.picture,u.pass,u.fname,u.lname,u.email,u.idUni,u.idCity,c.city AS userCity,un.university AS userUni,un.id AS idUni FROM users u INNER JOIN cities c ON u.idCity=c.id INNER JOIN universities un ON u.idUni=un.id WHERE u.id=$id");
    return $user;

}
function update($putanjaNovaSlika,$putanjaOriginalnaSlika,$id){
    global $conn;
   
    $update = $conn->prepare("UPDATE users SET picture='$putanjaNovaSlika',pictureOriginal='$putanjaOriginalnaSlika' WHERE id=$id");
    $isUpdated = $update->execute([$putanjaNovaSlika]);
    return $isUpdated;
}
function get_pagination_count() {
    $result = get_num_of_transports();
    $num_of_movies = $result->num_of_transports;

    return ceil($num_of_movies /OFFSET);
}
function get_paginationUsers_count() {
    $result = get_num_of_users();
    $num_of_users = $result->num_of_users;

    return ceil($num_of_users / OFFSET_USERS);
}
function get_num_of_users(){
    return executeQueryOneRow("SELECT COUNT(*) AS num_of_users FROM users");
}
function get_num_of_transports(){
    return executeQueryOneRow("SELECT COUNT(*) AS num_of_transports FROM transports");
}
function getUsersAll($limit = 0) {
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM users ORDER BY id DESC LIMIT :limits, :offset");
        
        // Uzima se po 3 reda:

        // Ako se prosledi $limit = 0 -> treba da krece od 0 reda i prikazuje do 3
        // Ako se prosledi $imit = 1 -> treba da krece od 3 reda i prikazuje do 6
        
        // Vidimo da se taj broj povecava za 3, a 3 je OFFSET, tako da prosledjeni broj mnozimo sa 3

        $limit = ((int) $limit) * OFFSET_USERS;


        // Ovo se moze postici samo sa metodom "bindParam()"
        // Ako ne bismo promenili u INT, iako je broj, u upitu bi se prikazao kao LIMIT '1', '3'
        $select->bindParam(":limits", $limit, PDO::PARAM_INT); 

        $offset = OFFSET_USERS;
        $select->bindParam(":offset", $offset, PDO::PARAM_INT);

        $select->execute(); 

        $users = $select->fetchAll();

        return $users;
    }
    catch(PDOException $ex){
        return null;
    }
}
function getTransportsAll($limit = 0) {
    global $conn;
    try{
        $select = $conn->prepare("SELECT *,t.id AS idT,us.id AS userId,un.id AS uniId FROM transports t INNER JOIN users us ON t.idDriver=us.id INNER JOIN universities un ON t.idUni=un.id ORDER BY t.id DESC LIMIT :limits, :offset");
        
        // Uzima se po 3 reda:

        // Ako se prosledi $limit = 0 -> treba da krece od 0 reda i prikazuje do 3
        // Ako se prosledi $imit = 1 -> treba da krece od 3 reda i prikazuje do 6
        
        // Vidimo da se taj broj povecava za 3, a 3 je OFFSET, tako da prosledjeni broj mnozimo sa 3

        $limit = ((int) $limit) * OFFSET;


        // Ovo se moze postici samo sa metodom "bindParam()"
        // Ako ne bismo promenili u INT, iako je broj, u upitu bi se prikazao kao LIMIT '1', '3'
        $select->bindParam(":limits", $limit, PDO::PARAM_INT); 

        $offset = OFFSET;
        $select->bindParam(":offset", $offset, PDO::PARAM_INT);

        $select->execute(); 

        $transports = $select->fetchAll();

        return $transports;
    }
    catch(PDOException $ex){
        return null;
    }
}

   
   
function last24() {
     $ok=[];
     $proba=[];
        $date=date('d-m-Y H:i:s');
        
        $nizDatum=explode(" ",$date);
        // IMAM DATUM 
        $datum=$nizDatum[0];
        $nizDtm=explode("-",$datum);
        $dan=$nizDtm[0];
        array_push($proba,$dan);
        $mesec=$nizDtm[1];
        $godina=$nizDtm[2];
        // IMAM VREME
        $vreme=$nizDatum[1];
        $vremeNiz=explode(":",$vreme);
        $sat=(int)$vremeNiz[0];
        $minut=$vremeNiz[1];
        $sekund=$vremeNiz[2];
    
    
        $timeServ=mktime(0,0,0,$mesec,$dan,$godina);
        $dayBefore=strtotime("yesterday",$timeServ);
        $formated=date('d-m-Y H:i:s',$dayBefore);
        $nizFormatedDatum=explode(" ",$formated);
        $datumFormNiz=$nizFormatedDatum[0];
        $explodeNiz=explode("-",$datumFormNiz);
        $danForm=$explodeNiz[0];
        $mesecForm=$explodeNiz[1];
        $godinaForm=$explodeNiz[2];
        array_push($proba,$danForm);
        array_push($proba,$mesecForm);
        array_push($proba,$godinaForm);

        // IMAM DAN PRE
    
        $nas_fajl="LOG_FAJL";
        $sadrzaj=file(BASE_URL . "data/log.txt");
        $brojRedova=count($sadrzaj);
        for($i=0;$i<$brojRedova;$i++){
            $razbijen=explode("\t",$sadrzaj[$i]);
           @ $datumLog=$razbijen[1];
            $nizDatumLog=explode(".",$datumLog);
            $danLog=$nizDatumLog[0];
           @ $mesecLog=$nizDatumLog[1];
            @$godina=$nizDatumLog[2];
            @$vremeLog=$razbijen[1];
            @$vremeDesno=explode(" ",$vremeLog)[1];
            $vremeNizLog=explode(":",$vremeDesno);
            $satLog=(int)$vremeNizLog[0];

            if($danLog==$danForm){
                if($satLog>=$sat){
                    array_push($ok,$sadrzaj[$i]); 
                }
                

            }
            if($danLog==$dan){
                array_push($ok,$sadrzaj[$i]);
            }
            
               
                
                
            }
            $brojOk=count($ok);
            $brRegister=0;
            $brEdit=0;
            $brLogin=0;
            $brFind=0;
            $brOffer=0;
            $brAbout=0;
            $brHome=0;
            $brAdmin=0;
            $nizBack=[];
            for($i=0;$i<$brojOk;$i++){
                $cepljen=explode("\t",$ok[$i]);
                $prvi=$cepljen[0];
                if (strpos($prvi, 'index.php') !== false) {
                    if($prvi==="index.php?page=register"){
                        $brRegister+=1;
                    }
                    if($prvi==="index.php?page=edit"){
                        $brEdit+=1;
                    }
                    if($prvi==="index.php?page=login"){
                        $brLogin+=1;
                    }
                    if($prvi==="index.php?page=find"){
                        $brFind+=1;
                    }
                    if($prvi==="index.php?page=offer"){
                        $brOffer+=1;
                    }
                    if($prvi==="index.php?page=about"){
                        $brAbout+=1;
                    }
                    if($prvi==="index.php"){
                        $brHome+=1;
                    }
                    if($prvi==="index.php?page=home"){
                        $brHome+=1;
                    }
                    if($prvi==="index.php?page=admin"){
                        $brAdmin+=1;
                    }
                }
            }
            array_push($nizBack,$brRegister);
            array_push($nizBack,$brEdit);
            array_push($nizBack,$brLogin);
            array_push($nizBack,$brFind);
            array_push($nizBack,$brOffer);
            array_push($nizBack,$brAbout);
            array_push($nizBack,$brHome);
            array_push($nizBack,$brAdmin);

        

        return $nizBack;
    }
    function pagePercents(){
        $brStrana=[];
        $percents=[];
        $nas_fajl2="LOG_FAJL";
        $sadrzaj2=file(BASE_URL . "data/log.txt");
     //   return $sadrzaj2;
        $brojRedova2=count($sadrzaj2);
        $brRegister=0;
        $brEdit=0;
        $brLogin=0;
        $brFind=0;
        $brOffer=0;
        $brAbout=0;
        $brIndexPage=0;
        $brHome=0;
        $brAdmin=0;

        for($i=0;$i<$brojRedova2;$i++){
            $cepljen=explode("\t",$sadrzaj2[$i]);
            $prvi=$cepljen[0];
            if (strpos($prvi, 'index.php') !== false) {
                array_push($brStrana,$sadrzaj2[$i]);
                if($prvi==="index.php?page=register"){
                    $brRegister+=1;
                }
                if($prvi==="index.php?page=edit"){
                    $brEdit+=1;
                }
                if($prvi==="index.php?page=login"){
                    $brLogin+=1;
                }
                if($prvi==="index.php?page=find"){
                    $brFind+=1;
                }
                if($prvi==="index.php?page=offer"){
                    $brOffer+=1;
                }
                if($prvi==="index.php?page=about"){
                    $brAbout+=1;
                }
                if($prvi==="index.php"){
                    $brHome+=1;
                }
                if($prvi==="index.php?page=home"){
                    $brHome+=1;
                }
                if($prvi==="index.php?page=admin"){
                    $brAdmin+=1;
                }
            }
            
            
        }
        $brStranaVal=count($brStrana);
        $procenatRegister=round(($brRegister/$brStranaVal)*100,2);
        $procenatEdit=round(($brEdit/$brStranaVal)*100,2);
        $procenatLogin=round(($brLogin/$brStranaVal)*100,2);
        $procenatFind=round(($brFind/$brStranaVal)*100,2);
        $procenatOffer=round(($brOffer/$brStranaVal)*100,2);
        $procenatAbout=round(($brAbout/$brStranaVal)*100,2);
        $procenatHome=round(($brHome/$brStranaVal)*100,2);
        $procenatAdmin=round(($brAdmin/$brStranaVal)*100,2);
        
        
        array_push($percents,$procenatRegister);
        array_push($percents,$procenatEdit);
        array_push($percents,$procenatLogin);
        array_push($percents,$procenatFind);
        array_push($percents,$procenatOffer);
        array_push($percents,$procenatAbout);
        array_push($percents,$procenatHome);
        array_push($percents,$procenatAdmin);
        $sum=0;
        return $percents;
    }
   function getAuthor(){
    $autor=executeQueryOneRow("SELECT * FROM author");
    return $autor;
   }
     
//function getTransports(){
    global $conn;
    $upit="SELECT *,t.id AS idT,us.id AS userId,un.id AS uniId FROM transports t INNER JOIN users us ON t.idDriver=us.id INNER JOIN universities un ON t.idUni=un.id ORDER BY t.id DESC ";
///$rezultat=executeQuery($upit);
//return $rezultat;
//}
function catchErrors($error){
    require_once "../config/config.php";
    @$open = fopen(ERROR_FILE, "a");
    $unos = $error."\t".date('d-m-Y H:i:s'). "\n";
    @fwrite($open, $unos);
    @fclose($open);
   }