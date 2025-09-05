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

3. Access Service 1 in your browser:

   ```
   http://localhost:8001
   ```

### Stopping the Services

To stop the services, you can use:

```bash
docker-compose down
```

## Communication Between Services

Service 1 communicates with Service 2 using the internal Docker network. The URL used in Service 1 with PHP to access Service 2 is `http://service2:8002`.

This setup allows for easy development and testing of microservices using PHP and Docker.