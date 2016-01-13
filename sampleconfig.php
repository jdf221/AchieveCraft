<?php

$analyticsTrack = "";
$allowedDomains = array('example.com', 'i.example.com');
if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowedDomains)) {
    echo "Error 400. Bad request.";
    $AchieveCraftApp->response->setStatus(400);
    die();
}
else{
    $domain = $_SERVER['HTTP_HOST'];
    $analyticsTrack = "analytics tracking code";
}

return array(
    "index" => "https://".$domain."/",
    "domain" => $domain,

    "allowCacheOption" => false,

    "GoogleAnalytics" => array(
        "enable" => true,
        "trackingId" => $analyticsTrack,
        "customerId" => "analytics customer id"
    ),

    "defaults" => array(
        "achievement" => array(
            "background" => $AchieveCraftApp->config("baseDir") . "assets/images/achievementbg.png",
            "font" => $AchieveCraftApp->config("baseDir") . "assets/fonts/minecraftia.ttf"
        ),
        "icon" => array(
            "missing" => $AchieveCraftApp->config("baseDir") . "assets/images/missing.png",
            "32x32" => $AchieveCraftApp->config("baseDir") . "assets/images/32x32.png"
        ),
        "group" => array(
            "name" => "Unnamed Icon Group"
        )
    ),
    "paths" => array(
        "backend" => array(
            "AchieveCraft" => $AchieveCraftApp->config("baseDir") . "backend/AchieveCraft.class.php",
            "Database" => $AchieveCraftApp->config("baseDir") . "backend/Database.class.php",
            "Achievement" => $AchieveCraftApp->config("baseDir") . "backend/Achievement.class.php",
            "Icon" => $AchieveCraftApp->config("baseDir") . "backend/Icon.class.php",
            "CacheWrapper" => $AchieveCraftApp->config("baseDir") . "backend/CacheWrapper.class.php",

            "GoogleAnalyticsMiddleware" => $AchieveCraftApp->config("baseDir") . "backend/GoogleAnalyticsMiddleware.class.php",
            "HttpClient" => $AchieveCraftApp->config("baseDir") . "backend/vender/theiconic/php-ga-measurement-protocol/CustomHttpClient.php",
        ),
        "pages" => array(
            "index" => $AchieveCraftApp->config("baseDir") . "pages/index.php"
        ),
        "routes" => $AchieveCraftApp->config("baseDir") . "routes/",
        "cache" => $AchieveCraftApp->config("baseDir") . "cache/"
    ),
    "errors" => array(
        "1" => "Unknown error",
        "2" => "Unknown database error",
        "3" => "No resource was found"
    )
);