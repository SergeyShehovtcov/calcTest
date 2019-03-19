<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 19.03.19
 * Time: 14:24
 */

namespace packages\settings;

/**
 * Производит настроки
 * если пришли данные через AJAX
 * Class SettingsAjax
 * @package packages\settings
 */
class SettingsAjax extends Settings
{

    /**
     * Устанавливает настроечные данные
     */
    public function setSettings()
    {
        $this->settings = $_POST['data'];
    }
}