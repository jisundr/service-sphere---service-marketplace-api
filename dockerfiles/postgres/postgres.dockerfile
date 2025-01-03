FROM postgres:15.4-alpine

LABEL author="Jayson De los Reyes"
LABEL description="Postgres Image for Service Sphere Local Development"
LABEL version="1.0.0"

COPY /docker-entrypoint-initdb.d/ /docker-entrypoint-initdb.d/