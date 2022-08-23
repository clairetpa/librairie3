<?php

class Privileges {
    /* Permet de securiser les controllers, si pas admin on redirige
    le user vers la page d'accueil */
    static public function CheckAdmin(){
        if($_SESSION['privilege_id'] != 1){
            RequirePage::redirect('index.php');
        } else {
            return TRUE;
        }
    }
}