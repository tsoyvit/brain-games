install: # установить зависимости
	composer install
	npm install

brain-games: # Запуск brain-games.php
	php bin/brain-games

validate: # Запуск composer validate
	composer validate
