<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    <form method="post">
        <label for="imc">Digite seu IMC:</label>
        <input type="text" id="imc" name="imc" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtem o valor do IMC digitado pelo usuário
        $valorIMC = floatval($_POST["imc"]);

        // Função para classificar o IMC
        function classificarIMC($imc) {
            // Defina as faixas e suas classificações
            $faixas = [
                'Magreza' => [0, 18.5],
                'Saudável' => [18.51, 24.9],
                'Sobrepeso' => [25.0, 29.9],
                'Obesidade Grau I' => [30.0, 34.9],
                'Obesidade Grau II' => [35.0, 39.9],
                'Obesidade Grau III' => [39.9, PHP_FLOAT_MAX]
            ];

            // Verifique em qual faixa o IMC se encaixa
            foreach ($faixas as $classificacao => $intervalo) {
                if ($imc >= $intervalo[0] && $imc <= $intervalo[1]) {
                    return $classificacao;
                }
            }

            // Se não se encaixar em nenhuma faixa, retorne uma mensagem padrão
            return 'Classificação não encontrada';
        }

        // Chame a função e exiba a classificação
        $classificacaoIMC = classificarIMC($valorIMC);
        echo "<p> Atenção, seu IMC é $valorIMC e você está classificado como: <strong>$classificacaoIMC</strong></p>";
    }
    ?>
</body>
</html>
