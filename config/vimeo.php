<?php

/**
 *   Copyright 2018 Vimeo.
 *
 *   Licensed under the Apache License, Version 2.0 (the "License");
 *   you may not use this file except in compliance with the License.
 *   You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 *   Unless required by applicable law or agreed to in writing, software
 *   distributed under the License is distributed on an "AS IS" BASIS,
 *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *   See the License for the specific language governing permissions and
 *   limitations under the License.
 */
declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => env('APP_ENV') == 'production' ? 'main': 'alternative',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'alternative' => [
            'client_id' => env('VIMEO_CLIENT', '1fcd31765aff2b01de45ef4bad31a93c09677303'),
            'client_secret' => env('VIMEO_SECRET', 'rZAwyRfuYJIz6/INBR1l9EcNgUaVMbRWNrcZWXIpjJ6mCjvNUhfL3oK+VWK6NHvaqFOJG4LNft+ewASzksf2PIPrYBbquOKAM2//oPoYlaMOwaSbn0VySlaeX3/Df40+'),
            'access_token' => env('VIMEO_ACCESS', '8ed068ef1beab9e7008a0b1494496353'),
        ],

        'main' => [
            'client_id' => env('VIMEO_ALT_CLIENT', '0018324055e5e0f4392f8883223187229ee60933'),
            'client_secret' => env('VIMEO_ALT_SECRET', 'k9lnVLvHVG1eBbxQYfNYQagqlIrOv+XjLgGaQIv94sKuSPEerH0Vp46oDgrk9eKYeLCzIz4Umv7EJogsHp4SoOWWtbmWD6FdUetb0XQKlTUz8o0N38t0wuzrxXhmZwOr'),
            'access_token' => env('VIMEO_ALT_ACCESS', '8476127fcbe77f5602933e2ed18d0ca9'),
        ],

    ],

];
