<?php
//Connessione
include("connessioni.php");

//CANCELLA PRODOTTO
//Controllo se ci sono record settati da cancellare
if(isset($_GET["id_cancella"])){
    //recupero l ID dell elemento da cancellare
$id_cancella=$_GET["id_cancella"];
    
    //eseguo la cancellazione della riga dal DB
    $sql="DELETE FROM prodotti WHERE id_prodotto=$id_cancella";
    $mysqli->query($sql) or die ("<h3>Errore SQL:</h3><p>$sql</p>");
}


//Definisco una query di lettura
//con questa riga inserisco tutti i dati della tabella nella variabile $sql
$sql = "SELECT * FROM `prodotti`";
    
//Esecuzione della Query con codice compatibile PHP versione 7
//crea una query con i valori dalla variabile $sql e inseriscili nella variabile $dati
$dati = $mysqli->query($sql) or die ("<h3>Errore SQL:</h3><p>$sql</p>")
?>
<!doctype html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Game Shop</title>

	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link rel="stylesheet" href="css/bootstrap.min.css">

    </head>
    
    
    <body>
        <!--   Inserisco messaggio di avvenuta connessione al database -->
        <?php echo $avviso_conn; ?>
        <div class="container">
            
            <header class="row">
                <div class="col-md-12">
                    <h1>Game Shop</h1>
                    <h3>I Nostri articoli</h3>
                </div>
            </header>
            
            <a href="crea.php" class="btn btn-success btn-block btn-lg"><i class="glyphicon glyphicon-plus"></i> Aggiungi un nuovo articolo</a>
            
            <main class="row">
                <table class="col-sm-12 table table-stripped">
                   <!--Testata della tabella, parte statica-->
                   <thead>
                       <th>Foto</th>
                       <th>Nome</th>
                       <th>Categoria</th>
                       <th>Prezzo</th>
                       <th>Operazioni</th>
                   </thead>
                   
                   <!--  Parte dinamica tabella  -->
                    
                    <?php
                    
                    /*fino a che c'è una riga nella tabella, crea un array $riga con i valori che ci sono nella variabile $dati*/
                    
                    while($riga = $dati->fetch_assoc()){
                    ?>
                   
                   <tr>
                       <!-- inserisco dinamicamente il valore contenuto nella cella foto grazie al valore memorizzato nella variabile $foto -->  
                       <td><img src="foto/<?php echo $riga ["foto"]; ?>" width="40" height="40" alt="<?php $riga ["nome"]; ?>"></td>
                       
                       
                       <!-- valore contenuto nella variabile $nome -->
                       <td><a href="vedi.php?articolo=<?php echo($riga["id_prodotto"]); ?>"><?php echo $riga["nome"] ?></a></td>
                    
                       
                       <!--  continuiamo prossima volta  -->
                       <td>
                            <?php echo $riga["categoria"]; ?>
                       </td>
                       
                       <td>
                            <?php echo $riga["prezzo"]; ?>
                       </td>
                       
                       <td>
                           <a class="btn btn-primary btn-sm" href="modifica.php?id_prodotto=<?php echo $riga["id_prodotto"]; ?>">Modifica</a>
                           
                           <a href="index.php?id_cancella=<?php echo $riga["id_prodotto"]; ?>" class="btn btn-danger btn-sm">Cancella</a>
                           
                           <!-- sostituisco link con pulsante cancella -->
                       </td>
                   </tr>
                   
                   <!-- Riapro il PHP per chiudere la parentesi del ciclo WHILE  -->
                   <?php
                   }
                   ?>
                    
                </table>
                
                <!-- inseriamo un form di ricerca -->
                
                <form action="cerca.php" role="search" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" name="chiave" class="form-control" placeholder="Cerca un prodotto">
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>Cerca</button>
                </form>
                
            </main><!-- Chiudo la row -->
            
        </div> <!-- chiudo il container-->
        
    </body>
</html>
