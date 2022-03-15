Cette application permet de générer des sudokus vierges. Une utilisation typique est d'en générer un, le recopier sur feuille et essayer de le compléter, puis une fois fini l'application peut le résoudre pour montrer la solution.

L'application en est actuellement à sa deuxième version majeure dans laquelle toute l'architecture a été repensée et le code optimisé. De plus, cerise sur le gâteau, alors qu'avant l'utilisateur devait appuyer sur certaines touches du clavier pour générer un sudoku, ce processus est maintenant facilité grâce à une interface graphique réalisée grâce à Dear ImGui.

## Choix technologiques

Tout d'abord, le langage utilisé est le C++. Je l'avais choisi car, premièrement c'est l'un des seul que je connaissais lorsque j'avais initié le projet, mais principalement car je l'ai toujours grandement apprécié.

Ensuite, concernant les librairies graphiques, celles utilisées dans le cadre de ce projet sont la [SFML](https://github.com/SFML/SFML) et [Dear ImGui](https://github.com/ocornut/imgui). 

SFML est une librarie multimédia très complète qui m'a permis ici d'afficher la grille du sudoku avec ses chiffres sur une fenêtre. De plus, elle utilise des notions du C++ comme la programmation orientée objet contrairement à la SDL (une autre librarie graphique) par exemple. 

De son côté, ImGui est une librairie très populaire qui permet de gérer tout ce qui est interface graphique. Je l'avais utilisée par le passé et ayant été extrèmement satisfait, elle fut mon choix numéro un pour ce projet.
