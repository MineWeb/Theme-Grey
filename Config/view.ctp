<section class="content">
    <div class="row">
        <form method="post" enctype="multipart/form-data" data-ajax="false">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a class="nav-link text-dark" href="#tab_accueil" data-toggle="tab">Accueil</a></li>
                    </ul>
                    <div class="tab-content" style="padding: 15px;">
                        <div class="tab-pane active" id="tab_accueil">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>URL du background</label>
                                        <input type="text" class="form-control" name="bg" value="<?= $config['bg'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nom du site</label>
                                        <input type="text" class="form-control" name="name_site" value="<?= $config['name_site'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description du site</label>
                                        <input type="text" class="form-control" name="desc_site" value="<?= $config['desc_site'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter du serveur (URL)</label>
                                        <input type="text" class="form-control" name="twitter" value="<?= $config['twitter'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>YouTube du serveur (URL)</label>
                                        <input type="text" class="form-control" name="youtube" value="<?= $config['youtube'] ?>">
                                    </div>	
                                    <div class="form-group">
                                        <label>Discord du serveur (URL)</label>
                                        <input type="text" class="form-control" name="discord" value="<?= $config['discord'] ?>">
                                    </div>										
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Présentation 1</label>
                                        <p>Icon : Font Awesome 4.7</p>
                                        <input type="text" class="form-control" name="icon-1" value="<?= $config['icon-1'] ?>" placeholder="fa fa-">
                                        <p>Texte</p>
                                        <input type="text" class="form-control" name="desc-1" value="<?= $config['desc-1'] ?>" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Présentation 2</label>
                                        <p>Icon : Font Awesome 4.7</p>
                                        <input type="text" class="form-control" name="icon-2" value="<?= $config['icon-2'] ?>" placeholder="fa fa-">
                                        <p>Texte</p>
                                        <input type="text" class="form-control" name="desc-2" value="<?= $config['desc-2'] ?>" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Présentation 3</label>
                                        <p>Icon : Font Awesome 4.7</p>
                                        <input type="text" class="form-control" name="icon-3" value="<?= $config['icon-3'] ?>" placeholder="fa fa-">
                                        <p>Texte</p>
                                        <input type="text" class="form-control" name="desc-3" value="<?= $config['desc-3'] ?>" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
