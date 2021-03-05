
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
                                <span class="hide-on-small-only">Create Artiste</span>
                            </a>
                        </div>
                 
                        <div class="responsive-table">
                <?= $pager->links() ?>
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        <th></th>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>PRENOM</th>
                                        <th>DATE DE NAISSANCE</th>
                                        <th>NOMBRE DE FILM</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                               
                                
                                <?php //pas de ';' après un foreach
                                foreach($artistes as $artiste)
                                    { 
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="app-invoice-view.html"><?php echo $artiste['id']; ?> </a>
                                        </td>
                                        <td><span class="invoice-amount"><?php echo $artiste['nom']; ?></span></td>
                                        <td><small>12-08-19</small></td>
                                        <td><span class="invoice-customer"><?php echo $artiste['prenom']; ?></span></td>
                                        <td>
                                            <span class="bullet green"></span>
                                            <small><?php echo $artiste['annee_naissance']; ?></small>
                                        </td>
                                        <td>
                                            <div class="invoice-action">
                                                <a href="<?= base_url("admin/artiste/delete/" . $artiste['id']); ?>" class="invoice-action-view mr-4">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                                <a href="<?= base_url("admin/artiste/edit/" . $artiste['id']); ?>" class="invoice-action-edit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                                </tbody>
                            </table>
             <?= $pager->links() ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div> 
