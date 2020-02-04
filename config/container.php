<?php

/**
 * Pendaftaran Container
 */

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

/**
 * "Passing by Reference" (&$cap....)
 * https://www.php.net/manual/en/language.references.pass.php
 *
 * @return \Illuminate\Database\Capsule\Manager
 */
$container['db'] = function () use (&$capsule) {
    return $capsule;
};

$container['auth'] = function () {
    return new App\Auth\Auth;
};