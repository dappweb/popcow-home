<?php
header('Content-Type: application/json; charset=utf-8'); // Set JSON response header
define('MINIMUM_VALUE', 337742389);

try {
    // Create Redis connection
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379); // Connect to Redis based on configuration

    $counterKey = 'shared_counter'; // Key name for storing total clicks in Redis

    $action = isset($_GET['action']) ? $_GET['action'] : 'read'; // Determine execution logic based on frontend action

    // Execute different operations
    if ($action === 'read') {
        // Get totalClicks from Redis, initialize to 0 if not exists
        $value = $redis->get($counterKey);
        if ($value === false) {
            $value = 0;
            $redis->set($counterKey, $value); // Initialize
        }
        echo json_encode(['status' => 'success', 'value' => (int)$value]); // Return current totalClicks
    } elseif ($action === 'increment') {
        // Execute Redis increment and return new value
        $value = $redis->incr($counterKey);
        echo json_encode(['status' => 'success', 'value' => (int)$value]);
    } elseif ($action === 'sync') {
        // Receive totalClicks value from frontend, update Redis counter
        $postData = json_decode(file_get_contents('php://input'), true); // Get JSON data
        $newTotal = isset($postData['totalClicks']) ? intval($postData['totalClicks']) : null;

        if ($newTotal !== null) {
            if ($newTotal < MINIMUM_VALUE) {
                $newTotal = MINIMUM_VALUE; // Force set to minimum value
            }
            $redis->set($counterKey, $newTotal); // Sync update Redis counter
            echo json_encode(['status' => 'success', 'value' => $newTotal]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid totalClicks value']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
    }
} catch (Exception $e) {
    // Error handling
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
