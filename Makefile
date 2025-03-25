.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-stringcalculator-kata .

build-container:
	docker run -dt --name docker-php-stringcalculator-kata -v .:/540/StringCalculatorKata docker-php-stringcalculator-kata

	docker exec docker-php-stringcalculator-kata composer install

start:
	docker start docker-php-stringcalculator-kata

test: start
	docker exec docker-php-stringcalculator-kata ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-stringcalculator-kata /bin/bash

stop:
	docker stop docker-php-stringcalculator-kata

clean: stop
	docker rm docker-php-stringcalculator-kata
	rm -rf vendor
