<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 19.03.19
 * Time: 0:25
 */

spl_autoload_register( function( $className ) {
    
    $file = ROOT . '/' . str_replace( '\\', '/', $className ) . '.php';
    if ( is_file( $file ) ) {
        require_once $file;
    }
} );