FROM node:latest

RUN npm install -g laravel-echo-server

EXPOSE 6001

#WORKDIR ../app
WORKDIR /var/www

ADD docker/websocket-entrypoint.sh /websocket-entrypoint.sh
RUN chmod 755 /*.sh
CMD ["docker/websocket-entrypoint.sh"]
