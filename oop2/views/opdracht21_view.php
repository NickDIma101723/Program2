<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 2.1: Rekeningen</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rekeningen Overzicht</h1>
    <table>
        <tr>
            <th>Rekeningnummer</th>
            <th>Naam Eigenaar</th>
            <th>Saldo (€)</th>
            <th>Opname Limiet (€)</th>
            <th>Max Rood (€)</th>
        </tr>
        <?php foreach ($rekeningen as $rekening): ?>
        <tr>
            <td><?= htmlspecialchars($rekening->rekeningNummer) ?></td>
            <td><?= htmlspecialchars($rekening->naamEigenaar) ?></td>
            <td><?= htmlspecialchars($rekening->saldo) ?></td>
            <td><?= htmlspecialchars($rekening->opnameLimiet) ?></td>
            <td><?= htmlspecialchars($rekening->maxRood) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>