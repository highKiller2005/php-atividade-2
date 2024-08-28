<?php
const LIMIT = 100;
$response = "";
$is_bigger = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["height"]) && isset($_POST["base"])) {
    $area = (float)$_POST["height"] * (float)$_POST["base"] / 2;
    $LIMIT = LIMIT;
    $is_bigger = $area > LIMIT;
    if ($is_bigger) {
      $response = "O triângulo possui a área de $area, que é maior que $LIMIT.";
    } else {
      $response = "O triângulo possui a área de $area, que é menor ou igual a $LIMIT.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="styles.css">
    <title>Aula 2</title>
  </head>
  <body>
    <form method="POST">
      <label for="height">
        Digite a autura do triângulo:
        <input id="height" name="height" type="number">
      </label>

      <label for="base">
        Digite a base do triângulo:
        <input id="base" name="base" type="number">
      </label>

      <button type="submit">Calcular</button>
    </form>

    <?php if ($response != ""): ?>
      <p class="response <?php if ($is_bigger) echo "red" ?>"><?= $response ?></p>
    <?php endif ?>
  </body>
</html>