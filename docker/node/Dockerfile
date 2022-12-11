FROM node:lts

ARG UID
USER $UID:$UID

WORKDIR /app
RUN chown -R $UID:$UID /app
