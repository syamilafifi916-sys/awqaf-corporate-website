<?php
namespace App\Services\WhatsApp;
use InvalidArgumentException;
class PhoneNormalizer {
 public function malaysia(string $phone): string {
  $digits=preg_replace('/\D+/','',$phone);
  if (str_starts_with($digits,'60')) $normalized=$digits;
  elseif (str_starts_with($digits,'0')) $normalized='60'.substr($digits,1);
  else $normalized='60'.$digits;
  if (!preg_match('/^60\d{8,11}$/',$normalized)) throw new InvalidArgumentException('Invalid Malaysian phone number.');
  return $normalized;
 }
};