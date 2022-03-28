## Présentation

Au fur et à mesure des mes projets, je venais à **réutiliser des anciens morceaux de code**. C'est pourquoi j'ai décidé de regrouper plusieurs classes utilitaires dans une même librairie.

SEL a commencé avec seulement quelques fichiers utilitaires de petite taille, puis s'y sont ajoutés des classes sur les **threads**, les **vecteurs**, les **nombres aléatoires** ou même les **matrices**.

Comme son nom l'indique, cette librairie a pour but d'être **facile d'usage**. Pour cela, elle sera **documentée** tout au long des ajouts de nouvelles fonctionnalitées et utilisera uniquement des fichiers d'entête. 

## Choix technologiques

### Les fichiers d'entête

L'utilisation exclusive des **fichiers d'entête** sans fichiers sources vise à **faciliter l'usage** de la librairie par les développeurs. De cette façon, ils n'auront pas à la compiler mais juste à l'inclure depuis leurs fichiers source pour l'utiliser. Ce choix présente toutefois un désavantage conparé à l'utilisation de fichiers sources : comme tout se trouve dans les fichiers d'entête, plus de texte devra être copié au niveau des *includes*, ce qui peut **ralentir la compilation** du code.

### Optimisations

Je prévois d'utiliser les fonctions *SSE intrinsics* ([doc Intel](https://www.intel.com/content/www/us/en/docs/intrinsics-guide/index.html)) pour grandement **optimiser les opérations** effectuées sur les vecteurs et matrices de SEL.

De plus, j'ai choisi d'utiliser, pour les matrices notamment, des algorithmes optimisés en termes d'**accès à la mémoire** plutôt que d'implémenter les opérations de manières naïves et scolaire.
