# PHP-библиотека LibSorter

Сортировка ассоциативного массива по определённому ключу

## Установка
```bash
composer require lemurro/lib-sorter
```

## Использование
```
$sorter = new \Lemurro\Lib\Sorter\Sorter();

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

$sorter->run($array, 'field2', 'desc');

var_dump($array);
/*
[
    0 => [
        'field1' => 'B'
        'field2' => 'peach'
    ]
    1 => [
        'field1' => 'A'
        'field2' => 'orange'
    ]
    2 => [
        'field1' => 'C'
        'field2' => 'apple'
    ]
]
*/
```