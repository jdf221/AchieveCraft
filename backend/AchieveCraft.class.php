<?php

namespace jdf221\AchieveCraft;
class AchieveCraft{

    private $App;
    private $Database;

    public function __construct($App)
    {
        $this->App = $App;

        require_once $App->config("paths")['backend']['Database'];
        $this->Database = new Database();

        require_once $App->config("paths")['backend']['HttpClient'];
        require_once $App->config("paths")['backend']['GoogleAnalyticsMiddleware'];
        $App->add(new \GoogleAnalyticsMiddleware());
    }
    
    public function App(){
        return $this->App;
    }

    public function Database(){
        return $this->Database;
    }

    private function error($code){
        $error = array("code" => $code, "message" => $this->App()->config("errors")[$code]);

        throw new \Exception($error['message'], $error['code']);
    }

    public function Achievement($cache = true)
    {
        require_once $this->App()->config("paths")['backend']['Achievement'];
        require_once $this->App()->config("paths")['backend']['CacheWrapper'];

        $Achievement = new Achievement();
        $Achievement->setFont($this->App()->config("defaults")['achievement']['font'])->setBackground($this->App()->config("defaults")['achievement']['background']);

        if($cache) {
            return new CacheWrapper($this->App()->config("paths")['cache'], $Achievement);
        }
        else{
            return $Achievement;
        }
    }

    public function Icon($cache = true){
        require_once $this->App()->config("paths")['backend']['Icon'];
        require_once $this->App()->config("paths")['backend']['CacheWrapper'];

        $Icon = new Icon(function($iconId){
            return $this->getIcon($iconId);
        });
        $Icon->setMissingIcon($this->App()->config("defaults")['icon']['missing']);

        if($cache) {
            return new CacheWrapper($this->App()->config("paths")['cache'], $Icon);
        }
        else{
            return $Icon;
        }
    }


    public function getPublicGroups(){
        $return = array();
        $groups = $this->Database()->getPublicGroups();

        if(empty($groups)){
            $this->error("3"); //No resource was found
        }
        else if(is_array($groups)){
            $return = $groups;
        }

        return $return;
    }

    public function getGroup($id){
        $return = array();
        $group = $this->Database()->getGroup($id);

        if(!$group){
            $this->error("3"); //No resource was found
        }
        else if(is_array($group)){
            $group['icons'] = $this->Database()->getGroupIcons($id);
            $return = $group;
        }

        return $return;
    }

    public function supportOldIds($iconId){
        $icon = false;

        if(substr($iconId, 0, 1) == "p"){
            $name = substr($iconId, 1);
            $icon = array("id" => $iconId, "groupId" => "playerheads", "base64" => base64_encode(file_get_contents("http://mc-heads.net/avatar/".$name."/32")));
        }

        return $icon;
    }

    public function getIcon($id){
        $return = array();
        $oldIcon = $this->supportOldIds($id); //Might not be prettiest way to support the old ones but what ever
        if($oldIcon){
            $icon = $oldIcon;
        }
        else {
            $icon = $this->Database()->getIcon($id);
        }

        if(!$icon){
            $this->error("3"); //No resource was found
        }
        else if(is_array($icon)){
            $return = $icon;
        }

        return $return;
    }

    public function reArrayFiles(&$file_post) //http://php.net/manual/en/features.file-upload.multiple.php#53240
    {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

}