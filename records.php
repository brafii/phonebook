<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=phonebook", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = 'SELECT * FROM phone';

$statement = $conn->prepare($sql);
$statement->execute();
$phone = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
  <head>
    <title>View Records | Phonebook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <!--Header Title-->
    <div class="header-title">
        <div class="container d-flex justify-content-between">
            <a href="index.php">Phonebook App</a>
            <a href="records.php" class="my-auto">View Records</a>
        </div>
    </div>
    <!--End Header Title-->

    <div class="container mt-3">
        <div class="my-card">
            <h2>View Records</h2>
        </div>
    </div>

    <div class="container phone-records mt-4">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone Number</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($phone as $i => $mybook) : ?>
                <tr>
                  <th scope="row"><?php echo $i + 1 ?></th>
                  <td><?php echo $mybook['firstname'] ?></td>
                  <td><?php echo $mybook['lastname'] ?></td>
                  <td><?php echo $mybook['phone_number'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>