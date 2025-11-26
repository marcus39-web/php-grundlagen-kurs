<?php
// Beispielhafte Prüffunktionen für Übung 7
function pruefeHersteller($wert) {
    return !empty($wert) && is_string($wert);
}
function pruefeTyp($wert) {
    return !empty($wert) && is_string($wert);
}
function pruefeGB($wert) {
    return is_numeric($wert) && $wert > 0;
}
function pruefePreis($wert) {
    return is_numeric($wert) && $wert > 0;
}
function pruefeArtnummer($wert) {
    return !empty($wert) && is_string($wert);
}
function pruefeDatum($wert) {
    // Erwartet Format: T.M.JJJJ
    return preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $wert);
}
