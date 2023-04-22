FROM node:16.20-alpine3.17

RUN apk add --no-cache \
    python3=~3.10 \
    make=~4.3-r1 \
    gcc=~12.2 \
    g++=~12.2

WORKDIR /opt/app
USER 1000:1000
