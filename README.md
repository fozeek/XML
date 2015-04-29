
# REST Project #


## API ##
 
```
http://potauf.eu/api/v1/
```

## Authentication ##

// TODO by John


## Endpoints ##


### List ###

```
GET http://potauf.eu/api/v1/{ressource}.{format}
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
POST http://potauf.eu/api/v1/{ressource}.{format}
```

### Fetch ###

```
GET http://potauf.eu/api/v1/{ressource}/{id}.{format}
```

### Edit ###

```
PUT http://potauf.eu/api/v1/{ressource}/{id}.{format}
```

### Delete ###

```
DELETE http://potauf.eu/api/v1/{ressource}/{id}.{format}
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
| release_date  | Date(dd-mm-YYYY)                    |                `12-04-2015` |        Ø |
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