<?php
/**
 * 7 Ensemble - Form Submission Handler
 * Handles registration form submissions and stores data
 */

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Set headers for JSON response and CORS
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit();
}

// Get POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate required fields
$requiredFields = ['type', 'fullName', 'email', 'country', 'idNumber', 'paymentMethod'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Champs requis manquants: ' . implode(', ', $missingFields)
    ]);
    exit();
}

// Validate email format
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Adresse email invalide'
    ]);
    exit();
}

// Sanitize input data
$cleanData = [
    'type' => htmlspecialchars($data['type'], ENT_QUOTES, 'UTF-8'),
    'fullName' => htmlspecialchars($data['fullName'], ENT_QUOTES, 'UTF-8'),
    'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
    'country' => htmlspecialchars($data['country'], ENT_QUOTES, 'UTF-8'),
    'idNumber' => htmlspecialchars($data['idNumber'], ENT_QUOTES, 'UTF-8'),
    'paymentMethod' => htmlspecialchars($data['paymentMethod'], ENT_QUOTES, 'UTF-8'),
    'timestamp' => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
];

// Create data directory if it doesn't exist
$dataDir = __DIR__ . '/data';
if (!file_exists($dataDir)) {
    mkdir($dataDir, 0755, true);
}

// Save to JSON file
$jsonFile = $dataDir . '/submissions.json';
$submissions = [];

if (file_exists($jsonFile)) {
    $existingData = file_get_contents($jsonFile);
    $submissions = json_decode($existingData, true) ?? [];
}

$submissions[] = $cleanData;

if (file_put_contents($jsonFile, json_encode($submissions, JSON_PRETTY_PRINT))) {
    // Also save to CSV for easy viewing
    $csvFile = $dataDir . '/submissions.csv';
    $isNewFile = !file_exists($csvFile);

    $fp = fopen($csvFile, 'a');

    // Write header if new file
    if ($isNewFile) {
        fputcsv($fp, ['Type', 'Nom Complet', 'Email', 'Pays', 'Numéro ID', 'Mode de Paiement', 'Date', 'IP']);
    }

    fputcsv($fp, [
        $cleanData['type'],
        $cleanData['fullName'],
        $cleanData['email'],
        $cleanData['country'],
        $cleanData['idNumber'],
        $cleanData['paymentMethod'],
        $cleanData['timestamp'],
        $cleanData['ip_address']
    ]);

    fclose($fp);

    // Send success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Inscription réussie ! Vous allez recevoir un email de confirmation.',
        'data' => [
            'type' => $cleanData['type'],
            'targetAmount' => $cleanData['type'] === 'seven' ? '1,575,747€' : '7,789€'
        ]
    ]);

    // Optional: Send email notification (requires mail server configuration)
    // sendConfirmationEmail($cleanData);

} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de l\'enregistrement. Veuillez réessayer.'
    ]);
}

/**
 * Optional function to send confirmation email
 * Requires proper mail server configuration
 */
function sendConfirmationEmail($data) {
    $to = $data['email'];
    $subject = '🌟 Bienvenue dans 7 Ensemble - Inscription confirmée !';

    $targetAmount = $data['type'] === 'seven' ? '1,575,747€' : '7,789€';
    $optionName = $data['type'] === 'seven' ? '7 Personnes' : '3 Personnes';

    $message = "
    Bonjour {$data['fullName']},

    🎉 Félicitations ! Votre inscription à 7 Ensemble (Option {$optionName}) est confirmée !

    ✅ Objectif : {$targetAmount}
    ✅ Date d'inscription : {$data['timestamp']}
    ✅ Mode de paiement : {$data['paymentMethod']}

    Votre constellation sera formée sous 24-48h.
    Vous recevrez un email avec les instructions de paiement et les détails de votre constellation.

    Bienvenue dans la révolution 7 Ensemble !

    ---
    7 Ensemble
    L'entraide qui change des vies
    ";

    $headers = "From: noreply@7ensemble.ch\r\n";
    $headers .= "Reply-To: support@7ensemble.ch\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Uncomment when mail server is configured
    // mail($to, $subject, $message, $headers);
}
?>
