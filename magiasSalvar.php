<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFicha = intval($_POST['idFicha']);

    // Monta dinamicamente todos os campos id{n}Magia{nivel}
    $updates = [];
    for ($nivel = 0; $nivel <= 9; $nivel++) {
        for ($i = 1; $i <= 9; $i++) {
            $campo = "id{$i}Magia{$nivel}";
            $valor = isset($_POST[$campo]) ? intval($_POST[$campo]) : 0;
            $updates[] = "$campo = $valor";
        }
    }

    // Gera SQL final
    $sql = "UPDATE magias SET " . implode(", ", $updates) . " WHERE idFicha = $idFicha";

    // Executa
    //echo $sql;
    mysqli_query($conexao, $sql);

    // Redireciona de volta para magias.php
    header("Location: magias.php?id=" . $idFicha);
    exit;
}
