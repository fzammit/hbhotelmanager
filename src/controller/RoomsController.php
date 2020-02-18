<?php

namespace App\Controller;

class RoomsController extends AbstractController {

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id) {
        // 1. Récupérer le car par son id
        $room = $this->container->getRoomManager()->findOneById($id);

        //2. Afficher la room
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room
        ]);
    }

    public function index() {
        //récupérer les rooms
        $room = $this->container->getRoomManager()->findAll();
        //Afficher les rooms
        echo $this->container->getTwig()->render('rooms/index.html.twig', [
            'room' => $room
        ]);
    }

    /**
     * Affichage du formulaire de création
     * GET /room/new
     */
    public function new() {
        echo $this->container->getTwig()->render('rooms/new.html.twig');
    }

    /**
     * Traitement du formulaire de création puis redirection vers la liste des rooms
     * POST / rooms/new
     */
    public function create() {
        $this->container->getRoomManager()->create($_POST);
        $this->index();
    }

    /**
     * Affichage du formulaire d'édition
     * GET /rooms/new
     */
    public function edit(int $id) {
        $room = $this->container->getRoomManager()->findOneById($id);

        echo $this->container->getTwig()->render('rooms/new.html.twig', ['room' =>$room]);
    }

    /**
     * Traitement du formulaire d'édition puis redirection vrs l'index des rooms
     * POST /rooms/new 
     */
    public function update(int $id) {
        $this->container->getRoomManager()->update($id, $_POST);
        $this->show($id);
    }

    /**
     * suppression d'une room
     * GET /rooms/:id/delete
     */
    public function delete(int $id) {
        $this->container->getRoomManager()->delete($id);
        $this->index();
    }
}