<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список загруженных тестов</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: auto;
        }
        td {
            border: 1px solid black;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <h1>Список тестов</h1>
    <table>
<?php
    $files = array_diff(scandir('tests/' ), Array( ".", ".." ));
    $counter = 1;

if (!empty($files)) {
    foreach ($files as $file) {
        if (end(explode('.', $file)) === 'json') {
            $test = pathinfo($file)['filename'];
            echo '<tr><td>' . $counter . '</td><td><a href="test.php?name=' . $test . '">' . $test . '</a></td></tr>';
            $counter++;
        }
    }
} else {
    echo '<tr><td>Ни один файл не загружен!</td></tr>';
}
?>
    </table>
</body>
</html>