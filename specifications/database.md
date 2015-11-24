# Database

Database name: "csrf"
Username: "csrf"

Tables:
- users
- interests
- users_interests

## Users

- id: technical integer value INT(11)
- login VARCHAR(55)
- password VARCHAR(255)
- email VARCHAR(127)


## Interests

- id: technical integer value INT(11)
- name: interest's name VARCHAR(55)
- description (optional): interest's description TEXT

## Users' interests

- id: technical integer value INT(11)
- user_id: foreign key pointing on users table and id column
- interest_id: foreign key pointing on interests table and id column
