<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Checks if API Route requested
$is_api_request = strpos($path, '/api/') === 0;

if ($is_api_request) {
    require_once __DIR__ . $path . ".php";
} else {
    // Frontend Routes
    $frontend_routes = array(
        '/studiplaner' => 'app/studyplaner/overview.php',
        '/kursdetails' => 'app/studyplaner/courseDetails.php',
        '/bibliothek' => 'app/library/overview.php',
        '/buchdetails' =>  'app/library/bookDetails.php',
        '/mensaplan' => 'app/mealPlan/overview.php',
        '/gerichtdetails' => 'app/mealPlan/mealDetails.php',
        '/bestellen' => 'app/mealPlan/checkout.html',
        '/datenerfassen' => 'app/addData.html'
    );

    foreach ($frontend_routes as $route => $file) {
        if (strpos($path, $route) === 0) {
            $frontend_path = __DIR__ . '/' . $file;

            if (file_exists($frontend_path)) {
                readfile($frontend_path);
            } else {
                // Route not found
                http_response_code(404);
                echo '404 Not Found';
            }

           //End Loop
            break;
        }
    }
}
?>
