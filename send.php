<?php
require_once("vendor/autoload.php");
use Minishlink\WebPush\WebPush;

$auth = [
    'VAPID' => [
        'subject' => 'mailto:me@website.com', // can be a mailto: or your website address
        'publicKey' => 'BC1VHFZkXPFeQxUZcPFaKmB0ybdEoJDP0NtRpRQcm9r1wDs59EP6HRxkBPmTqM5-I7YqPvuXh5WA2qVVozLsw4k', // (recommended) uncompressed public key P-256 encoded in Base64-URL
        'privateKey' => 'StpkspHJM47XrXgAIcJbmUqlVtdWsVfLTdKo9BEEMq8', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ],
];

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    Subscription::create(json_decode('{"endpoint":"https://fcm.googleapis.com/fcm/send/cc9ZTj1nRLw:APA91bG36TivlrZaiA7C5DVxe4k_UsLTwzc5d68ViVVcG6TjDZJ_JHaXFN6qrxatUqCYLYCWn58txmq_33yjGvtwjHlrDAvOVJaRJ1qQuEwp4CZOkXG5lHCdjhQ6kZMGfB1oe7KGkK9q","expirationTime":null,"keys":{"p256dh":"BO2eGSviVohEG-CrI39XiuO6tkAKC7h-n8DvsTeRe_DzrTcsJR_86RE7LqasPJAi00FqDveIs0t2vUk23LSas74","auth":"9SKNXvVCyq7lXykmIdWCDA"}}',true))
    , '{"title":"Hi", "body":"a", "url":"./"}', ['TTL' => 5000]);

    print_r($report);