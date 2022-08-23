<?php

class RequirePage{
    static function requireModel($page){
        return require_once 'model/Model'.$page.'.php';
    }

    static function redirect($url){
        $path = $GLOBALS['PATH'];
        header("location: $path/$url");
    }

    static function requireLibrary($page){
        return require_once 'library/'.$page.'.php';
    }
}