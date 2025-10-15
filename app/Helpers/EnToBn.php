<?php

use Illuminate\Support\Facades\App;

function EnToBn($number, $strictToBn = false)
{
  // $isBangla = App::getLocale() == 'bn';
  if (App::getLocale() == 'bn' || $strictToBn) {
    // Define arrays for English and Bangla digits
    $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

    // Replace each English digit with the corresponding Bangla digit
    $convertedNumber = str_replace($englishDigits, $banglaDigits, $number);

    return $convertedNumber;
  }
  return $number;
}
