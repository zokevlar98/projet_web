<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Formulaire d'insertion</title>
</head>
<body>

<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "stock"; 

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $customerName = $_POST["customer_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // Requête d'insertion dans la table "customers"
    $sql = "INSERT INTO customers (customer_name, email, phone, address) VALUES ('$customerName', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement ajouté avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermeture de la connexion
$conn->close();
?>


<h2>Login</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="customer_name">Full Name:</label>
    <input type="text" name="customer_name" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br><br>
    <label for="phone">Téléphone:</label>
    <input type="text" name="phone" required>
    <br><br>
    <label for="address">Adresse:</label>
    <textarea name="address" required></textarea>
    <br><br>
    <input type="submit" value="Ajouter">
</form>

</body>
</html>