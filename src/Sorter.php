<?php
/**
 * Инициализация
 *
 * @version 08.05.2019
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace Lemurro\Lib\Sorter;

/**
 * Class Sorter
 *
 * @package Lemurro\Lib\Sorter
 */
class Sorter
{
    /**
     * Название ключа
     *
     * @var string
     */
    protected $key_name;

    /**
     * Тип сортировки ('asc'|'desc')
     *
     * @var string
     */
    protected $order_type;

    /**
     * Выполним сортировку
     *
     * @param array  &$array      Массив
     * @param string  $key_name   Название ключа
     * @param string  $order_type Тип сортировки ('asc'|'desc')
     * @param boolean $save_keys  Сохранить ключи (true|false)
     *
     * @return boolean
     *
     * @version 08.05.2019
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run(&$array, $key_name, $order_type, $save_keys = true)
    {
        $this->key_name = $key_name;
        $this->order_type = mb_strtolower($order_type, 'UTF-8');

        if ($save_keys) {
            return uasort($array, [$this, 'sort']);
        } else {
            return usort($array, [$this, 'sort']);
        }
    }

    /**
     * Отсортируем массив
     *
     * @param array $a Первый элемент
     * @param array $b Второй элемент
     *
     * @return integer
     *
     * @version 14.06.2018
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    protected function sort($a, $b)
    {
        if ($a[$this->key_name] == $b[$this->key_name]) {
            return 0;
        }

        switch ($this->order_type) {
            case 'asc':
                return ($a[$this->key_name] > $b[$this->key_name]) ? +1 : -1;
                break;

            case 'desc':
                return ($a[$this->key_name] > $b[$this->key_name]) ? -1 : +1;
                break;

            default:
                return 0;
                break;
        }
    }
}
