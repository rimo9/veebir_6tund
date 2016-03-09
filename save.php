<?php

  $file_name = "data.txt";
  $entries_from_file = file_get_contents($file_name);
  //masiiv olemasolevate purkidega
  $entries = json_decode($entries_from_file);

  if(isset($_GET["id"]) && isset($_GET["title"]) && isset($_GET["ingredients"]) && isset($_GET["timeAdded"]) && !empty($_GET["title"]) && !empty($_GET["title"]) && !empty($_GET["ingredients"]) && !empty($_GET["timeAdded"])){
    $object = new StdClass();
    $object->id = $_GET["id"];
    $object->title = $_GET["title"];
    $object->ingredients = $_GET["ingredients"];
    $object->timeAdded = $_GET["timeAdded"];

    //lisan massiivi
    array_push($entries, $object);

    //teen stringiks
    $json = json_encode($entries);
    //salvestan faili
    file_put_contents($file_name, $json);
  }

  //var_dump($entries);
  echo(json_encode($entries));

?>
