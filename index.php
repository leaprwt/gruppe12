<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Checks if API Route requested
$is_api_request = strpos($path, '/api/') === 0;

if ($is_api_request) {
    require_once __DIR__ . $path . ".php";
} else {
    // Frontend Routes
    $frontend_routes = array(
        '/' => 'app/main.php',
        '/studiplaner' => 'app/studyPlaner/overview.php',
        '/kursdetails' => 'app/studyPlaner/courseDetails.php',
        '/bibliothek' => 'app/library/overview.php',
        '/buchdetails' =>  'app/library/bookDetails.php',
        '/mensaplan' => 'app/mealPlan/overview.php',
        '/gerichtdetails' => 'app/mealPlan/mealDetails.php',
        '/bestellen' => 'app/mealPlan/checkout.php',
        '/datenerfassen' => 'app/addData.php',
        '/statistik' => 'app/statistics.php',
    );
    $found_route = false;
    foreach ($frontend_routes as $route => $file) {
        if ($path === $route) {
            $found_route = true;
            $frontend_path = __DIR__ . '/' . $file;

            if (file_exists($frontend_path)) {
                require_once($frontend_path);
            } else {
                // Route not found
                http_response_code(404);
                echo '404 Not Found';
                echo __DIR__ . '/' . $file;
            }

           //End Loop
            break;
        }
    }
    // Check if no route was found
    if (!$found_route) {
        // Route not found
        http_response_code(404);
        echo '404 Not Found';
    }
}
?>
