<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 19.03.19
 * Time: 0:00
 */

namespace packages\settings;

/**
 * Типах для создания одиночек
 * Class Singlton
 * @package packages\settings
 */
trait Singlton
{
    
    protected static $instance;

    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}

    public static function getInstance()
    {
        if ( null === static::$instance ) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}