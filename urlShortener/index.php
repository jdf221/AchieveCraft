<?php

if(isset($_GET['path'])){
    $path = $_GET['path'];
}
else{
    die("No id");
}

$m = new MongoClient();
$db = $m->achievecraft;

if($path == "stats" || $path == "stats.png"){
    $stats = $db->currentcount;
    $countsofar = $stats->findOne(array("id" => "count"));
    $countsofar = number_format($countsofar['count']);
    
    //Always go to latest stats image
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    header("Location: http://achievecraft.net/i/19.1/".rawurlencode($countsofar)."%20images%20generated/achievecraft.net.png");
    die();
}

$shorturls = $db->shorturls;

$id = trim($path, ".png");

$imagepath = $shorturls->findOne(array("id" => $id));

$protocol = json_decode($_SERVER['HTTP_CF_VISITOR'], true)['scheme'].":";

header("Location: $protocol//achievecraft.net/".$imagepath['url']);
die();

?>
