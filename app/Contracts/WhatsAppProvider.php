<?php
namespace App\Contracts;
interface WhatsAppProvider {
 /** @return array{provider_message_id:string} */
 public function sendTemplate(string $phone,string $template,array $parameters=[]): array;
};