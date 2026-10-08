FROM php:8.2-cli

WORKDIR /app

# Copy source code
COPY src/ /app/

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/app"]
