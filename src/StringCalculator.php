<?php

namespace Deg540\DockerPHPBoilerplate;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }

        if(str_contains($numbers, '//')) {
            $delimiter = $numbers[2];
            $numbers = str_replace('//'. $delimiter . '\n', '', $numbers);
            $numbers = str_replace($delimiter, ',', $numbers);

            return array_sum(explode(',', $numbers));
        }

        $numbers = str_replace('\n', ',', $numbers);

        if (str_contains($numbers, ',')) {
            $numbersArray = explode(',', $numbers);
            $numbers = array_sum($numbersArray);
        }

        return $numbers;
    }
}
