<!-- Création base de donnée -->
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

<!-- Pour y entrer -->
cd C:\xampp\mysql\bin
.\mysql -u root -p
USE `4027_4090_S4`;

psql -U postgres
\c "4027_4090_S4"

sqlite3 writable/database/4027_4090_S4.db