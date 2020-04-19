(function($){
	var $recipe_rating  =   $("#recipe_rating");
	var $recipe_form    =   $("#recipe-form");
	var $recipe_status  =   $("#recipe-status");
	var $mr_inputTitle	=		$("#mr_inputTitle");

	const	templateSubmit 	= 	`<div class="alert alert-info">
															Please wait! We are	submitting your recipe.
														</div>`;
	const	templateSuccess = 	`<div class="alert alert-success">
															Recipe submitted successfully!.
														</div>`;
	const	templateError 	= 	`<div class="alert alert-danger">
															Unable to submit recipe. Please fill in all fields.
														</div>`;
	

	$recipe_rating.bind('rated', function(){
		$(this).rateit( 'readonly', true );

		const form  =   {
			action:     	'mr_rate_recipe',
			rid:        	$(this).data( 'rid' ),
			rating:     	$(this).rateit( 'value' ),            
		};

		$.post( recipe_obj.ajax_url, form, function(data){
						
		});
	});


		$recipe_form.on( 'submit', function(e){
				e.preventDefault();

				$(this).hide();
				$recipe_status.html(templateSubmit);

				var form                    =   {
						action:                     'mr_submit_user_recipe',
						title:                      $mr_inputTitle.val(),
						content:                    tinymce.activeEditor.getContent()
				}

				$.post( recipe_obj.ajax_url, form, function(data){
						if( data.status == 2 ){
								$recipe_status.html(templateSuccess);
						}else{
								$recipe_status.html(templateError);
								$recipe_form.show();
						}
				});
		});

 



})(jQuery);