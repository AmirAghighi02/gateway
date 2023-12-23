<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Gateway::create([
            'name' => 'zarinpal',
            'config' => [
                'merchant-id' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
                'type' => 'zarin-gate',             // Types: [zarin-gate || normal]
                'callback-url' => '/',
                'server' => 'germany',                // Servers: [germany || iran || test]
                'email' => 'email@gmail.com',
                'mobile' => '09xxxxxxxxx',
                'description' => 'description',
            ]
        ]);
        Gateway::create([
            'name' => 'mellat',
            'config' => [
                'username' => '',
                'password' => '',
                'terminalId' => 0000000,
                'callback-url' => '/'
            ]
        ]);
        Gateway::create([
            'name' => 'saman',
            'config' => [
                'merchant' => '',
                'password' => '',
                'callback-url' => '/',
            ]
        ]);
        Gateway::create([
            'name' => 'payir',
            'config' => [
                'api' => 'xxxxxxxxxxxxxxxxxxxx',
                'callback-url' => '/'
            ]
        ]);
        Gateway::create([
            'name' => 'paypal',
            'config' => [
                // Default product name that appear on paypal payment items
                'default_product_name' => 'My Product',
                'default_shipment_price' => 0,
                // set your paypal credential
                'client_id' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'secret' => 'xxxxxxxxxx_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'settings' => [
                    'mode' => 'sandbox', //'sandbox' or 'live'
                    'http.ConnectionTimeOut' => 30,
                    'log.LogEnabled' => true,
                    'log.FileName' => \Database\Seeders\storage_path() . '/logs/paypal.log',
                    /**
                     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
                     *
                     * Logging is most verbose in the 'FINE' level and decreases as you
                     * proceed towards ERROR
                     */
                    'call_back_url' => '/gateway/callback/paypal',
                    'log.LogLevel' => 'FINE'
                ]
            ]
        ]);
        Gateway::create([
            'name' => 'asanpardakht',
            'config' => [
                'merchantId' => '',
                'merchantConfigId' => '',
                'username' => '',
                'password' => '',
                'key' => '',
                'iv' => '',
                'callback-url' => '/',
            ]
        ]);
    }
}
