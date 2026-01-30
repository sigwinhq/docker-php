.SILENT:
include vendor/sigwin/infra/resources/PHP/library.mk

vendor/sigwin/infra/resources/PHP/library.mk:
	mv composer.json composer.json~ && rm -f composer.lock
	docker run --rm --user '$(shell id -u):$(shell id -g)' --volume '$(shell pwd):/app' --workdir /app composer:2 require sigwin/infra
	mv composer.json~ composer.json && rm -f composer.lock

SPEC_URL = https://docs.docker.com/reference/api/engine/version/v1.53.yaml

dump: patch
	vendor/bin/jane-openapi generate -c .jane-openapi.php
	make cs

spec.patch: v1.53.yaml
	curl -o v1.53.yaml.old $(SPEC_URL)
	diff -Naru --label a/v1.53.yaml --label b/v1.53.yaml v1.53.yaml.old v1.53.yaml > spec.patch || true
	rm -f v1.53.yaml.old

patch:
	curl -o v1.53.yaml $(SPEC_URL)
	patch -p1 < spec.patch
