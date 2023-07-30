<?php
$serviceData = '{
    "rucardona16@gmail.com": {
        "847e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co": [
            {
                "_id": "618bee22001d8f3564105f48",
                "company": "000000005058",
                "document": "000000000293",
                "targetEmail": "rucardona16@gmail.com",
                "mailgunId": "847e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co",
                "typeEvent": "opened",
                "date": "2021-11-10T16:06:58.877Z",
                "createdAt": "2021-11-10T16:06:58.879Z",
                "updatedAt": "2021-11-10T16:06:58.879Z",
                "__v": 0
            }
        ]
    },
    "rucardona@gmail.com": {
        "947e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co": [
            {
                "_id": "618bee80001d8f3564105f49",
                "company": "000000005058",
                "document": "000000000294",
                "targetEmail": "rucardona@gmail.com",
                "mailgunId": "947e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co",
                "typeEvent": "opened",
                "date": "2021-11-10T16:08:32.109Z",
                "createdAt": "2021-11-10T16:08:32.110Z",
                "updatedAt": "2021-11-10T16:08:32.110Z",
                "__v": 0
            }
        ]
    },
    "test@gmail.com": {
        "647e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co": [
            {
                "_id": "618beeae001d8f3564105f4a",
                "company": "000000005058",
                "document": "000000000294",
                "targetEmail": "test@gmail.com",
                "mailgunId": "647e318c098c40ed1b7a496c1f7734eb@qa-app.claus.co",
                "typeEvent": "opened",
                "date": "2021-11-10T16:09:18.855Z",
                "createdAt": "2021-11-10T16:09:18.856Z",
                "updatedAt": "2021-11-10T16:09:18.856Z",
                "__v": 0
            }
        ]
}
}';

$data = json_decode($serviceData, true);

ksort($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Detalle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Email</th>
                <th>Documento</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $email => $emailDetails) { ?>
                <?php foreach ($emailDetails as $details) { ?>
                    <?php $latestDetail = end($details); ?>
                    <tr>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $latestDetail['document']; ?></td>
                        <td><?php echo $latestDetail['typeEvent']; ?></td>
                        <td>
                            <?php
                                if ($latestDetail['typeEvent'] === 'opened') {
                                    echo 'Abierto';
                                } elseif ($latestDetail['typeEvent'] === 'delivered') {
                                    echo 'Entregado';
                                } else {
                                    echo 'Desconocido';
                                }
                            ?>
                        </td>
                        <td><?php echo $latestDetail['date']; ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

