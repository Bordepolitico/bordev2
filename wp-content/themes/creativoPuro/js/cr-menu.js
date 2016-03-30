(function($) {

	"use strict";


	$(document).ready(function() {


		creativo_megamenu.menu_item_mouseup();
		creativo_megamenu.megamenu_status_update();

		creativo_megamenu.update_megamenu_fields();

		$( '.remove-cr-megamenu-background' ).manage_thumbnail_display();
		$( '.cr-megamenu-background-image' ).css( 'display', 'block' );
		$( ".cr-megamenu-background-image[src='']" ).css( 'display', 'none' );

		creativo_media_frame_setup();

	});


	var creativo_megamenu = {

		menu_item_mouseup: function() {
			$( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
				if( ! $( event.target ).is( 'a' )) {
					setTimeout( creativo_megamenu.update_megamenu_fields, 300 );
				}
			});
		},

		megamenu_status_update: function() {

			$( document ).on( 'click', '.edit-menu-item-cr-megamenu-check', function() {
				var parent_li_item = $( this ).parents( '.menu-item:eq( 0 )' );

				if( $( this ).is( ':checked' ) ) {
					parent_li_item.addClass( 'cr-megamenu' );
				} else 	{
					parent_li_item.removeClass( 'cr-megamenu' );
				}
				creativo_megamenu.update_megamenu_fields();
			});
		},

		update_megamenu_fields: function() {
			var menu_li_items = $( '.menu-item');

			menu_li_items.each( function( i ) 	{

				var megamenu_status = $( '.edit-menu-item-cr-megamenu-check', this );

				if( ! $( this ).is( '.menu-item-depth-0' ) ) {
					var check_against = menu_li_items.filter( ':eq(' + (i-1) + ')' );


					if( check_against.is( '.cr-megamenu' ) ) {

						megamenu_status.attr( 'checked', 'checked' );
						$( this ).addClass( 'cr-megamenu' );
					} else {
						megamenu_status.attr( 'checked', '' );
						$( this ).removeClass( 'cr-megamenu' );
					}
				} else {
					if( megamenu_status.attr( 'checked' ) ) {
						$( this ).addClass( 'cr-megamenu' );
					}
				}
			});
		}

	}


	$.fn.manage_thumbnail_display = function( variables ) {
		var button_id;

		return this.click( function( e ){
			e.preventDefault();

			button_id = this.id.replace( 'cr-media-remove-', '' );
			$( '#edit-menu-item-megamenu-background-'+button_id ).val( '' );
			$( '#cr-media-img-'+button_id ).attr( 'src', '' ).css( 'display', 'none' );
		});
	}

	function creativo_media_frame_setup() {
		var MkMediaFrame;
		var item_id;

		$( document.body ).on( 'click.mkOpenMediaManager', '.cr-open-media', function(e){

			e.preventDefault();

			item_id = this.id.replace('cr-media-upload-', '');

			if ( MkMediaFrame ) {
				MkMediaFrame.open();
				return;
			}

			MkMediaFrame = wp.media.frames.MkMediaFrame = wp.media({

				className: 'media-frame cr-media-frame',
				frame: 'select',
				multiple: false,
				library: {
					type: 'image'
				}
			});

			MkMediaFrame.on('select', function(){

				var media_attachment = MkMediaFrame.state().get('selection').first().toJSON();

				$( '#edit-menu-item-megamenu-background-'+item_id ).val( media_attachment.url );
				$( '#cr-media-img-'+item_id ).attr( 'src', media_attachment.url ).css( 'display', 'block' );

			});

			MkMediaFrame.open();
		});

	}

	
	function creativo_menus_icon_selector() {
		jQuery('.cr-visual-selector').find('a').each(function() {
			default_value = jQuery(this).siblings('input').val();
			if(jQuery(this).attr('rel')==default_value){
					jQuery(this).addClass('current');
				}
				jQuery(this).click(function(){

					jQuery(this).siblings('input').val(jQuery(this).attr('rel'));
					jQuery(this).parent('.cr-visual-selector').find('.current').removeClass('current');
					jQuery(this).addClass('current');
					return false;
				})
		});
	}
	creativo_menus_icon_selector();

	function creativo_use_icon() {

		jQuery('.cr-add-icon-btn').on('click', function() {

			this_el_id = "#edit-menu-item-menu-icon-" + jQuery(this).attr('data-id');
			icon_el_id = "#cr-view-icon-" + jQuery(this).attr('data-id');
			//console.log(this_el_id);

			jQuery('.cr-icon-use-this').on('click', function() {
				icon_value = jQuery('#cr-icon-value-holder').val();
				if(icon_value == '') {
					jQuery(icon_el_id).attr("class", "");
					jQuery(this_el_id).val("");
				} else {
					jQuery(icon_el_id).attr("class", icon_value);
					jQuery(this_el_id).val(icon_value);
				}
				
				window.parent.tb_remove();
				return false;
			});
		});

		jQuery('.cr-remove-icon').on('click', function() {
			jQuery(this).siblings('input').val('');
			jQuery(this).siblings('i').attr('class', '');
			return false;

		});

	}
	creativo_use_icon();

})(jQuery);


