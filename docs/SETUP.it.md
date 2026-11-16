# Avvio locale — DeliveBoo

[Presentazione del progetto](../README.md) · [English](SETUP.en.md)

La configurazione seguente riguarda il backend e la sua area riservata. Per il percorso cliente completo serve anche il frontend separato mostrato nel video.

## Prerequisiti

- PHP 8.1–8.3, con le estensioni richieste da Laravel e il driver PDO MySQL. Il lockfile storico include dipendenze con limiti sulle versioni PHP successive.
- Composer 2.
- Node.js 22 e npm, usati nel collaudo. Vite 5 dichiara compatibilità con `^18.0.0 || >=20.0.0`.
- MySQL attivo e un database locale dedicato al progetto.

## Preparazione del database

Con un utente MySQL che possa creare database, prepara un database dedicato:

```sql
CREATE DATABASE deliveboo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Usa il nome `deliveboo` in `DB_DATABASE` e credenziali locali con accesso a questo database.

## Installazione e database

```sh
git clone https://github.com/MassimoPeruga/deliveBoo-backend.git
cd deliveBoo-backend
composer install
npm ci
cp .env.example .env
php artisan key:generate
```

Nel file `.env` imposta `APP_URL=http://localhost:8000`, `FILESYSTEM_DISK=public` e i valori `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` del database locale. La scelta del disco pubblico permette di servire le immagini caricate attraverso il collegamento `storage`.

```sh
php artisan migrate
php artisan storage:link
php artisan db:seed --class=TypeSeeder
```

Il seeder generale è vuoto: `migrate --seed` da solo non carica i dati dimostrativi. `TypeSeeder` prepara le tipologie necessarie alla registrazione di un ristorante. I seeder svuotano le tabelle interessate: eseguili soltanto sul database locale dedicato.

## Avvio dei server

In un terminale avvia gli asset:

```sh
npm run dev
```

In un secondo terminale, dalla stessa cartella:

```sh
php artisan serve --host=localhost --port=8000
```

Apri [la registrazione](http://localhost:8000/register) per creare un ristorante oppure [il login](http://localhost:8000/login) per accedere all’area riservata. La route `/` non è definita in questo backend. L’host `localhost:8000` corrisponde anche agli URL delle immagini costruiti dalle API originali.

## Pagamenti sandbox

Per provare gli endpoint di pagamento, aggiungi a `.env` le credenziali del tuo account **Braintree sandbox** con questi nomi:

```dotenv
MERCHANT_ID=
PUBLIC_KEY=
PRIVATE_KEY=
```

Queste variabili sono lette dal [controller di checkout](../app/Http/Controllers/Api/CheckoutController.php) e non sono presenti nel modello `.env.example`. Mantieni i valori nel file locale, escluso da Git. Le altre funzionalità del backend possono essere esplorate senza configurare Braintree.

<details>
<summary>Dati dimostrativi aggiuntivi</summary>

Su un database locale appena creato, dopo `TypeSeeder`, puoi caricare nell’ordine:

```sh
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=RestaurantSeeder
php artisan db:seed --class=DishSeeder
php artisan db:seed --class=OrderSeeder
```

Questi seeder sostituiscono i dati delle tabelle coinvolte. Gli ordini sono generati con Faker; le immagini dei dati iniziali fanno riferimento a file di storage che non sono inclusi nella repository.

</details>


## Verifica dell’avvio

Avvio collaudato il **16 novembre 2026** in container temporanei con PHP 8.3.36, Composer 2.11.2, Node.js 22.23.5 e MySQL 8.0.46, usando i lockfile della repository senza aggiornarli.

Sono stati verificati installazione Composer/npm, generazione della chiave applicativa, migration, collegamento storage, tutti i seeder nell’ordine indicato, build degli asset e risposta del server Vite di sviluppo. Le pagine `/login` e `/register` e le API di ristoranti e tipologie hanno risposto correttamente; una registrazione con dati sintetici ha permesso di accedere a dashboard, elenco ordini e profilo ristorante.

Per il collaudo HTTP gli host di database e server sono stati adattati alla rete dei container. Non sono state eseguite transazioni Braintree: richiedono credenziali sandbox personali. La verifica riguarda l’avvio e i percorsi indicati, non un collaudo completo di tutte le funzionalità.
