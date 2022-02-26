<?php

$blockchain = array();

$bloco_1 = [
    "votos" => [
        "eleitor" => " joao",
        "candidato" => "paulo",
        "quantidade" => 1
    ],
    [
        "eleitor" => " maria",
        "candidato" => "joana",
        "quantidade" => 1
    ],
    [
        "eleitor" => " douglas",
        "candidato" => "paulo",
        "quantidade" => 1
    ]
];

$bloco_2 = [
    "votos" => [
        "eleitor" => " tais",
        "candidato" => "paulo",
        "quantidade" => 1
    ],
    [
        "eleitor" => " joaquim",
        "candidato" => "joana",
        "quantidade" => 1
    ]
];

function addBlocos($bloco_novo){
    global $blockchain;
    if($blockchain == array()){
        $bloco_novo["hash"] = hash("sha256", json_decode($bloco_novo));
    }else{
        $ultimo_bloco = end($blockchain);
        $bloco_novo["hash"] = $ultimo_bloco["hash"];
        $bloco_novo["hash"] = hash("sha256", json_decode($bloco_novo));
    }
}

addBlocos($bloco_1);
addBlocos($bloco_2);

echo "<h1> Resultado: </h1> ";
foreach($blockchain as $key => $bloco){
    $posicao = $key + 1;
    echo 'Blocos #'.$posicao.'-' .$bloco['hash'].'</br>';
    foreach($bloco['votos'] as $voto){
        echo " - x: ".$voto['eleitor']." -> ".$voto['candidato']." - ".$voto["mensagem"]."</br>";
    }
    echo "</br></br>";
}
exit;

?>