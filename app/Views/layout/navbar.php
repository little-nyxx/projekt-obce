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
              <?php foreach ($okresCely as $navitem):?>
                <li class="nav-link"><?= anchor("kraj/".$navitem->kraj, $navitem->nazev); ?></li>
                <h1>&nbsp;</h1>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </nav>