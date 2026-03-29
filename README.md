# Application Web de Gestion Médicale

## Description

Cette application web de gestion médicale a été développée avec Laravel. Elle permet de centraliser la gestion des patients, des médecins ainsi que des rendez-vous médicaux au sein d’une plateforme sécurisée et performante.

Le système repose sur trois types d’utilisateurs : l’administrateur, le médecin et le patient, chacun disposant de fonctionnalités adaptées à son rôle.

---

## Fonctionnalités

### Administrateur

* Gestion complète des médecins (création, modification, suppression)
* Gestion des patients (création, modification, suppression)
* Supervision globale du système

### Médecin

* Consultation des rendez-vous qui lui sont attribués
* Modification des rendez-vous (statut, date, etc.)

### Patient

* Création de compte et authentification
* Prise de rendez-vous en ligne
* Consultation de ses rendez-vous

---

## Authentification et Sécurité

* Authentification avec Laravel Breeze
* Authentification via OAuth 2.0 avec possibilité de connexion avec Google
* Gestion sécurisée des sessions utilisateurs
* API sécurisée avec Laravel Sanctum (authentification par token)

---

## Notifications

* Envoi d’email de confirmation lors de la prise de rendez-vous
* Système de mailing testé avec Mailtrap (environnement de test)

---

## API

L’application expose une API REST permettant d’interagir avec les différentes fonctionnalités du système.

### Fonctionnalités API

* Authentification (login, logout)
* Gestion des patients
* Gestion des médecins
* Gestion des rendez-vous

### Tests API

* API testée avec Postman
* Authentification via token (Sanctum)

---

## Technologies utilisées

* Laravel
* PHP
* MySQL
* Laravel Breeze
* Laravel Sanctum
* OAuth 2.0 (connexion Google)
* Mailtrap (test des emails)
* Postman

---

## Installation

1. Cloner le projet :

   ```
   git clone https://github.com/votre-repository
   ```

2. Accéder au dossier du projet :

   ```
   cd nom-du-projet
   ```

3. Installer les dépendances :

   ```
   composer install
   npm install
   ```

4. Configurer le fichier d’environnement :

   ```
   cp .env.example .env
   php artisan key:generate
   ```

5. Configurer la base de données dans le fichier `.env`

6. Lancer les migrations :

   ```
   php artisan migrate
   ```

7. Lancer le serveur :

   ```
   php artisan serve
   ```

---

## Sécurité

* Gestion des rôles (administrateur, médecin, patient)
* Protection des routes
* Authentification sécurisée via token avec Sanctum
* Intégration OAuth 2.0 pour authentification externe

---

## Améliorations possibles

* Notifications en temps réel
* Historique médical des patients
* Système de messagerie interne
* Tableau de bord analytique

---

## Auteur

Développé dans le cadre d’un projet académique en génie logiciel.

Pour toute information complémentaire, veuillez me contacter.
