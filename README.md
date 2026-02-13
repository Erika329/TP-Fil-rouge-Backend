# TP Fil Rouge — Ticketing

## Pages HTML
- [Connexion](src/pages/index.html)
- [Inscription](src/pages/createaccount.html)
- [Mot de passe oublié](src/pages/forgot-password.html)
- [Tableau de bord collaborateur](src/pages/dashboard.html)
- [Tableau de bord client](src/pages/dashboard-client.html)
- [Tableau de bord admin](src/pages/dashboard-admin.html)
- [Clients](src/pages/clients.html)
- [Projets collaborateur](src/pages/projects.html)
- [Projets client](src/pages/projects-client.html)
- [Détail d’un projet](src/pages/project%20detail.html)
- [Création / édition d’un projet](src/pages/project%20create.html)
- [Tickets collaborateur](src/pages/tickets.html)
- [Tickets client](src/pages/tickets-client.html)
- [Utilisateurs](src/pages/users.html)
- [Contrats](src/pages/contracts.html)
- [Détail d’un ticket](src/pages/ticket%20detail.html)
- [Création d’un ticket](src/pages/ticket%20create.html)
- [Profil](src/pages/profile.html)
- [Paramètres](src/pages/settings.html)

Projet :
Une application de gestion de tickets pour une société de services.
Les clients suivent leurs demandes et valident si besoin.
Les collaborateurs créent et traitent les tickets pour les clients.

Explications des différents fichiers HTML :
- Connexion / inscription / mot de passe oublié : accès utilisateur.
- Tableau de bord collaborateur : vue interne (création et suivi).
- Tableau de bord client : vue externe (suivi et validation).
- Tableau de bord admin : gestion globale.
- Projets collaborateur : tous les projets gérés.
- Projets client : uniquement les projets du client.
- Tickets collaborateur : tickets à traiter/créer. 
- Tickets client : tickets du client (suivi/validation).
- Utilisateurs / Contrats : gestion admin.
- Inscription : choix du rôle (collaborateur, client, administrateur).
- Détail/Création : pages de détail et formulaires.


Validation du HTML avec le W3C (mettre le lien d'une page html) : 
https://validator.w3.org/nu/

Pour lancer l'application dans le navigateur:

Prérequis: Installer php 8.5.1
1: Lancer php -S localhost:8000
2: http://localhost:8000/src/pages/index.php

Backend:

PHP Procedural (sans classe, sans objets, simple)
