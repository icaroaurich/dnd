<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFicha = intval($_POST['idFicha']);

    $historia  = mysqli_real_escape_string($conexao, $_POST['historia']);
    $amigos    = mysqli_real_escape_string($conexao, $_POST['amigos']);
    $inimigos  = mysqli_real_escape_string($conexao, $_POST['inimigos']);
    $tesouro   = mysqli_real_escape_string($conexao, $_POST['tesouro']);
    $outros    = mysqli_real_escape_string($conexao, $_POST['outros']);
    $organizacoes   = mysqli_real_escape_string($conexao, $_POST['organizacoes']);

    $sql = "UPDATE texto SET 
                historia ='$historia',
                amigos   ='$amigos',
                inimigos ='$inimigos',
                tesouro  ='$tesouro',
                outros   ='$outros',
                organizacoes  ='$organizacoes'

            WHERE idFicha=$idFicha";

    //echo $sql;
    mysqli_query($conexao, $sql);

    // Redireciona de volta para index.php com o ID
    header("Location: obs.php?id=" . $idFicha);
    exit;
}
