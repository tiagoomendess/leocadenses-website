echo "#########################"
echo "#   Starting deploy!"   #"
echo "#########################"

echo "\n--- Taking application down ------------"
php artisan down

echo "\n--- Get Code -----------"
git reset --hard
git pull

echo "\n--- Clear Cache -----------"
php artisan cache:clear

composer install

echo "\n--- Running migrations ------------"
php artisan migrate --env=production

npm install

npm run production

echo "\n--- Dealing with permissions ------------"
chmod 755 -R ../leocadenses/
chown www-data ../leocadenses/ -R

echo "\n--- Application Up! ------------"
php artisan up

echo "#################"
echo "#   Finished!   #"
echo "#################"
echo " "
