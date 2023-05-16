<?php

$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ] 
];

$varSelect = $_POST['parkingForm'];
var_dump($varSelect);

$listHotel = $hotels;

if($varSelect == null){
  $listHotel=[];
  $listHotel = $hotels;
} elseif ($varSelect == 'true'){
  $listHotel=[];
  foreach($hotels as $hotel){
    $hotel['parking'] ? array_push($listHotel, $hotel) : null;
  }
} elseif ($varSelect == 'false'){
  $listHotel=[];
  foreach($hotels as $hotel){
    !$hotel['parking'] ? array_push($listHotel, $hotel) : null;
  }
} 


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PHP Hotel</title>
  </head>
  <body>


    <div id="app">
      <div class="container py-5">

      <form action="./index.php" method="POST" class="py-4">
        <select class="form-select w-25 d-inline" aria-label="Default select example" name="parkingForm">
          <option selected value="">All Hotels</option>
          <option value="false">Parking NO</option>
          <option value="true">Parking YES</option>
        </select>
        <button class="btn btn-primary mx-3" type="submit">Cerca</button>
      </form>

      <table class="table">

        <thead>
          <tr>
            <?php foreach ($hotels[1] as $key => $hotel): ?>
              <th><?php echo strtoupper($key); ?></th>
            <?php endforeach; ?>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($listHotel as $hotel): ?>
            <tr>

              <?php foreach ($hotel as $key => $value): ?>

                <td>
                  <?php if($key === "parking"){
                    $value ? $value = "Si" : $value = "No";
                  } echo $value; ?>
                </td>

              <?php endforeach; ?>

            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>

      <!--<ul>
        <?php foreach ($hotels as $key => $hotel): ?>
          <li><?php echo "$key Hotel <br>"; ?></li>

          <ul>
            <?php foreach ($hotel as $key => $value): ?>
              <li><?php echo "$key : $value <br>"; ?></li>
            <?php endforeach; ?>
          </ul>

        <?php endforeach; ?>
      </ul>-->

      </div>
    </div>


    <script type="module" src="/src/main.js"></script>
  </body>
</html>
