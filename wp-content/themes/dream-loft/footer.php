<footer class="main-footer">
		<div class="main-footer__inner">
			<div class="main-footer__nav"><!-- footer-nav --> 
				<nav class="footer-nav">
					<?php
					wp_nav_menu([
						'theme_location' => 'main-menu',
						"menu"           => 'bottom menu',
						'menu_class'     => 'footer-nav__list',
						"container"      => false,
						'depth'          => 0,
					]);
					?>
				
				</nav><!--/ footer-nav --> 
			</div>
			<div class="main-footer__row">
				<div class="main-footer__block">
					<ul class="main-footer__services">
						<li class="main-footer__service">Электромонтажные работы
						</li>
						<li class="main-footer__service">строительно-монтажные работы
						</li>
						<li class="main-footer__service">Расчистка от дкр
						</li>
						<li class="main-footer__service">Благоустройство и дорожные работы
						</li>
						<li class="main-footer__service">Проектирование
						</li>
						<li class="main-footer__service">обследование зданий и сооружений
						</li>
					</ul>
				</div>
				<div class="main-footer__block">
					<div class="main-footer__credits">
					<? echo get_option('company_copyright') ?><br>
					ИНН: <? echo get_option('company_inn') ?>, ОГРН: <? echo get_option('company_ogrn') ?>,<br> 
					<? echo get_option('company_address') ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!--/ main-footer --> 
	<?php wp_footer(); ?>
  </body>
</html>

