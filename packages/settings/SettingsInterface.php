<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 18.03.19
 * Time: 20:03
 */

namespace packages\settings;

/**
 * Интерфейс для настроек
 * Interface SettingsInterface
 * @package packages\settings
 */
interface SettingsInterface
{
    public function setSettings();
    public function getSettings();
    public function isAjax();
}