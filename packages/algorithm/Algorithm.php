<?php
/**
 * Created by PhpStorm.
 * User: Sergey Shehovtcov ( sshehovtcov@gmail.com )
 * Date: 19.03.19
 * Time: 1:38
 */

namespace packages\algorithm;

class Algorithm implements  AlgorithmInterface
{
    /**
     * Храним поступившие данные
     * @var
     */
    private static $config;

    /**
     * Храним массив интервалов в днях
     * @var
     */
    private $dayInterval;

    /**
     * Вычисляет интервал между датами
     * @param $dateStart
     * @param $dateFinish
     * @return float
     */
    private function daysBetween($dateStart, $dateFinish)
    {
         return ceil(abs(strtotime($dateFinish) - strtotime($dateStart)) / 86400);
    }

    /**
     * Подготовка массива
     */
    private function preparation()
    {
        for($i=0; $i < count($this->dayInterval); $i++) {
            if ($i === 0) {
                $dayInterval[$i] = $this->dayInterval[$i];
            } else {
                $dayInterval[$i] = $this->dayInterval[$i] - $this->dayInterval[$i-1];
            }
        }
        $this->dayInterval = $dayInterval;
    }

    /**
     * Возвращает массив с интервалами дней
     */
    private function getDayIntervals()
    {
        foreach (self::$config['payments'] as $payment) {
            $this->dayInterval[] = $this->daysBetween(self::$config['loan']['date'], $payment['date']);
        }
        $this->preparation();
    }

    /**
     * Считает
     * @return mixed
     */
    private function calculate()
    {
        $i = 0;
        $base = self::$config['loan']['base'];
        $percent = self::$config['loan']['percent'];
        $payments = self::$config['payments'];
        foreach ($payments as $payment) {
            $base += $base * $percent * $this->dayInterval[$i];
            $base -= $payment['amount'];
            $i++;
        }
        return $base;
    }

    /**
     * Фабрика
     * @param array $config
     * @return Algorithm
     */
    public static function init( array $config)
    {
        self::$config = $config;

        return new self;
    }

    /**
     * Запуск
     * @return mixed
     */
    public function run()
    {
        $this->getDayIntervals();
        return $this->Calculate();
    }
}