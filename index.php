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
    $honda = new Honda();
    $nissan = new Nissan();
    $ferrari = new Ferrari();

    $cars = array($toyota, $honda, $nissan, $ferrari);
    $car_total_time = array();
    $time = array();
    $toyota->addOption($price);

    foreach($cars as $key => $value) {
        $value->accele();
        $value->brakerate();
        $braking = $value->brakeTimes;
    
        $car_accele_distance = $value->distanceToMaxSpeed;
        $car_brake_distance = 0;
        $car_accele_time = $value->TimeToMaxSpeed;
        $car_brake_time = 0;
    
        for($i = 0; $i < $braking; $i++) {
            $value->accele();
            $car_accele_distance += $value->distanceToMaxSpeed / 1000;
            $car_accele_time += $value->TimeToMaxSpeed;
    
            $value->brake();
            $car_brake_distance += $value->distanceToStop / 1000;
            $car_brake_time += $value->TimeToStop;
        }
    
        $a = round($car_accele_distance + $car_brake_distance);
        $car_road = $road - $a; // 単位：km
    
        $car_constant_time = $car_road / $value->speed;
        $total_time = round(($car_constant_time * 60) + (($car_accele_time + $car_brake_time) / 60)); // 単位：分
        $car_total_time = $car_total_time + array($key => $total_time);
        $car_time = $value->convertToHoursMins($total_time, $format = '%d時間%d分'); 
        $time = $time + array($key => $car_time);
    }

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
        <th>ブレーキ回数</th>
    </tr>
    <tr>
        <th id="toyota"><?php if(isset($toyota->maker)) {print($toyota->maker);} ?></th>
        <th id="toyota_time" style="background-color: none;"><?php if(isset($time)) {print($time[0]);} ?></th>
        <th><?php if(isset($toyota->speed)) {print(round($toyota->speed) . 'km/h');} ?></th>
        <th><?php if(isset($toyota->brakeTimes)) {print(($toyota->brakeTimes) . '回');} ?></th>
    </tr>
    <tr>
        <th id="honda"><?php if(isset($honda->maker)) {print($honda->maker);} ?></th>
        <th id="honda_time" style="background-color: none;"><?php if(isset($time)) {print($time[1]);} ?></th>
        <th><?php if(isset($honda->speed)) {print(round($honda->speed) . 'km/h');} ?></th>
        <th><?php if(isset($honda->brakeTimes)) {print(($honda->brakeTimes) . '回');} ?></th>
    </tr>    
    <tr>
        <th id="nissan"><?php if(isset($nissan->maker)) {print($nissan->maker);} ?></th>
        <th id="nissan_time" style="background-color: none;"><?php if(isset($time)) {print($time[2]);} ?></th>
        <th><?php if(isset($nissan->speed)) {print(round($nissan->speed) . 'km/h');} ?></th>
        <th><?php if(isset($nissan->brakeTimes)) {print(($nissan->brakeTimes) . '回');} ?></th>
    </tr>
    <tr>
        <th id="ferrari"><?php if(isset($ferrari->maker)) {print($ferrari->maker);} ?></th>
        <th id="ferrari_time" style="background-color: none;"><?php if(isset($time)) {print($time[3]);} ?></th>
        <th><?php if(isset($ferrari->speed)) {print(round($ferrari->speed) . 'km/h');} ?></th>
        <th><?php if(isset($ferrari->brakeTimes)) {print(($ferrari->brakeTimes) . '回');} ?></th>
    </tr>

</table>
<script>
    var toyota_total_time = <?php echo $car_total_time[0]; ?>;
    var honda_total_time = <?php echo $car_total_time[1]; ?>;
    var nissan_total_time = <?php echo $car_total_time[2]; ?>;
    var ferrari_total_time = <?php echo $car_total_time[3]; ?>;
</script>
<script src="/object/q5/common.js"></script>   
</body>
</html>