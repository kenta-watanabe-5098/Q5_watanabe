<?php
require('car.php');
require('toyota.php');
require('honda.php');
require('nissan.php');
require('ferrari.php');

if(isset($_POST['road']) && $_POST['road'] >= 1000) {
    if(isset($_POST['option']) && $_POST['option'] < 0 || $_POST['option'] == '' ) {
        $price = 0;
    } else {
        $price = $_POST['option'];
    }

    $road = $_POST['road'];

    // Toyota レースタイムの生成
    $toyota = new Toyota();
    
    $toyota->addOption($price);
    $toyota->accele();
    $toyota->brakerate();
    $brakingtoyota = $toyota->brakeTimes;

    $toyota_accele_distance = $toyota->distanceToMaxSpeed;
    $toyota_brake_distance = 0;
    $toyota_accele_time = $toyota->TimeToMaxSpeed;
    $toyota_brake_time = 0;

    for($i = 0; $i < $brakingtoyota; $i++) {
        $toyota->accele();
        $toyota_accele_distance += $toyota->distanceToMaxSpeed / 1000;
        $toyota_accele_time += $toyota->TimeToMaxSpeed;

        $toyota->brake();
        $toyota_brake_distance += $toyota->distanceToStop / 1000;
        $toyota_brake_time += $toyota->TimeToStop;
    }

    $a = round($toyota_accele_distance + $toyota_brake_distance);
    $toyota_road = $road - $a; // 単位：km

    $toyota_constant_time = $toyota_road / $toyota->speed;
    $toyota_total_time = round(($toyota_constant_time * 60) + (($toyota_accele_time + $toyota_brake_time) / 60)); // 単位：分
    $toyota_time = $toyota->convertToHoursMins($toyota_total_time, $format = '%d時間%d分');
    // var_dump($toyota_time);
    // exit();

    
    // Honda レースタイム生成
    $honda = new Honda();
    
    $honda->brakerate();
    $brakinghonda = $honda->brakeTimes;

    $honda_accele_distance = $honda->distanceToMaxSpeed;
    $honda_brake_distance = 0;
    $honda_accele_time = $honda->TimeToMaxSpeed;
    $honda_brake_time = 0;

    for($i = 0; $i < $brakinghonda; $i++) {
        $honda->accele();
        $honda_accele_distance += $honda->distanceToMaxSpeed / 1000;
        $honda_accele_time += $honda->TimeToMaxSpeed;

        $honda->brake();
        $honda_brake_distance += $honda->distanceToStop / 1000;
        $honda_brake_time += $honda->TimeToStop;
    }

    $a = round($honda_accele_distance + $honda_brake_distance);
    $honda_road = $road - $a; // 単位：km

    $honda_constant_time = $honda_road / $honda->speed;
    $honda_total_time = round(($honda_constant_time * 60) + (($honda_accele_time + $honda_brake_time) / 60)); // 単位：分
    $honda_time = $honda->convertToHoursMins($honda_total_time, $format = '%d時間%d分');

    
    // Nissan レースタイム生成
    $nissan = new Nissan();
    
    $nissan->brakerate();
    $brakingnissan = $nissan->brakeTimes;

    $nissan_accele_distance = $nissan->distanceToMaxSpeed;
    $nissan_brake_distance = 0;
    $nissan_accele_time = $nissan->TimeToMaxSpeed;
    $nissan_brake_time = 0;

    for($i = 0; $i < $brakingnissan; $i++) {
        $nissan->accele();
        $nissan_accele_distance += $nissan->distanceToMaxSpeed / 1000;
        $nissan_accele_time += $nissan->TimeToMaxSpeed;

        $nissan->brake();
        $nissan_brake_distance += $nissan->distanceToStop / 1000;
        $nissan_brake_time += $nissan->TimeToStop;
    }

    $a = round($nissan_accele_distance + $nissan_brake_distance);
    $nissan_road = $road - $a; // 単位：km

    $nissan_constant_time = $nissan_road / $nissan->speed;
    $nissan_total_time = round(($nissan_constant_time * 60) + (($nissan_accele_time + $nissan_brake_time) / 60)); // 単位：分
    $nissan_time = $nissan->convertToHoursMins($nissan_total_time, $format = '%d時間%d分');


    // Ferrari レースタイム生成
    $ferrari = new Ferrari();
    
    $ferrari->brakerate();
    $brakingferrari = $ferrari->brakeTimes;

    $ferrari_accele_distance = $ferrari->distanceToMaxSpeed;
    $ferrari_brake_distance = 0;
    $ferrari_accele_time = $ferrari->TimeToMaxSpeed;
    $ferrari_brake_time = 0;

    for($i = 0; $i < $brakingferrari; $i++) {
        $ferrari->accele();
        $ferrari_accele_distance += $ferrari->distanceToMaxSpeed / 1000;
        $ferrari_accele_time += $ferrari->TimeToMaxSpeed;

        $ferrari->brake();
        $ferrari_brake_distance += $ferrari->distanceToStop / 1000;
        $ferrari_brake_time += $ferrari->TimeToStop;
    }

    $a = round($ferrari_accele_distance + $ferrari_brake_distance);
    $ferrari_road = $road - $a; // 単位：km

    $ferrari_constant_time = $ferrari_road / $ferrari->speed;
    $ferrari_total_time = round(($ferrari_constant_time * 60) + (($ferrari_accele_time + $ferrari_brake_time) / 60)); // 単位：分
    $ferrari_time = $ferrari->convertToHoursMins($ferrari_total_time, $format = '%d時間%d分');

    $_POST = array();

} else {
    echo 'コース全長1000km以上を指定ください';
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q5オブジェクト課題</title>
</head>
<body>
<h1>Q5. オブジェクト指向問題　課題</h1>
<form method="post" action="">
    <span>トヨタ車　オプション価格(円) :</span>
    <input type="number" name="option"><br/>
    <span>コースの全長(km) :</span>
    <input type="number" name="road"><br/>
    <input type="submit" value="登録">
</form>

<table border="1">
    <tr>
        <th>メーカー</th>
        <th>ゴールタイム</th>
        <th>平均時速</th>
    </tr>
    <tr>
        <th id="toyota"><?php if(isset($toyota->maker)) {print($toyota->maker);} ?></th>
        <th id="toyota_time" style="background-color: none;"><?php if(isset($toyota_total_time)) {print($toyota_time);} ?></th>
        <th><?php if(isset($toyota->speed)) {print(round($toyota->speed) . 'km/h');} ?></th>
    </tr>
    <tr>
        <th id="honda"><?php if(isset($honda->maker)) {print($honda->maker);} ?></th>
        <th id="honda_time" style="background-color: none;"><?php if(isset($honda_total_time)) {print($honda_time);} ?></th>
        <th><?php if(isset($honda->speed)) {print(round($honda->speed) . 'km/h');} ?></th>
    </tr>    
    <tr>
        <th id="nissan"><?php if(isset($nissan->maker)) {print($nissan->maker);} ?></th>
        <th id="nissan_time" style="background-color: none;"><?php if(isset($nissan_total_time)) {print($nissan_time);} ?></th>
        <th><?php if(isset($nissan->speed)) {print(round($nissan->speed) . 'km/h');} ?></th>
    </tr>
    <tr>
        <th id="ferrari"><?php if(isset($ferrari->maker)) {print($ferrari->maker);} ?></th>
        <th id="ferrari_time" style="background-color: none;"><?php if(isset($ferrari_total_time)) {print($ferrari_time);} ?></th>
        <th><?php if(isset($ferrari->speed)) {print(round($ferrari->speed) . 'km/h');} ?></th>
    </tr>

</table>
<script>
    var toyota_total_time = <?php echo $toyota_total_time; ?>;
    var honda_total_time = <?php echo $honda_total_time; ?>;
    var nissan_total_time = <?php echo $nissan_total_time; ?>;
    var ferrari_total_time = <?php echo $ferrari_total_time; ?>;
</script>
<script src="/object/q5/common.js"></script>   
</body>
</html>