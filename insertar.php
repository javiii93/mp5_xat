<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<?php
if (isset($_POST["enviar"])) {

    include ('connexioBD.php');

    $nom = mysqli_real_escape_string($con, $_POST["nom"]);
    $missatge = mysqli_real_escape_string($con, $_POST["missatge"]);
    if ($nom != '' && $missatge != '') {
        $sql = "insert into missatge values (null, '$nom', '$missatge', time (NOW()))";
        if (mysqli_query($con, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    } else {
        header("Location: index.php?mensaje=Se necesita un valor en el campo nombre o texto");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
	</body>
</html>
