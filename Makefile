install: # установить зависимости
	composer install
	npm install

brain-games: # Запуск brain-games.php
	php ./bin/brain-games

validate: # Запуск composer validate
	composer validate

lint: # Запуск phpcs
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even: # Проверка на четность
	php ./bin/brain-even

brain-calc: # Игра калькулятор
	php ./bin/brain-calc

brain-gcd: # Игра gcd
	php ./bin/brain-gcd

brain-progression: # Игра gcd
	php ./bin/brain-progression

brain-prime: # Игра gcd
	php ./bin/brain-prime