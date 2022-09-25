<?php
/*
 * Разработайте функцию с объявленными типами аргументов и возвращаемого значения,
 * принимающую в качестве аргумента массив целых чисел.
 * Результатом работы функции должен быть массив, содержащий три элемента:
 * max — наибольшее число, min — наименьшее число, avg — среднее арифметическое всех чисел массива;
 * */
function minMaxAvgOfArray(array $nums = null): ?array
{
    if (empty($nums)) {
        return null;
    }
    return [max($nums), min($nums), array_sum($nums) / sizeof($nums)];
}

print_r(minMaxAvgOfArray([1, 4, 5, 6, 7, 8, 10, 2, 4, 2]));
print_r(minMaxAvgOfArray([]));
print_r(minMaxAvgOfArray([1, 2, 3, 4]));