up:
	docker compose up -d
build:
	docker compose build --no-cache --force-rm
init:
	cp .env.example .env
	sed -i -e 's/127.0.0.1/$(IP)/g' .env
	docker compose up -d --build
	@make composer-install
#	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker compose down --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-web:
	docker compose logs web
log-web-watch:
	docker compose logs --follow web
log-app:
	docker compose logs app
log-app-watch:
	docker compose logs --follow app
log-db:
	docker compose logs db
log-db-watch:
	docker compose logs --follow db
web:
	docker compose exec web ash
app:
	docker compose exec app bash
db:
	docker compose exec db bash

##### composer #####
composer-install:
	docker compose exec app composer install
composer-update:
	docker compose exec app composer update
