<?php
include 'conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT ficha.nomePersonagem, texto.* 
        FROM ficha 
        INNER JOIN texto ON ficha.id = texto.idFicha 
        WHERE ficha.id = $id";
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
            <h1 class="text-3xl font-bold text-yellow-400">📜 Textos do Personagem <?= $ficha['nomePersonagem'] ?></h1>
            <!-- Botões -->
            <div class="flex gap-2">
                <a href="ficha.php?id=<?= $id ?>"       class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Ficha</a>
                <a href="bag.php?id=<?= $id ?>"         class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Bag</a>
                <a href="magias.php?id=<?= $id ?>"      class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Magias</a>
                <a href="batalha.php?id=<?= $id ?>"     class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Batalha</a>
                <a href="#"                             class="bg-yellow-500 text-black px-3 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed">Texto</a>
                <button type="submit" form="form"       class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold ">Salvar</button>
                <a href="home.php"                      class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>
        <form id="form" action="obsSalvar.php" method="post" enctype="multipart/form-data" 
            class="grid grid-cols-10 gap-4"> 
            <input type="hidden" name="idFicha" value="<?= $id ?>">

            <div class="col-span-10 grid grid-cols-10 gap-4">
                <div class="col-span-2 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Amigos</h2>
                    <textarea name="amigos"
                        class="w-full h-60 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['amigos']) ?></textarea>
                </div>
                <div class="col-span-2 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Inimigos</h2>
                    <textarea name="inimigos"
                        class="w-full h-60 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['inimigos']) ?></textarea>
                </div>
                <div class="col-span-2 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Tesouro</h2>
                    <textarea name="tesouro"
                        class="w-full h-60 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['tesouro']) ?></textarea>
                </div>
                <div class="col-span-2 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Outros Dados</h2>
                    <textarea name="outros"
                        class="w-full h-60 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['outros']) ?></textarea>
                </div>
                <div class="col-span-2 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Organizações</h2>
                    <textarea name="organizacoes"
                        class="w-full h-60 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['organizacoes']) ?></textarea>
                </div>
                <div class="col-span-10 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">História do personagem</h2>
                    <textarea name="historia"
                        class="w-full h-80 bg-gray-700 rounded p-2"><?= htmlspecialchars($ficha['historia']) ?></textarea>
                </div>
            </div>
        </form>
    </div>
</body>

</html>