<?php
$alldrv = json_decode(file_get_contents("drv.json"));
$baddrv = json_decode(file_get_contents("baddrv.json"));

$bad_serials = array_values($baddrv);
$all_serials = [];
array_walk($alldrv->data, function($drv) use ($all_serials){
    $all_serials[] = $drv->serial;
});
echo 'Found bad: '.implode(',', array_intersect($bad_serials, $all_serials));
