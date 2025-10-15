<?php

namespace App\Services;

use Google_Client;
use Google_Service_AnalyticsData;
use Google_Service_AnalyticsData_RunReportRequest;
use Google_Service_AnalyticsData_DateRange;
use Google_Service_AnalyticsData_Metric;
use Google_Service_AnalyticsData_Dimension;

class GoogleAnalyticsGA4Service
{
    protected $client;
    protected $analytics;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAuthConfig(config('services.google_analytics.credentials'));
        $this->client->addScope(Google_Service_AnalyticsData::ANALYTICS_READONLY);

        $this->analytics = new Google_Service_AnalyticsData($this->client);
    }

    public function getReport($propertyId)
    {
        $request = new Google_Service_AnalyticsData_RunReportRequest([
            'dateRanges' => [new Google_Service_AnalyticsData_DateRange(['startDate' => '30daysAgo', 'endDate' => 'today'])],
            'metrics' => [new Google_Service_AnalyticsData_Metric(['name' => 'activeUsers'])],
            'dimensions' => [new Google_Service_AnalyticsData_Dimension(['name' => 'date'])],
        ]);

        return $this->analytics->properties->runReport("properties/$propertyId", $request);
    }
}