cd C:\xampp\mysql\bin
.\mysql -u root -p
CREATE DATABASE `4027_4090_S4`
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
SHOW DATABASES;

psql -U postgres
CREATE DATABASE "4027_4090_S4";
\l

mkdir -p writable/database
touch writable/database/4027_4090_S4.db
mkdir writable\database
<!-- Ne pas excécuter -->
New-Item writable\database\4027_4090_S4.db -ItemType File
php spark db:create sqlite

php spark migrate
php spark migrate --group postgres
php spark migrate --group sqlite