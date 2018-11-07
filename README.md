# Symfony Blog with Auth0, React, and TailwindCSS
Blog application made with Symfony 4, Auth0, React and TailwindCSS.

## Installation
```sh
cp .env.dist .env
```

- Add Auth0 keys to .env
- Add Doctrine database connection

```sh
make osx-local
yarn install
```

To build React Frontend:
```sh
yarn watch # development
or
yarn build # production
```

Visit: `symfony-blog.ampdev.co`
