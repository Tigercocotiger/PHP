<html>
    <head>
        <title>Calculatrice</title>
    </head>
    <body>
        <?php        
            $res = null;
            if(isset($_POST['action']) && isset($_POST['val1']) && isset($_POST['val2']))
            {
                if(is_numeric($_POST['val1']) && is_numeric($_POST['val2'])) {

                    switch($_POST['action'])
                    {
                        case 'addition':
                            $res = "Resultat = " . ($_POST['val1'] + $_POST['val2']);
                            break;
                        case 'soustraction':
                            $res = "Resultat = " . ($_POST['val1'] - $_POST['val2']);
                            break;
                        case 'multiplication':
                            $res = "Resultat = " . ($_POST['val1'] * $_POST['val2']);
                            break;
                        case 'division':
                            $res = ($_POST['val2'] != 0) ? "Resultat = " . ($_POST['val1'] / $_POST['val2']) : null;
                            break;
                    } 
                }
            } 
        ?>

        <form method="post">
            <div>
                <label for="val1">Valeur 1:</label>
                    <input type="text" id="val1" name="val1" value=<?php echo (isset($_POST['val1']) && is_numeric($_POST['val1']) && $res == null ? $_POST['val1'] : "")?>>
                    <?php echo (isset($_POST['val1']) ? (!is_numeric($_POST['val1']) ? "Saisissez un chiffre correct" : "" ) : "")?>
                    <br/>
                <label for="val2">Valeur 2:</label>
                    <input type="text" id="val2" name="val2" value=<?php echo (isset($_POST['val2']) && is_numeric($_POST['val2']) && $res == null ? $_POST['val2'] : "")?>>
                    <?php echo (isset($_POST['val2']) ? (!is_numeric($_POST['val2']) ? "Saisissez un chiffre correct" : (isset($_POST['action']) && $_POST['val2'] == 0 ? "Can't divide by 0" : "") ) : "")?>
                    <br/>

            </div>
            <br/>

            <label for="action">Selectionnez une action</label><br/><br/>
            <input name="action" type="submit" value="addition"><br/><br/>
            <input name="action" type="submit" value="soustraction"><br/><br/>
            <input name="action" type="submit" value="multiplication"><br/><br/>
            <input name="action" type="submit" value="division"><br/><br/>
            <br/>
            <br/>

            <?php echo $res; ?>
        </form> 
    </body>
</html>
