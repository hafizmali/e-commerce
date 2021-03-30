<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
$user_name = ecoshop_option('tw_user_name');
$tw_consumer_key = ecoshop_option('tw_consumer_key');
$tw_consumer_secret = ecoshop_option('tw_consumer_secret');
$tw_access_token = ecoshop_option('tw_access_token');
$access_token_secret = ecoshop_option('access_token_secret');
$twitteruser		= $user_name; // Change with your twitter username
$notweets			= 10;
$consumerkey		= $tw_consumer_key;
$consumersecret		= $tw_consumer_secret;
$accesstoken		= $tw_access_token;
$accesstokensecret	= $access_token_secret;

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
}
$connection	= getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets		= $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitteruser . "&count=" . $notweets);
echo json_encode($tweets);
?>