<?php
// Erika KAMDOM FOTSO 3A FISE
// TP Fil Rouge / Application de gestion de Ticket
// Page détail d'un projet

// Connexion à la base de données
require_once __DIR__ . "/../config/database.php";

// Récupération de l'id du projet depuis l'URL
$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: projects.php");
    exit;
}

// Récupération du projet depuis la BDD
$stmt = $pdo->prepare("SELECT projets.*, clients.nom AS client
                        FROM projets
                        JOIN clients ON projets.client_id = clients.id
                        WHERE projets.id = :id");
$stmt->execute([":id" => $id]);
$projet = $stmt->fetch();

// Si le projet n'existe pas, on redirige vers la liste
if (!$projet) {
    header("Location: projects.php");
    exit;
}

// Récupération des tickets liés au projet
$stmt2 = $pdo->prepare("SELECT * FROM tickets WHERE projet_id = :id");
$stmt2->execute([":id" => $id]);
$tickets = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<!--Erika KAMDOM FOTSO 3A FISE-->
<!--TP Fil Rouge / Application de gestion de Ticket-->
<!--Page détail d'un projet-->
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détail du projet - Ticketing</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body class="body-dash">
        <header>
            <div class="tableau_de_bord">
                <h1>Détail du projet</h1>
                <nav class="Navigation_principale">
                    <ul>
                        <li><a href="dashboard.html">Tableau de bord</a></li>
                        <li><a href="projects.php">Projets</a></li>
                        <li><a href="tickets.php">Tickets</a></li>
                        <li><a href="ticket create.php">Créer un ticket</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="profile.php">Profil</a></li>
                        <li><a href="settings.html">Paramètres</a></li>
                    </ul>
                </nav>
                <button id="logout" class="logout-btn"><a href="index.php">Déconnexion</a></button>
            </div>
        </header>

        <main>
            <section aria-labelledby="resume-projet">
                <h2 id="resume-projet">Résumé</h2>
                <ul>
                    <!-- Données récupérées depuis la BDD -->
                    <li>Projet : <?= htmlspecialchars($projet["nom"]) ?></li>
                    <li>Client : <?= htmlspecialchars($projet["client"]) ?></li>
                    <li>Contrat : <?= htmlspecialchars($projet["contrat"]) ?></li>
                    <li>Taux : <?= htmlspecialchars($projet["taux"]) ?>€ / h</li>
                    <li>Statut : <?= htmlspecialchars($projet["statut"]) ?></li>
                </ul>
            </section>

            <section aria-labelledby="tickets-projet">
                <h2 id="tickets-projet">Tickets liés</h2>
                <table>
                    <caption>Tickets du projet</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tickets liés au projet récupérés depuis la BDD -->
                        <?php if (empty($tickets)): ?>
                            <tr><td colspan="5">Aucun ticket pour ce projet.</td></tr>
                        <?php else: ?>
                            <?php foreach($tickets as $ticket): ?>
                                <tr>
                                    <td><?= htmlspecialchars("#TK-" . str_pad($ticket["id"], 3, "0", STR_PAD_LEFT)) ?></td>
                                    <td><?= htmlspecialchars($ticket["titre"]) ?></td>
                                    <td><?= htmlspecialchars($ticket["statut"]) ?></td>
                                    <td><?= htmlspecialchars($ticket["type"]) ?></td>
                                    <td><a href="ticket detail.php?id=<?= $ticket['id'] ?>">Voir</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <p><a href="ticket create.php">Créer un ticket</a></p>
            </section>
        </main>

        <footer class="footer">
            <p>© Erika - ESIEA 2026 - Application de gestion de ticketing</p>
        </footer>
        <script src="../js/app.js"></script>
    </body>
</html>