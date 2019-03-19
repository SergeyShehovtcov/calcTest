<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 18.03.19
 * Time: 23:53
 */

// FRONT CONTROLLER

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

define('ROOT', __DIR__);
define('CONFIG', ROOT . "/config.json");

use packages\settings\Settings;
use packages\settings\SettingsAjax;
use packages\algorithm\Algorithm;

require_once ROOT . '/packages/autoload.php';

/**
 * Если данные приходят AJAX запросом
 */
$config = SettingsAjax::getInstance();

if ( $config->isAjax() ) {
    $config->setSettings();
    $config->clearData();
    echo Algorithm::init( $config->getSettings() )->run();
    exit;
}