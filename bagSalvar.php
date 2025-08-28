<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idFicha = intval($_POST['idFicha']);

    // Moedas
    $pc = intval($_POST['pc']);
    $pp = intval($_POST['pp']);
    $pe = intval($_POST['pe']);
    $po = intval($_POST['po']);
    $pl = intval($_POST['pl']);

    // Equipamentos
    $equip1nome  = mysqli_real_escape_string($conexao, $_POST['equip1nome']);
    $equip1dano  = mysqli_real_escape_string($conexao, $_POST['equip1dano']);
    $equip1bonus = mysqli_real_escape_string($conexao, $_POST['equip1bonus']);
    $equip1tipo  = mysqli_real_escape_string($conexao, $_POST['equip1tipo']);

    $equip2nome  = mysqli_real_escape_string($conexao, $_POST['equip2nome']);
    $equip2dano  = mysqli_real_escape_string($conexao, $_POST['equip2dano']);
    $equip2bonus = mysqli_real_escape_string($conexao, $_POST['equip2bonus']);
    $equip2tipo  = mysqli_real_escape_string($conexao, $_POST['equip2tipo']);

    $equip3nome  = mysqli_real_escape_string($conexao, $_POST['equip3nome']);
    $equip3dano  = mysqli_real_escape_string($conexao, $_POST['equip3dano']);
    $equip3bonus = mysqli_real_escape_string($conexao, $_POST['equip3bonus']);
    $equip3tipo  = mysqli_real_escape_string($conexao, $_POST['equip3tipo']);

    $comentario  = mysqli_real_escape_string($conexao, $_POST['comentario']);

    // Upload da imagem
    if (!empty($_FILES['aparencia']['name']) && $_FILES['aparencia']['error'] === 0) {
        $pasta = "aparencia/";
        if (!is_dir($pasta)) mkdir($pasta, 0777, true);

        $arquivoTmp = $_FILES['aparencia']['tmp_name'];
        $ext = strtolower(pathinfo($_FILES['aparencia']['name'], PATHINFO_EXTENSION));

        // Validação de extensão
        $permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($ext, $permitidos)) {
            die("Erro: Tipo de arquivo não permitido.");
        }

        // Nome do arquivo = idFicha.extensão
        $nomeArquivo = $idFicha . "." . $ext;
        $caminhoFoto = $pasta . $nomeArquivo;

        if (move_uploaded_file($arquivoTmp, $caminhoFoto)) {
            // Atualiza caminho no banco
            $sqlUpdateFoto = "UPDATE bag SET aparencia='$caminhoFoto' WHERE idFicha=$idFicha";
            mysqli_query($conexao, $sqlUpdateFoto);
        } else {
            die("Erro ao mover o arquivo enviado.");
        }
    }

    // Atualiza os outros dados
    $sql = "UPDATE bag SET 
                pc=$pc, pp=$pp, pe=$pe, po=$po, pl=$pl,
                equip1nome='$equip1nome', equip1dano='$equip1dano', equip1bonus='$equip1bonus', equip1tipo='$equip1tipo',
                equip2nome='$equip2nome', equip2dano='$equip2dano', equip2bonus='$equip2bonus', equip2tipo='$equip2tipo',
                equip3nome='$equip3nome', equip3dano='$equip3dano', equip3bonus='$equip3bonus', equip3tipo='$equip3tipo',
                comentario='$comentario'
            WHERE idFicha=$idFicha";

    if (mysqli_query($conexao, $sql)) {
        header("Location: bag.php?id=" . $idFicha . "&sucesso=1");
        exit;
    } else {
        echo "Erro ao salvar: " . mysqli_error($conexao);
    }
} else {
    echo "Método inválido.";
}
