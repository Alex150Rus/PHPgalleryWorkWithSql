<?php

$html = <<<php

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>gallery</title>
  <style>
    #pictureWrapper {
      display: flex;
      justify-content: center;
    }
    p {
      text-align: center;
      font-weight: 900;
    }
  </style>
</head>
<body>
<section>
  <div id="pictureWrapper">
  forPictures
  </div>
</section>
</body>
</html>

php;

$link = mysqli_connect('localhost', 'root', '', 'gallery');

if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$sql = 'SELECT id, altName, LargeJpgFileName, counter FROM images';
$res = mysqli_query($link, $sql);

define('DIR_IMG', 'image');

while (@$row = mysqli_fetch_assoc($res)) {
    if ($row['id'] === '4') {
        $str = "<div><p>просмотров: " . $row['counter'] . "</p><img src = " . DIR_IMG . "/" . $row['LargeJpgFileName']
            . " alt = " . $row['altName'] . "></div>";
        $counter = $row['counter'] + 1;
        $sql = "UPDATE images SET counter = $counter WHERE images.id = 4";
        $res = mysqli_query($link, $sql);
    }
}

$html = str_replace('forPictures', $str, $html);
echo $html;
/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 06.12.2018
 * Time: 14:33
 */