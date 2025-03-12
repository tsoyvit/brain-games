install: # установить зависимости
	composer install
	npm install

brain-games: # Запуск brain-games.php
	php bin/brain-games

validate: # Запуск composer validate
	composer validate

lint: # Запуск phpcs
	composer exec --verbose phpcs -- --standard=PSR12 src bin