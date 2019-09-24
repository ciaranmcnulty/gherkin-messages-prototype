default: build

build: proto composer
.PHONY: build

messages.proto:
	wget https://raw.githubusercontent.com/cucumber/cucumber/master/cucumber-messages/messages.proto

gherkin:
	wget -O gherkin https://github.com/cucumber/gherkin-go/releases/download/v6.0.17/gherkin-go-darwin-amd64
	chmod +x gherkin

proto: messages.proto
	mkdir -p proto
	protoc --php_out=proto messages.proto

composer:
	composer install

clean:
	rm -rf messages.proto
	rm -rf proto
	rm -rf composer.lock
	rm -rf vendor
.PHONY: clean
