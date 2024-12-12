/**
 * WP Admin scripts for Gallery extension
 */

//init gallery
jQuery(document).ready(function() {
	jQuery('body').on('show.bs.modal', '#fsn_gallery_modal', function() {
		var galleryModal = jQuery(this);
		var gallery = galleryModal.find('.gallery-sort');
		var selectLayoutElement = galleryModal.find('[name="gallery_layout"]');
		var selectedLayout = selectLayoutElement.val();

		gallery.attr('data-layout', selectedLayout);
	});

	jQuery('body').on('shown.bs.modal', '#fsn_gallery_modal', function() {
		var galleryModal = jQuery(this);
		var gallery = galleryModal.find('.gallery-sort');
		var selectTypeElement = galleryModal.find('[name="gallery_type"]');
		var selectedType = selectTypeElement.find('option:selected').val();

		if (selectedType == 'smart') {
			gallery.closest('.form-group').hide();
		}
	});
});

//update gallery function
jQuery(document).ready(function() {
	jQuery('body').on('change', 'select[name="gallery_layout"]', function(e) {
		fsnUpdateGallery(e);
	});
});

//update gallery type function
jQuery(document).ready(function() {
	jQuery('body').on('change', 'select[name="gallery_type"]', function(e) {
		fsnUpdateGalleryType(e);
	});
});

function fsnUpdateGallery(event) {
	var selectLayoutElement = jQuery(event.target);
	var selectedLayout = selectLayoutElement.val();
	var gallery = selectLayoutElement.closest('.modal').find('.gallery-sort');
	var currentLayout = gallery.attr('data-layout');
	var galleryItems = gallery.find('.gallery-item');
	if (galleryItems.length > 0 && currentLayout != selectedLayout) {
		var r = confirm(fsnExtGalleryL10n.layout_change);
		if (r == true) {
			gallery.empty();
			gallery.attr('data-layout', selectedLayout);
			fsnUpdateGalleryLayout(gallery);
		} else {
			selectLayoutElement.find('option[value="'+ currentLayout +'"]').prop('selected', true).change();
		}
	} else {
		gallery.attr('data-layout', selectedLayout);
		fsnUpdateGalleryLayout(gallery);
	}
	//hide smart items on empty layout
	var selectTypeElement = gallery.find('select[name="gallery_type"]');
	if (selectedLayout == '') {
		selectTypeElement.find('option[value="manual"]').prop('selected', true);
		gallery.find('.form-group[data-dependency-param="gallery_type"][data-dependency-value="smart"]').hide();
	} else {
		selectTypeElement.find('option[value="manual"]').prop('selected', true).change();
	}
}

function fsnUpdateGalleryType(event) {
	var selectTypeElement = jQuery(event.target);
	var selectedType = selectTypeElement.val();
	var gallery = selectTypeElement.closest('.modal').find('.gallery-sort');
	var galleryItems = gallery.find('.gallery-item');
	if (selectedType == 'smart' && galleryItems.length > 0) {
		var r = confirm(fsnExtGalleryL10n.layout_change_smart);
		if (r == true) {
			gallery.empty();
			//hide manual items
			gallery.closest('.form-group').hide();
		} else {
			selectTypeElement.find('option[value="manual"]').prop('selected', true).change();
		}
	} else if (selectedType == 'smart' && galleryItems.length == 0) {
		//hide manual items
		gallery.closest('.form-group').hide();
	} else if (selectedType == 'manual') {
		//show manual items
		gallery.closest('.form-group').show();
	}
}

//update gallery layout
function fsnUpdateGalleryLayout(gallery) {
	var galleryModal = gallery.closest('.modal');
	var postID = jQuery('input#post_ID').val();
	var galleryLayout = galleryModal.find('[name="gallery_layout"]').val();

	var data = {
		action: 'gallery_load_layout',
		gallery_layout: galleryLayout,
		post_id: postID,
		security: fsnExtGalleryJS.fsnEditGalleryNonce
	};
	jQuery.post(ajaxurl, data, function(response) {
		if (response == '-1') {
			alert(fsnExtGalleryL10n.error);
			return false;
		}

		galleryModal.find('.tab-pane .form-group.gallery-layout').remove();
		if (response !== null) {
			galleryModal.find('.tab-pane').each(function() {
				var tabPane = jQuery(this);
				if (tabPane.attr('data-section-id') == 'general') {
					tabPane.find('.form-group').first().after('<div class="layout-fields"></div>');
				} else {
					tabPane.prepend('<div class="layout-fields"></div>');
				}
			});
			for(i=0; i < response.length; i++) {
				galleryModal.find('.tab-pane[data-section-id="'+ response[i].section +'"] .layout-fields').append(response[i].output);
			}
			galleryModal.find('.tab-pane').each(function() {
				var tabPane = jQuery(this);
				tabPane.find('.gallery-layout').first().unwrap();
				tabPane.find('.layout-fields:empty').remove();
				//toggle panel tabs visibility
				var tabPaneId = tabPane.attr('id');
				if (tabPane.is(':empty')) {
					galleryModal.find('a[data-toggle="tab"][href="#'+ tabPaneId +'"]').parent('li').hide();
				} else {
					galleryModal.find('a[data-toggle="tab"][href="#'+ tabPaneId +'"]').parent('li').show();
				}
			});
		}
		var modalSelector = galleryModal;
		//reinit tinyMCE
		if (jQuery('#fsncontent').length > 0) {
			//make compatable with TinyMCE 4 which is used starting with WordPress 3.9
			if(tinymce.majorVersion === "4") {
				tinymce.execCommand('mceRemoveEditor', true, 'fsncontent');
            } else {
				tinymce.execCommand("mceRemoveControl", true, 'fsncontent');
            }
			var $element = jQuery('#fsncontent');
	        var qt, textfield_id = $element.attr("id"),
	            content = '';

	        window.tinyMCEPreInit.mceInit[textfield_id] = _.extend({}, tinyMCEPreInit.mceInit['content']);

	        if(_.isUndefined(tinyMCEPreInit.qtInit[textfield_id])) {
	            window.tinyMCEPreInit.qtInit[textfield_id] = _.extend({}, tinyMCEPreInit.qtInit['replycontent'], {id: textfield_id})
	        }
	        //$element.val($content_holder.val());
	        qt = quicktags( window.tinyMCEPreInit.qtInit[textfield_id] );
	        QTags._buttonsInit();
	        //make compatable with TinyMCE 4 which is used starting with WordPress 3.9
	        if(tinymce.majorVersion === "4") tinymce.execCommand( 'mceAddEditor', true, textfield_id );
	        window.switchEditors.go(textfield_id, 'tmce');
	        //focus on this RTE
	        tinyMCE.get('fsncontent').focus();
			//destroy tinyMCE
			modalSelector.on('hidden.bs.modal', function() {
				//make compatable with TinyMCE 4 which is used starting with WordPress 3.9
				if(tinymce.majorVersion === "4") {
					tinymce.execCommand('mceRemoveEditor', true, 'fsncontent');
                } else {
					tinymce.execCommand("mceRemoveControl", true, 'fsncontent');
                }
			});
		}
		//initialize color pickers
		jQuery('.fsn-color-picker').wpColorPicker();
		//set dependencies
		setDependencies(modalSelector);
		//trigger item added event
		jQuery('body').trigger('fsnGalleryUpdated');
	});
}

//add gallery item
jQuery(document).ready(function() {
	jQuery('body').on('click', '.add-gallery-item', function(e) {
		var postID = jQuery('input#post_ID').val();
		var galleryItemsContainer = jQuery(this).siblings('.gallery-sort');
		var galleryModal = jQuery(this).closest('.modal');
		var galleryLayout = galleryModal.find('[name="gallery_layout"]').val();

		e.preventDefault();
		var data = {
			action: 'gallery_add_item',
			gallery_layout: galleryLayout,
			post_id: postID,
			security: fsnExtGalleryJS.fsnEditGalleryNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			galleryItemsContainer.append(response);
			//initialize color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//set dependencies
			setDependencies(galleryItemsContainer);
			//trigger item added event
			galleryItemsContainer.trigger('fsnAddGalleryItem');
		});
	});
});

//drag and drop sorting
jQuery(document).ready(function() {
	jQuery('body').on('shown.bs.modal', '#fsn_gallery_modal' , function (e) {
		var sortableGallery = jQuery('.gallery-sort');
		sortableGallery.sortable({
			stop: function( event, ui ) {
				//galleryItemShortcodes();
			}
		});
	});
});

//remove gallery item
jQuery(document).ready(function() {
	jQuery('body').on('click', '.remove-gallery-item', function(e) {
		e.preventDefault();
		var targetGalleryItem = jQuery(this).parents('.gallery-item');
		targetGalleryItem.fadeOut(500, function() {
			jQuery(this).remove();
		});
	});
});

// expand / collapse gallery item
jQuery(document).ready(function() {
	//toggle single item
	jQuery('body').on('click', '.collapse-gallery-item', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var targetGalleryItem = jQuery(this).parents('.gallery-item');
		if (targetGalleryItem.hasClass('collapse-active')) {
			targetGalleryItem.removeClass('collapse-active');
			trigger.text(fsnExtGalleryL10n.gallery_item_collapse);
		} else {
			targetGalleryItem.addClass('collapse-active');
			trigger.text(fsnExtGalleryL10n.gallery_item_expand);
		}
	});
	//expand all
	jQuery('body').on('click', '.expand-all-gallery-items', function(e) {
		e.preventDefault();
		var galleryItems = jQuery(this).siblings('.gallery-sort').find('.gallery-item');
		galleryItems.each(function() {
			var galleryItem = jQuery(this);
			galleryItem.removeClass('collapse-active');
			galleryItem.find('.collapse-gallery-item').text(fsnExtGalleryL10n.gallery_item_collapse);
		});
	});
	//collapse all
	jQuery('body').on('click', '.collapse-all-gallery-items', function(e) {
		e.preventDefault();
		var galleryItems = jQuery(this).siblings('.gallery-sort').find('.gallery-item');
		galleryItems.each(function() {
			var galleryItem = jQuery(this);
			galleryItem.addClass('collapse-active');
			galleryItem.find('.collapse-gallery-item').text(fsnExtGalleryL10n.gallery_item_expand);
		});
	});
});

//generate gallery item shortcode (uses custom save event)
jQuery('body').on('fsnSave', function(event, shortcodeTag) {
	if (shortcodeTag == 'fsn_gallery') {
		var galleryModal = jQuery(event.target);
		galleryItemShortcodes(galleryModal);
	}
});

function galleryItemShortcodes(galleryModal) {
	var shortcodesString = '';
	var galleryItems = galleryModal.find('.gallery-sort .gallery-item');
	var galleryLayout = galleryModal.find('[name="gallery_layout"]').val();
	var i = 0;
	galleryItems.each(function() {
		shortcodesString += '[fsn_gallery_item gallery_layout="'+ galleryLayout +'"'+ (i > 0 ? ' lazy_load="true"' : '');
		var currentItem = jQuery(this);
		var itemParams = currentItem.find('.element-input');
		itemParams.each(function() {
			var fieldType = jQuery(this).attr('type');
			var paramNameRaw = jQuery(this).attr('name');
			var paramNameArray = paramNameRaw.split('-paramid');
			var paramName = paramNameArray[0];
			var newParamValue = '';
			switch(fieldType) {
				case 'checkbox':
					if (jQuery(this).is(':checked')) {
						newParamValue = 'on';
					}
					break;
				case 'select':
					newParamValue = jQuery(this).find('option:selected').val();
					break;
				case 'radio':
					if (jQuery(this).is(':checked')) {
						newParamValue = jQuery(this).val();
					} else {
						newParamValue = '';
					}
					break;
				default:
					newParamValue = jQuery(this).val();
			}
			//do not save hidden dependenent field values
			if (jQuery(this).closest('.form-group').hasClass('no-save')) {
				newParamValue = '';
			}

			if (newParamValue != '') {
				if (jQuery(this).hasClass('encode-base64')) {
					newParamValue = btoa(newParamValue);
				} else if (jQuery(this).hasClass('encode-url')) {
					newParamValue = encodeURIComponent(newParamValue);
				}
				newParamValue = fsnCustomEntitiesEncode(newParamValue);
				shortcodesString += ' '+ paramName +'="'+ newParamValue +'"';

			}
		});
		shortcodesString += ']';
		i++;
	});
	var galleryInput = galleryModal.find('[name="gallery_items"]');
	galleryInput.val(shortcodesString);
}

//For select2 fields inside gallery layouts and items
jQuery(document).ready(function() {
	jQuery('body').on('fsnGalleryUpdated', function(e) {
		fsnInitPostSelect();
	});
	jQuery('body').on('fsnAddGalleryItem', function(e) {
		fsnInitPostSelect();
	});
});
