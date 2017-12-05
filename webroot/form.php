<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>
        Honest Muncie Pledge Form
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://pledge.honestmuncie.org/form.js"></script>
</head>
<body>
    <h1>
        Honest Muncie Pledge Form
    </h1>
    <form method="get" id="pledge-form">
        <p>
            <input type="text" name="name" placeholder="Name" required="required" />
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
    <script>
        jQuery(document).ready(function () {
            pledgeForm.init();
        });
    </script>
</body>
</html>
