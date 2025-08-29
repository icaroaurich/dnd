<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFicha = intval($_POST['idFicha']);

    $historia  = mysqli_real_escape_string($conexao, $_POST['historia']);

    $sql = "UPDATE texto SET 
                historia='$historia'
            WHERE idFicha=$idFicha";

    echo $sql;
    mysqli_query($conexao, $sql);

    // Redireciona de volta para index.php com o ID
    header("Location: obs.php?id=" . $idFicha);
    exit;
}
