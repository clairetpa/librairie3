<?php
   class ModelJournal extends CRUD{
       protected $table = 'journal';
       protected $primaryKey = 'id';

       protected $fillable = ['ip', 'date_visite', 'username', 'page_visitee'];
   } 


?>