<?php 

function mr_recipe_creator_shortcode() {
	$creatorHTML		=	file_get_contents( 'creator-template.php', true );
	$editorHTML			=	mr_generate_content_editor();
	$creatorHTML		=	str_replace( 'CONTENT_EDITOR', $editorHTML, $creatorHTML );
    return $creatorHTML;
}

function mr_generate_content_editor() {
	ob_start();
	wp_editor( '' , 'recipecontenteditor' );
	$editor_contents	=	ob_get_clean();
	return $editor_contents;
}