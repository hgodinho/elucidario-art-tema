<?php
/**
 * Footer template para Elucidário.art
 *
 * @package    WordPress
 * @subpackage Elucidário.art
 *
 * @version 0.1
 * @since 0.1
 *
 * @author hgod.in
 */
?>
</div>
<!-- / .site-content no header -->

<div class="back-to-top d-print-none">
	<a class="topbutton btn bg-secondary btn-lg shadow-lg float-right hidden text-white"
		href="#" role="button" alt="Voltar ao topo"><i class="fas fa-angle-up"></i></a>
</div>

<footer class="blog-footer container-fluid bg-primary mt-5 border-top border-white shadow-lg">
	<div class="container bg-transparent text-light">
		<div class="row py-4">
			<div class="col-md-12 col-lg-4 py-4">
				<h3><?php echo get_bloginfo('name')?></h3>
				<p class="lead">
					<?php echo get_bloginfo('description')?>
				</p>
				<a href="https://emaklabin.org.br/">
				<img class="logo-footer" src="<?php echo get_template_directory_uri() . '/inc/images/logo-branco.png' ?>">
				<a>
				<p style="margin-top:15px">Criado com ❤ por 
				<a style="font-size:22px; font-family:Lucida;" href="http://elucidario.art/?utm_source=ema-klabin&utm_medium=rodape&utm_campaign=elucidario-ema-klabin"
					class="text-white" target="_blank">
				Elucidário.art
				</a>
				</p>
			</div>
			<div class="col-md-12 col-lg-4 py-4 d-print-none">
				<h3>Institucional</h3>
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'rodape', 
					'container_class' => 'menu-rodape' ) ); 
				?>
			</div>
			<div class="col-md-12 col-lg-4 py-4 d-print-none">
				<h3>Assine nossa Newsletter</h3>
			
				<form method="post" enctype="multipart/form-data"
					action="https://38.e-goi.com//w/1ege12HueB5cNPfySe3c1d585a">
					<div class="form-group">
										<input type="hidden" name="lista" value="1">
					<input type="hidden" name="cliente" value="225689">
					<input type="hidden" name="lang" id="lang_id" value="br">
					<input type="hidden" name="formid" id="formid" value="15">
						<label for="fname_45" class="sr-only" easylabel="Nome">Nome</label>
						<input type="text" class="form-control" name="fname_45" id="fname_45" placeholder="Nome">
					</div>
					<div class="form-group">
						<label for="email_46" easylabel="E-mail" class="sr-only">Endereço de e-mail</label>
						<input type="email" name="email_46" id="email_46" class="form-control" aria-describedby="emailHelp"
							placeholder="Email">
						<small id="emailHelp" class="form-text text-light">*Nunca compartilharemos seus dados
							com
							terceiros.</small>
					</div>
					<button type="submit" value="submit" class="btn btn-success">Assinar</button>
				</form>
				
			</div>
		</div>
		<div class="row border-top py-4">
			<small class="col-auto mr-auto">Fundação Ema Klabin. Todos os direitos reservados.</small>
			<small class="col-auto"><a href="http://elucidario.art/?utm_source=ema-klabin&utm_medium=rodape&utm_campaign=elucidario-ema-klabin"
					class="text-white" target="_blank">Elucidário.art</a></small>
		</div>
	</div>
</footer>

<?php wp_footer();?>
</body>

</html>