<?php

//Prices
$siewBaoPrice = 5.5;
$eggTartPrice = 4;

//Get Quantity
$siewBaoOri = $_GET['siew_bao_ori'];
$siewBaoChick = $_GET['siew_bao_chick'];
$siewBaoCurryChick = $_GET['siew_bao_currychick'];
$eggTart = $_GET['egg_tart'];
$coconutEggTart = $_GET['coconut_egg_tart'];

$totalAmt = (($siewBaoOri + $siewBaoChick + $siewBaoCurryChick) * $siewBaoPrice) + (($eggTart + $coconutEggTart) * $eggTartPrice);
$totalAmt = number_format($totalAmt, 2);

$msgBody =
    '烧包（经典原味猪肉）x ' . $siewBaoOri . '盒 \n' .
    '烧包（经典原味鸡肉）x ' . $siewBaoChick . '盒 \n' .
    '烧包（咖哩鸡）x ' . $siewBaoCurryChick . '盒 \n' .
    '港式蛋挞 x ' . $eggTart . '盒 \n' .
    '椰子蛋挞 x ' . $coconutEggTart . '盒 \n\n' .
    '一共是 RM ' . $totalAmt;

$responseBody =
[
    "set_attributes" =>
    [
        "total" => $totalAmt,
        "messages" =>
        [
            [
                "attachment" => [
                    "type" => "template",
                    "payload" => [
                        "template_type" => "button",
                        "text" => $msgBody,
                        "buttons" => [
                            [
                                "type" => "show_block",
                                "block_names" => ["Order Block"],
                                "title" => "啊不对 我要更改",
                            ],
                            [
                                "type" => "show_block",
                                "block_names" => ["Order Block"],
                                "title" => "是的 没错",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

return $responseBody;
