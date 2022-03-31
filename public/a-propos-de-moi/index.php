<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Clément Darne">
    <title>À propos de moi · Clément Darne</title>

    <link rel="canonical" href="https://clementdarne.fr/a-propos-de-moi">

    <link href="/assets/css/core.css" rel="stylesheet">
    <link href="/assets/css/about.css" rel="stylesheet">
  </head>


  <body>
    
    <!-- Navigation bar -->
    <header>
      <div class="navigation-bar">
        <h3 class="nav-title">
          <a href="/" title="Accueil">Clément Darne</a>
        </h3>
        <nav>
          <a class="nav-link" href="/">Accueil</a>
          <a class="nav-link" href="/projets/">Projets</a>
          <a class="nav-link active" aria-current="page" href="/a-propos-de-moi/">À propos de moi</a>
          <a class="nav-link" href="/contact/">Contact</a>
        </nav>
      </div>
    </header>

    <div class="container">

      <main class="text-center">

        <!-- Introduction -->
        <section class="introduction">
          <h1>À propos de moi</h1>
          <p class="lead">
          Je suis un étudiant en informatique de

          <?php
            $age = date_diff(new DateTime(date('d-m-Y')), new DateTime('24-03-2002'));
            echo $age->y.' ans, '.$age->m.' mois et '.$age->d.($age->d > 1 ? ' jours.' : ' jour.');
          ?>

          J'ai la chance d'étudier un domaine
          qui me passionne mais bien sûr j'apprécie plein d'autres sujets, pas de jaloux.
          </p>
        </section>

        <div id="grid" class="row">

          <div id="col-1" class="column flex-3">

            <div id="row-1" class="row flex-2">

              <!-- Hobbies -->
              <div id="cell-1" class="cell flex-1">
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
              <div id="cell-2" class="cell flex-1">
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
            <div id="row-2" class="row flex-1">

              <!-- Personnality -->
              <div id="cell-3" class="cell flex-2">
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

          <div id="col-2" class="column flex-1">

            <!-- Profile picture  -->
            <img id="profile-picture" src="/assets/img/me.jpg" height="100" witdth="100" alt="Ma photo"/>

            <!-- Skills -->
            <div id="cell-4" class="cell flex-1">
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

      <footer>
        <p class="license">
          Ce site web est mis à disposition selon les termes de la
          <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">
            Licence Creative Commons Attribution 4.0 International
          </a>. 
        </p>
      </footer>

    </div>


  </body>

</html>
