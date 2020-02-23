<?php

namespace App\Controller;

class RoomsController extends AbstractController
{

    /**
     * Afficher la page de 1 room
     * Route: GET /rooms/:id
     */
    public function show(int $id)
    {
        $room = $this->container->getRoomManager()->findOneById($id);

        $clients = $this->container->getRoomManager()->findAll();
        echo $this->container->getTwig()->render('rooms/show.html.twig', [
            'room' => $room,
            'clients' => $clients
        ]);
    }

    public function index()
    {
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
    public function new()
    {
        echo $this->container->getTwig()->render('rooms/new.html.twig');
    }

    /**
     * Traitement du formulaire de création puis redirection vers la liste des rooms
     * POST / rooms/new
     */
    public function create()
    {
        $this->container->getRoomManager()->create($_POST);
        Header('Locaton: ' . $this->configuration['env']['base_path']);
    }

    /**
     * Affichage du formulaire d'édition
     * POST /rooms/new
     */
    public function edit(int $id)
    {
        $this->container->getRoomManager()->update($id, $_POST);
        $this->show($id);
    }


    /**
     * suppression d'une room
     * GET /rooms/:id/delete
     */
    public function deleteClient(int $id)
    {
        $this->container->getRoomManager()->update($id, ['client_id' => null]);
        $this->show($id);
    }

    public function delete(int $id)
    {
        $this->container->getRoomManager()->delete($id);

        Header('Location: ' . $this->configuration['env']['base_path']);
    }
}
