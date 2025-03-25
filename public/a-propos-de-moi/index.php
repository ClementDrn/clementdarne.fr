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

        <!-- Profile picture  -->
        <img id="profile-picture" src="/assets/img/me.jpg" height="100" witdth="100" alt="Ma photo"/>

        <!-- Carrer History -->
        <section id="history" class="narrow">
          <h2>Mon parcours</h2>
          <p>
            Même si mes études ont principalement eu lieu en <strong>France</strong>, j'ai eu la chance de 
            passer plus de 5 ans de ma scolarité en <strong>Martinique</strong> pour une partie de la maternelle 
            et de l'école primaire.<br/>

            Par la suite j'ai surmonté le <strong>Brevet au collège</strong> pour 
            ensuite affronter le <strong>lycée Jean-Paul Sartre</strong> à <strong>Bron</strong>.
            Cependant, un événement inattendu a chamboulé ma vie : je suis parti un an avec ma famille en <strong>Irlande</strong> pour mon 
            année de 1ère dans la <strong>Bishopstown Community School</strong> à <strong>Cork</strong>.<br/>

            Une fois les épreuves du <strong>BAC</strong> passées (ah non c'est vrai, confinement...), 
            je me suis attaqué à une formation de 2 ans dans l'enceinte de l'<strong>IUT Lyon 1</strong> : le <strong>DUT d'informatique</strong>. 
            Mais, de nouveau, ces 2 courtes années ne se sont pas déroulées dans péripétie. Effectivement, je suis parti au <strong>Québec</strong>. 
            Ainsi, j'ai passé le 4e semestre du DUT au <strong>Cégep de Matane</strong> et j'ai effectué mone stage au 
            <strong><a href="https://cdrin.com" class="underline">Centre de développement et de recherche en intelligence numérique (CDRIN)</a></strong>.<br/>

            N'étant toujours pas épuisé d'apprendre, je vais maintenant aller en école d'ingénieur. Pour être plus précis, j'entame ma 1re année 
            dans le cursus ingénieur de l'<strong><a href="https://ensimag.grenoble-inp.fr/" class="underline">École nationale supérieure d'informatique et de mathématiques appliquées (Ensimag)</a></strong>
          </p>
        </section>

        <!-- Skills -->
        <section id="skills">

          <?php
            function displayBubble($bubbleFile, $id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin)
            {
              echo ("
          <div id='$id' style='width: $bubbleSize; height: $bubbleSize; margin: $margin;' class='bubbled-img'>
            <img class='bubble' title='$iconName' src='/assets/img/$bubbleFile'/>
            <img style='width: $iconWidth;' class='icon' title='$iconName' src='/assets/img/languages/$iconFile'/>
          </div>
              ");
            }

            function displayBlueBubble($id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin = "0")
            {
              displayBubble("bubble 100x100.svg", $id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin);
            }

            function displayPurpleBubble($id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin = "0")
            {
              displayBubble("bubble purple 100x100.svg", $id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin);
            }

            function displayTurquoiseBubble($id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin = "0")
            {
              displayBubble("bubble turquoise 100x100.svg", $id, $bubbleSize, $iconName, $iconFile, $iconWidth, $margin);
            }
          ?>

          <h2>Mes compétences informatiques</h2>

          <!-- Software -->
          <div class="bubbles">
            <?php
              displayTurquoiseBubble("python", "5rem", "Python", "python 110x110.svg", "55%", "4rem 2rem 0 1rem");
              displayPurpleBubble("bubble7", "2rem", "Bubble", "../transparent_pixel.png", "0", "8rem 0 0");
              displayBlueBubble("cpp", "7rem", "C++", "cpp 306x344.svg", "55%", "1rem 1rem 1rem 0");
              displayBlueBubble("c", "5rem", "C", "c 380x420.svg", "55%", "7rem -1rem 1rem 0");
              displayTurquoiseBubble("java", "5rem", "Java", "java 234x428.svg", "35%", "1.5rem 2rem 0 .5rem");
              displayBlueBubble("dotnet", "4.5rem", ".NET", "dotnet 456x456.svg", "45%", "6rem 0 2rem 0");
              displayPurpleBubble("avalonia", "4.5rem", "Avalonia", "avalonia 700x700.svg", "100%", "0 0 0 -1rem");
              displayBlueBubble("csharp", "6rem", "C#", "csharp 64x64.svg", "55%", "3rem 0 0 -1rem");
            ?>
          </div>



          <!-- Video games -->
          <div class="bubbles">
            <?php
              displayBlueBubble("unity", "4.5rem", "Unity", "unity 367x186.svg", "95%", ".5rem 3rem 2rem 1rem");
              displayBlueBubble("bubble0", "2rem", "Bubble", "../transparent_pixel.png", "0");
              displayPurpleBubble("unreal-engine", "4rem", "Unreal Engine", "unreal engine 1002x1092.svg", "55%", "3rem 1rem 0");
              displayTurquoiseBubble("opengl", "4.5rem", "OpenGL", "opengl 1086x450.svg", "80%", "1rem");
            ?>
          </div>
          
          <!-- Web -->
          <div class="bubbles">
            <?php
              displayTurquoiseBubble("html", "6.2rem", "HTML", "html 512x512.svg", "55%", "1rem 0 0 1rem");
              displayBlueBubble("css", "6.2rem", "CSS", "css 363x512.svg", "40%", "7rem 3rem 0 -1rem");
              displayTurquoiseBubble("bubble3", "1.5rem", "Bubble", "../transparent_pixel.png", "0", "1rem 2rem 0 0");
              displayBlueBubble("javascript", "5rem", "Javascript", "javascript 630x630.svg", "45%", "3rem 1rem");
              displayTurquoiseBubble("php", "6rem", "PHP", "php 711x384.svg", "65%", "1rem 0 1rem 1rem");
              displayTurquoiseBubble("symfony", "5.5rem", "Synfony", "symfony 235x66.svg", "80%", "5rem 1rem 1rem 0");
              displayBlueBubble("bubble1", "3rem", "Bubble", "../transparent_pixel.png", "0");
              displayBlueBubble("bubble2", "1.5rem", "Bubble", "../transparent_pixel.png", "0", "0 1rem");
            ?>
          </div>
          
          <!-- Mobile -->
          <div class="bubbles">
            <?php
              displayTurquoiseBubble("bubble4", "2rem", "Bubble", "../transparent_pixel.png", "0", "1rem 1rem 0 3rem");
              displayPurpleBubble("react-native", "5rem", "React Native", "react native 23x20.svg", "55%", "0 0 0 3rem");
              displayBlueBubble("bubble5", "3rem", "Bubble", "../transparent_pixel.png", "0", "-1rem 0 0 2rem");
              displayBlueBubble("bubble6", "2rem", "Bubble", "../transparent_pixel.png", "0", "2rem 0rem 0 .5rem");
            ?>
          </div>
          
          <!-- Database -->
          <div class="bubbles">
            <?php
              displayPurpleBubble("mysql", "6rem", "MySQL", "mysql 489x253.svg", "70%", "3rem 2rem 0 0");
              displayBlueBubble("mariadb", "6rem", "MariaDB", "mariadb 416x118.svg", "75%", ".5rem 3rem 0 0");
              displayTurquoiseBubble("oraclesql", "6.2rem", "Oracle SQL developer", "oracle sql developer 295x335.svg", "45%", "5rem 1rem 0");
              displayBlueBubble("postgresql", "5.5rem", "PostgreSQL", "postgresql 540x557.svg", "50%", "-1rem 0 0 0");
            ?>
          </div>

        </section>

        <section id="hobbies" class="narrow">
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
        </section>

        <section id="personnality" class="narrow">
          <h2>Ma personnalité</h2>
          <p>
            J'estime être <strong>honnête</strong> et <strong>bienveillant</strong> envers autrui. 

            Aussi, je suis réputé comme étant <strong>créatif</strong>, avec une bonne <strong>mémoire</strong> 
            et un esprit <strong>logique</strong>.<br/>

            Je considère être facilement <strong>passioné</strong> dans les projets que j'entreprends.
            Néanmoins, étant <strong>minutieux</strong>, j'aime aussi faire attention aux détails 
            lorsque je réalise une tâche, ce qui a tendance à me donner une certaine 
            <strong>lenteur</strong> et à rendre ma <strong>prise de décision</strong> plus difficile.<br/>

            J'aime <strong>découvrir</strong> et <strong>apprendre</strong> de 
            nouvelles choses, ou encore <strong>résoudre</strong> des problèmes complexes.
            Mais également <strong>partager</strong> des connaissances et <strong>enseigner</strong> aux autres.<br/>

            Finalement, <strong>protéger la planète</strong> pour un avenir durable est à mes yeux une valeur inestimable.
          </p>
        </section>

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
