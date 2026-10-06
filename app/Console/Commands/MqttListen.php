<?php

namespace App\Console\Commands;

use App\Services\MqttService;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:mqtt-listen')]
#[Description('Command description')]
class MqttListen extends Command
{
    /**
     * Execute the console command.
     */

    //protected $signature = 'mqtt-listen';

    //protected $description = 'Executa Mensagem MQTT do Hivemq';

    public function handle() {
        
        $mqttService = new MqttService();
        $mqttService->receberDados();
        return command::SUCCESS;


    }
}
