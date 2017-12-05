<?php
    $imgUrl = dirname(dirname(dirname(__FILE__))) . '/webroot/img/Laurel-purple.png';
    $cssUrl = dirname(dirname(dirname(__FILE__))) . '/webroot/style.css';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Berkshire+Swash" rel="stylesheet">
    <link rel="stylesheet" href="<?= $cssUrl ?>" type="text/css" />
</head>
<body>
    <main>
        <table>
            <tbody>
                <tr>
                    <td>
                        <img src="<?= $imgUrl ?>" />
                    </td>
                    <td>
                        <h1>
                            The Honest Muncie Pledge
                        </h1>

                        [pledge]

                        <p id="signature">
                            [name]
                        </p>
                        <time>
                            <?= date('F j, Y') ?>
                        </time>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>