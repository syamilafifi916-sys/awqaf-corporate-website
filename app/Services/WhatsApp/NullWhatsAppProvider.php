<?php
namespace App\Services\WhatsApp;
use App\Contracts\WhatsAppProvider;
use RuntimeException;
class NullWhatsAppProvider implements WhatsAppProvider {
 public function sendTemplate(string $phone,string $template,array $parameters=[]): array {
  throw new RuntimeException('WhatsApp dispatch is disabled: no official provider is configured.');
 }
};