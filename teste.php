<?php
include 'conexao.php';

$sql = "SELECT * FROM ficha LIMIT 1";
//$result = $conn->query($sql);
$result = mysqli_query($conexao, $sql);

if ($result) {
    var_dump($result->fetch_assoc());
} else {
    echo "Erro na query: " . $conn->error;
}
?>
