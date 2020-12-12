# Project Camellia

Final Software Enginering Project

# Members
 - Christopher Spradlin
 - Alan Harris
 - Parker Hoskovec
 - Xavier Hodges
 - Shingi Kucherera

# Installation 

## Install Docker and Docker Compose

Follow the Docker doumentation [here](https://www.docker.com/products/docker-desktop) to install Docker Desktop. Docker Desktop will automatically install Docker Compose. 

To verifiy you have installed everything correctly, go into your terminal and type the commands below.

`docker --version`

`docker-compose --version`

The outputs for the commands should shwo the version and build number of both applications. For the sake of relevancy, the version of Docker and Docker Compose used as of now is 19.03.13 and 1.27.4 respectively.

## Build Images and Run Containers

Before executing docker commands, be sure Docker Desktop is already running either in background or you have the application window opened on your desktop somewhere. 

Now that Docker and Docker Compose is installed, git clone the repository and inside the newly created folder type `docker-compose up -d` to start the process of creating and running the project application.

Docker will create two containers for the application. One will serve as the database container, running the offical mysqlserver docker image, named *project-camellia_drupal_1*. The other container will build a custom version of the official docker drupal image, named *project-camellia_drupal_db_1*, and link the necessary scripts and files for cross-machine editing via docker's volume ability.

## Install Drupal within Container

You should be able to run the Docker Desktop application and view your running containers under the *Containers/Apps* tab on the left side.

Click on the *project-camellia* application dropdown to list all the containers availible.

Click on the *project-camellia_drupal_1* container and enter the command line interface by clicking on the [ >_ ] icon, either on the top right of docker desktop (after clicking the container) or to the right of the container name.

You are now inside of the interactive command line interface of the container. You can now execute commands as if you were in a typical machine.

Within the command line interface of the drupal container type:

`bash install.sh`

This will install drupal into the container and connect the mysqlserver container to the drupal container. 

## Managing Docker Containers

The modules folder within this repository is linked to the Drupal container that is created. Any changes made to said directory will live update within the drupal container and thus, the drupal site itself. The same behavior is done to the install.sh script which is used within *Install Drupal within Containers*.

### Relevant Docker Compose Commands

`docker-compose up`
: Builds and Runs all images specified within the local *docker-compose.yml* file.

`docker-compose down`
: Stops and Destroys all containers specified within local *docker-compose.yml* file.

`docker-compose stop`
: Stops all containers within local *docker-compose.yml* file.

`docker-compose build`
: Builds or Re-Builds all images within the specified *docker-compose.yml* file.

All commands can be found within the [Docker](https://docs.docker.com/) and [Docker Compose](https://docs.docker.com/compose/) Documentation.


