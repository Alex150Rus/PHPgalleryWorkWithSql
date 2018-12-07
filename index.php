<?php

$html = file_get_contents('gallery.html');

$link = mysqli_connect('localhost', 'root', '', 'gallery');

if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

$sql = 'SELECT id, altName, MiniFileName, LargeFileName, counter FROM images ORDER BY counter DESC';
$res = mysqli_query($link, $sql);

define('DIR_IMG', 'image');

while ($row = mysqli_fetch_assoc($res)) {
    $str .= "<div><a href= " . $row['LargeFileName'] . " ><img id = " .$row['id'] . " src = " . DIR_IMG . "/"
        . $row['MiniFileName'] . " alt = " . $row['altName'] . "></a><p>просмотров: " . $row['counter'] . "</p></div>";

}

$html = str_replace('forPictures', $str, $html);
echo $html;

/**
 * Created by PhpStorm.
 * User: Alex1
 * Date: 06.12.2018
 * Time: 10:36
 */