<p align="center"><img width="294" height="69" src="/art/logo.svg" alt="Logo Fly"></p>


## Introduction

Fly is a Laravel applications deployment library arming you with a simple but efficient means to ship code from dev to production. 
Fly is inspired by Sail and as such gives you all the core features of Sail for local development.
Other than Docker, no software or libraries are required to be installed on your local computer before using Fly. Fly's simple CLI means you can start building your Laravel application without any previous Docker experience.

#### Inspiration

Fly is inspired [Sail](https://github.com/laravel/sail) and derived from [Vessel](https://github.com/shipping-docker/vessel) by [Chris Fidao](https://github.com/fideloper). If you're looking for a thorough introduction to Docker, check out Chris' course: [Shipping Docker](https://serversforhackers.com/shipping-docker).

## Official Documentation

Coming soon...

## Confiure A Shell Alias
To make sure the `fly` command is always available, you may add this to your shell profile file in your home directory, such as ~/.zshrc or ~/.bashrc, and then restart your shell.
```
alias fly='sh $([ -f fly ] && echo fly || echo vendor/bin/fly)'
# Refresh your profile
source ~/.zshrc or source ~/.bashrc
```

## Commands
```
# deploy app to a VPS
fly to:vps

# run app on a VPS
fly up:vps
```

## License

Fly is open-sourced software licensed under the [MIT license](LICENSE.md).
