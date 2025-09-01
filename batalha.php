<?php
include 'conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM ficha 
        INNER JOIN batalha ON ficha.id = batalha.idFicha 
        WHERE idFicha=$id LIMIT 1";
$result = mysqli_query($conexao, $sql);
$ficha = mysqli_fetch_assoc($result);

// calcula vida atual dinamicamente
$vidaAtual = ($ficha['vidaTotal'] + $ficha['vidaTemporario']) - $ficha['danoTotal'];
if ($vidaAtual < 0)
    $vidaAtual = 0; // nunca deixa vida negativa
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Batalha - <?= $ficha['nomePersonagem'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-serif">
    <div class="mx-auto p-6 max-w-full">

        <!-- TOPO -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-yellow-400">
                Dados de batalha do personagem <?= $ficha['nomePersonagem'] ?>
            </h1>
            <div class="flex gap-2">
                <a href="ficha.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Ficha</a>
                <a href="bag.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Bag</a>
                <a href="magias.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Magias</a>
                <a href="#"
                    class="bg-yellow-500 text-black px-3 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed">Batalha</a>
                <a href="obs.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Texto</a>
                <button type="submit" form="form"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Salvar</button>
                <a href="home.php"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>

        <!-- GRID PRINCIPAL -->
        <form id="form" method="POST" action="batalhaSalvar.php" class="grid grid-cols-12 gap-6">

            <!-- Vida -->
            <div class="col-span-4 bg-gray-800 p-4 rounded-xl">
                <div class="flex flex-col gap-2">
                    <label class="flex justify-between items-center">
                        <span>Vida Total:</span>
                        <input id="vidaTotal" type="number" name="vidaTotal" value="<?= $ficha['vidaTotal'] ?>"
                            class="bg-gray-700 p-1 w-24 rounded text-center">
                    </label>

                    <label class="flex justify-between items-center">
                        <span>Vida Temporária:</span>
                        <input id="vidaTemporario" type="number" name="vidaTemporario"
                            value="<?= $ficha['vidaTemporario'] ?>" class="bg-gray-700 p-1 w-24 rounded text-center">
                    </label>

                    <label class="flex justify-between items-center">
                        <span>Dano Total:</span>
                        <input id="danoTotal" type="number" name="danoTotal" value="<?= $ficha['danoTotal'] ?>"
                            class="bg-gray-700 p-1 w-24 rounded text-center">
                    </label>
                </div>
            </div>

            <!-- CA -->
            <div
                class="col-span-2 flex flex-col items-center justify-center bg-gray-800 p-6 rounded-full text-center font-bold text-xl">
                <label for="ca">CA</label>
                <input type="number" id="ca" name="ca" value="<?= $ficha['ca'] ?>"
                    class="bg-gray-700 p-2 w-20 rounded text-center">
            </div>

            <!-- Vida Atual (calculada) -->
            <div
                class="col-span-2 flex flex-col items-center justify-center bg-red-700 p-6 rounded-full text-center font-bold text-xl">
                ❤️ Vida Atual
                <p id="vidaAtualView" class="text-3xl"><?= $vidaAtual ?></p>
            </div>
            <input type="hidden" id="vidaAtualCalc" name="vidaAtualCalc" value="<?= $vidaAtual ?>">


            <!-- Iniciativa -->
            <div class="col-span-2 bg-gray-800 p-4 rounded-xl text-center">
                <p class="font-bold">Iniciativa</p>
                <input type="number" name="iniciativa" value="<?= $ficha['iniciativa'] ?>"
                    class="bg-gray-700 p-2 w-20 rounded text-center">
            </div>

            <!-- Deslocamento -->
            <div class="col-span-2 bg-gray-800 p-4 rounded-xl text-center">
                <p class="font-bold">Deslocamento</p>
                <input type="number" name="deslocamento" value="<?= $ficha['deslocamento'] ?>"
                    class="bg-gray-700 p-2 w-20 rounded text-center">
            </div>

            <!-- Classe Conjurador -->
            <div class="col-span-12 bg-gray-800 p-4 rounded-xl">
                <p>Classe Conjurador:
                    <input type="text" name="classeConjurador" value="<?= $ficha['classeConjurador'] ?>"
                        class="bg-gray-700 p-1 w-60 rounded">
                </p>
                <div class="grid grid-cols-3 gap-4 mt-2">
                    <div>Hab. chave:
                        <input type="text" name="habChave" value="<?= $ficha['habChave'] ?>"
                            class="bg-gray-700 p-1 w-40 rounded">
                    </div>
                    <div>CD TR:
                        <input type="number" name="cddotr" value="<?= $ficha['cddotr'] ?>"
                            class="bg-gray-700 p-1 w-20 rounded text-center">
                    </div>
                    <div>Bônus ataque:
                        <input type="text" name="bonusAtaque" value="<?= $ficha['bonusAtaque'] ?>"
                            class="bg-gray-700 p-1 w-40 rounded">
                    </div>
                </div>
            </div>

            <!-- Testes contra a morte -->
            <div class="col-span-4 bg-gray-800 p-4 rounded-xl">
                <p class="font-bold mb-2">Testes contra a morte</p>
                <div class="mb-2">Sucesso:
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <input type="checkbox" name="tMorteSucesso<?= $i ?>" <?= $ficha["tMorteSucesso$i"] ? "checked" : "" ?>>
                    <?php endfor; ?>
                </div>
                <div>Fracasso:
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <input type="checkbox" name="tMorteFracasso<?= $i ?>" <?= $ficha["tMorteFracasso$i"] ? "checked" : "" ?>>
                    <?php endfor; ?>
                </div>
            </div>

        </form>
    </div>

    <script>
        (function () {
            const $ = (id) => document.getElementById(id);
            function toInt(v) { const n = parseInt(v, 10); return isNaN(n) ? 0 : n; }

            function recomputeVida() {
                const vidaTotal = toInt($('vidaTotal')?.value);
                const vidaTemporario = toInt($('vidaTemporario')?.value);
                const danoTotal = toInt($('danoTotal')?.value);

                let atual = vidaTotal + vidaTemporario - danoTotal;
                if (atual < 0) atual = 0;

                const view = $('vidaAtualView');
                if (view) view.textContent = atual;

                // se estiver usando o hidden no form
                const hidden = $('vidaAtualCalc');
                if (hidden) hidden.value = atual;
            }

            ['vidaTotal', 'vidaTemporario', 'danoTotal'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.addEventListener('input', recomputeVida);
            });

            // calcula uma vez ao carregar
            recomputeVida();
        })();
    </script>

</body>

</html>