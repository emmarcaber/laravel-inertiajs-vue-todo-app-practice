up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

shell:
	./vendor/bin/sail shell

npm-dev:
	./vendor/bin/sail npm run dev

tinker:
	./vendor/bin/sail artisan tinker

mysql:
	@docker compose exec -it mysql /bin/sh