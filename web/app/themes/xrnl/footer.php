            <footer class="bg-black text-white">
				<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Extinction Rebellion Nederland is een grassroots beweging geïnspireerd op <a href="https://rebellion.earth" target="_blank">Extinction Rebellion UK</a>.</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Extinction Rebellion</h2>
						<?php wp_nav_menu( [
							'theme_location' => 'footer-1',
							'container'       => 'div',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						] ); ?>
                    </div>
                    <div class="col-md-4">
                        <h2>Evenementen</h2>
						<?php wp_nav_menu( [
							'theme_location' => 'footer-2',
							'container'       => 'div',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						] ); ?>
                    </div>
					<div class="col-md-4 align-right">

					<?php wp_nav_menu( [
						'theme_location' => 'language',
						'container'       => 'div',
						'container_id'    => 'language-selector',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'menu_class'      => 'hide-mobile',
						'walker'          => new WP_Bootstrap_Navwalker(),
					] ); ?>

						<div class="donate donate--footer">
							<a href="/donate" class="btn btn--primary-dark"><?php _e('donate'); ?></a>
						</div>
						<br style="clear: both;" />
						<div class="social-nav social-nav--footer">
							<ul>
								<li><a href="https://www.facebook.com/ExtinctionRebellionNL/" target="_blank" class="facebook" aria-label="facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/nlrebellion" class="twitter" target="_blank" aria-label="twitter"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/extinctionrebellion/?hl=nl" target="_blank" class="insta" aria-label="instagram"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>

					</div>
                </div>
				</div>
            </footer>

        </main>

        <?PHP wp_footer(); ?>
    </body>
</html>
