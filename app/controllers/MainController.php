<?php

class MainController {
    // notre première action : la homepage
    public function home() {
        $this->show('home');
    }

    // cette méthode se charge d'afficher les vues
    // et donc de constituer les différentes pages de notre site
    public function show($viewName) {
        require_once __DIR__."/../views/header.tpl.php";
        require_once __DIR__."/../views/$viewName.tpl.php";
        require_once __DIR__."/../views/footer.tpl.php";
    }
}