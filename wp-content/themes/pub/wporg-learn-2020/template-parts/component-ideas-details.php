<?php
/**
 * Template part for displaying the idea submission form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPBBP
 */

// Get author details
$author_user = get_user_by( 'id', $post->post_author );

// Get taxonomy terms
$data = array(
	'type'      => array(
		'label' => esc_html__( 'Type', 'wporg-learn' ),
		'value' => wp_get_post_terms( $post->ID, 'wporg_idea_type' )[0]->name,
	),
	'status'    => array(
		'label' => esc_html__( 'Status', 'wporg-learn' ),
		'value' => wp_get_post_terms( $post->ID, 'wporg_idea_status' )[0]->name,
	),
	'author'    => array(
		'label' => esc_html__( 'Submitted by', 'wporg-learn' ),
		'value' => wp_kses_post( '<a href="httsp://profiles.wordpress.org/' . esc_attr( $author_user->user_login ) . '" target="_blank" rel="nofollow noopener">' . esc_html( $author_user->display_name ) . '</a>' ),
	),
	'votes'    => array(
		'label' => esc_html__( 'Votes', 'wporg-learn' ),
		'value' => absint( get_post_meta( $post->ID, 'vote_count', true ) ),
	),
);

?>

<ul class="wporg-idea-details">
	<?php
	foreach ( $data as $key => $item ) { ?>
		<li>
			<strong><?php echo esc_html( $item['label'] ); ?></strong>
			<span><?php echo wp_kses_post( $item['value'] ); ?></span>
		</li>
		<?php
	}
	?>
</ul>
