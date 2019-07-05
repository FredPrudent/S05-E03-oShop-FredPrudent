<?php

class MainController {
    // notre première action : la homepage
    public function home() {
        $this->show('home');
    }

    public function legalMentions() {
        echo 'Ici, du blabla interminable';
    }

    public function error() {
        // on modifie "l'enveloppe" HTTP pour changer le code de réponse
        // de base, le code est 200 (OK) mais ici on veut informer le client de son erreur
        // on passe à un code 404
        header("HTTP/1.1 404 Not Found");
        $this->show('404');
    }

    // cette méthode se charge d'afficher les vues
    // et donc de constituer les différentes pages de notre site
    public function show($viewName) {
        require_once __DIR__."/../views/header.tpl.php";
        require_once __DIR__."/../views/$viewName.tpl.php";
        require_once __DIR__."/../views/footer.tpl.php";
    }
}