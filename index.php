<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questão 3</title>
</head>
<body>

    <h1>Questão 3</h1>

    <p>String em análise: "Melhor preço sem escalas R$ 1.367(1) Melhor preço com escalas R$ 994 (1) 1 - Incluindo todas as taxas.";</p>

    <form action="" method="post">
        <select type="text" name="price_filter" onchange="this.form.submit()">
            <option value="">Selecione uma opção</option>
            <option value="1">Menor preço sem escala</option>
            <option value="2">Menor preço com escala</option>
        </select>
    </form>
</body>
</html>

<?php 

$string = "Melhor preço sem escalas R$ 1.367(1) Melhor preço com escalas R$ 994 (1) 1 - Incluindo todas as taxas.";

if($_POST['price_filter'] == 1){
    preg_match_all('/sem escalas R\$\s(.*?)\(/', $string, $matches);
    processData($matches, "Melhor preço sem escala: ");
    
}

if($_POST['price_filter'] == 2){
    preg_match_all('/com escalas R\$\s(.*?)\(/', $string, $matches);
    processData($matches, "Melhor preço com escala: ");
}

function processData($matches, $message = ""){
    $matches[1][0] = preg_replace("/[^0-9]/","",$matches[1][0]);
    $price = number_format($matches[1][0], 2, '.', '')  . "<br>";
    print_r($message . $price);
}












?>