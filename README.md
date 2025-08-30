# Presto.it

##  Overview
**Presto.it** è un e-commerce in stile *Subito.it* dove gli utenti possono caricare i propri prodotti in vendita.  
Il progetto è stato sviluppato come **progetto finale dell’Hackademy di Aulab** (Full Stack Developer).  

###  Obiettivo
Creare un marketplace funzionante tra utenti, con le seguenti funzionalità principali:
- Login e registrazione in piattaforma
- Personalizzazione del profilo utente
- Upload e gestione dei propri annunci di prodotto
- Visualizzazione del profilo del venditore
- Possibilità di vedere gli ultimi prodotti pubblicati da ciascun venditore
- Sezione commenti sul profilo utente

###  Tecnologie
- **Frontend:** HTML, CSS, JavaScript (con Blade & Bootstrap)
- **Backend:** PHP (Laravel) + librerie Laravel (Livewire, Fortify)
- **Database:** MySQL

---

##  Screenshot
https://www.youtube.com/shorts/KLz4PbrtXug

---

## ⚙️ Installazione & Avvio
Clona il repository e installa le dipendenze:

```bash
git clone <url-del-repo>
cd <nome-cartella>
composer install
npm install
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
