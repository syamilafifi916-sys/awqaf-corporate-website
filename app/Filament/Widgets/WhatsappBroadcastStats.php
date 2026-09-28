<?php
namespace App\Filament\Widgets;
use App\Models\WhatsappCampaign;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
class WhatsappBroadcastStats extends StatsOverviewWidget {
 protected static ?string $pollingInterval=null;
 protected function getStats(): array {
  return [
   Stat::make('Broadcasts',WhatsappCampaign::count())->description('All campaigns'),
   Stat::make('Recipients',WhatsappCampaign::sum('recipient_count'))->description('Queued/imported'),
   Stat::make('Delivered',WhatsappCampaign::sum('delivered_count'))->description('Provider-confirmed delivery'),
   Stat::make('Failed',WhatsappCampaign::sum('failed_count'))->description('Requires review'),
  ];
 }
};