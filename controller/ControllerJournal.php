<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Journal');

class ControllerJournal {

    public function index(){
        Privileges::CheckAdmin();
        $journal = new ModelJournal;
        $journaux = $journal->select();
        return Twig::render('journal-index.php', ['journaux' => $journaux]);
    }
}
