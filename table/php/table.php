<?php
// Récupérer les données AJAX
$rows = $_POST['rows'];
$cols = $_POST['cols'];

// Générer la structure du tableau
echo '<table>';
for ($i = 0; $i < $rows; $i++) {
    echo '<tr>';
    for ($j = 0; $j < $cols; $j++) {
        echo '<td></td>';
    }
    echo '</tr>';
}
echo '</table>';
?>