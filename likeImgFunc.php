<?php
  function likeImg($likedImg) {
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
    
    try {
      $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO Likes (imgName) VALUES ($likedImg)";
      $conn->exec($sql);
      echo json_encode('Successfully liked image.');
    } catch(PDOException $e) {
      echo json_encode($sql . " - " . $e->getMessage());
    }
    
    $conn = null;
  }

  $response = likeImg($_REQUEST["likedImg"]);

  echo json_encode($response);
?>