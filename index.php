<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=phonebook", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phone_number'];

    $sql = 'INSERT INTO phone(firstname,lastname,phone_number) VALUES (:firstname, :lastname, :phone_number)';
    
    $statement = $conn->prepare($sql);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':phone_number', $phonenumber);
    $statement->execute();

}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Phonebook</title>
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
            <h2>Mini Phonebook App</h2>
        </div>
    </div>

    <div class="container mt-3">
        <div class="phonebook">
            <form action="index.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>