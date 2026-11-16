# DeliveBoo — backend

Applicazione didattica per ordinare cibo a domicilio, dalla scelta dei piatti alla gestione degli ordini nell’area ristoratore. Progetto finale del percorso Full Stack Web Developer di Boolean, sviluppato nel 2024 da un team di cinque persone in circa un mese.

**[Guarda la demo video](https://massimoperuga.dev/demo/deliveboo)** · [Il progetto nel portfolio](https://massimoperuga.dev/formazione/boolean#deliveboo) · [English](README.en.md)

[![Homepage di DeliveBoo, dalla registrazione video dell’applicazione completa](docs/images/deliveboo-preview.jpg)](https://massimoperuga.dev/demo/deliveboo)

Questa repository contiene il **backend Laravel**, le API per il frontend e le viste dell’area ristoratore. Il video mostra l’applicazione completa, compreso il frontend cliente sviluppato separatamente. Nel portfolio è disponibile la registrazione: il backend non è pubblicato come servizio utilizzabile online.

## Il progetto

Abbiamo organizzato il lavoro in autonomia, con docenti di altre classi nel ruolo di committenti per simulare il confronto con gli stakeholder. L’obiettivo era collegare un’interfaccia di ordinazione a un backend con dati relazionali, un’area riservata e pagamenti di prova.

La [consegna e documentazione originale dell’esercizio](CONSEGNA.md) è conservata integralmente, così da poter confrontare le richieste iniziali con il codice realizzato.

## Funzionalità del backend

- Registrazione e accesso dei ristoratori, con profilo del ristorante e tipologie di cucina.
- Inserimento, modifica ed eliminazione dei piatti, con immagini e disponibilità.
- API per consultare ristoranti, menu e tipologie e per registrare gli ordini.
- Area riservata per visualizzare gli ordini ricevuti.
- Endpoint per token di pagamento e checkout Braintree in ambiente sandbox.

## Il mio contributo

Mi sono occupato della divisione dei compiti, delle decisioni tecniche e del supporto ai compagni, concordando le scelte con il gruppo. Sul backend ho implementato:

- **Ordini:** salvataggio dei dati di consegna e associazione ai piatti con le rispettive quantità, tramite una relazione molti-a-molti.
- **Consultazione:** elenco degli ordini del ristorante autenticato e vista di dettaglio con piatti e quantità.
- **Pagamenti:** integrazione Braintree in sandbox, dalla generazione del token per il client all’invio della transazione e alla restituzione dell’esito.

## Stack e organizzazione

| Ambito | Tecnologie |
| --- | --- |
| Backend | PHP, Laravel 10 |
| Dati | MySQL, Eloquent, migration e seeder |
| Area ristoratore | Blade, Bootstrap 5, Sass, Vite |
| Autenticazione | Laravel Breeze |
| Pagamenti di prova | Braintree PHP SDK, sandbox |

### Scelte tecniche

- **Relazioni Eloquent:** la tabella `dish_order` associa piatti e ordini conservando la quantità nella relazione. Un ordine può così contenere più piatti senza duplicarne i dati.
- **API e viste Blade:** il frontend cliente comunica attraverso endpoint JSON; l’area ristoratore usa viste renderizzate da Laravel. Le due interfacce condividono modelli e dati.
- **Braintree sandbox:** la generazione del token e l’invio della transazione restano sul backend; il client fornisce il nonce del metodo di pagamento. La sandbox permette di esercitare l’integrazione senza addebiti reali.

Il lavoro mette in pratica modellazione relazionale, integrazione di servizi esterni e coordinamento tra API e interfaccia.

Per orientarsi nel codice:

- [Controller API](app/Http/Controllers/Api): catalogo, creazione degli ordini e checkout.
- [Controller dell’area riservata](app/Http/Controllers/Admin) e [viste Blade](resources/views/admin): gestione del ristorante, dei piatti e consultazione degli ordini.
- [Modelli](app/Models) e [migration](database/migrations): relazioni e struttura dei dati.
- [Route API](routes/api.php) e [route web](routes/web.php): punti d’ingresso dell’applicazione.

## Avvio locale

Il backend richiede PHP 8.1–8.3, Composer 2, Node.js compatibile con Vite 5 e MySQL. La [guida di avvio](docs/SETUP.it.md) include installazione, configurazione, database, seeder e pagamenti sandbox. Dopo l’avvio si accede da `/register` o `/login`; il frontend cliente resta un’applicazione separata.

## Ambito e limiti

Il progetto conserva l’implementazione didattica del 2024 e le relative dipendenze. I pagamenti usano esclusivamente la sandbox e la registrazione video documenta il risultato del lavoro in team. Le funzionalità elencate nella consegna rappresentano le richieste iniziali: questa presentazione descrive il perimetro riscontrabile nel backend, senza dare per realizzato ogni requisito del documento originale.
