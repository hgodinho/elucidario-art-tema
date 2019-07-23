<?php
/**
 * Footer template para Wiki-Ema
 *
 * @package WordPress
 * @subpackage Wiki-Ema
 *
 * @version 0.1
 * @since 0.1
 *
 * @author hgodinho.com
 */
?>
</div><!-- / .site-content no header -->


<div class="p-5 fixed-bottom">
	<a class="topbutton btn btn-outline-secondary btn-lg shadow-lg rounded-0 float-right hidden" href="#" role="button"
		alt="Voltar ao topo"><i class="fas fa-angle-up"></i></a>
</div>


<footer class="blog-footer container-fluid bg-primary mt-5 border-top border-white shadow-lg">
	<div class="container bg-transparent text-light">
		<div class="row py-4">
			<div class="col-md-12 col-lg-4 py-4">
				<h3>Wiki-Ema</h3>
				<p class="lead">
					Descubra a Coleção Ema Klabin
				</p>
			</div>
			<div class="col-md-12 col-lg-4 py-4">
				<h3>Institucional</h3>
				<ul>
					<li><a href="" class="text-white">A Casa-museu</a></li>
					<li><a href="" class="text-white">Sobre</a></li>
					<li><a href="" class="text-white">Programação</a></li>
					<li><a href="" class="text-white">Contato</a></li>
				</ul>

			</div>
			<div class="col-md-12 col-lg-4 py-4">
				<h3>Assine nossa Newsletter</h3>
				<form>
					<div class="form-group">
						<label for="NomeNewsletter" class="sr-only">Nome</label>
						<input type="text" class="form-control" id="NomeNewsletter" placeholder="Nome">
					</div>
					<div class="form-group">
						<label for="EmailNewsletter" class="sr-only">Endereço de e-mail</label>
						<input type="email" class="form-control" id="EmailNewsletter" aria-describedby="emailHelp"
							placeholder="Email">
						<small id="emailHelp" class="form-text text-light">*Nunca compartilharemos seus dados
							com
							terceiros.</small>
					</div>
					<button type="submit" class="btn btn-success">Assinar</button>
				</form>
			</div>
		</div>
		<div class="row border-top py-4">
			<small class="col-auto mr-auto">Fundação Ema Klabin. Todos os direitos reservados.</small>
			<small class="col-auto">por <a href="https://hgodinho.com/?utm_source=wiki-ema&utm_medium=click"
					class="text-white">hgodinho.com</a></small>
		</div>
	</div>
</footer>

<?php wp_footer();?>
</body>

</html>