FROM node:20.2.0-alpine3.17 AS base

RUN apk add --no-cache \
  python3=~3.10 \
  make=~4.3-r1 \
  gcc=~12.2 \
  g++=~12.2

WORKDIR /app

FROM base AS dev

ENV NODE_ENV=development

COPY package.json yarn.lock /app/

CMD ["yarn", "dev"]

FROM base AS release

ENV NODE_ENV=production

COPY . /app/

RUN yarn install --pure-lockfile && yarn build

USER 1000:1000

CMD ["yarn", "start"]
