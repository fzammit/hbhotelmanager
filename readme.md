# Examen : Créer un projet en MVC avec PHP
## Exemple de projet terminé (conducteurs, voitures et locations)

### Installation

1. Récupérer le dossier du projet
2. Saisir dans la console: `composer install`

## Présentation du projet
> L'agence de développement web dans laquelle vous travaillez vient de signer un nouveau client : il souhaiterait un système de gestion pour son hôtel. Voici ses besoins:
> Le "front desk manager", la personne qui gère l'accueil de l'hôtel, doit pouvoir ajouter de nouveaux clients : il a besoin de leurs nom, prénom, leur date d'arrivée et leur date de sortie. Il doit pouvoir gérer ses chambres : elles ont un numéro, et un état "disponible" ou non.

> Votre chef de projet a déjà créé les tables pour vous :

>```
>CLIENT
>-----
>id           int PK
>firstname    varchar(100)
>lastname     varchar(100)
>entry_date   DATETIME
>leave_date   DATETIME
>```

>```
>ROOM
>-----
>id          int PK
>number      int
>client_id   int
>```

La requête est même déjà prête avec une première chambre en BDD !

```sql
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 17, 2020 at 08:25 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hbhotelmanager`
--
CREATE DATABASE IF NOT EXISTS `hbhotelmanager` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hbhotelmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` int(11) NOT NULL,
  `lastname` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `departure_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `number`, `client_id`) VALUES
(1, 101, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

```

> Le chef de projet vous propose l'organisation suivante qui a déjà été codée :

- Page d'accueil
  - Affichage de la liste des chambres et leur état (disponible ou indisponible) avec un lien vers la page d'une chambre
  - Un lien pour voir la liste des clients
  - Un lien pour ajouter une chambre
  - Un lien pour ajouter un client

- Page d'une chambre
  - Ajouter un client s'il n'y en a pas
  - Supprimer un client s'il y en a un
  - Supprimer la chambre

## Exercice

L'application est déjà bien structurée. Beaucoup de données sont écrites "en dur". Il vous faut la rendre complètement fonctionnelle ! Voilà la liste des features restantes :

### Page d'accueil
1. Bouton créer un nouveau client `1 point`
2. Bouton créer une nouvelle chambre `1 point`
3. Lister toutes les chambres avec "numéro de chambre" et "occupée" `1 point`
4. Si il y a un client, ajouter "date de départ/arrivée du client" `2 points`
5. Bouton "Gestion de la clientèle" en navbar : doit afficher un liste de clients, et un CRUD complet (show, add, update, delete) `5 points`

### Page d'affichage d'une chambre
1. Affichage conditionnel : ajouter un client s'il n'y en a pas encore et afficher le badge "Libre" `1 point`
2. Affichage conditionnel : supprimer un client s'il y en a un dans la chambre et afficher le badge "Occupée" `1 point`
3. Ajouter un client: afficher la liste des clients dans un select `3 points`
4. Bouton Ajouter le client à la chambre `2 points`
5. Bouton Supprimer la chambre `1 point`

## Propreté du code
1. Nommages cohérents et propres `1 point`
2. Indentation du code propre `1 point`

## Points bonus
1. Livraison du code sur Github avec un .gitignore pour ne pas avoir le dossier `vendor`: `2 points`


## Livrable
Le lien Github du projet partagé en privé au formateur (Aller dans Settings > Collaborators > ajouter `tomsihap`)