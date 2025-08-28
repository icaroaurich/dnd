<?php
include 'conexao.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT ficha.nomePersonagem, bag.* 
        FROM ficha 
        INNER JOIN bag ON ficha.id = bag.idFicha 
        WHERE ficha.id = $id";
$result = mysqli_query($conexao, $sql);
$ficha = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Inventário - D&D</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 font-serif">
    <div class="mx-auto p-6">

        <!-- TOPO -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-yellow-400">📜 Inventário do Personagem:
                <?= htmlspecialchars($ficha['nomePersonagem']) ?>
            </h1>
            <!-- Botões -->
            <div class="flex gap-2">
                <a href="ficha.php?id=<?= $id ?>"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Ficha</a>
                <a href="#"class="bg-yellow-500 text-black px-6 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed">Bag</a>
                <a href="magias.php?id=<?= $id ?>"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Magias</a>
                <a href="batalha.php?id=<?= $id ?>"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Batalha</a>
                <button type="submit" form="formBag"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Salvar</button>
                <a href="home.php"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>

        <!-- FORMULÁRIO -->
        <form id="formBag" action="bagSalvar.php" method="post" enctype="multipart/form-data"
            class="grid grid-cols-4 gap-4">
            <input type="hidden" name="idFicha" value="<?= $id ?>">

            <!-- Aparência -->
            <div class="col-span-1 bg-gray-800 p-4 rounded-2xl shadow-lg flex flex-col items-center">
                <h2 class="font-bold mb-2">Aparência</h2>

                <?php if (!empty($ficha['aparencia']) && file_exists($ficha['aparencia'])): ?>
                    <img src="<?= $ficha['aparencia'] ?>" alt="Aparência do Personagem"
                        class="rounded-lg shadow-lg w-62 h-81 object-cover mb-2">
                <?php else: ?>
                    <div class="w-48 h-48 bg-gray-700 rounded-lg flex items-center justify-center text-gray-400">
                        Sem foto
                    </div>
                <?php endif; ?>

                <input type="file" name="aparencia" accept="image/*" class="mt-3 bg-gray-700 p-2 rounded w-full">
            </div>
            <div class="col-span-3 grid grid-cols-4 gap-4">
                <!-- Moedas -->
                <div class="col-span-2 flex flex-col gap-2">
                    <label>PC <input type="number" name="pc" value="<?= $ficha['pc'] ?>"
                            class="w-20 bg-gray-700 rounded p-1"></label>
                    <label>PP <input type="number" name="pp" value="<?= $ficha['pp'] ?>"
                            class="w-20 bg-gray-700 rounded p-1"></label>
                    <label>PE <input type="number" name="pe" value="<?= $ficha['pe'] ?>"
                            class="w-20 bg-gray-700 rounded p-1"></label>
                    <label>PO <input type="number" name="po" value="<?= $ficha['po'] ?>"
                            class="w-20 bg-gray-700 rounded p-1"></label>
                    <label>PL <input type="number" name="pl" value="<?= $ficha['pl'] ?>"
                            class="w-20 bg-gray-700 rounded p-1"></label>
                </div>

                <!-- Equipamentos -->
                <div class="col-span-2 flex flex-col gap-4">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <div class="grid grid-cols-4 gap-2">
                            <input type="text" name="equip<?= $i ?>nome" value="<?= $ficha["equip{$i}nome"] ?>"
                                placeholder="Nome" class="bg-gray-700 p-2 rounded">
                            <input type="text" name="equip<?= $i ?>dano" value="<?= $ficha["equip{$i}dano"] ?>"
                                placeholder="Dano" class="bg-gray-700 p-2 rounded">
                            <input type="text" name="equip<?= $i ?>bonus" value="<?= $ficha["equip{$i}bonus"] ?>"
                                placeholder="Bônus" class="bg-gray-700 p-2 rounded">
                            <input type="text" name="equip<?= $i ?>tipo" value="<?= $ficha["equip{$i}tipo"] ?>"
                                placeholder="Tipo" class="bg-gray-700 p-2 rounded">
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="col-span-4 bg-gray-800 p-4 rounded-2xl shadow-lg">
                    <h2 class="font-bold mb-2">Ataques, Magias e Comentários</h2>
                    <textarea name="comentario"
                        class="w-full h-64 bg-gray-700 rounded p-2" ><?= htmlspecialchars($ficha['comentario']) ?></textarea>
                </div>
            </div>
        </form>
    </div>
</body>

</html>