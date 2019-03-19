<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 18.03.19
 * Time: 20:01
 */

namespace packages\settings;

/**
 * Реализует шаблон Singlton и хранит в себе
 * настроечные данные для алгоритма вычисления
 * Class Settings
 * @package packages\settings
 */
class Settings implements SettingsInterface
{
    /**
     * Подключает трейт Singlton
     */
    use Singlton;

    /**
     * Хранит массив настроек
     * @var array
     */
    protected $settings;

    /**
     * Зачитывает данные из json файла конфигурации
     */
    public function setSettings()
    {
        $this->settings = json_decode(file_get_contents( CONFIG ), true);
    }

    /**
     * Возвращает массив настроек
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Проверяет запрос AJAX или нет
     * @return bool
     */
    public function isAjax()
    {
        return isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) &&
        $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * Очищает данные настроек от пустых полей
     */
    public function clearData()
    {
        $payments = $this->settings['payments'];
        foreach ($payments as $key => $payment) {
            if ( empty($payment['amount']) || empty($payment['date'])) {
                unset($payments[$key]);
            }
        }
        $this->settings['payments'] = $payments;
    }
};