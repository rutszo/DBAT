<?php
include("./connect.php");

// Check if the location ID is provided in the URL
if (isset($_GET['id'])) {
    $locationId = $_GET['id'];

    // Fetch the location data from the database based on the ID
    $sql = "SELECT * FROM localidade WHERE id = '$locationId'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $location = mysqli_fetch_assoc($result);
    } else {
        echo "Location not found.";
        exit;
    }
} else {
    echo "Location ID not provided.";
    exit;
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $nome = mysqli_real_escape_string($connection, $_POST['nome']);
    $descricao = mysqli_real_escape_string($connection, $_POST['descricao']);
    $linkfoto = mysqli_real_escape_string($connection, $_POST['linkfoto']);
    $siteoficial = mysqli_real_escape_string($connection, $_POST['siteoficial']);

    // Update the location data in the database
    $sql = "UPDATE localidade SET nome = '$nome', descricao = '$descricao', linkfoto = '$linkfoto', siteoficial = '$siteoficial' WHERE id = '$locationId'";
    if (mysqli_query($connection, $sql)) {
        echo "Location updated successfully!";
        // Redirect to the page displaying all locations
        header("Location: localidade.php");
        exit;
    } else {
        echo "Error updating location: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Location</title>
</head>
<body>
    <h1>Edit Location</h1>
    <form method="POST" action="elocalidade.php?id=<?php echo $locationId; ?>">
        <label for="nome">Name:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $location['nome']; ?>"><br>

        <label for="descricao">Description:</label>
        <textarea id="descricao" name="descricao"><?php echo $location['descricao']; ?></textarea><br>

        <label for="linkfoto">Image Link:</label>
        <input type="text" id="linkfoto" name="linkfoto" value="<?php echo $location['linkfoto']; ?>"><br>

        <label for="siteoficial">Official Site Link:</label>
        <input type="text" id="siteoficial" name="siteoficial" value="<?php echo $location['siteoficial']; ?>"><br>

        <input type="submit" name="submit" value="Update Location">
    </form>
</body>
</html>
