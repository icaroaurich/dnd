<?php
include 'conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM ficha WHERE id=$id LIMIT 1";
$result = mysqli_query($conexao, $sql);
$ficha = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Ficha de Personagem - D&D</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-serif">
    <div class="mx-auto p-6">

        <!-- TOPO -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-left">📜 Dados do Personagem <?= $ficha['nomePersonagem'] ?> para batalha
            </h1>
            <!-- Botões -->
            <div class="flex gap-2">
                <a href="ficha.php?id=<?= $id ?>"       class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Ficha</a>
                <a href="bag.php?id=<?= $id ?>"         class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Bag</a>
                <a href="magias.php?id=<?= $id ?>"      class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Magias</a>
                <a href="#"                             class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed pointer-events-none">Batalha</a>
                <button type="submit" form="formBatalha"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold ">Salvar</button>
                <a href="home.php"                      class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>
    </div>
</body>

</html>