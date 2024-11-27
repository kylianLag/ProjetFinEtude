<?php 
session_start();
require "functions.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$userId = $_SESSION['user_id']; 
$modules = getUserProgress($userId); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M.A.K.E</title>
    <link rel="stylesheet" href="styles.css">
    <script src="progression.js" defer></script>
</head>
<body>
    <?php include "navbar.php"; ?>

    <div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Bienvenue sur ton tableau de bord</h1>
    </div>
    <div class="dashboard-group">
        <?php 
        $modules = getUserProgress($userId); // Récupère les modules avec les avancements
        if (empty($modules)): ?>
            <p>Aucun module disponible ou une erreur s'est produite.</p>
        <?php else: ?>
            <?php foreach ($modules as $module): ?>
                <div class="dashboard-card">
                    <h3><?= htmlspecialchars($module['matiere_nom']); ?></h3>
                    <div class="arc-progress" data-percentage="<?= $module['progression']; ?>">
                        <svg>
                            <path class="background"></path>
                            <path class="progress"></path>
                        </svg>
                        <div class="progress-text">
                            <p><?= round($module['progression'], 2); ?>%</p>
                        </div>
                    </div>
                    <p class="module-details">
                        Points: <?= $module['total_points']; ?> / <?= $module['max_points'];?>
                    </p>
                    <button class="btn-resume">Reprendre</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
