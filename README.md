# bbp-db

大合奏！バンドブラザーズ P 　配信曲リスト

### Create Docker Images

It will take about two or three minutes.

```
$ docker-compose build
```

### Run Containers

```
$ docker-compose up -d
```

### Enter PHP-FPM Container

```
$ docker exec -it bbp-db_phpfpm_1 /bin/sh
```

### Exit Container

```
/var/www/html # exit
```

### Fix Configuration

Update `data/htdocs/sample/config/app.php` at line 251

```data/htdocs/sample/config/app.php
-   'host' => 'localhost',
+   'host' => 'mysql',
```

## Build Up

```
$ docker-compose up -d
```

You can check at http://localhost:8765/musics

## Remove Containers

```
$ docker-compose down
```

## Licences

[km42428/docker-cakephp3-template](https://github.com/km42428/docker-cakephp3-template)
