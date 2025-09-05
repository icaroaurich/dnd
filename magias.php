<?php
include 'conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Join com magias
$sql = "SELECT ficha.nomePersonagem, magias.* 
        FROM ficha 
        INNER JOIN magias ON ficha.id = magias.idFicha 
        WHERE ficha.id = $id 
        LIMIT 1";
$result = mysqli_query($conexao, $sql);
$ficha = mysqli_fetch_assoc($result);

function renderMagiasNivel($nivel, $ficha, $conexao)
{
    ?>

    <div class="overflow-x-auto">
        <div class="flex gap-1 min-w-max">
            <?php for ($nivel = 0; $nivel <= 9; $nivel++): ?>
                <div class="bg-gray-800 p-1 rounded-xl space-y-4 min-w-[250px]">
                    <h3 class="text-lg font-bold text-yellow-400">Nível <?= $nivel ?></h3>

                    <?php for ($i = 1; $i <= 5; $i++):
                        $campo = "id{$i}Magia{$nivel}";
                        $idMagia = $ficha[$campo];

                        $detalhes = null;
                        if ($idMagia) {
                            $sqlMagia = "SELECT nome,tempo,alcance,componente_v,componente_s,componente_m,duracao,lv1,lv5,lv11,lv17 
                                     FROM listamagias 
                                     WHERE id = $idMagia";
                            $resMagia = mysqli_query($conexao, $sqlMagia);
                            $detalhes = mysqli_fetch_assoc($resMagia);
                        }
                        ?>
                        <div class="bg-gray-700 p-1 rounded space-y-2">
                            <!-- Input ID -->
                            <input type="number" name="<?= $campo ?>" value="<?= $idMagia ?>"
                                class="w-12 text-black px-2 py-1 rounded">

                            <!-- Campos principais -->
							<div class="grid grid-cols-2">
                            <?php if ($detalhes): ?>
                                <p><strong>Nome:</strong> <?= htmlspecialchars($detalhes['nome']) ?></p>
                                <p><strong>Tempo:</strong> <?= htmlspecialchars($detalhes['tempo']) ?></p>
                                <p><strong>Alcance:</strong> <?= htmlspecialchars($detalhes['alcance']) ?></p>
                                <p><strong>Componentes:</strong>
                                    <?= $detalhes['componente_v'] ? 'V ' : '' ?>
                                    <?= $detalhes['componente_s'] ? 'S ' : '' ?>
                                    <?= $detalhes['componente_m'] ? 'M ' : '' ?>
                                </p>
                                    <p><strong>Lv1:</strong> <?= htmlspecialchars($detalhes['lv1']) ?></p>
                                    <p><strong>Lv5:</strong> <?= htmlspecialchars($detalhes['lv5']) ?></p>
                                    <p><strong>Lv11:</strong> <?= htmlspecialchars($detalhes['lv11']) ?></p>
                                    <p><strong>Lv17:</strong> <?= htmlspecialchars($detalhes['lv17']) ?></p>
                            <?php else: ?>
                                <p class="text-gray-400 text-sm">Nenhuma magia</p>
                            <?php endif; ?>
							</div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>


    </div>
    <?php
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Magias do Personagem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-serif">
    <div class="mx-auto p-6">
        <!-- TOPO -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-yellow-400">📜 Magias de <?= $ficha['nomePersonagem'] ?></h1>
            <div class="flex gap-2">
                <a href="ficha.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Ficha</a>
                <a href="bag.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Bag</a>
                <a href="#"
                    class="bg-yellow-500 text-black px-3 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed">Magias</a>
                <a href="batalha.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Batalha</a>
                <a href="obs.php?id=<?= $id ?>"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Texto</a>
                <button type="submit" form="form"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Salvar</button>
                <a href="home.php"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>

        <!-- FORM -->
        <form id="form" method="POST" action="magiasSalvar.php" class="space-y-8">
            <input type="hidden" name="idFicha" value="<?= $id ?>">

            <?php
                renderMagiasNivel($nivel, $ficha, $conexao);
            ?>
        </form>
    </div>   

</body>

</html>