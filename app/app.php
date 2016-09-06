<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/Car.php";

  $app = new Silex\Application();
  $app->get("/", function() {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        <title>Find a Car</title>
    </head>
    <body>
        <div class='container'>
            <h1>Find a Car!</h1>
            <form action='/cars'>
                <div class='form-group'>
                    <label for='price'>Enter Maximum Price:</label>
                    <input id='price' name='price' class='form-control' type='number'>
                </div>
                <button type='submit' class='btn-success'>Submit</button>
            </form>
        </div>
    </body>
    </html>
    ";
  });

  $app->get("/cars", function() {
    $porsche = new Car("2014 Porsche 911", 114991, 7864);
    $ford = new Car("2011 Ford F450", 55995, 14241);
    $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
    $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

    $cars = array($porsche, $ford, $lexus, $mercedes);
    $cars_matching_search = array();
      foreach ($cars as $car) {
        if ($car->price < $_GET["price"]) {
          array_push($cars_matching_search, $car);
        }
      };
       $search_results = "";
       foreach($cars_matching_search as $car) {
         $search_results .=
         '<li>' . $car->make_model . '</li>' .
         '<ul>' .
           '<li>' . $car->price . '</li>' .
           '</li> Miles: ' . $car->miles . '</li>' .
         '</ul>';
      };

return "
<!DOCTYPE html>
<html>
<head>
  <title>Your Car Dealership's Homepage</title>
</head>
<body>
  <h1>Your Car Dealership</h1>
  <ul>
    $search_results
  </ul>
</body>
</html>
";
  });

  return $app;
 ?>
