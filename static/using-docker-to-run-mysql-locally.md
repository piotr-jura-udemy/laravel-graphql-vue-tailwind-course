## Create docker-compose.yml
The below `docker-compose.yml` defines 2 services. The MySQL image, using the specific version (8.0.23) and Adminer, a web-based database manager. The Adminer is optional, you can skip it if you prefer to use your tool of choice (like Sequel Pro/MySQL Workbench, TablePlus).

It overrides the default command of the MySQL image to enable password authentication. The `restart` set to true will make sure the container is auto-restarted when anything goes wrong.

The `MYSQL_ROOT_PASSWORD` environment variable specifies the `root` user password. Though not used here, you can also use `MYSQL_DATABASE` to create a database on startup. The full list of environment variables is available <a href="https://hub.docker.com/_/mysql" class="border-b-4 border-red-300 hover:bg-red-300  dark:hover:text-gray-700">here</a>.</div>
```yaml
# docker-compose.yml
version: "3.8"

services:
  mysql:
    image: mysql:8.0.23
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: example
    ports:
      - 3306:3306
  # This image is optional
  adminer:
    image: adminer
    restart: always
    ports:
      - 8080:8080
```

## Run docker-compose
When you start the Docker containers based on images you've never used before, they need to be downloaded first. First time start-up might take a little while longer.

Run `docker-compose up` to download and start MySQL & Adminer. Use the `-d` flag to start containers in the background (`docker-compose up -d`).

If you run containers in the background, you can stop them anytime by running `docker-compose stop`. Otherwise, just press `Ctrl+C`.

## Connect to the database

Connect to the database using `localhost` or `127.0.0.1` as host, if you are connecting from outside the Docker container - eg. using database manager or when you run your software that needs to connect to the database on your host machine. If you're connecting from within a docker container, then use the `mysql` as host.

Don't forget to expose the MySQL port to your host machine - the `ports` takes care of that.