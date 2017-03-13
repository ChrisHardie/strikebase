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
    <ul>
        <li><a href="/"><?php esc_html_e( 'Dashboard', 'strikebase' ); ?></a></li>
        <li><a href="/projects"><?php esc_html_e( 'Projects' ); ?></a></li>
        <li class="context-link"><?php strikebase_primary_link(); ?></li>
        <li><a href="/people"><?php esc_html_e( 'People', 'strikebase' ); ?></a></li>
        <li><a href="/organizations"><?php esc_html_e( 'Organizations', 'strikebase' ); ?></a></li>
    </ul>
</nav>
