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
    <div class="container mx-auto p-6">
        <?php if ($ficha): ?>
            <form action="salvarFicha.php" method="POST" id="formFicha">
			<h1 class="text-3xl font-bold text-yellow-400 mb-6 text-left">📜 Ficha do Personagem: <?= $ficha['nomePersonagem'] ?></h1>
                <input type="hidden" name="id" value="<?= $ficha['id'] ?>">
				<!-- Botão de Salvar -->
				<div class="mt-6 text-right"><button type="submit" onclick="return confirmarSalvar()"class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Salvar</button></div>
				<div class="mt-6 text-right"><a href="home.php" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-xl font-bold">Home</a></div>
                <!-- Dados do personagem -->
                <div class="grid grid-cols-7 gap-6 mb-6">
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Nome:</b></label>
                        <input type="text" name="nomePersonagem" value="<?= $ficha['nomePersonagem'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Classe:</b></label>
                        <input type="text" name="classe" value="<?= $ficha['classe'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white mb-2">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Nível:</b></label>
                        <input type="number" name="nivel" value="<?= $ficha['nivel'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Jogador:</b></label>
                        <input type="text" name="nomeJogador" value="<?= $ficha['nomeJogador'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Raça:</b></label>
                        <input type="text" name="raca" value="<?= $ficha['raca'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>Antecedente:</b></label>
                        <input type="text" name="antecedente" value="<?= $ficha['antecedente'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <label><b>BP:</b></label>
                        <input type="number" name="bonusProeficiencia" value="<?= $ficha['bonusProeficiencia'] ?>"
                            class="w-full p-2 rounded bg-gray-700 text-white text-center">
                    </div>

                </div>

                <div class="flex gap-6 items-start">
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-purple-400 mb-4">📝 Perícias</h2>
                        <div class="space-y-1">
                            <?php
                            $pericias = [
                                'atletismo',
                                'acrobacia',
                                'furtividade',
                                'prestigitacao',
                                'arcanismo',
                                'historia',
                                'investigacao',
                                'natureza',
                                'religiao',
                                'intuicao',
                                'lidarAnimais',
                                'medicina',
                                'percepcao',
                                'sobrevivencia',
                                'atuacao',
                                'blefar',
                                'intimidacao',
                                'persuacao'
                            ];
                            foreach ($pericias as $pericia):
                                $proe = 'proe' . ucfirst($pericia); // ex: proeAtletismo
                                $classe = $ficha[$proe] ? 'text-green-400 font-semibold' : '';
                                $valorPericia = $ficha[$pericia] + ($ficha[$proe] ? $ficha['bonusProeficiencia'] : 0);
                                ?>
                                <p class="cursor-pointer <?= $classe ?>" data-proe="<?= $proe ?>" onclick="togglePericia(this)">
                                    <?= ucfirst($pericia) ?>: <?= $valorPericia ?>
                                </p>
                                <input type="hidden" name="<?= $proe ?>" id="<?= $proe ?>" value="<?= $ficha[$proe] ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
					
					<!-- Box Atributos -->
                    <div class="bg-gray-800 rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-green-400 mb-4">💪 Atributos | Teste de Resistência</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Coluna Atributos editáveis -->
                            <div class="space-y-2">
                                <?php
                                $atributos = ['forca' => 'Força', 'destreza' => 'Destreza', 'constituicao' => 'Constituição', 'inteligencia' => 'Inteligência', 'sabedoria' => 'Sabedoria', 'carisma' => 'Carisma'];
                                foreach ($atributos as $col => $nome): ?>
                                    <div class="flex items-center justify-between">
                                        <label class="font-semibold w-28"><?= $nome ?>:</label>
                                        <input type="number" name="<?= $col ?>" value="<?= $ficha[$col] ?>"
                                            class="bg-gray-700 rounded px-2 py-1 w-16 text-center">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Coluna Resistência (readonly) -->
                            <div class="space-y-2">
                                <?php
                                $resistencias = ['resForca' => 'Força', 'resDestreza' => 'Destreza', 'resConstituicao' => 'Constituição', 'resInteligencia' => 'Inteligência', 'resSabedoria' => 'Sabedoria', 'resCarisma' => 'Carisma'];
                                foreach ($resistencias as $col => $nome): ?>
                                    <div class="flex items-center justify-between">
                                        <label class="font-semibold w-28"><?= $nome ?>:</label>
                                        <input type="number" name="<?= $col ?>" value="<?= $ficha[$col] ?>" readonly
                                            class="bg-gray-700 rounded px-2 py-1 w-16 text-center opacity-70">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
        </div>
        </div>

        </form>
    <?php else: ?>
        <p class="text-center text-gray-400">Nenhuma ficha encontrada.</p>
    <?php endif; ?>
    </div>

    <script>
        // Confirmação ao salvar
        function confirmarSalvar() {
            return confirm("Deseja realmente salvar as alterações?");
        }

        // Calcula modificador
        function calcularMod(valor) {
            if (isNaN(valor)) return 0;
            return Math.floor((valor - 10) / 2);
        }

        // Pega o bonus de proficiência
        function getBonusProeficiencia() {
            const input = document.querySelector('input[name="bonusProeficiencia"]');
            return input ? parseInt(input.value) || 0 : 0;
        }

        // Atualiza resistência e perícias relacionadas
        function atualizarAtributo(atributo, resistencia, pericias = []) {
            const inputAtributo = document.querySelector(`input[name="${atributo}"]`);
            const inputRes = document.querySelector(`input[name="${resistencia}"]`);

            if (inputAtributo && inputRes) {
                inputAtributo.addEventListener("input", () => {
                    const valor = parseInt(inputAtributo.value) || 0;
                    const mod = calcularMod(valor);
                    inputRes.value = mod;

                    // Atualiza perícias correspondentes (sem bônus)
                    pericias.forEach(pericia => {
                        const elem = document.querySelector(`p[data-pericia="${pericia}"]`);
                        if (elem && elem.classList.contains('text-green-400')) {
                            const bonus = getBonusProeficiencia();
                            elem.innerText = `${pericia.charAt(0).toUpperCase() + pericia.slice(1)}: ${mod + bonus}`;
                        } else if (elem) {
                            elem.innerText = `${pericia.charAt(0).toUpperCase() + pericia.slice(1)}: ${mod}`;
                        }
                    });
                });
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            atualizarAtributo("forca", "resForca", ["atletismo"]);
            atualizarAtributo("destreza", "resDestreza", ["acrobacia", "furtividade", "prestigitacao"]);
            atualizarAtributo("constituicao", "resConstituicao", []);
            atualizarAtributo("inteligencia", "resInteligencia", ["arcanismo", "historia", "investigacao", "natureza", "religiao"]);
            atualizarAtributo("sabedoria", "resSabedoria", ["intuicao", "lidarAnimais", "medicina", "percepcao", "sobrevivencia"]);
            atualizarAtributo("carisma", "resCarisma", ["atuacao", "blefar", "intimidacao", "persuacao"]);
        });

        // Toggle de perícia
        function togglePericia(elem) {
            const proe = elem.dataset.proe;
            const inputProe = document.getElementById(proe);
            if (!inputProe) return;

            const texto = elem.innerText.split(':')[0];
            let valor = parseInt(elem.innerText.split(':')[1]) || 0;
            const bonus = getBonusProeficiencia();
            const mod = valor - (elem.classList.contains('text-green-400') ? bonus : 0);

            if (elem.classList.contains('text-green-400')) {
                // desativando perícia
                elem.classList.remove('text-green-400', 'font-semibold');
                inputProe.value = 0;
                elem.innerText = `${texto}: ${mod}`;
            } else {
                // ativando perícia
                elem.classList.add('text-green-400', 'font-semibold');
                inputProe.value = 1;
                elem.innerText = `${texto}: ${mod + bonus}`;
            }
        }

        // Antes do submit, garante que os hidden inputs reflitam a cor atual
        document.getElementById('formFicha').addEventListener('submit', function () {
            document.querySelectorAll('p[data-proe]').forEach(p => {
                const proe = p.dataset.proe;
                const input = document.getElementById(proe);
                if (!input) return;
                input.value = p.classList.contains('text-green-400') ? 1 : 0;
            });
        });
    </script>
</body>

</html>