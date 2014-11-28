<div class="col-md-9">

                <div class="row">
                    
                    <hr>
                    <h4>Categoria -> <?=$categoria_nome?></h4>
                     <hr>
                    <?php if (isset($livros)): ?>
                    <?php foreach ($livros as $livro): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?=URL?>public/img/<?=$livro['imagem']?>" alt="" style="width: 200px; min-height: 300px">  
                            <div class="caption">
                                <h4 class="pull-right">$<?=$livro['PrecoVenda']?></h4>
                                <h4><a href="<?=URL?>livro/view/<?=$livro['idLivro']?>"><?=$livro['Nome']?></a>
                                </h4>
                                <p><?=$livro['descricao']?>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>


                </div>

            </div>

        </div>

    </div>