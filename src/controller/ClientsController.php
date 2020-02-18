<?php

namespace App\Controller;

class clientsController extends AbstractController
{

    /**
     * Afficher la page de 1 client
     * Route: GET /clients/:id
     */
    public function show(int $id)
    {
        // 1. Récupérer le car par son id
        $client = $this->container->getUserManager()->findOneById($id);

        //2. Afficher la client
        echo $this->container->getTwig()->render('clients/show.html.twig', [
            'client' => $client
        ]);
    }

    public function index()
    {
        //récupérer les clients
        $client = $this->container->getUserManager()->findAll();
        //Afficher les clients
        echo $this->container->getTwig()->render('clients/index.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * Affichage du formulaire de création
     * GET /client/new
     */
    public function new()
    {
        echo $this->container->getTwig()->render('clients/new.html.twig');
    }

    /**
     * Traitement du formulaire de création puis redirection vers la liste des clients
     * POST / clients/new
     */
    public function create()
    {
        $this->container->getUserManager()->create($_POST);
        $this->index();
    }

    /**
     * Affichage du formulaire d'édition
     * GET /clients/new
     */
    public function edit(int $id)
    {
        $client = $this->container->getUserManager()->findOneById($id);

        echo $this->container->getTwig()->render('clients/new.html.twig', ['client' => $client]);
    }

    /**
     * Traitement du formulaire d'édition puis redirection vrs l'index des clients
     * POST /clients/new 
     */
    public function update(int $id)
    {
        $this->container->getUserManager()->update($id, $_POST);
        $this->show($id);
    }

    /**
     * suppression d'une client
     * GET /clients/:id/delete
     */
    public function delete(int $id)
    {
        $this->container->getUserManager()->delete($id);
        $this->index();
    }
}
