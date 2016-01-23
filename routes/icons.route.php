<?php

$AchieveCraft->App()->get('/api/get/icon/:iconId(/)', function ($iconId) use($AchieveCraft){
    $cache = $AchieveCraft->App()->request->get("cache");
    if($cache == "false") $cache = false; else $cache = true;
    if(!$AchieveCraft->App()->config("allowCacheOption")) $cache = true;

    if (substr($iconId, -4) == ".png") {
        $iconId = substr($iconId, 0, -4);
    }


    $Icon = $AchieveCraft->Icon($cache);
    $Icon->setIconId($iconId);

    if($cache) {
        $AchieveCraft->App()->etag($Icon->getCacheId());
        $AchieveCraft->App()->expires('+1 week');
    }
    $AchieveCraft->App()->response->headers->set('Content-Type', 'image/png');
    $AchieveCraft->App()->expires('+1 week');

    imagepng($Icon->getImage());
})->name('Get Icon');

$AchieveCraft->App()->post('/api/new/icon(/)', function () use($AchieveCraft){
    die();
    //I hate doing file uploads...
    //TODO: Needs way better error handling
    //In fact this uploading needs better everything because it was a bit rushed so...

    $accepted = array("image/png", "image/jpg", "image/jpeg", "image/gif");

    $icons = $AchieveCraft->reArrayFiles($_FILES['icons']);
    $return = array("error" => array("code" => 0));

    if(isset($icons[0]) && $icons[0]['error'] == 4){
        $return = array("error" => array("code" => 1));
    }
    else{
        $count = 0;
        $groupName = "Unnamed Icon Group";
        if(!empty($AchieveCraft->App()->request->post('groupName')) && ctype_alnum($AchieveCraft->App()->request->post('groupName'))) {
            $groupName = $AchieveCraft->App()->request->post('groupName');
        }
        $groupId = false;

        foreach($icons as $icon){
            $count++;
            if($icon['size'] < 3145728){
                if(in_array($icon['type'], $accepted)){
                    if($count == 1){
                        $groupId = $AchieveCraft->Database()->newGroup($groupName);
                    }

                    $icon = imagecreatefromstring(file_get_contents($icon['tmp_name']));
                    $newicon = imagecreatefrompng($AchieveCraft->App()->config("defaults")['icon']['32x32']);

                    imagesavealpha($newicon, true);
                    imagesavealpha($icon, true);
                    $x = imagesx($icon);
                    $y = imagesy($icon);

                    imagecopyresampled($newicon, $icon, 0, 0, 0, 0, 32, 32, $x, $y);

                    ob_start();
                    imagepng($newicon);
                    $base64 = base64_encode(ob_get_contents());
                    ob_end_clean();

                    $AchieveCraft->Database()->newIcon($base64, $groupId);

                    $return = array("groupId" => $groupId);
                }
                else{
                    $return = array("error" => array("code" => 2));
                }
            }
            else{
                $return = array("error" => array("code" => 3));
            }
        }
    }

    echo json_encode($return);
echo $AchieveCraft->App()->request->post('groupName');
});