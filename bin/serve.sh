docker run --rm -it -v $(pwd):/opt/project -v $(pwd)/../framework:/opt/framework -w /opt/project -p 8080:8080 viboom/php-rr:latest rr serve
