function classificarIMC($imc) {
    $faixas = [
        'Magreza' => [0, 18.5],
        'Saudável' => [18.51, 24.9],
        'Sobrepeso' => [25.0, 29.9],
        'Obesidade Grau I' => [30.0, 34.9],
        'Obesidade Grau II' => [35.0, 39.9],
        'Obesidade Grau III' => [39.9, PHP_FLOAT_MAX]
    ];

    foreach ($faixas as $classificacao => $intervalo) {
        if ($imc >= $intervalo[0] && $imc <= $intervalo[1]) {
            return $classificacao;
        }
    }

    return 'Classificação não encontrada';
}