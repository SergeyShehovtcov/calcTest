<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 19.03.19
 * Time: 1:35
 */

namespace packages\algorithm;
/**
 * Интерфейс для алгоритма
 * Interface AlgorithmInterface
 * @package packages\algorithm
 */
interface AlgorithmInterface
{
    public static function init( array $config);

    public function run();
}