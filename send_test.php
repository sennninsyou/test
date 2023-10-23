<?php
require_once("vendor/autoload.php");
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $subscription = $_POST["subscription"];

    $auth = [
        'VAPID' => [
            'subject' => 'https://sennninsyou.github.io/test/', // can be a mailto: or your website address
            'publicKey' => 'BC1VHFZkXPFeQxUZcPFaKmB0ybdEoJDP0NtRpRQcm9r1wDs59EP6HRxkBPmTqM5-I7YqPvuXh5WA2qVVozLsw4k', // (recommended) uncompressed public key P-256 encoded in Base64-URL
            'privateKey' => 'StpkspHJM47XrXgAIcJbmUqlVtdWsVfLTdKo9BEEMq8', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
        ],
    ];

    $webPush = new WebPush($auth);

    $report = $webPush->sendOneNotification(Subscription::create($subscription,true), '{"title":"通知テスト", "body":"これはPush通知のテストです。", "url":"./"}', ['TTL' => 5000]);
}
?>