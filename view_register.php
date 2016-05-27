<!doctype html>
<html>
    <head>
            <title>Registreeri konto</title>
            <link rel="stylesheet" href="styles20160121.css">
			<a href="Tutvustus20160121.html">Tutvustus</a>
			<a href="Kontaktid20160121.html">Kontaktid</a>
			<a href="Teenused20160121.html">Teenused</a>			
			<a href="ladu.php">Broneering</a>
			<a href="Galerii20160121.html">Galerii</a>
			<a href="Sündmused20160121.html">Sündmused</a>
			<a href="Lingid20160121.html">Lingid</a>          
            <a href="Harj20160121.html">Avalehele</a>
    </head>
    <body>

        <?php foreach (message_list() as $message):?>
            <p style="border: 1px solid blue; background: #EEE;">
                <?= $message; ?>
            </p>
        <?php endforeach; ?>

        <h1>Registreeri konto</h1>

        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">

            <input type="hidden" name="action" value="register">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

            <table>
                <tr>
                    <td>Kasutajanimi</td>
                    <td>
                        <input type="text" name="kasutajanimi" required>
                    </td>
                </tr>
                <tr>
                    <td>Parool</td>
                    <td>
                        <input type="password" name="parool" required>
                    </td>
                </tr>
            </table>

            <p>
                <button type="submit">Registreeri konto</button>
            </p>

        </form>
    </body>
</html>
