<?php $navbar = ['class' => 'nav-link']; ?>
<?php $navbarob = ['class' => 'navbar-brand']; ?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand">Zlínský kraj</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <?php
                $nav = array(
                    'class' => 'nav-link'
                );
              ?>
              <?php foreach ($kraj as $navitem):?>
                <link><?= anchor("kraj/".$navitem->kod, $navitem->nazev, ['class' => 'btn btn-primary']); ?></link>
                <h1>&nbsp;</h1>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </nav>