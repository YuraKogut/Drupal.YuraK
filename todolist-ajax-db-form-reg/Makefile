THIS_FILE := $(lastword $(MAKEFILE_LIST))
.PHONY: up start down stop
up:
	docker-compose -f docker-compose.yml up -d $(c)
start:
	docker-compose -f docker-compose.yml start $(c)
down:
	docker-compose -f docker-compose.yml down $(c)
stop:
	docker-compose -f docker-compose.yml stop $(c)
