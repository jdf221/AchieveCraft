<?php
use TheIconic\Tracking\GoogleAnalytics\Analytics;

class GoogleAnalyticsMiddleware extends \Slim\Middleware
{
    private $Client;

    public function __construct()
    {
        $this->Client = new Analytics();
        $this->Client->setHttpClient(new \jdf221\AchieveCraft\CustomHttpClient());
    }

    public function call()
    {
        $this->next->call();

        if($this->app->config("GoogleAnalytics")['enable']) {
            $App = $this->app;
            $Request = $App->request;
            $Route = $App->router()->getCurrentRoute();

            if (is_object($Route)) {
                if ($Route->getName() !== "index" || is_null($App->config("GoogleAnalytics")['trackingId']) || is_null($App->config("GoogleAnalytics")['customerId'])) {
                    $this->Client
                        ->setProtocolVersion('1')
                        ->setTrackingId($App->config("GoogleAnalytics")['trackingId'])
                        ->setClientId($App->config("GoogleAnalytics")['customerId'])
                        ->setIpOverride($Request->getIp())
                        ->setUserAgentOverride($Request->getUserAgent())
                        ->setDocumentHostName($Request->getHost())
                        ->setDocumentPath($Request->getResourceUri())
                        ->setDocumentLocationUrl($Request->getHost() . $Request->getResourceUri())
                        ->setDocumentTitle($Route->getName())
                        ->setDocumentReferrer($Request->getReferrer() || "")
                        ->sendPageview();
                }
            }
        }
    }
}