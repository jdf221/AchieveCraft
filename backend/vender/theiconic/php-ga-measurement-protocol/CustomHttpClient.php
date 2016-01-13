<?php

use GuzzleHttp\Promise;

/**
 * Class CustomHttpClient
 *
 * @package jdf221\AchieveCraft
 */
namespace jdf221\AchieveCraft;
class CustomHttpClient extends \TheIconic\Tracking\GoogleAnalytics\Network\HttpClient
{
    /**
     * Timeout in seconds for the request connection and actual request execution.
     * Using the same value you can find in Google's PHP Client.
     */
    const REQUEST_TIMEOUT_SECONDS = 1;
}