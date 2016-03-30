(function($){
	$(document).ready(function(){

		$('.import-package form').submit(function(e){
			if( ! confirm(rdijs.preconfirmation) ){
				return false;
			}

			var $form = $(this),
			template = $form.find('.template').val(),
			modules = $form.find('input.module:checkbox:checked').map(function(){
			  return $(this).val();
			}).get();

			$('#import_notes').empty();
			$('#import_note').remove();

			$('#import_notes').after('<div id="import_note" class="import-content-loading updated settings-error"><p>'+ rdijs.importing +'</p></div>');
			$("html, body").animate({scrollTop: 0}, "fast");

			import_module( template, modules );

			e.preventDefault();
			return false;
		});


		function import_module( template, modules ){
			if( modules.length < 1 ){
				$('#import_note')
					.removeClass('import-content-loading')
					.html('<p>Import Finished <a target="_blank" href="'+ $('#wp-admin-bar-site-name>a').attr('href') +'">Visit Home</a></p>');

				$.post(ajaxurl, {'action': 'radium_demo_menu'});
				alert(rdijs.importedAlert);
				return false;
			}
			module = modules.shift();

			if( $('#module_note_'+ module).length < 1 ){
				$('#import_notes').append('<div class="updated settings-error" id="module_note_'+ module +'"><p>Importing '+ module + '</p></div>');
			}

			var $uDiv = $('#module_note_'+ module);
			$uDiv.addClass('import-content-loading');

			$.post(ajaxurl, {'action': 'radium_demo_import','template': template, 'module': module})
			.done(function(r){
				$uDiv.removeClass('import-content-loading').html('<p>'+ r.html + '</p>');
				if( r.next ){
					modules.unshift( r.next );
				}
				import_module( template, modules )
			})
			.fail(function(response){
				$uDiv.removeClass('import-content-loading updated').addClass('error').html('<p>'+ (response.statusText ? response.statusText : rdijs.importFailded) + '</p></div>');
			});
		}

	});
})(jQuery)