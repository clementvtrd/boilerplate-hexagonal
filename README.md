[![PHP Code Quality](https://github.com/clementvtrd/boilerplate-hexagonal/actions/workflows/api.yaml/badge.svg?branch=develop)](https://github.com/clementvtrd/boilerplate-hexagonal/actions/workflows/api.yaml)

# Hexagonal boilerplate

## Hexagonal architecture

The hexagonal architecture is a software architectural pattern that promotes a clear separation of concerns and decoupling of components. It emphasizes the idea of organizing an application into concentric layers, with the core business logic at the center, surrounded by layers representing external interfaces, such as UI, databases, and external services.

In the hexagonal architecture, the core business logic is independent of the external infrastructure and frameworks. It is encapsulated within the innermost layer and is unaware of how the application interacts with external systems. Instead, the external systems are abstracted through interfaces called "ports." Adapters are responsible for implementing these ports and bridging the gap between the core business logic and the external systems.

This architecture enables better testability, maintainability, and flexibility. It allows for easy swapping of external components, as long as they adhere to the defined ports' interfaces. Changes in the external systems do not impact the core business logic, making the application more resilient to modifications and evolutions.

Overall, the hexagonal architecture promotes a modular, clean, and adaptable design by separating concerns and dependencies, leading to a more robust and maintainable software system.

## Code coverage

### Pest

The coverage of the code is done with [Pest](https://pestphp.com/). Pest is a testing framework with a focus on simplicity, meticulously designed to bring back the joy of testing in PHP.

It ensures the test covering (with at least 80%) and type covering (with 100% type safety) as setted in [API Workflow](/.github/workflows/api.yaml).

## Stack

This boilerplate is built with Symfony for learning purpose. You can replace each part at your convenience.

We will use Docker to make a development environment with 5 services:

- Traefik: as a reverse proxy
- Nginx + PHP: serves the Symfony API
- MySQL: to store our data
- RabbitMQ: messaging queue system (in pair with Symfony Messenger)

## Installation

### Docker

This boilerplate was built around with [Docker Desktop](https://www.docker.com/products/docker-desktop/) and tested with [Orbstack](https://orbstack.dev) (which can replace Docker Desktop on MacOS).

### Taskfile

Rather than using GNU Make, fancy commands shortcuts are writen with [Taskfile](https://taskfile.dev/). You can install it via their website, they also provide a convenient script to install it on Linux based system:

#### Linux

```sh
sudo sh -c "$(curl --location https://taskfile.dev/install.sh)" -- -d -b /usr/local/bin
task
```

#### MacOS

```sh
brew install go-task
task
```

#### Windows

```sh
winget install Task.Task # you may need to restart your session
task
```

### Clean the project

After forking the project, you can clean the project from existing entity, migration, etc. by removing all the files
with the following comment: `TODO: remove this file after forking the project`.

## Commands

| Task     | Description                                               |
|----------|-----------------------------------------------------------|
| start    | Start the Docker containers detached                      |
| stop     | Stop the Docker containers                                |
| install  | Build and pull images, setup SSL and install dependencies |
| symfony  | Shortcut to interact with Symfony CLI                     |
| composer | Shortcut to run Composer commands                         |
| console  | Shortcut to interact with bin/console script              |
| phpstan  | Shortcut to run PHP Stan                                  |
| deptrac  | Shortcut to run Deptrac                                   |
| cs-fixer | Shortcut to run PHP CS Fixer                              |
| rector   | Shortcut to run Rector                                    |
| pest     | Shortcut to run Pest                                  |

## URLs

- [Symfony API](https://api.app.localhost)
- [Traefik dashboard](https://traefik.app.localhost)
- [Rabbit MQ monitor](https://rabbitmq.app.localhost)
