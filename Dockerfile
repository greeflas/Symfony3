FROM php:7.1-cli

WORKDIR /symfony-app

EXPOSE 8000

CMD ["/symfony-app/bin/console", "server:run", "0.0.0.0:8000"]