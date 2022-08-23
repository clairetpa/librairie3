<?php
   class ModelJournal extends CRUD{
       protected $table = 'Journal';
       protected $primaryKey = 'id';

       protected $fillable = ['ip', 'date_visite', 'username', 'page_visitee'];
   } 


?>