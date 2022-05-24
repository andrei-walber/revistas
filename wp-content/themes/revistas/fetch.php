<?php
include('dbcon.php');

$query = $mysql->query($_POST["query"]);
$total_row = mysqli_num_rows($query);

$output = '';

if ($total_row > 0) {
    while ($row = $query->fetch_object()) {
        $output .= '
            <tr>
                <td>' . $row->nome . '</td>
                <td>' . $row->area_escopo . '</td>
                <td>' . $row->localizacao . '</td>
                <td>' . $row->qualis . '</td>
                <td>' . $row->status . '</td>
                <td>' . $row->tempo_medio_aceitacao . '</td>
            </tr>';
    }
} else {
    $output .= '
        <tr>
            <td colspan="6" style="text-align: center">Nenhuma revista encontrada!</td>
        <tr>';
}

echo $output;
