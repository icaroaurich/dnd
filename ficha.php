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
            <h1 class="text-3xl font-bold text-yellow-400 mb-6 text-left">📜 Ficha do Personagem:
                <?= $ficha['nomePersonagem'] ?>
            </h1>
            <!-- Botões -->
            <div class="flex gap-2">
                <a href="#"                             class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold opacity-50 cursor-not-allowed pointer-events-none">Ficha</a>
                <a href="bag.php?id=<?= $id ?>"         class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Bag</a>
                <a href="magias.php?id=<?= $id ?>"      class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Magias</a>
                <button type="submit" form="formFicha"  class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Salvar</button>
                <a href="home.php"                      class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Voltar</a>
            </div>
        </div>
        <?php if ($ficha): ?>
            <form action="fichaSalvar.php" method="POST" id="formFicha">
                <input type="hidden" name="id" value="<?= $ficha['id'] ?>">



                <!-- LAYOUT PRINCIPAL: 12 colunas -->
                <div class="grid grid-cols-12 gap-6">
                    <!-- COLUNA DO MEIO (2 blocos empilhados em largura 2+2) -->
                    <div class="col-span-4 grid grid-cols-2 gap-6">
                        <!-- ATRIBUTOS -->
                        <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                            <h2 class="text-lg font-bold text-green-400 mb-4">Atributos</h2>
                            <div class="space-y-1">
                                <?php
                                $atributos = [
                                    'forca' => 'Força',
                                    'destreza' => 'Destreza',
                                    'constituicao' => 'Constituição',
                                    'inteligencia' => 'Inteligência',
                                    'sabedoria' => 'Sabedoria',
                                    'carisma' => 'Carisma'
                                ];
                                foreach ($atributos as $col => $nome): ?>
                                    <div class="flex items-center justify-between">
                                        <label class="font-semibold w-28"><?= $nome ?>:</label>
                                        <input type="number" name="<?= $col ?>" value="<?= $ficha[$col] ?? '' ?>"
                                            class="bg-gray-700 rounded px-2 py-1 w-12 text-center">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- TESTE DE RESISTÊNCIA -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <h2 class="text-lg font-bold text-green-400 mb-4">Teste de Resistência</h2>
                            <div class="space-y-1">
                                <?php
                                $resistencias = [
                                    'resForca' => 'Força',
                                    'resDestreza' => 'Destreza',
                                    'resConstituicao' => 'Constituição',
                                    'resInteligencia' => 'Inteligência',
                                    'resSabedoria' => 'Sabedoria',
                                    'resCarisma' => 'Carisma'
                                ];
                                foreach ($resistencias as $col => $nome): ?>
                                    <div class="flex items-center justify-between">
                                        <label class="font-semibold w-28"><?= $nome ?>:</label>
                                        <input type="number" name="<?= $col ?>" value="<?= $ficha[$col] ?? '' ?>" readonly
                                            class="bg-gray-700 rounded px-2 py-1 w-12 text-center opacity-70">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- COLUNA ESQUERDA: PERÍCIAS -->
                    <div class="col-span-2 bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-purple-400 mb-4">📝 Perícias</h2>
                        <div class="space-y-1">
                            <?php
                            $pericias = [
                                'atletismo' => 'forca',
                                'acrobacia' => 'destreza',
                                'furtividade' => 'destreza',
                                'prestigitacao' => 'destreza',
                                'arcanismo' => 'inteligencia',
                                'historia' => 'inteligencia',
                                'investigacao' => 'inteligencia',
                                'natureza' => 'inteligencia',
                                'religiao' => 'inteligencia',
                                'intuicao' => 'sabedoria',
                                'lidarAnimais' => 'sabedoria',
                                'medicina' => 'sabedoria',
                                'percepcao' => 'sabedoria',
                                'sobrevivencia' => 'sabedoria',
                                'atuacao' => 'carisma',
                                'blefar' => 'carisma',
                                'intimidacao' => 'carisma',
                                'persuacao' => 'carisma'
                            ];
                            foreach ($pericias as $pericia => $atributo):
                                $proe = 'proe' . ucfirst($pericia);
                                $classe = !empty($ficha[$proe]) ? 'text-green-400 font-semibold w-28' : '';
                                $mod = floor((($ficha[$atributo] ?? 10) - 10) / 2);
                                $valorPericia = $mod + ((!empty($ficha[$proe])) ? ($ficha['bonusProeficiencia'] ?? 0) : 0);
                                ?>
                                <p class="cursor-pointer <?= $classe ?>" data-proe="<?= $proe ?>" data-pericia="<?= $pericia ?>"
                                    data-atributo="<?= $atributo ?>" onclick="togglePericia(this)">
                                    <?= ucfirst($pericia) ?>:
                                    <span id="span-<?= $pericia ?>"><?= $valorPericia ?></span>
                                </p>
                                <input type="hidden" name="<?= $proe ?>" id="<?= $proe ?>" value="<?= $ficha[$proe] ?? 0 ?>">
                                <input type="hidden" name="<?= $pericia ?>" id="<?= $pericia ?>" value="<?= $valorPericia ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- COLUNA DIREITA: BLOCO DE INFORMAÇÕES (como na imagem) -->
                    <div class="col-span-5 grid grid-cols-3 gap-1">
                        <!-- Linha 1: Nome (full) -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Nome</label>
                            <input type="text" name="nomePersonagem" value="<?= $ficha['nomePersonagem'] ?? '' ?>"
                                class="w-32 p-2 rounded bg-gray-700 text-white">
                        </div>

                        <!-- Linha 2: Classe (2 col) + Nível (1 col) -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Classe</label>
                            <input type="text" name="classe" value="<?= $ficha['classe'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Nível</label>
                            <input type="number" name="nivel" value="<?= $ficha['nivel'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white text-center">
                        </div>

                        <!-- Linha 3: Jogador | Raça | Antecedente -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Jogador</label>
                            <input type="text" name="nomeJogador" value="<?= $ficha['nomeJogador'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Raça</label>
                            <input type="text" name="raca" value="<?= $ficha['raca'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Antecedente</label>
                            <input type="text" name="antecedente" value="<?= $ficha['antecedente'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>

                        <!-- Linha 4: BP (full) -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">BP</label>
                            <input type="number" name="bonusProeficiencia" id="bonusProeficiencia"
                                value="<?= $ficha['bonusProeficiencia'] ?? 0 ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white text-center">
                        </div>

                        <!-- Linha 5: Idade | Altura | Peso -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Idade</label>
                            <input type="text" name="idade" value="<?= $ficha['idade'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Altura</label>
                            <input type="text" name="altura" value="<?= $ficha['altura'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Peso</label>
                            <input type="text" name="peso" value="<?= $ficha['peso'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>

                        <!-- Linha 6: Olhos | Pele | Cabelos -->
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Olhos</label>
                            <input type="text" name="olhos" value="<?= $ficha['olhos'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="col-span-1 bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Pele</label>
                            <input type="text" name="pele" value="<?= $ficha['pele'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                        <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                            <label class="block font-semibold mb-1">Cabelos</label>
                            <input type="text" name="cabelos" value="<?= $ficha['cabelos'] ?? '' ?>"
                                class="w-full p-2 rounded bg-gray-700 text-white">
                        </div>
                    </div>
                </div>
            </form>


        <?php else: ?>
            <p class="text-center text-gray-400">Nenhuma ficha encontrada.</p>
        <?php endif; ?>
    </div>

    <script>
        function confirmarSalvar() {
            return confirm("Deseja realmente salvar as alterações?");
        }

        function calcularMod(valor) {
            if (isNaN(valor)) return 0;
            return Math.floor((valor - 10) / 2);
        }

        function getBonusProeficiencia() {
            const input = document.querySelector('input[name="bonusProeficiencia"]');
            return input ? parseInt(input.value) || 0 : 0;
        }

        // Toggle de perícia
        function togglePericia(elem) {
            const proe = elem.dataset.proe;
            const pericia = elem.dataset.pericia;
            const atributo = elem.dataset.atributo;

            const inputProe = document.getElementById(proe);
            const inputPericia = document.getElementById(pericia);
            const inputAtributo = document.querySelector(`input[name="${atributo}"]`);

            if (!inputProe || !inputPericia || !inputAtributo) return;

            const mod = calcularMod(parseInt(inputAtributo.value) || 0);
            const bonus = getBonusProeficiencia();
            const texto = pericia.charAt(0).toUpperCase() + pericia.slice(1);

            if (elem.classList.contains('text-green-400')) {
                // desativando perícia
                elem.classList.remove('text-green-400', 'font-semibold');
                inputProe.value = 0;
                inputPericia.value = mod;
                elem.innerText = `${texto}: ${mod}`;
            } else {
                // ativando perícia
                elem.classList.add('text-green-400', 'font-semibold');
                inputProe.value = 1;
                inputPericia.value = mod + bonus;
                elem.innerText = `${texto}: ${mod + bonus}`;
            }
        }

        // Toggle de resistência
        function toggleResistencia(elem) {
            const resName = elem.dataset.res; // ex: "resForca"
            const attrName = elem.dataset.atributo; // ex: "forca"
            const proeName = 'proe' + attrName.charAt(0).toUpperCase() + attrName.slice(1); // ex: "proeForca"

            const inputRes = document.querySelector(`input[name="${resName}"]`);
            let inputProe = document.getElementById(proeName);
            const inputAttr = document.querySelector(`input[name="${attrName}"]`);
            const bonus = getBonusProeficiencia();
            const mod = calcularMod(parseInt(inputAttr.value) || 0);

            if (!inputRes) return;

            // cria inputProe se não existir
            if (!inputProe) {
                inputProe = document.createElement('input');
                inputProe.type = 'hidden';
                inputProe.id = proeName;
                inputProe.name = proeName;
                inputProe.value = 0;
                document.getElementById('formFicha').appendChild(inputProe);
            }

            if (parseInt(inputProe.value) === 1) {
                // desativa
                inputProe.value = 0;
                inputRes.value = mod;
                elem.classList.remove('text-green-400', 'font-semibold');
            } else {
                // ativa
                inputProe.value = 1;
                inputRes.value = mod + bonus;
                elem.classList.add('text-green-400', 'font-semibold');
            }
        }

        // Inicializa: adiciona listener a cada resistência
        document.querySelectorAll('input[readonly][name^="res"]').forEach(input => {
            const attr = input.name.replace('res', '').toLowerCase();
            const wrapper = input.parentElement; // ou o label/p container
            wrapper.style.cursor = 'pointer';
            wrapper.dataset.res = input.name;
            wrapper.dataset.atributo = attr;
            wrapper.addEventListener('click', () => toggleResistencia(wrapper));
        });
        // Atualiza os testes de resistência em tempo real
        function atualizarResistencias() {
            const atributos = ['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'];
            atributos.forEach(attr => {
                const inputAttr = document.querySelector(`input[name="${attr}"]`);
                const inputRes = document.querySelector(`input[name="res${attr.charAt(0).toUpperCase() + attr.slice(1)}"]`);
                if (inputAttr && inputRes) {
                    inputRes.value = calcularMod(parseInt(inputAttr.value) || 0);
                }
            });
        }

        // Adiciona listener a todos os inputs de atributo
        document.querySelectorAll('input[name="forca"], input[name="destreza"], input[name="constituicao"], input[name="inteligencia"], input[name="sabedoria"], input[name="carisma"]')
            .forEach(input => {
                input.addEventListener('input', atualizarResistencias);
            });

        // Atualiza todas as perícias com base nos atributos e proficiência
        function atualizarPericias() {
            const pericias = document.querySelectorAll('[data-pericia]');
            pericias.forEach(elem => {
                const atributo = elem.dataset.atributo;
                const pericia = elem.dataset.pericia;
                const proe = elem.dataset.proe;

                const inputAtributo = document.querySelector(`input[name="${atributo}"]`);
                const inputProe = document.getElementById(proe);
                const inputPericia = document.getElementById(pericia);

                if (!inputAtributo || !inputPericia || !inputProe) return;

                const mod = calcularMod(parseInt(inputAtributo.value) || 0);
                const bonus = getBonusProeficiencia();

                if (parseInt(inputProe.value) === 1) {
                    // perícia ativa = mod + bonus
                    inputPericia.value = mod + bonus;
                    elem.innerText = `${pericia.charAt(0).toUpperCase() + pericia.slice(1)}: ${mod + bonus}`;
                } else {
                    // perícia inativa = só mod
                    inputPericia.value = mod;
                    elem.innerText = `${pericia.charAt(0).toUpperCase() + pericia.slice(1)}: ${mod}`;
                }
            });
        }

        // Adiciona listener para atualizar perícias sempre que um atributo mudar
        ['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'].forEach(attr => {
            const input = document.querySelector(`input[name="${attr}"]`);
            if (input) input.addEventListener('input', atualizarPericias);
        });

        // Atualiza ao carregar a página
        atualizarResistencias();
        atualizarPericias();
    </script>
</body>

</html>