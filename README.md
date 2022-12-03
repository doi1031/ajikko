# ajikko

栄養、カロリー管理したい人のためのレシピ発見サービス
https://docs.google.com/document/d/1ZoAu9aipLs5spMktOP84L3eMzJysr7wQIscgffQbH2Q/edit

## 環境構築

```shell
$ git clone git@github.com:doi1031/ajikko.git
$ cd ajikko
$ cp .env.example .env
$ composer install
$ composer key:generate
$ ./vendor/bin/sail up
$ sudo vim /etc/hosts
```

```/etc/hosts
# /etc/hosts
...
0.0.0.0 local.ajikko.com
```
http://local.ajikko.com/
