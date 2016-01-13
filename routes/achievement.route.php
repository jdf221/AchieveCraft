<?php

$AchievementRoute = function ($iconId, $topText, $bottomText) use ($AchieveCraft) {
    $cache = $AchieveCraft->App()->request->get("cache");
    if($cache == "false") $cache = false; else $cache = true;
    if(!$AchieveCraft->App()->config("allowCacheOption")) $cache = true;

    if(is_array($bottomText)){
        $bottomText = implode("/", $bottomText);
    }

    if (substr($bottomText, -4) == ".png") {
        $bottomText = substr($bottomText, 0, -4);
    }

    if (substr($bottomText, -3) == "mca") {
        $bottomText = substr($bottomText, 0, -3);
    }

    $Icon = $AchieveCraft->Icon($cache);
    $Icon->setIconId($iconId);

    $Achievement = $AchieveCraft->Achievement($cache);
    $Achievement->setIcon($Icon->getImage(), $iconId)->setTopText($topText)->setBottomText($bottomText);

    if($cache) {
        $AchieveCraft->App()->etag($Achievement->getCacheId());
        $AchieveCraft->App()->expires('+1 week');
    }
    $AchieveCraft->App()->response->headers->set('Content-Type', 'image/png');

    imagepng($Achievement->getImage());
};

$AchieveCraft->App()->get('/i/:iconId/:topText/:bottomText+(/.png)(/)(mca.png)(/)', function ($iconId, $topText, $bottomText) use ($AchievementRoute) {
    $AchievementRoute($iconId, $topText, $bottomText);
})->name('Achievement');

$AchieveCraft->App()->get('/(m)cimage/:iconId/:topText/:bottomText+(/.png)(/)(mca.png)(/)', function ($iconId, $topText, $bottomText) use ($AchievementRoute) {
    if (substr($iconId, 0, 1) == "i") {
        $iconId = substr($iconId, 1);
    }
    $AchievementRoute($iconId, $topText, $bottomText);
})->name('Achievement');