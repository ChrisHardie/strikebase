<?php
/**
 * Template part for displaying navigation menu.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<nav id="site-navigation" class="main-navigation" role="navigation">
    <ul>,
        <li>
			<?php if ( is_home() ) : ?>
				<a href="<?php echo esc_url( get_home_url() ); ?>" class="selected">
				<?php strikebase_icon( 'dashboard-selected' ); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( get_home_url() ); ?>">
				<?php strikebase_icon( 'dashboard' ); ?>
			<?php endif; ?>
			<?php esc_html_e( 'Dashboard', 'strikebase' ); ?>
		</a></li>

		<li>
			<?php if ( is_post_type_archive( 'project' ) OR is_singular( 'project' ) ) : ?>
				<a href="<?php echo esc_url( '/projects' ); ?>" class="selected">
				<?php strikebase_icon( 'projects-selected' ); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( '/projects' ); ?>">
				<?php strikebase_icon( 'projects' ); ?>
			<?php endif; ?>
			<?php esc_html_e( 'Projects', 'strikebase' ); ?>
		</a></li>
		
        <li class="context-link"><?php strikebase_primary_link(); ?></li>

		<li>
			<?php if ( is_post_type_archive( 'person' ) OR is_singular( 'person' ) ) : ?>
				<a href="<?php echo esc_url( '/people' ); ?>" class="selected">
				<?php strikebase_icon( 'people-selected' ); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( '/people' ); ?>">
				<?php strikebase_icon( 'people' ); ?>
			<?php endif; ?>
			<?php esc_html_e( 'People', 'strikebase' ); ?>
		</a></li>

        <li>
			<?php if ( is_page_template( 'archive-template-organization.php' ) ) : ?>
				<a href="<?php echo esc_url( '/organizations' ); ?>" class="selected">
				<?php strikebase_icon( 'organizations-selected' ); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( '/organizations' ); ?>">
				<?php strikebase_icon( 'organizations' ); ?>
			<?php endif; ?>
			<?php esc_html_e( 'Organizations', 'strikebase' ); ?>
		</a></li>
    </ul>
</nav>
