<?php
  function imgLookup($currentImg) {
    $dir = "./images";
    $imgArray = scandir($dir);
    $imgArrayLength = count($imgArray);
    $randomNum = rand(2, $imgArrayLength - 1);
    $imgUrl = $imgArray[$randomNum];
    if ($imgUrl !== $currentImg) return $imgUrl;
    else return imgLookup($currentImg);
  }

  $response = imgLookup($_REQUEST["currentImg"]);

  echo json_encode($response);
?>