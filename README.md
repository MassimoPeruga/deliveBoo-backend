# DeliveBoo

## Introduzione

**DeliveBoo è una web app che permette di ordinare cibo a domicilio nella città di Roma.**

Permette agli utenti di cercare i loro cibi preferiti, preparati dai
loro ristoranti di fiducia. Tutto rimanendo comodamente sul divano di
casa.



## Tipi di Utenti

Definiamo i seguenti tipi di utente che possono utilizzare DeliveBoo:

> ● Utente Interessato (UI): un utente non registrato che visita il sito<br/>
> ● Utente Registrato (UR): un utente che ha effettuato la registrazione come ristoratore



## Lista delle pagine

> ● **Homepage:** <br/>
> offre la possibilità di cliccare sulle tipologie di ristorante e senza il refresh della pagina ottenere una lista di ristoranti con le tipologie di appartenenza sotto ogni nome.

> ● **Pagina Menù Ristoratore Pubblica:**<br/>
> permette di visualizzare il menù di un particolare ristoratore.
> È possibile scegliere i cibi desiderati e relativa quantità per inserirli nel carrello. Il carrello si popola con i cibi selezionati e le relative quantità.

> ● **Pagina carrello/checkout:**<br/>
> permette di modificare le quantità dei cibi e di procedere all’ordine.
> È possibile acquistare solo da un ristoratore alla volta.
> Tramite questo pannello è possibile pagare inserendo i dettagli della carta di credito. 

> ● **Dashboard Utente Registrato:**<br/>
> permette la gestione dei propri dati e l’inserimento dei piatti disponibili 
>    > ○ **Pagina Lista Piatti**<br/>
>    > Da qui è possibile accedere alla modifica e cancellazione dei propri piatti
>    > I piatti non hanno categoria e si mostrano in ordine alfabetico.
>    >(possibilità di integrare ordinamento e categoria successivamente)

>    > ○ **Pagina Piatto**<br/>
>    > pagina per l’inserimento del piatto singolo con descrizione e prezzo

>    > ○ **Pagina Lista Ordini Ricevuti**<br/>

>    > ○ **Pagina Statistiche Ordini**<br/>
>    > permette di visualizzare le statistiche degli ordini.
>    > Nello specifico i grafici mostrano il numero di ordini per mesi/anni e l’ammontare delle vendite



## Requisiti Tecnici

#### (RT1) Client-side Validation
Tutti gli input inseriti dall’utente sono controllati client-side (oltre che server-side) per un controllo di veridicità (es. il prezzo di un piatto deve essere positivo).

####  (RT2) Sistema di Pagamento 
Il sistema di pagamento utilizzato è Braintree: [<u>https://www.braintreepayments.com/</u>](https://www.braintreepayments.com/)
Il sistema permette agli sviluppatori di simulare pagamenti senza essere approvati formalmente e senza utilizzare vere carte di credito.

####   (RT3) Il sito è responsive 
Il sito è correttamente visibile da desktop e da smartphone.

####   (RT4) La ricerca dei ristoranti avviene senza il refresh 



## Requisiti Funzionali

La piattaforma soddisfa i seguenti requisiti funzionali (RF) che vengono dettagliati nei seguenti punti:


#### (RF1) Permettere ai ristoratori di registrarsi alla piattaforma
**Visibilità:** UI<br/>
**Descrizione:** L’applicazione permette ai ristoratori di registrarsi alla piattaforma e creare un profilo. Le informazioni che l’utente può inserire sono:
>    > ● Email \*<br/>
>    > ● Password \*<br/>
>    > ● Nome Attività *\*<br/>
>    > ● Indirizzo *\**<br/>
>    > ● PIVA *\**<br/>
>    > ● Uno o più tipologie\*:<br/>
>    > italiano, internazionale, cinese, giapponese, messicano, indiano, pesce, carne, pizza...

*Sono contrassegnati con \* i dati obbligatori.*

Email e password sono utilizzati dall’utente per fare il login alla
piattaforma.
Non è previsto un pannello per modificare le informazioni inserite una
volta registrato. I form devono rispettare [RT1](#RT1-client-side-validation)

**Risultato:** Un nuovo utente viene creato nel sistema <br/>
**Eccezioni:**
Esiste già nel sistema un utente con l’email inserita


#### (RF2) Permettere ai ristoratori di aggiungere un piatto 
**Visibilità:** UR<br/>
**Descrizione:** 
Un ristoratore ha la possibilità di inserire uno o più
piatti all’interno del sistema. Per inserire un nuovo piatto vanno
inserite le seguenti informazioni:
> ● Nome piatto<br/>
> ● Ingredienti/descrizione <br/>
> ● Prezzo<br/>
> ● visibile si/no<br/>

È possibile modificare le informazioni inserite I form devono rispettare [RT1](#RT1-client-side-validation)<br/>
**Risultato:** Un piatto è inserito nel sistema e le sue informazioni
sono aggiornate <br/>
**Eccezioni:** /


#### (RF3) Permette ai visitatori di ricercare per tipologia di ristorante

**Visibilità:** UI / UR<br/>
**Descrizione:** Un utente è in grado di ricercare per una o più tipologie di ristorante La ricerca dei ristoranti deve rispettare [RT4](#RT4-La-ricerca-dei-ristoranti-avviene-senza-il-refresh)<br/>
**Risultato:** Viene generata una lista di ristoranti che corrispondono alla ricerca<br/> 
**Eccezioni:** **/**


#### (RF4) Permettere ai visitatori di vedere il menu di un ristorante
**Visibilità:** UI / UR<br/>
**Descrizione:** Selezionando un ristoratore appaiono tutti i dettagli
disponibili riguardanti il ristorante e i piatti disponibili.<br/>
È possibile aggiungere piatti al carrello cliccando sui singoli
prodotti. Il carrello si visualizza in pagina e si aggiorna senza
refresh.

**Risultato:** Viene visualizzata la pagina del menu <br/>
**Eccezioni:** /


#### (RF5) Permettere ai UI di pagare l’ordinazione 
**Visibilità:** UI / UR<br/>
**Descrizione:** in questa pagina è possibile aggiornare il carrello e
inserire i dati per la consegna e della carta di credito con cui
processare il pagamento<br/>
**Risultato:** L’ordine viene effettuato e si viene inviati ad una
pagina di avvenuto ordine e viene inviata una mail all’utente e al
ristoratore<br/>
**Eccezioni:** Il sistema di pagamento non ha processato correttamente
il pagamento / i dati della carta di credito non sono validi


#### (RF6) Permettere ai ristoratori di visualizzare il riepilogo degli ordini ricevuti
**Visibilità:** UR<br/>
**Descrizione:** Un ristoratore ha la possibilità di vedere il riepilogo degli ordini ricevuti, con i dati dell’utente che ha effettuato l’ordine.<br/>
**Risultato:** L'utente visualizza il riepilogo degli ordini ricevuti, ordinati in modo decrescente per data<br/>
**Eccezioni:** **/**


#### (RF7) Permettere ai ristoratori di visualizzare le statistiche degli ordini 
**Visibilità:** UR<br/>
**Descrizione:** Un ristoratore ha la possibilità di vedere le statistiche degli ordini ricevuti<br/>
**Risultato:** L'utente visualizza le statistiche degli ordini ricevuti per mese/anno e l’ammontare delle vendite<br/>
**Eccezioni:** **/**



## Consigli CTO

### Organizzazione

Non iniziare a scrivere subito codice: è importante leggere e rileggere bene il documento per avere un’idea chiara del progetto.

I RF sono in ordine di necessità e complessità: seguendo l’ordine si costruisce un’applicazione completa con funzionalità crescenti.
È essenziale però avere bene in mente la strada da seguire per non fare scelte iniziali che andranno totalmente cambiate successivamente.

È importante che la fase di progettazione iniziale sia affrontata da tutto il team.
Durante questo step il team ragiona sull'implementazione delle feature (ad es. si analizzano i requisiti funzionali, si definisce la struttura del dato a DB, si disegnano i wireframe dei flussi applicativi etc.).

In seguito si suddivide l'operatività in task ben definite che potrebbero essere assegnate ai diversi membri in modo da parallelizzare
lo sviluppo e procedere spediti (ad es. sistemare Model e Migrations, studiare come utilizzare API esterne e nuove librerie, implementare la parte visuale, ecc.).

Affinché il lavoro in team sia proficuo è però essenziale essere sempre aggiornati su tutti gli step, anche se non sviluppati in prima persona.
A tale scopo è quindi necessario fissare diversi meeting giornalieri affinché ci si possa coordinare, eventualmente integrare le features completate nel branch master, o effettuare debugging.



### Tecnologie da utilizzare

Non c’è alcun limite nelle tecnologie utilizzabili, purchè rispettino i requisiti. Chiaramente la scelta più ovvia (e consigliata) è quella di usare Laravel e Vue.

#### Ricerca

Per soddisfare il fatto che non si deve avere un refresh della pagina della ricerca bisogna fare delle chiamate ajax utilizzando axios.
Il metodo più utilizzato in questi casi è fare in modo che ogni cambiamento di input vada a modificare i campi utili alla ricerca nell’url (ad esempio: /ricerca?tipologia=cinese).
Dopo ogni cambiamento viene fatta una chiamata ajax con i parametri presenti nella URL.

#### Carrello (solo per DeliveBoo)

Le informazioni sui piatti aggiunti al carrello devono essere persistenti lato client anche al refresh o al cambio pagina. Per ottenere questa persistenza, esistono diverse tecnologie native del browser che si possono sfruttare.

#### Statistiche

Potete utilizzare
[<u>https://www.chartjs.org/</u>](https://www.chartjs.org/)