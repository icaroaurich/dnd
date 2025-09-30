<?php
include 'conexao.php';

// Pega todos os personagens
$sql = "SELECT id, nomePersonagem, nomeJogador FROM ficha ORDER BY nomePersonagem";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Seleção de Personagem</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-serif">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-center">🎲 Selecionar Personagem</h1>

    <?php if(mysqli_num_rows($result) > 0): ?>
        <ul class="space-y-2">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    <a href="ficha.php?id=<?= $row['id'] ?>" 
                       class="block bg-gray-800 rounded px-4 py-2 hover:bg-yellow-500 hover:text-black">
                        <?= $row['nomePersonagem'] ?> (Jogador: <?= $row['nomeJogador'] ?>)
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p class="text-center text-gray-400">Nenhum personagem encontrado.</p>
    <?php endif; ?>

    <!-- Botão Incluir -->
    <div class="mt-8 text-center">
        <a href="incluir.php" 
           class="inline-block bg-yellow-500 text-black font-bold px-6 py-3 rounded-lg shadow hover:bg-yellow-400 transition">
           ➕ Incluir
        </a>
    </div>
</div>
</body>
</html>
