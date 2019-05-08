# PHP-библиотека Sorter

Сортировка ассоциативного массива по определённому ключу

## Установка
```bash
composer require lemurro/lib-sorter
```

## Использование
```php
$sorter->run(&$array, $key_name, $order_type, $save_keys = true);
```
- **&$array** `array` *(Обязательно)* - Массив с данными (передаётся по ссылке)
- **$key_name** `string` *(Обязательно)* - Название ключа
- **$order_type** `string` *(Обязательно)* - Тип сортировки ('asc'|'desc')
- **$save_keys** `boolean` *(Не обязательно)* - Сохранить ключи (true|false), по умолчанию `true`

### Сортировка с сохранением ключей (по умолчанию)
```php
use Lemurro\Lib\Sorter\Sorter;

$sorter = new Sorter();

$array = [
    'z' => [
        'field1' => 'A',
        'field2' => 'orange',
    ],
    'x' => [
        'field1' => 'C',
        'field2' => 'apple',
    ],
    'c' => [
        'field1' => 'B',
        'field2' => 'peach',
    ],
];

$sorter->run($array, 'field1', 'asc');

var_dump($array);
/*
[
    'z' => [
        'field1' => 'A'
        'field2' => 'orange'
    ]
    'c' => [
        'field1' => 'B'
        'field2' => 'peach'
    ]
    'x' => [
        'field1' => 'C'
        'field2' => 'apple'
    ]
]
*/
```

```php
use Lemurro\Lib\Sorter\Sorter;

$sorter = new Sorter();

$array = [
    'z' => [
        'field1' => 'A',
        'field2' => 'orange',
    ],
    'x' => [
        'field1' => 'C',
        'field2' => 'apple',
    ],
    'c' => [
        'field1' => 'B',
        'field2' => 'peach',
    ],
];

$sorter->run($array, 'field2', 'desc');

var_dump($array);
/*
[
    'x' => [
        'field1' => 'C'
        'field2' => 'apple'
    ]
    'c' => [
        'field1' => 'B'
        'field2' => 'peach'
    ]
    'z' => [
        'field1' => 'A'
        'field2' => 'orange'
    ]
]
*/
```

### Сортировка без сохранения ключей
```php
use Lemurro\Lib\Sorter\Sorter;

$sorter = new Sorter();

$array = [
    'z' => [
        'field1' => 'A',
        'field2' => 'orange',
    ],
    'x' => [
        'field1' => 'C',
        'field2' => 'apple',
    ],
    'c' => [
        'field1' => 'B',
        'field2' => 'peach',
    ],
];

$sorter->run($array, 'field1', 'asc', false);

var_dump($array);
/*
[
    0 => [
        'field1' => 'A'
        'field2' => 'orange'
    ]
    1 => [
        'field1' => 'B'
        'field2' => 'peach'
    ]
    2 => [
        'field1' => 'C'
        'field2' => 'apple'
    ]
]
*/
```