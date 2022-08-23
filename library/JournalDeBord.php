<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Journal');

class JournalDeBord {

    static public function Enregistrer(){

        $pages = [
            '/' => 'Accueil',
            'auteur' => 'Page ajouter un auteur',
            'editeur' => 'Page Ajouter un editeur',
            'journal' => 'Page Consulter le journal de bord',
            'livre/creer' => 'Page de création de livre',
            'livre/details' => 'Page de details de livre',
            'livre/editer' => 'Page pour editer un livre',
            'livre/supprimer' => 'Suppression livre',
            'login' => 'Page de login',
            'user/create' => 'Page de creation utilisateur'
        ];

        if(isset($pages[$_SESSION['url']])){
            $user = 'Guest';
            if(isset($_SESSION['username'])){
                $user = $_SESSION['username'];
            }
            $date = date('y-m-d');
            $IP = JournalDeBord::get_client_ip();
            $page = $pages[$_SESSION['url']];
            $request = [];
            $request['ip'] = $IP;
            $request['date_visite'] = $date;
            $request['username'] = $user;
            $request['page_visitee'] = $page;
            $Journal = new ModelJournal;
            $Journal->insert($request);
        }
    }

    static public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}