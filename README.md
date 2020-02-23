# Mailer

Aplikacja do wysyłania wiadomości e-mail.

### Instalacja na środowisku deweloperskim

Instalacja zależności comoposer:

```
composer install
```

Konfiguracja pliku .env
```
 cp .env.example .env
```

**_W pliku .env należy ustawić odpowiednie dane dostępu do serwera SMTP, Redis itp._**

Uruchomienie kontenerów docker'owych
```
docker-compose up -d
```

Uruchomienie worker'a kolejek
```
docker container exec idp-php-fpm php artisan queue:work
```

### Po skonfigurowaniu aplikacja powinna być dostępna na:

```
localhost:20002
```

### Aplikacja jest publicznie dostępna na:
http://api.grocelivery.eu/mail
