<?php

    $meuCep = "01042000";

    $url = "https://viacep.com.br/ws/$meuCep/json/";
    $json = file_get_contents($url);    
    $data = json_decode($json);
    echo $data->cep . "<br />";
    echo $data->logradouro . "<br />";
    echo $data->bairro . "<br />";
    echo $data->localidade . "<br />";
    echo $data->uf . "<br />";



    /*
        "cep": "01001-000",
        "logradouro": "PraÃ§a da SÃĐ",
        "complemento": "lado Ã­mpar",
        "bairro": "SÃĐ",
        "localidade": "SÃĢo Paulo",
        "uf": "SP",
        "ibge": "3550308",
        "gia": "1004",
        "ddd": "11",
        "siafi": "7107"
    */
?>