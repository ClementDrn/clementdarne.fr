L'implémentation graphique de l'algorithme de recherche du plus court chemin A* utilise la librairie SFML dans le langage C++. On peut y positionner un point de départ, un point d'arrivée et des obstacles. A chaque modification, le chemin le plus court pour aller du départ à l'arrivée est calculé et affiché.

J'ai récemment mis à jour ce projet dont la preière version datait de 2020. La v2 de 2022 comprend plusieurs optimisations et correctifs. C'est cette dernière version qui peut être trouvée sur GitHub. 

## Choix technologiques

Les technologies qui ont été utilisées sont le **C++** et mon fork de la **librairie SFML**. 

J'ai choisi le C++ car c'est un langage que je connais et apprécie. De plus, lorsqu'il s'agit d'optimiser l'implémentation d'un algorithme, le **contrôle offert par le C++** est plus qu'avantageux.

Du côté de la **librairie graphique**, plusieurs choix d'offraient à moi lorsqu'il s'agit du C++. Lors de mes recherches concernant une librairie graphique C++ qui ne comprend pas forcément de composants pour l'interface utilisateur, je suis tombé sur la **SDL** et la **SFML**. Comme la librairie SFML me parraissait plus complète, c'est celle-ci que j'ai choisie.
