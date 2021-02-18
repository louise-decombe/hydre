<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;


class Mail
{
    private $api_key ='9def798e1965d0794f4e13a7242cc6a6';
    private $api_key_secret = '58625488a714bbf92ee872f39c08e9e0';


    public function send($to_email, $to_name, $subject, $content){

        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "louise.decombe@laplateforme.io",
                'Name' => "Mailjet Pilot"
            ],
            'To' => [
                [
                    'Email' => $to_email,
                    'Name' => $to_name
                ]
            ],
            'TemplateID' => 2370367,
            'TemplateLanguage' => true,
            'Subject' => $subject,
            'Variables' => [
                'content' => $content
            ]
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success();

      
    }
}

