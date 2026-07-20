# Liste des taches projet Mobile Money

### V1 ###

## Base de donnees (ETU4027-ETU4090)

- [OK] Creer la table prefixes
- [OK] Creer la table types_operation
- [OK] Creer la table baremes_frais
- [OK] Creer la table clients
- [OK] Creer la table operations
- [OK] Creer la vue situation_gains
- [OK] Inserer les donnees de test

## Configuration

- [OK] Configurer la connexion a la base de donnees SQLite
- [OK] Configurer les routes de l'application
- [OK] Mettre en place le controleur de base


### Cote Operateur (ETU4027)

## Modeles

- [OK] Creer le modele PrefixeModel pour gerer la table prefixes
- [OK] Creer le modele TypeOperationModel pour gerer la table types_operation
- [OK] Creer le modele BaremeFraisModel pour gerer la table baremes_frais
- [OK] Creer le modele ClientModel pour gerer la table clients
- [OK] Creer le modele OperationModel pour gerer la table operations

## Controleurs 

- [OK] Creer AccueilController pour afficher la page d'accueil de l'operateur
- [OK] Creer PrefixeController pour lister, ajouter et supprimer des prefixes
- [OK] Creer BaremeController pour lister, ajouter et supprimer des baremes de frais
- [OK] Creer GainController pour afficher la situation des gains a partir de la vue SQL
- [OK] Creer ClientController pour afficher la liste des comptes clients

## Vues

- [OK] Creer la vue accueil.php pour la navigation principale de l'operateur
- [OK] Creer la vue operateur/prefixes.php pour la gestion des prefixes
- [OK] Creer la vue operateur/baremes.php pour la gestion des baremes de frais
- [OK] Creer la vue operateur/gains.php pour afficher le rapport des gains
- [OK] Creer la vue operateur/clients.php pour afficher la liste des clients


### Cote Client (ETU4090)

## Login (Cote Client)

- [OK] Créer une page d'auto-authentification pour le client.
- [OK] Si le client n'existe pas encore dans la base de donnée, il faut le créer.

## Solde (Cote Client)

- [OK] Affichage du navbars
- [OK] Afficher le numéro du client
- [OK] Afficher le solde du client

## Faire un trigger pour l'opération (Cote Client)

- [OK] Mettre les 3 conditions pour chaque type d'opérations

## Faire un dépôt (Cote Client)

- [OK] Affichage du navbars
- [OK] Formulaire d'ajout dépôt
- [OK] Excécution du trigger

## Faire un retrait (Cote Client)

- [OK] Affichage du navbars
- [OK] Formulaire d'ajout retrait
- [OK] Excécution du trigger

## Faire un transfert (Cote Client)

- [OK] Affichage du navbars
- [OK] Formulaire d'ajout transfert
- [OK] Excécution du trigger

## Voir historique (Cote Client)

- [OK] Affichage du navbars
- [OK] Join de tous les tables avec l'opérateur
- [OK] Affichage de l'historique

### Fonctionnalités Opérateur

- [OK] Ajout de la fonctionnalité "Modifier" pour les barèmes de frais (Création de la vue d'édition, méthodes dans le contrôleur et mise à jour des routes).


### V2 ###

### Design (cote operateur et cote client) (ETU4027-ETU4090)
- [OK] Intégration de Bootstrap 5.
- [OK] Création d'un CSS dans public/assets/css/style.css
- [OK] Création d'un layout global 'layout.php' pour le dashboard opérateur.
- [OK] Refonte complète des vues opérateur ('prefixes', 'baremes', 'gains', 'clients') pour utiliser le nouveau layout.
- [OK] Refonte de la page d'accueil ('accueil.php') avec un choix de profil (Client / Opérateur) sous forme de grandes cartes.
- [OK] Création d'un layout global 'layout.php' pour l'espace client.
- [OK] Refonte complète des vues client : (login, solde, depot, retrait, transfert, historique) avec le nouveau layout.


### Base de données et logique métier (Gains par Opérateur) (ETU4027)
- [OK] Création de la table 'operateurs' (Yas, Orange, Airtel avec leur pourcentage de gain).
- [OK] Modification de la table 'prefixes' pour lier chaque préfixe à un opérateur ('id_operateur').
- [OK] Modification de la vue SQL 'situation_gains' pour calculer le gain réel par opérateur ('montant * pourcentage / 100') au lieu de sommer les frais.
- [OK] Regroupement des gains par opérateur dans la vue SQL et affichage détaillé dans la vue 'gains.php' dans le dashboard opérateur.

### Nouvelles fonctionnalités (côté Client) (ETU4090)
- [OK] Option pour inclure les frais de retrait lors de l'envoi (transfert).
- [OK] Gérer l'absence de frais de retrait pour les transferts vers les autres opérateurs.
- [OK] Implémenter l'envoi multiple vers plusieurs numéros (diviser le montant pour chaque numéro).
- [OK] Restreindre l'envoi multiple uniquement vers des numéros du même opérateur.
