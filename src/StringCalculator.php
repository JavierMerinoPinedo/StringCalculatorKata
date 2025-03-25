<?php

namespace Deg540\DockerPHPBoilerplate;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }

        $numbers = str_replace('\n', ',', $numbers);

        if (str_contains($numbers, ',')) {
            $numbersArray = explode(',', $numbers);
            $numbers = array_sum($numbersArray);
        }

        return $numbers;
    }
}