1) créer la base de données

2)mettre en place les fichiers de l'architecture MVC POO, avec le fichier Database(mettre les bonnes infos de connexion pour PDO), les fichiers de Models.

Mettre en place l'autoloader pour les controllers et les models

/***BACKOFFICE***/
3) 
	3-1)Nous allons commencer par la back office, faire en sorte que le lien index.php?page=admin affiche le formulaire de connexion à l'espace administrateur:
	- une vue admin.phml qui contient le formulaire de connexion
	- un controller AdminController.php avec une méthode display() -> cette méthode qui inclut la vue
	
	3-2) Permettre la connexion à l'espace admin:
	- créer un compte admin en bdd avec mot de passe crypté
	- rajouter une méthode dans le controller, qui gère la connexion (va vérifier si les infos correspondent à ce qu'il y a en bdd)
	- une fois connecté, l'administrateur arrive sur son tableau de bord
	- 
/***Tableau de bord***/
Infos:
- nom et prénom avec un bonjour
- nombre de réservations en attente BONUS
- nombre plats en bdd BONUS

Menu-nav:

- Gestions des catégories de plats
- Gestions des plats
- Gestion des menus
- Gestion du slider
- Page d'accueil
- APRES
- Gestion des réservations

- 
- BONUS
- Gestion des horaires
- Coordonnées
- 

COURS htaccess

/***Page d'accueil***/
4) Mettre en place la page d'accueil en MVC, vous l'avez faite avec Anne
- le layout Front à créer
- le fichier accueil.phtml contiendra le code propre à la page d'accueil
- mettre le fichier css au bon endroit, corriger le lien vers ce fichier.
- Vérifier que cette page d'accueil fonctionne en MVC
- 

/***Le texte en page d'accueil***/

COURS $_FILES

5-1)Côté Back
- Lorsqu'on clique sur "Page d'accueil" dans le menu, on arrive sur un formulaire pré rempli avec les informations de la page d'accueil : le titre, l'image, le texte  et un bouton "Modifier"
- Mettre en service ce formulaire


5-2)Côté Front : sur la page d'accueil , faire en sorte que ce soit les informationsen base de données qui soient affichées

/***Les différents crud***/

6) Répartissez vous le travail: 
Chacun s'occupe d'une partie côté back office:
- les catégories de plats
- le slider
- les horaires
- 
A chaque fois, on arrive sur un tableau nous affichant ce qui existe et dessus un bouton pour ajouter un nouveau. A côté de chaque existant, la possibilité de le modifier ou de le supprimer.