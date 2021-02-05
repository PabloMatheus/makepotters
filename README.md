## Setup


- Clone this repository
- Inside the project directory, navigate to docker folder.
- run docker-compose up -d
- run docker exec -it php74-container bash
- run composer install
- run php artisan migrate:fresh --seed
- run php artisan passport:install

## Available routes

To access the routes of the application, you need to use the access token received by authentication.

- *Auth* `/api/auth` method `POST` with:
```json
{
  "email": "dumbledore@hogwarts.com",
  "password": "albus"
}
```

- *Create Characters* `/character` method `POST`
```json
{
    "name": "Harry Potter",
    "role": "student",
    "school": "Hogwarts School of Witchcraft and Wizardry",
    "house": "1760529f-6d51-4cb1-bcb1-25087fce5bde",
    "patronus": "stag"
}
```

- *update Characters* `/character/{id}` method `PUT`
{
    "name": "Harry Potter",
    "role": "student",
    "school": "Hogwarts School of Witchcraft and Wizardry",
    "house": "1760529f-6d51-4cb1-bcb1-25087fce5bde",
    "patronus": "stag"
}

- *Remove Characters* `/character/{id}`

- *List Characters* `/characters`

- *List Characters with house filter* `/characters?house=1760529f-6d51-4cb1-bcb1-25087fce5bde`
