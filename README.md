<p align="center"><a href="https://extinctionrebellion.nl/" target="_blank"><img
width="200"
src="https://user-images.githubusercontent.com/15846595/83038003-c6157b80-a03c-11ea-9605-325b4990e7bd.png"
alt="XR logo"></a></p> <p align="center"><a
href="https://extinctionrebellion.nl/" target="_blank"><img
src="https://img.shields.io/badge/rebel-for%20life-success" alt="XR NL
website"></a></p> <p align="center">Website of Extinction Rebellion Netherlands:
<a href="https://extinctionrebellion.nl/"
target="_blank">https://extinctionrebellion.nl</a></p> 

## Purpose

We are developers, designers and content creators who have joined Extinction
Rebellion because we feel a moral duty to use our knowledge and skills to solve
the Climate and Ecological Emergency. This emergency is a present reality for
the families who are labelled climate refugees, the indigenous communities whose
land has been destroyed, and the countless species that are forced into
extinction every day. Governments have failed to act and are driving us towards
social and ecological collapse. We joined Extinction Rebellion because it is our
best and last hope to protect life on Earth.

We are working on the [website of Extinction Rebellion
Netherlands](https://extinctionrebellion.nl) because it is a crucial tool for
growing Extinction Rebellion and having a better chance at mitigating the worst
effects of the climate crisis. But we cannot do it alone; No matter who you are,
what skills you have or how much time you can dedicate, we need your help. In
the [contributing guidelines](/CONTRIBUTING.md) you can learn how you can
contribute to the project.

If you want to learn more about the project or have any questions, do not
hesitate to [contact us](/SUPPORT.md). 

## Requirements

- [Docker](https://www.docker.com/products/docker-desktop). If you use Linux,
  you'll also have to separately install
  [docker-compose](https://linuxhandbook.com/docker-compose-ubuntu/).
- [Node.js](https://nodejs.org/en/)

## Install

```sh
# create environment variables with required configurations
cp .env.example .env
# add wordpress plugins
curl -SL0 https://cloud.extinctionrebellion.nl/index.php/s/QCENwJwpbCoqoNB/download -o plugins.tar.gz && tar -xvf plugins.tar.gz -C web/app/plugins/ && rm plugins.tar.gz
cd web/app/themes/xrnl
# install npm packages
npm install
```

Lastly, follow the next step to run the website and then [pull the production
database](/docs/sync-production-data.md)

## Run

First, you must activate Docker. Then:

```sh
# start website
docker-compose up -d
# compile css files and enable hot reloading (from within web/app/themes/xrnl)
npm run watch 
```

The website should be active at `http://localhost:8000`

## Shutdown

```sh
docker-compose down
```

This way of shutting down the website is likely to cause less errors than
directly quitting Docker. 

## Install new plugins

If you want to install a new plugin
```sh
docker-compose exec composer require wpackagist-plugin/{{PLUGIN_NAME}}
```

If you want to update a plugin
```sh
docker-compose exec composer update wpackagist-plugin/{{PLUGIN_NAME}}
```

