(function($){
    $recipe_rating = $("#recipe_rating");
    $recipe_rating.bind('rated', function(){
        $(this).rateit( 'readonly', true );

        const form  =   {
            action:     'mr_rate_recipe',
            rid:        $(this).data( 'rid' ),
            rating:      $(this).rateit( 'value' ),            
        };

        $.post( recipe_obj.ajax_url, form, (data)=>{
            
        } );
    });
})(jQuery);