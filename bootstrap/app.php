<?php

date_default_timezone_set('Asia/Jakarta');

require __DIR__ . './../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $error) {
    // Tangkap Error
}

$settings  = require __DIR__ . './../config/settings.php';

/**
 *  Menggunakan konfigurasi local
 */

foreach ($settings['settings']['php_ini'] as $iniKey => $iniValue) {
    ini_set($iniKey, $iniValue);
}

/**
 * Membangun Slim Framework
 */

$app = new Slim\App($settings);

/**
 * Inisialisasi Container
 */

$container = $app->getContainer();

require __DIR__ . './../config/container.php';

/**
 * Inisialisasi Routes
 */

// <URI>/<endpoints>
$app->group('', function () use ($app) {
   require __DIR__ . './../routes/web.php';
});

// <URI>/api/<endpoints>
$app->group('/api', function () use ($app) {
    require __DIR__ . './../routes/api.php';
});

/**
 * Inisialisasi Middleware
 */

