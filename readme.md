# Projet : Gestion des Réservations pour un Restaurant

Ce projet est une application web simple permettant aux utilisateurs de consulter les menus disponibles et de réserver une table dans un restaurant. Il comprend des fonctionnalités pour les clients ainsi que pour l'administration du restaurant.

## Fonctionnalités Principales

### Côté Client :
- 🍽️ **Affichage des menus disponibles** : Les clients peuvent consulter les différents menus proposés par le restaurant.
- 📝 **Formulaire de réservation** : Les clients peuvent réserver une table en sélectionnant :
  - Un menu de leur choix.
  - Une date et une heure pour leur réservation.
  - Le nombre de personnes pour la réservation.
- 📅 **Consultation des réservations** : Les clients peuvent consulter les détails de leurs réservations existantes.

### Côté Admin :
- ⚙️ **Gestion des menus** : Les administrateurs peuvent ajouter, modifier ou supprimer les menus disponibles.
- 📊 **Consultation des réservations** : Les administrateurs peuvent voir toutes les réservations effectuées par les clients avec leurs détails.
- 🔄 **Gestion des statuts des réservations** : L'administrateur peut changer le statut des réservations (confirmé, en attente, annulé).

## Prérequis
- 🌐 **Serveur Web** : Apache ou Nginx.
- 🖥️ **PHP** : Version 7.4 ou supérieure.
- 🗃️ **Base de données** : MySQL ou MariaDB.
- 🌍 **Navigateurs** : Google Chrome, Mozilla Firefox ou tout autre navigateur récent.

## Exemple de Base de Données

### Tables principales :
- 👤 **client** : Stocke les informations des utilisateurs (nom, email, mot de passe, etc.).
- 🍴 **menu** : Liste des menus disponibles (nom, description, prix, etc.).
- 📋 **reservation** : Contient les informations des réservations effectuées par les clients (menu sélectionné, date, heure, nombre de personnes, statut, etc.).

## Technologies Utilisées
- 💻 **Frontend** : HTML, Tailwind CSS.
- 🔧 **Backend** : PHP (avec mysqli pour la connexion à la base de données).
- 🗃️ **Base de données** : MySQL.

## Fonctionnement
1. 👥 **Inscription et Connexion** : Les clients s'inscrivent et se connectent à l'application.
2. 📅 **Réservation** : Une fois connectés, les clients visualisent les menus et réservent une table en remplissant un formulaire.
3. 🛠️ **Gestion des Menus et Réservations** : Les administrateurs gèrent les menus et les réservations via le tableau de bord admin.

## Auteur
Ce projet a été réalisé par **[Azzedine Zemmari]**.
