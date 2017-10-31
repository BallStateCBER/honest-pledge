<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>
        Honest Muncie Pledge Form
    </title>
</head>
<body>
    <h1>
        Honest Muncie Pledge Form
    </h1>
    <form method="get">
        <p>
            <input type="text" name="name" placeholder="Name" />
        </p>

        <p>
            <?php foreach (['citizen', 'business', 'official'] as $version): ?>
                <label for="<?= $version ?>">
                    <input type="radio" name="version" value="<?= $version ?>" id="<?= $version ?>" />
                    <?= ucwords($version) ?>
                </label>
                <br />
            <?php endforeach; ?>
        </p>

        <p>
            <button type="submit">
                Get PDF
            </button>
        </p>
    </form>
</body>
</html>