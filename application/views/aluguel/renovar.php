<div class="col-md-9">
    <form method="post" action="renovar">
        <h3>Renovação</h3>
        <h4><b>Livro:</b> <?=$aluguel['Nome']?></h4>
        <h4><b>Nova Data de devolução:</b>   <?php echo date('y/m/d', strtotime("+13 days")) ?></h4>
        <h4><b>Valor:</b> R$ <?=$aluguel['PrecoAluguel']?></h4>
        <input type="hidden" value="<?=$aluguel['idAluga']?>" name="idAluga">
        <input type="submit" class="btn btn-primary" value="Pagar">
    </form>
</div>
