# TP Fil Rouge — Ticketing
FRONTEND + BACKEND PHP
# **Projet** :
Une application de gestion de tickets pour une société de services.
Les clients suivent leurs demandes et valident si besoin.
Les collaborateurs créent et traitent les tickets pour les clients.

## Pages HTML
- [Connexion](src/pages/index.php)
- [Inscription](src/pages/createaccount.php)
- [Mot de passe oublié](src/pages/forgot-password.php)

### COLLABORATEURS
- [Tableau de bord collaborateur](src/pages/dashboard.html)
- [Projets collaborateur](src/pages/projects.php)
- [Détail d’un projet](src/pages/project%20detail.html)
- [Création / édition d’un projet](src/pages/project%20create.php)
- [Tickets collaborateur](src/pages/tickets.php)
- [Détail d’un ticket](src/pages/ticket%20detail.html)
- [Création d’un ticket](src/pages/ticket%20create.php)
- [Clients](src/pages/clients.html)
- [Profil](src/pages/profile.php)
- [Paramètres](src/pages/settings.html)


### ADMINISTRATEUR
- [Tableau de bord admin](src/pages/dashboard-admin.html)
- [Utilisateurs](src/pages/users.html)
- [Projets admin](src/pages/projects-admin.html)
- [Tickets admin](src/pages/tickets-admin.html)
- [Clients](src/pages/clients-admin.html)
- [Contrats](src/pages/contracts.html)
- [Paramètres admin](src/pages/settings-admin.html)

### CLIENT
- [Tableau de bord client](src/pages/dashboard-client.html)
- [Projets client](src/pages/projects-client.html)
- [Tickets client](src/pages/tickets-client.html)
- [Profil client](src/pages/profile-client.html)
- [Paramètres client](src/pages/settings-client.html)

## Ajout du PHP

## Services PHP

Les services se trouvent dans `src/services/` :

- `TicketService.php` — traitement et sécurisation des données du formulaire de création de ticket
- `ProjectService.php` — traitement et sécurisation des données du formulaire de création de projet

## Fonctionnalités PHP

- Traitement des formulaires côté serveur
- Filtrage des données côté serveur
- Sécurisation des affichages
- Validation côté serveur en complément de la validation JS
- Affichage de messages de succès ou d'erreur après soumission
- Données statiques affichées dynamiquement via des tableaux PHP

*Validation du HTML avec le W3C (mettre le lien d'une page html) :* 
https://validator.w3.org/nu/

## PAGES JS

***Les pages qui inclus du JS sont:***

Il est possible de lire le nombre d'erreurs dans le formulaire en ouvrant la console du navigateur avec FN+ F12

- [Connexion](src/pages/index.html)
- [Inscription](src/pages/createaccount.html)
- [Mot de passe oublié](src/pages/forgot-password.html)
- [Projets collaborateur](src/pages/projects.html) à corriger
- [Tickets collaborateur](src/pages/tickets.html)
- [Création / édition d’un projet](src/pages/project%20create.html)
- [Utilisateurs](src/pages/users.html)
- [Projets admin](src/pages/projects-admin.html)
- [Tickets admin](src/pages/tickets-admin.html)


La partie ne contenant que le front end se trouve dans ce repo GIT : https://github.com/Erika329/TP-fil-rouge-HTML-CSS.git

