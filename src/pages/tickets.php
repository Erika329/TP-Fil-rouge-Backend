<?php
// Erika KAMDOM FOTSO 3A FISE
// TP Fil Rouge / Application de gestion de Ticket
// Page liste des tickets

// Connexion à la base de données
require_once __DIR__ . "/../config/database.php";

// Récupération des filtres depuis l'URL via $_GET
$filtre_statut = $_GET["filtre-statut"] ?? "tous";
$filtre_projet = $_GET["filtre-projet"] ?? "tous";
$filtre_type   = $_GET["filtre-type"] ?? "tous";

// Construction de la requête SQL avec filtres
$sql = "SELECT tickets.id, tickets.titre, projets.nom AS projet, tickets.statut, tickets.priorite, tickets.type
        FROM tickets
        JOIN projets ON tickets.projet_id = projets.id
        WHERE 1=1";

$params = [];

if ($filtre_statut !== "tous") {
    $sql .= " AND tickets.statut = :statut";
    $params[":statut"] = $filtre_statut;
}
if ($filtre_projet !== "tous") {
    $sql .= " AND LOWER(projets.nom) = :projet";
    $params[":projet"] = $filtre_projet;
}
if ($filtre_type !== "tous") {
    $sql .= " AND tickets.type = :type";
    $params[":type"] = $filtre_type;
}

// Exécution de la requête
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tickets = $stmt->fetchAll();
?>
<!DOCTYPE html>
<!--Erika KAMDOM FOTSO 3A FISE-->
<!--TP Fil Rouge / Application de gestion de Ticket-->
<!--Page liste des tickets-->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets - Ticketing</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="body-dash">
    <header>
        <div class="tableau_de_bord">
            <h1>Tickets</h1>
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
        <section aria-labelledby="liste-tickets">
            <h2 id="liste-tickets">Liste des tickets</h2>

            <!-- Formulaire de filtre en GET pour filtrer côté serveur -->
            <form id="filtre-tickets-form" action="" method="GET">
                <label for="recherche-ticket">Recherche</label>
                <input id="recherche-ticket" name="recherche-ticket" type="search"
                    placeholder="Titre ou ID"
                    value="<?= htmlspecialchars($_GET['recherche-ticket'] ?? '') ?>">

                <label for="filtre-statut">Statut</label>
                <select id="filtre-statut" name="filtre-statut">
                    <option value="tous" <?= $filtre_statut === "tous" ? "selected" : "" ?>>Tous</option>
                    <option value="nouveau" <?= $filtre_statut === "nouveau" ? "selected" : "" ?>>Nouveau</option>
                    <option value="en-cours" <?= $filtre_statut === "en-cours" ? "selected" : "" ?>>En cours</option>
                    <option value="termine" <?= $filtre_statut === "termine" ? "selected" : "" ?>>Terminé</option>
                    <option value="en-attente" <?= $filtre_statut === "en-attente" ? "selected" : "" ?>>En attente client</option>
                </select>

                <label for="filtre-projet">Projet</label>
                <select id="filtre-projet" name="filtre-projet">
                    <option value="tous" <?= $filtre_projet === "tous" ? "selected" : "" ?>>Tous</option>
                    <option value="portail client" <?= $filtre_projet === "portail client" ? "selected" : "" ?>>Portail client</option>
                    <option value="intranet rh" <?= $filtre_projet === "intranet rh" ? "selected" : "" ?>>Intranet RH</option>
                </select>

                <label for="filtre-type">Type</label>
                <select id="filtre-type" name="filtre-type">
                    <option value="tous" <?= $filtre_type === "tous" ? "selected" : "" ?>>Tous</option>
                    <option value="inclus" <?= $filtre_type === "inclus" ? "selected" : "" ?>>Inclus</option>
                    <option value="facturable" <?= $filtre_type === "facturable" ? "selected" : "" ?>>Facturable</option>
                </select>

                <button type="submit" id="btn-filtrer">Filtrer</button>
            </form>

            <table id="tickets-table">
                <caption>Tickets en cours</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Projet</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Priorité</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Boucle sur les tickets récupérés depuis la BDD -->
                    <?php foreach($tickets as $ticket): ?>
                        <tr>
                            <td><?= htmlspecialchars("#TK-" . str_pad($ticket["id"], 3, "0", STR_PAD_LEFT)) ?></td>
                            <td><?= htmlspecialchars($ticket["titre"]) ?></td>
                            <td><?= htmlspecialchars($ticket["projet"]) ?></td>
                            <td><?= htmlspecialchars($ticket["statut"]) ?></td>
                            <td><?= htmlspecialchars($ticket["priorite"]) ?></td>
                            <td><?= htmlspecialchars($ticket["type"]) ?></td>
                            <td><a href="ticket detail.php?id=<?= $ticket['id'] ?>">Voir</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><a href="ticket create.php">Créer un ticket</a></p>
            <div id="notif-ticket" class="notif" style="display:none;"></div>
        </section>
    </main>
    <footer class="footer">
        <p>© Erika - ESIEA 2026 - Application de gestion de ticketing</p>
    </footer>
    <script src="../js/app.js" defer></script>
</body>
</html>