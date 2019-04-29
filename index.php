<!DOCTYPE html>
<html lang="ca">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<title>xateja-ho!</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<section id="titol">
		<h1>xateja-ho!</h1>
	</section>
	<section id="missatges">
		<?php
include ('connexioBD.php');
$sql = "select hora, usuari, text from missatge order by id desc";
if (mysqli_query($con, $sql)) {
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>";
        echo "<span>" . $row['hora'] . " - " . $row['usuari'] . ": </span>" . $row['text'];
        echo "</p>";
    }
} else {
    echo "<p>Error: " . $sql . "</p>";
}
mysqli_free_result($result);
mysqli_close($con);
?>
	</section>
	<section id="formulari">
		<form method="post" action="insertar.php">
				<input type="text" name="nom" id="input"
				placeholder="Introduce el nombre"> 
				<input type="text" name="missatge"
				id="input" placeholder="Introduce el mensaje">
				<input type="submit"
				name="enviar" id="env" value="Xateja-ho!">
		</form>
	</section>
	<section id="errors">
	<?php
    if ($_GET["mensaje"]) {
        echo "<p>" . $_GET["mensaje"] . "</p>";
    }
    ?>
	</section>
</body>
</html>
