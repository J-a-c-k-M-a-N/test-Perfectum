<?php

//Задание 1:
//Создайте класс и напишите в нем метод, который объединяет два массива, чередуя
//элементы. Например, с учетом двух массивов [a, b, c] и [1, 2, 3] метод должен вернуть
//[a, 1, b, 2, c, 3]. Массивы задать как приватные свойства этого же класса, наполнить
//рандомными значениями длинной не менее 20 элементов, массивы должны иметь
//одинаковое количество элементов. Результат: на экран вывести исходные массивы и
//результирующий массив.

class ArrayService
{
    const ARRAY_LENGTH = 20;

    const STR_ARRAY = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    const NUM_ARRAY = array(
        'a', 'b', 'c', 'd', 'e', 'f','g',
        'h', 'i', 'j', 'k', 'l','m', 'n',
        'o', 'p', 'q', 'r', 's', 't','u',
        'v', 'w', 'x', 'y', 'z'
    );

    private $arrayStr;
    private $arrayNum;

    public function __construct()
    {
        $this->arrayStr = $this->createRandomArray(self::STR_ARRAY, self::ARRAY_LENGTH);
        $this->arrayNum = $this->createRandomArray(self::NUM_ARRAY, self::ARRAY_LENGTH);
    }

    /**
     * @return Generator
     */
    public function combine(): \Generator
    {
        $data1 = $this->arrayStr;
        $data2 = $this->arrayNum;


        for($i = 0; $i < self::ARRAY_LENGTH; $i++) {
            yield $data1[$i];
            yield $data2[$i];
        }
    }

    /**
     * @param array $data
     * @param string $array_alength
     * @return array
     * @throws Exception
     */
    private function createRandomArray(array $data, string $array_alength): array
    {
        $randomArray = [];

        $i = $array_alength;

        while ($i  > 0) {
            $randomArray[] = $this->random($data);
            $i--;
        }
        return $randomArray;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    private function random(array $data)
    {
        $min = 0;
        $max = count($data) - 1;

        $key = random_int($min, $max);

        return $data[$key];
    }

}

$arrayToCombine = new ArrayService();
$arrayCombined = iterator_to_array($arrayToCombine->combine());

echo "<pre>";
print_r($arrayCombined);
echo "</pre>";
