
# cgrd task

## Project Setup Instructions

## Requirements

- **Docker**: Make sure Docker is installed on your system. You can download it from [Docker's official website](https://www.docker.com/get-started).

## Installation Steps

1. **Clone the Project**

   Clone this repository to your local machine.

   ```bash
   git clone https://github.com/c3rd/php-app.git
   cd php-app
   ```

2. **Create a `.env` File**

   - Create a `.env` file in the root of the project.
   - Copy the contents from `.env.example` and update any necessary environment variables.

3. **Build and Run Docker Containers**

   - Use `docker-compose` to build and run the Docker containers in the background.
   - This command will build the images if they haven't been built already and start the containers in detached mode.

   ```bash
   docker-compose up -d --build
   ```

4. **Import Database Schema**

   - Once the containers are running, import the initial database schema or data by running the following command.
   - Replace `YOUR_PASSWORD` with the root password you set in the `.env` file.

   ```bash
   docker exec -i mysql-db mysql -u root -pYOUR_PASSWORD myapp < script.sql
   ```

## Accessing the Application

After the containers are up and the database is initialized, you can access the application by opening the following URL in your browser:

[http://localhost:8080/index.php](http://localhost:8080/index.php)

This will load the application on port 8080, as specified in the Docker setup.