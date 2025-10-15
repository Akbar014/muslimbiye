<?php

function generateOTP() {
  // Generate a random 6-digit number
  return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
}