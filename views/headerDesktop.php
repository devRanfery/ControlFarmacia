<header class="header-desktop">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="header-wrap">
        <!-- <form class="form-header" action="" method="POST">
                <input class="au-input au-input--xl" type="text" name="search"
                  placeholder="Search for datas &amp; reports..." />
                <button class="au-btn--submit" type="submit">
                  <i class="zmdi zmdi-search"></i>
                </button>
              </form> -->
        <div class="header-button">
          <div class="account-wrap">
            <div class="account-item clearfix js-item-menu">
              <div class="image">
                <img src="images/icon/avatar-ranfery.jpg" alt="Ranfery Alvarez" />
              </div>
              <div class="content">
                <a class="js-acc-btn" href="#"><?php echo $_SESSION['user'];?></a>
              </div>
              <div class="account-dropdown js-dropdown">
                <div class="info clearfix">
                  <div class="image">
                    <a href="#">
                      <img src="images/icon/avatar-ranfery.jpg" alt="Ranfery Alvarez" />
                    </a>
                  </div>
                  <div class="content">
                    <h5 class="name">
                      <a href="#"><?php echo $_SESSION['user'];?></a>
                    </h5>
                    <span class="email"><?php echo $_SESSION['rol'];?></span>
                  </div>
                </div>
                <div class="account-dropdown__footer">
                  <a href="../ajax/CerrarSesion.php">
                    <i class="zmdi zmdi-power"></i>Cerrar Sesion</a>
                  </>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>