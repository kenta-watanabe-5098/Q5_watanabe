<?php
require('object.php');
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
    
    $toyota->spec($price);
    
    $max_toyota = $toyota->speed;
    
    $toyota->acceleRate();
    $a = $toyota->accele;
    for($i=1; $i<$a; $i++) {
        $toyota->accele();
    }
    
    $toyota->brakeRate();
    $b = $toyota->brake;
    for($i=1; $i<=$b; $i++) {
        $toyota->brake();
    }
    
    if($max_toyota < $toyota->speed) {
        $toyota->speed = $max_toyota;
    } else {
        round($toyota->speed);
    }
    
    $toyota_time = round($road / $toyota->speed);
    // var_dump($toyota->speed);
    // exit();
    
    // Honda レースタイムの生成
    $honda = new Honda();
    $max_honda = $honda->speed;
    
    $honda->acceleRate();
    $a = $honda->accele;
    for($i=1; $i<$a; $i++) {
        $honda->accele();
    }
    
    $honda->brakeRate();
    $b = $honda->brake;
    for($i=1; $i<=$b; $i++) {
        $honda->brake();
    }
    
    if($max_honda < $honda->speed) {
        $honda->speed = $max_honda;
    } else {
        round($honda->speed);
    }
    
    $honda_time = round($road / $honda->speed);
    
    
    // Nissan レースタイムの生成
    $nissan = new Nissan();
    $max_nissan = $nissan->speed;
    
    $nissan->acceleRate();
    $a = $nissan->accele;
    for($i=1; $i<$a; $i++) {
        $nissan->accele();
    }
    
    $nissan->brakeRate();
    $b = $nissan->brake;
    for($i=1; $i<=$b; $i++) {
        $nissan->brake();
    }
    
    if($max_nissan < $nissan->speed) {
        $nissan->speed = $max_nissan;
    } else {
        round($nissan->speed);
    }
    
    $nissan_time = round($road / $nissan->speed);
    
    
    // Ferrari レースタイムの生成
    $ferrari = new Ferrari();
    $max_ferrari = $ferrari->speed;
    
    $ferrari->acceleRate();
    $a = $ferrari->accele;
    for($i=1; $i<$a; $i++) {
        $ferrari->accele();
    }
    
    $ferrari->brakeRate();
    $b = $ferrari->brake;
    for($i=1; $i<=$b; $i++) {
        $ferrari->brake();
    }
    
    if($max_ferrari < $ferrari->speed) {
        $ferrari->speed = $max_ferrari;
    } else {
        round($ferrari->speed);
    }
    
    $ferrari_time = round($road / $ferrari->speed);

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
        <th id="toyota_time" style="background-color: none;"><?php if(isset($toyota_time)) {print(round($toyota_time) . '時間');} ?></th>
        <th><?php if(isset($toyota->speed)) {print(round($toyota->speed) . 'km/h');} ?></th>
    </tr>
    <tr>
        <th id="honda"><?php if(isset($honda->maker)) {print($honda->maker);} ?></th>
        <th id="honda_time" style="background-color: none;"><?php if(isset($honda_time)) {print(round($honda_time) . '時間');} ?></th>
        <th><?php if(isset($honda->speed)) {print(round($honda->speed) . 'km/h');} ?></th>
    </tr>    
    <tr>
        <th id="nissan"><?php if(isset($nissan->maker)) {print($nissan->maker);} ?></th>
        <th id="nissan_time" style="background-color: none;"><?php if(isset($nissan_time)) {print(round($nissan_time) . '時間');} ?></th>
        <th><?php if(isset($nissan->speed)) {print(round($nissan->speed) . 'km/h');} ?></th>
    </tr>
    <tr>
        <th id="ferrari"><?php if(isset($ferrari->maker)) {print($ferrari->maker);} ?></th>
        <th id="ferrari_time" style="background-color: none;"><?php if(isset($ferrari_time)) {print(round($ferrari_time) . '時間');} ?></th>
        <th><?php if(isset($ferrari->speed)) {print(round($ferrari->speed) . 'km/h');} ?></th>
    </tr>

</table>
<script>
    var toyota_time = <?php echo $toyota_time; ?>;
    var honda_time = <?php echo $honda_time; ?>;
    var nissan_time = <?php echo $nissan_time; ?>;
    var ferrari_time = <?php echo $ferrari_time; ?>;
</script>
<script src="/object/q5/common.js"></script>   
</body>
</html>