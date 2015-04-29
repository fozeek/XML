
# REST Project #


## API ##
 
```
http://potauf.eu/api/v1/
```

## Authentication ##

// TODO by John


## Endpoints ##


### Liste ###

```
GET http://potauf.eu/api/v1/{ressource}.{format}
```

| Parameter     | Type          | Example  | Default  |
| ------------- | ------------- | --------:| --------:|
| page          | integer       |      `5` |        1 |
| count         | integer       |     `10` |        5 |

> *page* can't be negative
> *count* can't be negative

### Creation ###

```
POST http://potauf.eu/api/v1/{ressource}.{format}
```

### One object ###

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


### Media ###


### Mode ###


### Rate ###


### Support ###


### Theme ###
