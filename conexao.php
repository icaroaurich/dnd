<?php
// Verifica o nome da máquina
if (gethostname() === 'SERVINN-0069') {
    // Dados de conexão para SERVINN-0069
    $host = 'localhost';
    $usuario = 'root';
    $senha = 'new_sql';
    $bd = 'dnd';
    $porta = 4407;
} else {
    // Lê os dados de conexão do arquivo config.auh
    $myfile = fopen("config.auh", "r") or die("Não foi possível abrir o arquivo de configuração!!");
    $contador = 0;
    while (($line = fgets($myfile)) !== false) {
        $equalPos = strpos($line, "=") + 2;
        $endLine = strpos($line, ";") - 1;
        $linha = substr($line, $equalPos, $endLine - $equalPos + 1);

        // Armazena os dados de conexão
        if ($contador == 0) $host = $linha;
        if ($contador == 1) $usuario = $linha;
        if ($contador == 2) $senha = $linha;
        if ($contador == 3) $bd = $linha;
        if ($contador == 4) $porta = $linha;
        $contador++;
    }
    fclose($myfile);
}

// Define as constantes de conexão
define('HOST', $host);
define('USUARIO', $usuario);
define('SENHA', $senha);
define('DB', $bd);
define('PORT', $porta);

// Mensagem de erro para conexão
$erro = "Não foi possível conectar ao banco de dados!! 
<br><br> HOST: {$host}
<br> Usuário: {$usuario}
<br> Senha: {$senha}
<br> Banco: {$bd}
<br> Porta: {$porta}";

// Conecta ao banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB, PORT) or die($erro);

// Configurar a codificação de caracteres para utf8mb4
mysqli_set_charset($conexao, 'utf8mb4');
?>
