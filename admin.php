<?php
/**
 * 7 Ensemble - Admin Panel
 * Simple admin interface to view form submissions
 *
 * SECURITY NOTE: Add password protection before deploying to production!
 */

// Simple password protection (CHANGE THIS!)
session_start();
$ADMIN_PASSWORD = 'admin123'; // CHANGE THIS PASSWORD!

if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['password'])) {
        if ($_POST['password'] === $ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $error = 'Mot de passe incorrect';
        }
    }

    if (!isset($_SESSION['admin_logged_in'])) {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - 7 Ensemble</title>
            <link rel="stylesheet" href="style.css">
            <style>
                .login-container {
                    max-width: 400px;
                    margin: 100px auto;
                    padding: 3rem;
                    background: rgba(255,255,255,0.1);
                    border-radius: 20px;
                    backdrop-filter: blur(10px);
                    text-align: center;
                }
                .login-form input {
                    width: 100%;
                    padding: 15px;
                    margin: 1rem 0;
                    border-radius: 10px;
                    border: 2px solid rgba(255,255,255,0.3);
                    background: rgba(255,255,255,0.1);
                    color: white;
                    font-size: 1rem;
                }
                .error {
                    color: #ff6b6b;
                    margin: 1rem 0;
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h1 style="color: #4ecdc4; margin-bottom: 2rem;">Admin - 7 Ensemble</h1>
                <?php if (isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <form method="POST" class="login-form">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit" class="btn-primary" style="width: 100%;">Connexion</button>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
}

// Load submissions
$dataDir = __DIR__ . '/data';
$jsonFile = $dataDir . '/submissions.json';
$submissions = [];

if (file_exists($jsonFile)) {
    $existingData = file_get_contents($jsonFile);
    $submissions = json_decode($existingData, true) ?? [];
}

// Reverse to show newest first
$submissions = array_reverse($submissions);

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit();
}

// Calculate statistics
$total = count($submissions);
$sevenPeople = count(array_filter($submissions, fn($s) => $s['type'] === 'seven'));
$threePeople = count(array_filter($submissions, fn($s) => $s['type'] === 'three'));

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - 7 Ensemble</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 2rem;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(102,126,234,0.3), rgba(118,75,162,0.3));
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
        }
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #4ecdc4;
        }
        .stat-label {
            color: rgba(255,255,255,0.8);
            margin-top: 0.5rem;
        }
        .submissions-table {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
            overflow: hidden;
        }
        .submissions-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .submissions-table th {
            background: rgba(102,126,234,0.5);
            padding: 1rem;
            text-align: left;
            font-weight: bold;
        }
        .submissions-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .submissions-table tr:hover {
            background: rgba(255,255,255,0.05);
        }
        .badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
        }
        .badge-seven {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        .badge-three {
            background: linear-gradient(45deg, #f093fb, #f5576c);
        }
        .export-buttons {
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
        }
        .btn-export {
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
            text-decoration: none;
            display: inline-block;
        }
        .btn-export:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 style="color: #4ecdc4; margin: 0;">🎯 Admin Panel - 7 Ensemble</h1>
            <a href="?logout" class="btn-primary">Déconnexion</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $total; ?></div>
                <div class="stat-label">Total Inscriptions</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $sevenPeople; ?></div>
                <div class="stat-label">Option 7 Personnes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $threePeople; ?></div>
                <div class="stat-label">Option 3 Personnes</div>
            </div>
        </div>

        <div class="export-buttons">
            <a href="data/submissions.csv" download class="btn-export">📥 Télécharger CSV</a>
            <a href="data/submissions.json" download class="btn-export">📥 Télécharger JSON</a>
        </div>

        <div class="submissions-table">
            <?php if (empty($submissions)): ?>
                <p style="text-align: center; padding: 3rem; color: rgba(255,255,255,0.6);">
                    Aucune inscription pour le moment.
                </p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Pays</th>
                            <th>Mode de Paiement</th>
                            <th>IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($submissions as $submission): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($submission['timestamp']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $submission['type']; ?>">
                                        <?php echo $submission['type'] === 'seven' ? '7 Personnes' : '3 Personnes'; ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($submission['fullName']); ?></td>
                                <td><?php echo htmlspecialchars($submission['email']); ?></td>
                                <td><?php echo htmlspecialchars($submission['country']); ?></td>
                                <td><?php echo htmlspecialchars($submission['paymentMethod']); ?></td>
                                <td style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">
                                    <?php echo htmlspecialchars($submission['ip_address']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
