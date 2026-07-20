# Liste des taches projet Mobile Money

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

## Voit historique (Cote Client)

- [OK] Affichage du navbars
- [OK] Join de tous les tables avec l'opérateur
- [OK] Affichage de l'historique