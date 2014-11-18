<?php if (isset($livro)):?>
            <div class="col-md-9">
                <div class="row panel panel-default">
                    <div class="col-md-4" style="margin-top: 10px">
                        <div class="thumbnail">
                            <img src="<?=PATH_PUBLIC?>bootstrap/css/bootstrap.min.css" alt="">
                        
                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    4.0 estrelas
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">  
                            <div class="caption-full">
                                   
                                <h4><a href="#"><?=$livro['Nome']?></a>
                                </h4>
                                <h5>Autor:</h5>
                                <h5>Cód.</h5>

                               
                            </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="pull-right">Preço venda: R$ <?=$livro['PrecoVenda']?></h4><br>
                        <h4 class="pull-right">Preço Aluguel: R$ <?=$livro['PrecoAluguel']?></h4>
                    </div>
                 </div>

                <div class="well">
                    <h1>Descrição</h1>
                     <p><?=$livro['descricao']?></p>
                    <hr>


                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>Recomendo a todos! Muito bom livro.</p>
                        </div>
                    </div>

                </div>

            </div>
<?php endif;?>