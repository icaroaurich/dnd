<?php
include 'conexao.php';

// Pega o último ID da ficha
$sql = "SELECT id FROM ficha ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
$ultimoId = $row ? (int)$row['id'] : 0;
$novoId = $ultimoId + 1;

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeJogador = mysqli_real_escape_string($conexao, $_POST['nomeJogador']);

    // Inserir na tabela ficha
    $sqlFicha = "INSERT INTO ficha (id, nomePersonagem, nomeJogador) VALUES ($novoId, '$nomeJogador', '$nomeJogador')";
    $okFicha = mysqli_query($conexao, $sqlFicha);

    // Inserir nas outras tabelas
    $sqlBag = "INSERT INTO bag (idFicha) VALUES ($novoId)";
    $okBag = mysqli_query($conexao, $sqlBag);

    $sqlBatalha = "INSERT INTO batalha (idFicha) VALUES ($novoId)";
    $okBatalha = mysqli_query($conexao, $sqlBatalha);

    $sqlTexto = "INSERT INTO texto (idFicha) VALUES ($novoId)";
    $okTexto = mysqli_query($conexao, $sqlTexto);

    $sqlMagias = "INSERT INTO magias (idFicha) VALUES ($novoId)";
    $okMagias = mysqli_query($conexao, $sqlMagias);

    if ($okFicha && $okBag && $okBatalha && $okTexto && $okMagias) {
        $mensagem = "✅ Personagem incluído com sucesso! ID = $novoId";
    } else {
        $mensagem = "❌ Erro ao incluir: " . mysqli_error($conexao);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Incluir Personagem</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-serif">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-center">➕ Incluir Novo Personagem</h1>

    <?php if ($mensagem): ?>
        <p class="text-center mb-4 <?= strpos($mensagem, 'Erro') === false ? 'text-green-400' : 'text-red-400' ?>">
            <?= $mensagem ?>
        </p>
    <?php endif; ?>

    <form method="POST" class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow space-y-4">
        <div>
            <label class="block mb-2 text-yellow-300 font-bold">Nome do Jogador / Personagem</label>
            <input type="text" name="nomeJogador" required 
                   class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:ring-2 focus:ring-yellow-400">
        </div>
        <button type="submit" 
                class="w-full bg-yellow-500 text-black font-bold px-4 py-2 rounded-lg hover:bg-yellow-400 transition">
            Salvar Personagem
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="home.php" class="text-yellow-400 hover:underline">⬅ Voltar</a>
    </div>
</div>
</body>
</html>
