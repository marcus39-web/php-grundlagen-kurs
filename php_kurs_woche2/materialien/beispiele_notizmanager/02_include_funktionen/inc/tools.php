<?php
declare(strict_types=1);

function preisMitMwst(float $netto, float $mwstSatz, float $rabatt = 0.0): float{
    $nettoNachRabatt = max($netto - $rabatt, 0.0);
    $mwstBetrag = $nettoNachRabatt * ($mwstSatz / 100);
    return $nettoNachRabatt * (1 + $mwstSatz);
}
