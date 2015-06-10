
# REST Project #


## API ##
 
```
http://api.potauf.eu/
```

## Authentication ##

| Parameter     | Type          | Example                                                            | 
| ------------- | ------------- | ------------------------------------------------------------------:|
| name          | String        |                                                          `quentin` |
| app_id        | String        |                                 `f02368945726d5fc2a14eb576f7276c0` |
| mail          | String        |                                                   `toto@gmail.com` |
| hash          | String        | `a8e3d78142c1ea3b84fa37743c411176ef7c3c895d51da30047e7bbb73de2986` |

> *name* User name
>
> *app_id* ID of your application
>
> *mail* user's mail
>
> *hash* Encrypted unique ID based on the API secret ID, user name, mail, host and API ID. 

## Endpoints ##


### List ###

```
GET http://api.potauf.eu/{ressource}[.{format}]
```

| Parameter     | Type          | Example  | Default  |
| ------------- | ------------- | --------:| --------:|
| page          | integer       |      `5` |      `1` |
| count         | integer       |     `10` |      `5` |

> *page* can't be negative
>
> *count* can't be negative

### Create ###

```
POST http://api.potauf.eu/{ressource}[.{format}]
```

### Fetch ###

```
GET http://api.potauf.eu/{ressource}/show/{id}[.{format}]
```

### Edit ###

```
PUT http://api.potauf.eu/{ressource}/show/{id}[.{format}]
```

### Delete ###

```
DELETE http://api.potauf.eu/{ressource}/show/{id}[.{format}]
```

## Ressources ##

### Commentaire ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| user_name     | Varchar(200)      |         `fozeek` |        Ø |
| date          | Date (dd-mm-YYYY) |     `12-04-2015` |        Ø |
| text          | Text              |   `Hello World!` |        Ø |


### Developer ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |


### Editor ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |


### Game ###

| Attribut          | Type                                | Example          | Default  |
| ----------------- | ----------------------------------- | ----------------:| --------:|
| title             | Varchar(200)                        |   `Hello World!` |        Ø |
| resume            | Varchar(350)                        |   `Hello World!` |        Ø |
| descrition        | Text                                |   `Hello World!` |        Ø |
| official_website  | Varchar(200)                        |   `Hello World!` |        Ø |
| genres            | Array([Genre](#genre))              |          [1,3,4] |        Ø |
| modes             | Array([Mode](#mode))                |          [1,3,4] |        Ø |
| editors           | Array([Editor](#editor))            |          [1,3,4] |        Ø |
| themes            | Array([Theme](#theme))              |          [1,3,4] |        Ø |
| supports          | Array([Support](#support))          |          [1,3,4] |        Ø |
| medias            | Array([Media](#media))              |          [1,3,4] |        Ø |
| commentaires      | Array([Commentaire](#commentaire))  |          [1,3,4] |        Ø |


### Genre ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |


### Media ###

| Attribut      | Type                                | Example                     | Default  |
| ------------- | ----------------------------------- | ---------------------------:| --------:|
| src           | Varchar(300)                        |   `http://link.to/src.type` |        Ø |
| title         | Varchar(200)                        |              `Hello World!` |        Ø |
| description   | Text                                |              `Hello World!` |        Ø |
| commentaires  | Array([Commentaire](#commentaire))  |                     [1,3,4] |        Ø |


### Mode ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |


### Rate ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |


### Support ###

| Attribut      | Type                                | Example                     | Default  |
| ------------- | ----------------------------------- | ---------------------------:| --------:|
| owner         | Varchar(300)                        |                    `fozeek` |        Ø |
| console_year  | Date(YYYY)                          |                      `1992` |        Ø |
| release_date  | Date(dd-mm-YYYY)                    |                `2015-05-18` |        Ø |
| price         | float                               |                      `34,4` |        Ø |
| business_model| Varchar(500)                        |                `Pay to win` |        Ø |
| test          | Text                                |                    `Super!` |        Ø |
| developers    | Array([Developer](#developer))      |                     [1,3,4] |        Ø |
| rates         | Array([Rate](#rate))                |                     [1,3,4] |        Ø |
| medias        | Array([Media](#media))              |                     [1,3,4] |        Ø |
| commentaires  | Array([Commentaire](#commentaire))  |                     [1,3,4] |        Ø |


### Theme ###

| Attribut      | Type              | Example          | Default  |
| ------------- | ----------------- | ----------------:| --------:|
| text          | Text              |   `Hello World!` |        Ø |
