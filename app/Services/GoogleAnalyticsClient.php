<?php

namespace App\Services;

use Google\Client;
use InvalidArgumentException;

class GoogleAnalyticsClient
{
    public static function make(): Client
    {
        $path = config('google.analytics.credentials');

        if (!is_string($path) || $path === '') {
            throw new InvalidArgumentException('Google Analytics credentials path is empty (config/google.php).');
        }

        // absolute না হলে storage_path() দিয়ে resolve
        if (!preg_match('~^([a-zA-Z]:\\\\|/)~', $path)) {
            $path = storage_path(trim($path, '/\\'));
        }

        if (!file_exists($path)) {
            throw new InvalidArgumentException('Credentials file not found at: '.$path);
        }
        if (!is_readable($path)) {
            throw new InvalidArgumentException('Credentials file not readable: '.$path);
        }

        $client = new Client();
        $client->setAuthConfig($path);
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);

        return $client;
    }
}
