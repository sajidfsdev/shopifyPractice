<?php
  include(dirname(__DIR__).'/constants.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Comapny</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo constants::$server ?>">Animations <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="/App/view/checkout.php">Checkout</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href='<?php echo constants::$server."/view/main.php" ?>'>Home</a>
      </li>
     
    </ul>
  </div>
</nav>