<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple File Browser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Type</td>
                    <td>Name</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $path = './' . $_GET['path'] . '/';

                //one-line solution; scandir() usage + removing unwanted values from array array_diff() + fixing array index keys array_values();
                $files = array_values(array_diff(scandir($path), array('.', '..')));

                foreach ($files as $file) {
                    print('<tr>');
                    print('<td>' . (is_dir($path . $file) ? "Dir" : "File") . '</td>');
                    print('<td>' . (is_dir($path . '/' . $file) ? '<a href="?path=' . $path . $file . '">' . $file . '</a></td>' : $file));
                    print('<td>' . (!is_dir($file) ? '<a href="?delete=' . $file . '">DELETE</a>' : '') . '</td>');
                    print('</tr>');
                };

                ?>
            </tbody>
        </table>
    </div>

</body>

</html>