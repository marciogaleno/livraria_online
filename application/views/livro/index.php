<div class="col-md-9">
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="<?=URL?>public/img/banner01.jpg" alt="" style="min-height: 300px">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?=URL?>public/img/banner02.jpg" alt=""style="min-height: 300px;max-height: 300px">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
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