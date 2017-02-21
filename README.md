# gameshop_2.0
An upgrade of basic gameshop created in first course

Scopo di questo corso è implementare/upgradare il gestionale della prima sessione di PHP, secondo gli standard di programmazione.
Durante le lezioni, prenderemo in esame il punto di partenza della tabella principale prodotti e capiremo come "eliminare" temporaneamente elementi superflui che possono essere spostati in una tabella separata. Questo valore potrà essere inserito comunque nella tabella "prodotti" tramite joint di tabelle.

Situazione di partenza al 21/02/2017
Struttura della cartella gameshop 1.0:
- index.php (file che contiene al suo interno la connessione al file "connessioni.php" per la connessione al DB, richiamo di una query di lettura per visualizzare tutti i prodotti contenuti in tabella, un controllo iniziale al caricamento della pagina di un'eventuale pressione del tasto cancella con relativo codice per la cancellazione, ed infine un richiamo al file "cerca.php");
- connessioni.php (con la connessione al database);
- vedi.php (per la visualizzazione di dettaglio di un prodotto);
- crea.php (per l'aggiunta di prodotti all'interno della tabella 'prodotti');
- modifica.php (per la modifica di un prodotto esistente);
- cerca.php (per la ricerca di un prodotto nel database).


