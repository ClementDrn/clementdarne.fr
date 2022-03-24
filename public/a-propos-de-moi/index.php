<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Clément Darne">
    <title>À propos de moi · Clément Darne</title>

    <link rel="canonical" href="">

    <link href="/assets/css/core.css" rel="stylesheet">
    <link href="/assets/css/about.css" rel="stylesheet">
  </head>


  <body class="d-flex h-100">
    

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <!-- Navigation bar -->
  <header class="mb-auto text-center">
    <div class="navigation-bar">
      <a href="../" title="Accueil">
        <h3 class="float-md-start mb-0">Clément Darne</h3>
      </a>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link" href="/">Accueil</a>
        <a class="nav-link" href="/projets/">Projets</a>
        <a class="nav-link active" aria-current="page" href="/about/">À propos de moi</a>
        <a class="nav-link" href="/contact/">Contact</a>
      </nav>
    </div>
  </header>

  <main class="text-center">

    <!-- Introduction -->
    <section class="py-5 text-center container">
      <div class="row pt-5 pb-4">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light mb-3">À propos de moi</h1>
          <p class="lead">
            Je suis un étudiant en informatique de

            <?php
              $age = date_diff(new DateTime(date('d-m-Y')), new DateTime('24-03-2002'));
              echo $age->y.' ans, '.$age->m.' mois et '.$age->d.' jours.';
            ?>
            
            J'ai la chance d'étudier un domaine
            qui me passionne mais bien sûr j'apprécie plein d'autres sujets, pas de jaloux.
          </p>
        </div>
      </div>
    </section>

      <div id="grid" class="ligne">

        <div id="col-1" class="colonne flex-3">

          <div id="row-1" class="ligne flex-2">

            <!-- Hobbies -->
            <div id="cell-1" class="cellule flex-1">
              <h2>Mes passions</h2>
              <p>
                De manière générale je suis intéressé par presque tout sujet <strong>scientifique</strong>, notamment 
                l'<strong>informatique</strong>. C'est pourquoi la majorité de mes projets sont dans ce domaine.<br/>
                Aussi j'affectionne les <strong>jeux vidéos</strong> avec une préférence pour les jeux d'aventure 
                comme <strong>Zelda</strong>. Mais également d'autres formes d'art comme la musique. 
                Car oui, je joue du <strong>violon</strong> depuis un moment maintenant.<br/>
                Du côté littérature, en ce moment je prends plaisir à parcourir la <strong>saga du Sorceleur</strong>.<br/>
                Finalement, j'apprécie également me dépenser en faisant du <strong>sport</strong>. J'ai pratiqué
                pendant plusieurs années du tennis et du basket.
              </p>
            </div>

            <!-- Career -->
            <div id="cell-2" class="cellule flex-1">
              <h2>Mon parcours</h2>
              <p>
                Même si mes études ont principalement eu lieu en <strong>France</strong>, j'ai eu la chance de 
                passer plus de 5 ans de ma scolarité en <strong>Martinique</strong> pour une partie de la maternelle 
                et de l'école primaire.<br/>
                Par la suite j'ai surmonté le <strong>Brevet au collège</strong> pour 
                ensuite affronter le <strong>lycée Jean-Paul Sartre</strong> à <strong>Bron</strong>.
                Mais en plein milieu, je suis parti un an avec ma famille en <strong>Irlande</strong> pour mon 
                année de 1ère dans la <strong>Bishopstown Community School</strong> à <strong>Cork</strong>.<br/>
                Une fois les épreuves du <strong>BAC</strong> passées (ah non c'est vrai, confinement...), 
                je me suis attaqué au <strong>DUT d'Informatique</strong> à l'<strong>IUT Lyon 1</strong>. 
                Mais je n'en suis toujours pas revenu, à suivre...
              </p>
            </div>
          </div>
          <div id="row-2" class="ligne flex-1">

            <!-- Personnality -->
            <div id="cell-3" class="cellule flex-2">
              <h2>Ma personnalité</h2>
              <p>
                Je suis souvent <strong>honnête</strong>, <strong>à l'écoute</strong> et <strong>bienveillant</strong>. 

                Je suis réputé comme étant <strong>créatif</strong>, avec une bonne <strong>mémoire</strong> 
                et un esprit <strong>logique</strong>.<br/>
                
                Néanmoins, étant <strong>minutieux</strong>, j'aime aussi faire attention aux détails 
                lorsque je réalise une tâche, ce qui a tendance à me donner une certaine 
                <strong>lenteur</strong> et à rendre ma <strong>prise de décision</strong> plus difficile.<br/>

                J'aime <strong>découvrir</strong> et <strong>apprendre</strong> de 
                nouvelles choses, ou encore <strong>résoudre</strong> des problèmes complexes.
                Mais également <strong>partager</strong> des connaissances et <strong>enseigner</strong> aux autres.<br/>
                
                Je suis un défenseur de la <strong>nature</strong> et d'ailleurs j'adore 
                la montagne.
                
                <!-- Au fait je dis <span class="underline">la</span> Covid. -->
              </p>
            </div>
          </div>

        </div>

        <div id="col-2" class="colonne flex-1">

          <!-- Profile picture  -->
          <img id="profile-picture" src="./IMG_3452_sm_square.JPG" height="100" witdth="100" alt="Ma photo"/>

          <!-- Skills -->
          <div id="cell-4" class="cellule flex-1">
            <h2>Mes compétences</h2>
            <ul>
              <li>C/C++</li>
              <li>Java</li>
              <li>Python</li>
              <li>HTML/CSS</li>
              <li>Javascript</li>
              <li>PHP</li>
              <li>SQL</li>
              <li>React Native</li>
              <li>Violon</li>
            </ul>
          </div>

        </div>

      </div>


  </main>

  <footer class="mt-auto text-black-50">
  </footer>

</div>


  </body>
</html>
