echo "USER=$(id -u)" > .env
echo "UID=$(id -u)" >> .env

docker-compose build
docker-compose up -d

docker run --rm --interactive --tty \
  --volume ${PWD}/src:/app \
  --user $(id -u):$(id -g) \
  composer install --no-interaction --prefer-dist

cp src/.env.deploy src/.env
docker exec -it test_task_app bash -c "php artisan view:cache && php artisan route:cache && php artisan config:cache && php artisan migrate"