[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/f9Yj_46I)

# FSU23D-Systemutveckling-Uppgift-2

Bygg en SaaS-tjänst för att kunder ska kunna hantera sina epost-listor. Vi kommer ha 2 roller av användare, kunder och prenumeranter, där en kund kan se en lista med uppgifter prenumeranter som har valt att prenumerera på deras nyhetsbrev.

## Kraven för denna uppgift

### Betyg G

- [x] Databasen ska vara MySQL (eller Mariadb).
- [x] Alla sidor ska vara skrivna i php (ingen react mot api tillåten för denna uppgift).
- [x] Ett användarkonto ska lagra namn (för- [ ] och efternamn), epostadress och hash för lösenord.
- [ ] Ett kundkonto ska ha information om nyhetsbrevet: namn och beskrivning
- [x] En prenumerant ska enkelt kunna börja prenumerera och sluta prenumerera på ett nyhetsbrev
- [x] Fungerande inloggning och återställning av lösenord, med epostutskick.
- [x] Epost ska skickas med en Email service provider (ESP)

- [ ] Dessa sidor ska finnas:
  - [x] Skapa konto (välj typ: kund eller prenumerant)
  - [x] Lista alla nyhetsbrev
    - [x] Enskilt nyhetsbrev (prenumerera / avregistrera)
  - [x] Logga in
    - [x] Återställ lösenord
      - [x] Ange nytt lösenord
    - [x] Utloggad (Endast: meddelande om att man är utloggad)
  - [x] Mina sidor (Endast: välkomstmeddelande efter inloggning)
    - [x] Mina prenumerationer (för prenumeranter)
    - [x] Mina prenumeranter (för kunder)
    - [ ] Mitt nyhetsbrev / Redigera nyhetsbrev (för kunder)
- [x] Menyn på sidan ska vara annorlunda baserat på om du är kund eller prenumerant
  - [x] Meny för utloggad: Alla nyhetsbrev, Logga in, Skapa konto
  - [x] Meny för prenumerant: Alla nyhetsbrev, Mina prenumerationer, Logga ut
  - [x] Meny för kunder:  Mina prenumeranter, Mitt nyhetsbrev, Logga ut
- [ ] Om man försöker visa en sida som man inte har tillgång till (baserat på användarroll) ska det visas ett meddelande om att man inte får det. Alternativt göra en redirect till en sida med samma information

### Betyg VG

- [x] En användare ska kunna vara både kund och prenumerant på samma gång.
- [ ] Ett användarkonto ska ha ett personligt salt-värde som används i hash-funktionen för lösenordet
- [x] Inloggade sessioner ska finnas med i databasen
- [x] En användare ska kunna logga ut från alla sina sessioner med ett knapptryck
- [x] “Ange nytt lösenord” måste vara en “hot link” som endast är giltig 20 minuter.
- [x] Alla sidor ska vara byggda med ett mvc-ramverk (Codeignitor är föreslaget, men andra går bra om man vill)

## Denna uppgift mäter följande moment från kursplanen

- programstruktur för hantering av information, informationsflödeoch användare
- designa system och kodbaser utifrån arkitektuella principer
- använda Postman för att testa API:er

## Denna uppgift mäter följande VG-moment från kursplanen

- Implementera MVC-ramverk

### Sitemap

Dessa sidor ska finnas:

- `GET /register` Skapa konto (välj typ: kund eller prenumerant)
- `GET /login` Logga in
- `GET /create-password` Ange nytt lösenord
- `GET /reset-password` Återställ lösenord

- `GET /newsletters` Lista alla nyhetsbrev | index
- `GET /newsletters/create` Skapa nyhetsbrev (för kunder) | create
- `POST /newsletters` Skapa nyhetsbrev i databasen | store
- `GET /newsletters/{id}/edit` Redigera nyhetsbrev (för kunder) | edit
- `PUT /newsletters/{id}` Lagra ändringar för nyhetsbrev | update
- `DELETE /newsletters/{id}` Ta bort nyhetsbrev | destroy
- `GET /newsletters/{id}` Enskilt nyhetsbrev (prenumerera / avregistrera) | show

- Mina sidor (Endast: välkomstmeddelande efter inloggning)
- `GET /users/{id}/newsletters` Mina nyhetsbrev
  - Mina prenumerationer (för prenumeranter)
  - Mina prenumeranter (för kunder)
  - 

## Setup

1. Make sure you have Docker Desktop installed and running
2. `git clone https://github.com/Medieinstitutet/uppgift-2-thejoltjoker.git`
3. `cd uppgift-2-thejoltjoker`
4. `./vendor/bin/sail up`
5. Open new terminal window and run:
   1. `./vendor/bin/sail artisan migrate:fresh --seed`


