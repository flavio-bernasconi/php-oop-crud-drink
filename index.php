<?php

include 'db-connection.php';
include 'popo.php';
include 'db-query.php';


  $res = $conn -> query($query_getAllDrinks);

  // var_dump($res);

  $drinks = [];

  if ($res && $res -> num_rows > 0) {
    while ($row = $res -> fetch_assoc()) {

      $drink = new Drink($row);
      $drinks[] = $drink;
    }
  }


  for ($i=0; $i < sizeof($drinks); $i++) {

    $drink = $drinks[$i];
    echo $drink;
  }


  echo "<br>---------<br>";


  $min = $drinks[0];
  $max = $drinks[0];
  $sum = 0;

  for ($i=0; $i <sizeof($drinks) ; $i++) {

    $elem = $drinks[$i];

    $sum += $elem -> getPrezzo();

    if ($min -> getPrezzo() > $elem -> getPrezzo()) {
      $min = $elem;
    }

    if ($max -> getPrezzo() < $elem -> getPrezzo()) {
      $max = $elem;
    }

  }

  echo "MINOR PREZZO : " . $min -> getNome() . " " . $min -> getPrezzo() . "<br><br>";
  echo "MAX PREZZO: " . $max -> getNome() . " " . $max -> getPrezzo() . "<br><br>";
  echo "SOMMA : " . $sum;




 ?>
