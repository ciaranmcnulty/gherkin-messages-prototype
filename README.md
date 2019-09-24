# Gherkin messages prototype

Uses gherkin-go binary to parse gherkin files into pickles consumed by PHP

## Building

Requirements:
 * protoc
 * composer
 * wget

use `make` to build the protobuf classes, grab the gherkin binary, and install composer dependencies

## Using

`php pickes.php /path/to/some.feature`

This should dump out the pickle steps
