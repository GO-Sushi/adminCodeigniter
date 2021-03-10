


<div id="main">
      <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Cards Extended</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Cards</a>
                  </li>
                  <li class="breadcrumb-item active">Cards Extended
                  </li>
                </ol>
              </div>
              <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Settings</span><i class="material-icons right">arrow_drop_down</i></a>
                <ul class="dropdown-content" id="dropdown1" tabindex="0">
                  <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                  <li class="divider" tabindex="-1"></li>
                  <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <!--Gradient Card-->
<div id="cards-extended">
  <div class="card">
    <div class="card-content">
      <h4 class="card-title">Gradient Card & Gradient Card With Analytics</h4>
      <p>
        Here is the gradient card with flat image for all gradient classes please check
        <a href="css-color.html" target="_blank"> css-color.html</a>.
      </p>
                
      
      <div class="row">
      <?php
    foreach($tabFilms as $film)
      {
        ?>
        <div class="col s12 m3">
          <div class="card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3">
            <div class="card-content center">
              <img src="../../../image/validate.png" alt="images" class="width-50" />

              <h6 class="white-text lighten-4">
              <a href="<?php echo base_url('/home/index/realisateur/'.$film['id_realisateur'])?>"
               class="invoice-action-view mr-4"><?php echo $film['titre']; ?></p> </a></h6>

              <p  class="white-text lighten-4"> 
              <a href="<?php echo base_url('/home/index/genre/'.$film['genre'])?>"
               class="invoice-action-view mr-4"><?php echo $film['genre']; ?></p> </a>

               <p  class="white-text lighten-4"> 
              <a href="<?php echo base_url('/home/index/pays/'.$film['code_pays'])?>"
               class="invoice-action-view mr-4"><?php echo $film['code_pays']; ?></p> </a>
              
            </div>
          </div>
        </div>
        <?php  } ?>
      </div>
                
      
    </div>
  </div>

  <div class="divider mt-2"></div>