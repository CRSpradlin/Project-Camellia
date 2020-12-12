## Installation of Symfony Yaml Parser
composer.json, composer.lock and vendor are created automatically

To create these files:
 - Be within your drupal container/server
 - Navigate to this directory
 - Run `composer init`
 - Navigate through interactively installing symfony/yaml

## Enable mysqli PHP Extension
Within the docker container, this is already handled. Within a production environment, this will need to be handled by the system administrator.

//TODO: update main README for installation information for enabling mysqli and possibly symfony?