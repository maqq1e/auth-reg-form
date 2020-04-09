# PHP AUTH/REGISTER

 * [ReadMe in Russian](https://github.com/maqq1e/auth-reg-form/README_RU.md) - Русская версия документации

## Dependencies and framespace

 * [Docker](https://www.docker.com/) - Environments that support containerization

## Install

```
$ git clone https://github.com/maqq1e/auth-reg-form.git
$ cd auth-reg-form/
```
## Deploy

For deploy this web-application you need download and install [Docker](https://www.docker.com/). If you project directory position differs from "C://.." you need select all disks in Docker client.
![Docker settings](https://i.imgur.com/4wYAhsG.png)

### Command for deploy

**Firtly** you should make sure Docker is install.

```
$ docker ps
```

This command check all active ( and not ) containers and throw all list of that. If all is fine => go ahead.

**Secondly** you need build container ( this is not fast procedure )
```
$ docker-compose up --build -d
```

> This code you must initializate in root directory of project

**Thirdly** you need go to https://localhost/

> Dont use any port
