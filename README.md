# PHP Microservices

This project sets up two PHP microservices that can communicate with each other using Docker. 

## Services Overview

- **Service 1**: This service makes a request to Service 2 and displays the response.
- **Service 2**: This service responds with a simple message.

## Project Structure

```
php-microservices
├── service1
│   ├── src
│   │   └── index.php
│   └── Dockerfile
├── service2
│   ├── src
│   │   └── index.php
│   └── Dockerfile
├── docker-compose.yml
└── README.md
```

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Building and Running the Services

1. Navigate to the project directory:

   ```bash
   cd php-microservices
   ```

2. Build and start the services using Docker Compose:

   ```bash
   docker-compose up --build
   ```

3. Access Service 1 in your browser or via curl:

   ```bash
   curl http://localhost:8001
   ```

### Stopping the Services

To stop the services, you can use:

```bash
docker-compose down
```

## Communication Between Services

Service 1 communicates with Service 2 using the internal Docker network. The URL used in Service 1 to access Service 2 is `http://service2:8002`.

## Example Code

- **Service 1 (`service1/src/index.php`)**:

```php
<?php
$service2Url = 'http://service2:8002'; // URL of service2
$response = file_get_contents($service2Url);
echo "Response from Service 2: " . $response;
```

- **Service 2 (`service2/src/index.php`)**:

```php
<?php
echo "Hello from Service 2!";
```

## Docker Configuration

- **Service 1 Dockerfile**:

```
FROM php:7.4-cli
WORKDIR /usr/src/app
COPY src/ .
CMD ["php", "-S", "0.0.0.0:8001", "index.php"]
```

- **Service 2 Dockerfile**:

```
FROM php:7.4-cli
WORKDIR /usr/src/app
COPY src/ .
CMD ["php", "-S", "0.0.0.0:8002", "index.php"]
```

- **Docker Compose File (`docker-compose.yml`)**:

```yaml
version: '3.8'
services:
  service1:
    build:
      context: ./service1
    ports:
      - "8001:8001"
  service2:
    build:
      context: ./service2
    ports:
      - "8002:8002"
```

This setup allows for easy development and testing of microservices using PHP and Docker.# php-microservices
