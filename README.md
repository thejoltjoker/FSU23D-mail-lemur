[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/f9Yj_46I)

# FSU23D-Systemutveckling-Uppgift-2

Bygg en SaaS-tjänst för att kunder ska kunna hantera sina epost-listor. Vi kommer ha 2 roller av användare, kunder och prenumeranter, där en kund kan se en lista med uppgifter prenumeranter som har valt att prenumerera på deras nyhetsbrev.

## Setup

1. Make sure you have Docker Desktop installed and running
2. `git clone https://github.com/Medieinstitutet/uppgift-2-thejoltjoker.git`
3. `cd uppgift-2-thejoltjoker`
4. Paste .env file into root folder
5. `./vendor/bin/sail up`
6. Open new terminal window, cd to root folder and run:
   1. `./vendor/bin/sail artisan migrate:fresh --seed`
   2. `npm install`
   3. `npm run dev`
7. Open `http://localhost/` in a browser window

### Sitemap

- `GET /` Home page

#### Authentication

- `GET /register` Register account
- `POST /users` Store a new user
- `GET /login` Login to existing account
- `POST /logout` Log out of existing account
- `POST /clear-sessions` Clear all user sessions
- `POST /users/authenticate` Authenticate user
- `GET /forgot-password` Request password reset
- `POST /forgot-password` Send password reset email
- `GET /reset-password/{token}` Show reset password form
- `POST /reset-password` Reset password

#### Newsletters

- `GET /newsletters` List all newsletters when not signed in
- `GET /dashboard/newsletters` List all newsletters
- `GET /dashboard/newsletters/create` Create newsletter
- `POST /dashboard/newsletters` Store newsletter
- `GET /dashboard/newsletters/{id}/edit` Edit newsletter
- `PUT /dashboard/newsletters/{id}` Update newsletter
- `DELETE /dashboard/newsletters/{id}` Delete newsletter
- `GET /dashboard/newsletters/{id}/subscribers` List subscribers of a newsletter
- `POST /dashboard/newsletters/{id}/subscribers` Subscribe to a newsletter
- `DELETE /dashboard/newsletters/{id}/subscribers` Unsubscribe from a newsletter

#### Subscriptions

- `GET /dashboard/subscriptions` List user subscriptions
- `POST /dashboard/subscriptions` Store a new subscription
- `DELETE /dashboard/subscriptions` Remove a subscription

#### Subscribers

- `GET /dashboard/subscribers` List user subscribers

#### Profile and Errors

- `GET /dashboard/profile` User profile
- `GET /unauthorized` 403 Unauthorized
- `GET /not-found` 404 Not Found


