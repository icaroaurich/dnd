<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFicha = intval($_POST['idFicha']);

    // vida
    $vidaTotal      = intval($_POST['vidaTotal']);
    $vidaTemporario = intval($_POST['vidaTemporario']);
    $danoTotal      = intval($_POST['danoTotal']);
    $vidaAtual      = intval($_POST['vidaAtualCalc']); // calculado no JS

    // atributos
    $ca           = intval($_POST['ca']);
    $iniciativa   = intval($_POST['iniciativa']);
    $deslocamento = intval($_POST['deslocamento']);

    // conjurador
    $classeConjurador = mysqli_real_escape_string($conexao, $_POST['classeConjurador']);
    $habChave         = mysqli_real_escape_string($conexao, $_POST['habChave']);
    $cddotr           = intval($_POST['cddotr']);
    $bonusAtaque      = mysqli_real_escape_string($conexao, $_POST['bonusAtaque']);

    // testes de morte (checkbox -> 1 ou 0)
    $tMorteSucesso1 = isset($_POST['tMorteSucesso1']) ? 1 : 0;
    $tMorteSucesso2 = isset($_POST['tMorteSucesso2']) ? 1 : 0;
    $tMorteSucesso3 = isset($_POST['tMorteSucesso3']) ? 1 : 0;
    $tMorteFracasso1 = isset($_POST['tMorteFracasso1']) ? 1 : 0;
    $tMorteFracasso2 = isset($_POST['tMorteFracasso2']) ? 1 : 0;
    $tMorteFracasso3 = isset($_POST['tMorteFracasso3']) ? 1 : 0;

    // monta o SQL
    $sql = "UPDATE batalha SET
                vidaTotal      = $vidaTotal,
                vidaTemporario = $vidaTemporario,
                danoTotal      = $danoTotal,
                vidaAtual      = $vidaAtual,
                ca             = $ca,
                iniciativa     = $iniciativa,
                deslocamento   = $deslocamento,
                classeConjurador = '$classeConjurador',
                habChave         = '$habChave',
                cddotr           = $cddotr,
                bonusAtaque      = '$bonusAtaque',
                tMorteSucesso1   = $tMorteSucesso1,
                tMorteSucesso2   = $tMorteSucesso2,
                tMorteSucesso3   = $tMorteSucesso3,
                tMorteFracasso1  = $tMorteFracasso1,
                tMorteFracasso2  = $tMorteFracasso2,
                tMorteFracasso3  = $tMorteFracasso3
            WHERE idFicha = $idFicha";

    // debug opcional
    // echo $sql;

    mysqli_query($conexao, $sql);

    // redireciona de volta para batalha.php
    header("Location: batalha.php?id=" . $idFicha);
    exit;
}
?>
