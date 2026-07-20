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

## A faire (Cote Client)

- [ ] Creer la page de connexion client avec un numero de telephone
- [ ] Afficher le solde du compte du client connecte
- [ ] Creer le formulaire pour permettre a un client de faire un depot
- [ ] Creer le formulaire pour faire un retrait et calculer automatiquement les frais
- [ ] Creer le formulaire pour faire un transfert vers un autre client et calculer les frais
- [ ] Creer la page pour afficher l'historique des operations du client connecte

## A faire (Securite et Validation)

- [ ] Mettre en place les sessions pour gerer la connexion du client
- [ ] Proteger les pages du client pour empecher l'acces sans connexion
- [ ] Creer la fonctionnalite de deconnexion pour le client
- [ ] Verifier que le numero de telephone utilise un prefixe valide lors de la connexion
- [ ] Valider que les montants des operations respectent les limites des baremes
- [ ] Afficher des messages d'erreur si le solde est insuffisant ou le numero introuvable

----