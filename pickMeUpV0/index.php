<?php 
require_once "config/connection.php";
include "views/fixed/head.php";
include "views/fixed/header.php";
if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'home':
           include "views/fixed/mainView.php";
           break;
        case 'register':
           include "views/pages/registerView.php";
           break;
           case 'edit':
           include "views/pages/menu.php";
            include "views/pages/userHome.php";
            include "views/pages/pagination.php";
            include "views/pages/userProfile.php";
           include "views/pages/editProfile.php";
           break;
        case 'login':
        if(isset($_SESSION['userPart'])==2){
            include "views/pages/menu.php";
            include "views/pages/userHome.php";
            include "views/pages/pagination.php";
            include "views/pages/userProfile.php";      
            }
            else{
                header("Location:index.php");
            }
           break;
           case 'admin':
            if(isset($_SESSION['userPart'])==1){
                include "views/pages/adminView24h.php";
                include "views/pages/statistics.php";
                include "views/pages/loggedIn.php";
                include "views/pages/allUsersAdmin.php";
                include "views/pages/paginationUsers.php";
            }
            else{
                header("Location:index.php");
            }
           break;
           case 'find':
           include "views/pages/menu.php";
            include "views/pages/userHome.php";
            include "views/pages/pagination.php";
            include "views/pages/userProfile.php"; 
           include "views/pages/findTransport.php";
           break;
           case 'offer':
           include "views/pages/menu.php";
            include "views/pages/userHome.php";
            include "views/pages/pagination.php";
            include "views/pages/userProfile.php"; 
           include "views/pages/offerTransport.php";
           break;
           case 'about':
           include "views/pages/menu.php";
           include "views/pages/userProfile.php"; 
           include "views/pages/aboutUs.php";
           break;
        default: 
            include "views/fixed/mainView.php";
            break;
    }

} else {
    include "views/fixed/mainView.php";
}


include "views/fixed/footer.php";

	