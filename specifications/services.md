# Services

## Website description

The website is a small web app' to store a list of interests. These interests 
can be shared with other users. We can pretend that these interests can be used 
in order to get information & news about articles related to the followed 
interests.
The idea is not to developp a fully working web application but more to 
demonstrate how CSRF attack is working.

## Softwares & Technologies

Application will be developped either in `PHP` or `Python`.
Database will be `MySQL` with InnoDB engine.

## Authentication

Authentication will be made with a couple (login, password) credentials. Those 
credentials will be stored in the database within a `users` table. Password will 
be hashed with either `bcrypt` or `SHA-512`.

`users` table will contain the following information:

- id: technical integer value
- login
- password
- email

## WEB Services

### Vulnerable to CSRF

- Change password 1
- Change email
- Get list of interests of a user

### Not vulnerable to CSRF

- Change password 2
- Add interest
- Remove interest
