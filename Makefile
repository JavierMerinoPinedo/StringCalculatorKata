.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-boilerplate-kata .

build-container:
	docker run -dt --name docker-php-boilerplate-kata -v .:/540/BoilerplateKata docker-php-boilerplate-kata

	docker exec docker-php-boilerplate-kata composer install

start:
	docker start docker-php-boilerplate-kata

test: start
	docker exec docker-php-boilerplate-kata ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-boilerplate-kata /bin/bash

stop:
	docker stop docker-php-boilerplate-kata

clean: stop
	docker rm docker-php-boilerplate-kata
	rm -rf vendor
