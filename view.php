<!doctype HTML>
<html>
    <head>
        <title>Minu broneering</title>
        <link rel="stylesheet" href="styles20160121.css">
        <a href="Tutvustus20160121.html">Tutvustus</a>
        <a href="Kontaktid20160121.html">Kontaktid</a>
        <a href="Teenused20160121.html">Teenused</a>			
        <a href="ladu.php">Broneering</a>
        <a href="Galerii20160121.html">Galerii</a>
        <a href="Sündmused20160121.html">Sündmused</a>
        <a href="Lingid20160121.html">Lingid</a>    
        <a href="Harj20160121.html">Avalehele</a>
        <meta charset="utf-8">
        <style>
            #lisa-vorm {
            display: none;
            }
        </style>
    </head>
    
    <body>
        <?php foreach (message_list() as $message):?>
        <p style="border: 1px solid blue; background: #EEE;">
            <?= $message; ?>
        </p>
        <?php endforeach; ?>
        <div style="float: right;">
            <form method="post"  action="<?= $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="action" value="logout">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <button type="submit">Logi välja</button>
            </form>
        </div>
       
        

		
        <p id="kuva-nupp">
            <button type="button">Kuva lisamise vorm</button>
        </p>
        <h1>Minu broneering</h1>        
        <form id="lisa-vorm" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            <p id="peida-nupp">
                <button type="button">Peida lisamise vorm</button>
            </p>
            <table>
                <tr>
                    <td>Nimetus</td>
                    <td>
                        <select type="text" id="nimetus" name="nimetus">
                        <option value="Telkimine, hind 6 eur">Telkimine, hind 6 eur</option>
                        <option value="Karavan, hind 11 eur">Karavan, hind 11 eur</option>
                        <option value="Kämping 1-kohaline, hind 10 eur">Kämping 1-kohaline, hind 10 eur</option>
                        <option value="Kämping 2-kohaline, hind 20 eur">Kämping 2-kohaline, hind 20 eur</option>
                        <option value="Kämping 3-kohaline, hind 30 eur">Kämping 3-kohaline, hind 30 eur</option>
                        <option value="Kämping 4-kohaline, hind 40 eur">Kämping 4-kohaline, hind 40 eur</option>
                        <option value="Kämping 5-kohaline, hind 50 eur">Kämping 5-kohaline, hind 50 eur</option>
                        <option value="Kämping 6-kohaline, hind 60 eur">Kämping 6-kohaline, hind 60 eur</option>
                        <option value="Hommikusöök, hind 5 eur">Hommikusöök, hind 5 eur</option>
                    </td>
                </tr>
                <tr>
                    <td>Kogus</td>
                    <td>
                        <input type="number" id="kogus" name="kogus">
                    </td>
                </tr>
            </table>
            <p>
                <button type="submit">Lisa kirje</button>
            </p>
        </form>
        <table id="ladu" border="1">
            <thead>
                <tr>
                    <th>Nimetus</th>
                    <th>Kogus</th>
                    <th>Tegevused</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
                    // joonistatakse ühekaupa välja
                    foreach (model_load($page) as $rida): ?>
                <tr>
                    <td>
                        <?=
                            // vältimaks pahatahtlikku XSS sisu, kus kasutaja sisestab õige
                            // info asemel <script> tag'i, peame tekstiväljundis asendama kõik HTML erisümbolid
                            htmlspecialchars($rida['nimetus']);
                            ?>
                    </td>
                    <td>
                        <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'];?>">
                            <input type="hidden" name="id" value="<?= $rida['id'];?>">
                            <input type="number" style="width: 5em; text-align: right;" name="kogus" value="<?= $rida['kogus']; ?>">
                            <button type="submit">Uuenda</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?= $_SERVER['PHP_SELF'];?>">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="id" value="<?= $rida['id']; ?>">
                            <button type="submit">Kustuta rida</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>        
            </tbody>
        </table>
        <?php
            // koolon tsükli lõpus tähendab, et tsükkel koosneb HTML osast
            // joonistatakse ühekaupa välja
            
            $summa = 0;
            $teenus1_hind = 0;
            foreach (model_load($page) as $rida): ?>
        <?php
            if ($rida['nimetus']=="Telkimine, hind 6 eur"){
             $teenus1_hind = 6;                      
            }
            if ($rida['nimetus']=="Karavan, hind 11 eur"){
            	$teenus1_hind = 11;                      
            }            
            if ($rida['nimetus']=="Kämping 1-kohaline, hind 10 eur"){
            	$teenus1_hind = 10;                      
            }            
            if ($rida['nimetus']=="Kämping 2-kohaline, hind 20 eur"){
            	$teenus1_hind = 20;                      
            }
            if ($rida['nimetus']=="Kämping 3-kohaline, hind 30 eur"){
            	$teenus1_hind = 30;                      
            }
            if ($rida['nimetus']=="Kämping 4-kohaline, hind 40 eur"){
            	$teenus1_hind = 40;                      
            }                        
            if ($rida['nimetus']=="Kämping 5-kohaline, hind 50 eur"){
            	$teenus1_hind = 50;                      
            }
            if ($rida['nimetus']=="Kämping 6-kohaline, hind 60 eur"){
            	$teenus1_hind = 60;                      
            }                                    
            if ($rida['nimetus']=="Hommikusöök, hind 5 eur"){
            	$teenus1_hind = 5;             
            }            
            
            
            
            $liidetav = $teenus1_hind * $rida['kogus'];
            $summa = $summa + $liidetav;
             
            ?>
        </td>
        </tr>
        <?php endforeach; ?>      
        <p> Hind kokku 
            <?php
                echo $summa;
                ?>
            eurot
        </p>
        <?php      
            // DOM peab olema enne loodud, et viitamine töötaks.
            // Script element läheb tööle sellel hetkel. Kuna paneme hiljem,  
            ?>
        <script src="ladu.js"></script>
    </body>
</html>
