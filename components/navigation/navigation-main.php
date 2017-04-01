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
        <li><a href="/"><?php strikebase_icon( 'dashboard' ); ?><?php esc_html_e( 'Dashboard', 'strikebase' ); ?></a></li>
        <li><?php strikebase_icon( 'projects' ); ?><a href="/projects"><?php esc_html_e( 'Projects' ); ?></a></li>
        <li class="context-link"><?php strikebase_primary_link(); ?></li>
        <li><?php strikebase_icon( 'people' ); ?><a href="/people"><?php esc_html_e( 'People', 'strikebase' ); ?></a></li>
        <li><?php strikebase_icon( 'organizations' ); ?><a href="/organizations"><?php esc_html_e( 'Organizations', 'strikebase' ); ?></a></li>
    </ul>
</nav>
