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
    Subscription::create(json_decode('{"endpoint":"https://fcm.googleapis.com/fcm/send/cXtN_ByxeHc:APA91bHwOaLbx-QJWOXUuRU2AD9jAjQHVWTHL5THVGClVxAwuEjcTlVIYaALiq7svInQaxHjjZnyfvPhCL5R__i_mU0aRBeaU3VSYyhRi6g6kDUraL-ByVIPzCusEeRxGmi04rKPG2b8","expirationTime":null,"keys":{"p256dh":"BEYYk1SOfksoOMBFbPUR_6LWx8v1DzqTm0lerUjbmG-ahvUDD9PIf3_VyQVdyHxr7HrHAHoYX4R0km-Y-mbrEwo","auth":"lyFJ-CsKRQuf5hZEulmvzw"}}',true))
    , '{"title":"Hi", "body":"a", "url":"./"}', ['TTL' => 5000]);

    print_r($report);