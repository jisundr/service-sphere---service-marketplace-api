FROM dpage/pgadmin4:7.6

LABEL author="Jayson De los Reyes"
LABEL description="pgAdmin Image for Service Sphere Local Development"
LABEL version="1.0.0"

COPY ./servers.json /pgadmin4/servers.json

EXPOSE 80