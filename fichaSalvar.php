<?php
include 'conexao.php';

// Captura o ID enviado pelo formulário
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

// Se ID inválido, redireciona para home.php
if ($id <= 0) {
    header("Location: home.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Atributos editáveis
    $atributos = [
        'forca',
        'destreza',
        'constituicao',
        'inteligencia',
        'sabedoria',
        'carisma',
        'nomePersonagem',
        'classe',
        'nivel',
        'nomeJogador',
        'raca',
        'antecedente',
        'idade',
        'altura',
        'peso',
        'olhos',
        'pele',
        'cabelos',
        'comentario',
        'tendenciaEticaMoral',
        'bonusProeficiencia'
    ];

    $dados = [];
    foreach ($atributos as $col) {
        $dados[$col] = isset($_POST[$col]) ? mysqli_real_escape_string($conexao, $_POST[$col]) : 0;
    }

    // Função para calcular modificador
    function mod($valor)
    {
        return floor(($valor - 10) / 2);
    }

    // Resistências
    $resistencias = [
        'resForca' => 'forca',
        'resDestreza' => 'destreza',
        'resConstituicao' => 'constituicao',
        'resInteligencia' => 'inteligencia',
        'resSabedoria' => 'sabedoria',
        'resCarisma' => 'carisma'
    ];

    $res = [];
    foreach ($resistencias as $resCol => $attr) {
        $res[$resCol] = mod($dados[$attr]);
    }

    // Perícias
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

    // Perícias editáveis (proeficiencia)
    $proe_pericias = [
        'proeAtletismo',
        'proeAcrobacia',
        'proeFurtividade',
        'proePrestigitacao',
        'proeArcanismo',
        'proeHistoria',
        'proeInvestigacao',
        'proeNatureza',
        'proeReligiao',
        'proeIntuicao',
        'proeLidarAnimais',
        'proeMedicina',
        'proePercepcao',
        'proeSobrevivencia',
        'proeAtuacao',
        'proeBlefar',
        'proeIntimidacao',
        'proePersuacao'
    ];

    foreach ($proe_pericias as $p) {
        // Se o input existir no POST, pega 1 ou 0
        $dados[$p] = isset($_POST[$p]) ? intval($_POST[$p]) : 0;
    }

    $pericia_valores = [];
    foreach ($pericias as $pericia => $attr) {
        $pericia_valores[$pericia] = mod($dados[$attr]);
    }

    // Monta query UPDATE
    $sql = "UPDATE ficha SET 
    nomePersonagem=     '{$dados['nomePersonagem']}',
    classe=             '{$dados['classe']}',
    nivel=              '{$dados['nivel']}',
    nomeJogador=        '{$dados['nomeJogador']}',
    raca=               '{$dados['raca']}',
    antecedente=        '{$dados['antecedente']}',
    idade=              '{$dados['idade']}',
    altura=             '{$dados['altura']}',
    peso=               '{$dados['peso']}',
    olhos=              '{$dados['olhos']}',
    pele=               '{$dados['pele']}',
    cabelos=            '{$dados['cabelos']}',
    comentario=         '{$dados['comentario']}',
    tendenciaEticaMoral='{$dados['tendenciaEticaMoral']}',
    bonusProeficiencia= '{$dados['bonusProeficiencia']}',

    forca='{$dados['forca']}',
    destreza='{$dados['destreza']}',
    constituicao='{$dados['constituicao']}',
    inteligencia='{$dados['inteligencia']}',
    sabedoria='{$dados['sabedoria']}',
    carisma='{$dados['carisma']}',
    resForca='{$res['resForca']}',
    resDestreza='{$res['resDestreza']}',
    resConstituicao='{$res['resConstituicao']}',
    resInteligencia='{$res['resInteligencia']}',
    resSabedoria='{$res['resSabedoria']}',
    resCarisma='{$res['resCarisma']}',

    atletismo='{$pericia_valores['atletismo']}',
    acrobacia='{$pericia_valores['acrobacia']}',
    furtividade='{$pericia_valores['furtividade']}',
    prestigitacao='{$pericia_valores['prestigitacao']}',
    arcanismo='{$pericia_valores['arcanismo']}',
    historia='{$pericia_valores['historia']}',
    investigacao='{$pericia_valores['investigacao']}',
    natureza='{$pericia_valores['natureza']}',
    religiao='{$pericia_valores['religiao']}',
    intuicao='{$pericia_valores['intuicao']}',
    lidarAnimais='{$pericia_valores['lidarAnimais']}',
    medicina='{$pericia_valores['medicina']}',
    percepcao='{$pericia_valores['percepcao']}',
    sobrevivencia='{$pericia_valores['sobrevivencia']}',
    atuacao='{$pericia_valores['atuacao']}',
    blefar='{$pericia_valores['blefar']}',
    intimidacao='{$pericia_valores['intimidacao']}',
    persuacao='{$pericia_valores['persuacao']}',

    proeAtletismo='{$dados['proeAtletismo']}',
    proeAcrobacia='{$dados['proeAcrobacia']}',
    proeFurtividade='{$dados['proeFurtividade']}',
    proePrestigitacao='{$dados['proePrestigitacao']}',
    proeArcanismo='{$dados['proeArcanismo']}',
    proeHistoria='{$dados['proeHistoria']}',
    proeInvestigacao='{$dados['proeInvestigacao']}',
    proeNatureza='{$dados['proeNatureza']}',
    proeReligiao='{$dados['proeReligiao']}',
    proeIntuicao='{$dados['proeIntuicao']}',
    proeLidarAnimais='{$dados['proeLidarAnimais']}',
    proeMedicina='{$dados['proeMedicina']}',
    proePercepcao='{$dados['proePercepcao']}',
    proeSobrevivencia='{$dados['proeSobrevivencia']}',
    proeAtuacao='{$dados['proeAtuacao']}',
    proeBlefar='{$dados['proeBlefar']}',
    proeIntimidacao='{$dados['proeIntimidacao']}',
    proePersuacao='{$dados['proePersuacao']}'
    WHERE id=$id LIMIT 1";


    //echo $sql;
    mysqli_query($conexao, $sql);

    // Redireciona de volta para index.php com o ID
    header("Location: ficha.php?id=" . $id);
    exit;
}
