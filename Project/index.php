<?php
// =========================================================
// 1. DEFINISI PATH ABSOLUT (SOLUSI MASALAH PATH)
// =========================================================
define('ROOT_DIR', __DIR__);
define('APP_PATH', ROOT_DIR . '/app');
define('CONTROLLER_PATH', APP_PATH . '/controllers');
define('MODEL_PATH', APP_PATH . '/models');
define('VIEW_PATH', ROOT_DIR . '/views');


// =========================================================
// 2. ROUTER SEDERHANA
// =========================================================
// Ambil URL (contoh: home/index/1)
$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
$url = explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));

$controllerName = ucfirst($url[0]);
$methodName = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

// Path ke controller yang akan dimuat
$controllerFile = CONTROLLER_PATH . '/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();
    
    if (method_exists($controller, $methodName)) {
        // Panggil method pada controller dengan parameter
        call_user_func_array([$controller, $methodName], $params);
    } else {
        echo "<h1>404 Method Not Found!</h1><p>Method '{$methodName}' tidak ditemukan di Controller '{$controllerName}'.</p>";
    }
} else {
    echo "<h1>404 Controller Not Found!</h1><p>Controller '{$controllerName}' tidak ditemukan.</p>";
}
?>