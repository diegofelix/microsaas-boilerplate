FROM node:21.6.1-alpine

RUN apk add bash
RUN npm install -g @vue/cli
RUN npm install -g @vue/cli-service-global
RUN npm install -g npm@10.4.0
RUN apk add dumb-init
RUN apk add --no-cache python3 py3-pip
RUN mkdir -p /var/www/
VOLUME [ "/var/www/" ]

COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh
# ENTRYPOINT ["/entrypoint.sh"]

USER node
WORKDIR /var/www/
