<nav class="navbar navbar-default navbar-static-top">
  <div class="container edit-nav">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse in">
      <ul class="nav navbar-nav">
        <li><a class="a1 home" href="../index.php">Почетна</a></li>
        <li><a class="a1 about" href="about.php">За нас</a></li>
        <li><a class="a1 contact" href="contact.php">Контакт</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="a2 b1 login"><?php echo $user; ?></a></li>
        <li><a class="a2 b2 register" href="register.php"><?php echo $logout; ?></a></li>
      </ul>
    </div>
  </div>
</nav>

  <script type="text/javascript">
    if ($('.login').html() != 'Најави се'){
      $('.register').attr('href', 'logout.php');
      $('.login').attr('href', 'user.php?user='+ $('.login').html() +'');
    }
    else {
      $('.register').attr('href', 'register.php');
    }
  </script>