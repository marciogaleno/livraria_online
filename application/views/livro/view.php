<?php if (isset($livro)):?>
            <div class="col-md-9">
                <div class="row panel panel-default">
                    <div class="col-md-4" style="margin-top: 10px;">
                        <div class="thumbnail" style="width:220px;">
                            <img src="<?=PATH_PUBLIC?>img/padroes-projeto.jpg" alt="">
                        
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
                                   
                                <h2><a href="#"><?=$livro['Nome']?></a>
                                </h2>
                                <h5>Autor:</h5>
                                <h5>Cód.</h5>
                                <h5 style="color: green">Disponível para compra (<?=$livro['Quant_venda']?>):</h5>
                                <h5 style="color: red">Disponível para alugar (<?=$livro['Quant_aluguel']?>):</h5>
                            </div>
                    </div>
                    <div class="col-md-4" style="height:300px;">
                        <h4 class="pull-right" style="margin-top: 180px;">Preço Venda: R$ <?=$livro['PrecoVenda']?></h4><br>
                        <h4 class="pull-right">Preço Aluguel: R$ <?=$livro['PrecoAluguel']?></h4>
                        <a href="<?=URL?>carrinho/adicionarIntem/<?=$livro['idLivro']?>/<?=$livro['Nome']?>/<?=$livro['PrecoVenda']?>/1" type="button" class="btn btn-primary btn-lg" style="bottom: 0px;position: absolute; right: 5px;">Comprar</a>
                        <a href="<?=URL?>carrinho/adicionarIntem/<?=$livro['idLivro']?>/<?=$livro['Nome']?>/<?=$livro['PrecoAluguel']?>/2" type="button" class="btn btn-primary btn-lg" style="bottom: 0px;position: absolute; right: 120px;">Alugar</a>
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