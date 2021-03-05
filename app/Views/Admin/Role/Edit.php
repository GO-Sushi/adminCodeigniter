<h1> <?php echo $page_title; ?> </h1> 

<div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                      
                        <!-- create invoice button-->
                        <div class="invoice-create-btn">
                            <a href="app-invoice-add.html" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s1">
                                <i class="material-icons">add</i>
                                <span class="hide-on-small-only">Create Role</span>
                            </a>
                        </div>
                        <!--  -->
                        <div class="row">
    <form action="<?php echo base_url("admin/role/edit/" . $role['id_acteur']); ?>" method="POST" class="col s12">
        <!--je cache mon champ pour dire que je suis dans le mode modifier  -->
                    <!--     je met a jour   -->   
            <?php if(isset($role['id_acteur'])){ ?>           
        <input name="save" value="update" type="hidden">
            <?php }else{ ?>
                    <!-- je creer un nouvel enregistrement -->
        <input name="save" value="create" type="hidden">
             <?php } ?>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" name="nom" value="<?php echo $role['id_film']; ?>"   type="text" class="validate">
          <label for="first_name">Nom</label>
        </div>
        <div class="input-field col s6">
          <input  name="prenom" value="<?php echo $formArtiste['nom_role']; ?>" type="text" class="validate">
          <label for="last_name">Prénom</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s12">
            <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s1" type="submit" name="action">update
            <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
                        <div class="responsive-table">
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div> 
