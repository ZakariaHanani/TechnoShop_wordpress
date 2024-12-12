/**
 * Admin Scripts.
 *
 * Scripts for Admin pages.
 *
 * @since 1.0.0
 *
 * @package Fusion
 */

//init Fusion
jQuery(document).ready(function() {
	fsnInitUI();
	fsnInitTinyMCE();
	fsnInitScreenOptions();
});

function fsnInitUI() {
	var editorToggleBtn = jQuery('.fsn-toggle-editor');
	var defaultEditor = jQuery('#postdivrich');
	var fsnEditor = jQuery('.fsn-editor');
	defaultEditor.addClass('fsn-off');
	editorToggleBtn.on('click', function(e) {
		e.preventDefault();
		defaultEditor.add(fsnEditor).add(editorToggleBtn).toggleClass('fsn-off');
		jQuery(window).trigger('scroll');
		jQuery(window).trigger('resize');
	});

	var interfaceGrid = jQuery('.fsn-interface-grid');
	if (interfaceGrid.is(':empty')) {
		var fsnInitContent = fsnGetRow(fsnGetColumn(12, fsnGetElement('fsn_text', fsnL10n.text_label)));
		interfaceGrid.empty().append(fsnInitContent);
	} else if (interfaceGrid.children().first().hasClass('row-container') === false) {
		var initalContent = interfaceGrid.html();
		var fsnInitContent = fsnGetRow(fsnGetColumn(12, fsnGetElement('fsn_text', fsnL10n.text_label, initalContent)));
		interfaceGrid.empty().append(fsnInitContent);
		editorToggleBtn.trigger('click');
	}
	//prevent scroll to top on first action
	jQuery( document ).on( 'tinymce-editor-init', function( event, editor ) {
	    jQuery(window).trigger('resize');
	});

	//init events
	fsnInitUIevents(interfaceGrid);
}

function fsnInitTinyMCE() {
	//init TinyMCE if needed
	var userEditorSetting = getUserSetting('editor');
	if (userEditorSetting == 'html') {
		if(tinymce.majorVersion === "4") {
	    	tinymce.init( tinyMCEPreInit.mceInit['content'] );
		} else {
			ed = new tinymce.Editor( 'content', tinyMCEPreInit.mceInit[ 'content' ] );
			ed.render();
		}
		//set user editor setting setting
		setUserSetting( 'editor', 'tinymce' );
	}
}

function fsnInitScreenOptions() {
	var interfaceGrid = jQuery('.fsn-interface-grid');
	var tooltipToggle = jQuery('#screen-meta').on('change', '#fsn_disable_tooltips', function(event) {
		if (jQuery(this).is(':checked')) {
			window.setUserSetting('fsn_disable_tooltips', 'on');
			fsnDestroyTooltips(interfaceGrid);
		} else {
			window.deleteUserSetting('fsn_disable_tooltips');
			fsnInitTooltips(interfaceGrid, true);
		}
	});
}

//init tooltips
function fsnInitTooltips(instance, cols) {
	if (getUserSetting('fsn_disable_tooltips') !== 'on') {
		var targets = instance.find('.fsn-add-row, .fsn-add-element, .fsn-add-tab, .row-controls-toggle, .column-controls-toggle, .tabs-controls-toggle, .tab-controls-toggle, .element-controls-toggle, .control-icon');
		if (cols === true) {
			var targets = targets.add(instance.find('.fsn-add-col'));
		}
		targets.each(function() {
			var target = jQuery(this);
			if (target.tooltip('instance') === undefined) {
				if (target.hasClass('fsn-add-col') || target.hasClass('fsn-add-element')) {
					var tooltipPosition = { my: 'center-1 bottom-19', at: 'center center' };
				} else {
					var tooltipPosition = { my: 'center-1 bottom-9', at: 'center top' };
				}
				target.tooltip({
					tooltipClass: 'fsn-tooltip',
					position: tooltipPosition,
					show: false,
					hide: false
				});
			}
		});
	}
}

//destroy tooltips
function fsnDestroyTooltips(instance) {
	var targets = instance.find('.fsn-add-row, .fsn-add-col, .fsn-add-element, .fsn-add-tab, .row-controls-toggle, .column-controls-toggle, .tabs-controls-toggle, .tab-controls-toggle, .element-controls-toggle, .control-icon');
	targets.each(function() {
		var target = jQuery(this);
		try {
			target.tooltip('destroy');
		} catch(err) {}
	});
}

//get new row
function fsnGetRow(content) {
	if (content == undefined) {
		var content = '';
	}
	var output = '<div class="row-container clearfix"><div class="row-header"><div class="row-controls"><span class="row-controls-toggle" title="'+ fsnL10n.row_options +'"><i class="material-icons md-18">&#xE5D3;</i></span><div class="row-controls-dropdown collapsed"><a href="#" class="edit-row">'+ fsnL10n.edit +'</a><a href="#" class="duplicate-row">'+ fsnL10n.duplicate +'</a><hr><a href="#" class="move-row" data-move="up">'+ fsnL10n.move_up +'</a><a href="#" class="move-row" data-move="down">'+ fsnL10n.move_down +'</a><a href="#" class="move-row" data-move="top">'+ fsnL10n.move_top +'</a><a href="#" class="move-row" data-move="bottom">'+ fsnL10n.move_bottom +'</a><hr><a href="#" class="delete-row">'+ fsnL10n.delete +'</a></div><a href="#" class="control-icon edit-row" title="'+ fsnL10n.row_edit +'"><i class="material-icons md-18">&#xE3C9;</i></a></div><a href="#" class="fsn-add-row" title="'+ fsnL10n.row_add +'"><i class="material-icons md-18">&#xE147;</i></a></div><div class="row-wrapper"><div class="row">'+ content +'</div></div></div>';
	return output;
}

//get new column
function fsnGetColumn(colsize, content) {
	if (content == undefined) {
		var content = '';
	}
	var output = '<div class="col-sm-'+ colsize +'" data-width="'+ colsize +'"><div class="column-container clearfix"><div class="column-header"><div class="column-controls"><span class="column-controls-toggle" title="'+ fsnL10n.column_options +'"><i class="material-icons md-18">&#xE5D3;</i></span><div class="column-controls-dropdown collapsed"><a href="#" class="edit-col">'+ fsnL10n.edit +'</a><a href="#" class="delete-col">'+ fsnL10n.delete +'</a></div><a href="#" class="control-icon edit-col" title="'+ fsnL10n.column_edit +'"><i class="material-icons md-18">&#xE3C9;</i></a></div><h3 class="column-title"><span class="column-width">'+ colsize +'</span> / 12</h3></div><div class="column-wrapper">'+ content +'</div><a href="#" class="fsn-add-element" data-container="column" title="'+ fsnL10n.element_add +'"><i class="material-icons md-18">&#xE147;</i></a></div></div>';
	return output;
}

//get new tabs
function fsnGetTabs(content) {
	if (content == undefined) {
		var content = '';
	}
	var tab1ID = fsnUniqid('tab-');
	var tab2ID = fsnUniqid('tab-');
	var output = '<div class="tabs-container"><div class="tabs-header"><div class="tabs-controls"><span class="tabs-controls-toggle" title="'+ fsnL10n.tabs_options +'"><i class="material-icons md-18">&#xE5D3;</i></span><div class="tabs-controls-dropdown collapsed"><a href="#" class="edit-tabs">'+ fsnL10n.edit +'</a><a href="#" class="duplicate-tabs">'+ fsnL10n.duplicate +'</a><a href="#" class="delete-tabs">'+ fsnL10n.delete +'</a></div><a href="#" class="control-icon edit-tabs" title="'+ fsnL10n.tabs_edit +'"><i class="material-icons md-18">&#xE3C9;</i></a></div><h3 class="tabs-title">'+ fsnL10n.tabs_title +'</h3></div><div class="tabs-wrapper"><div class="tabs-nav"><ul class="nav nav-tabs"><li class="active"><a href="#'+ tab1ID +'" data-toggle="tab">'+ fsnL10n.tab_1_title +'</a></li><li><a href="#'+ tab2ID +'" data-toggle="tab">'+ fsnL10n.tab_2_title +'</a></li><li><a href="#" class="fsn-add-tab" title="'+ fsnL10n.tab_add +'"><i class="material-icons md-18">&#xE147;</i></a></li></ul></div><div class="tab-content">'+ fsnGetTab(fsnL10n.tab_1_title, tab1ID, true) + fsnGetTab(fsnL10n.tab_2_title, tab2ID) +'</div></div></div>';
	return output;
}

//get new tab
function fsnGetTab(title, tabID, active, content) {
	if (title == undefined)	{
		var title = 'Tab';
	}
	if (tabID == undefined) {
		var tabID = fsnUniqid('tab-');
	}
	if (active == undefined)	{
		var active = false;
	}
	if (content == undefined) {
		var content = '';
	}
	var output = '<div class="tab-pane'+ (active === true ? ' active' : '') +'" id="'+ tabID +'"><div class="tab-container" data-tab-title="'+ title +'" data-tab-id="'+ tabID +'"><div class="tab-header"><div class="tab-controls"><span class="tab-controls-toggle" title="'+ fsnL10n.tab_options +'"><i class="material-icons md-18">&#xE5D3;</i></span><div class="tab-controls-dropdown collapsed"><a href="#" class="edit-tab">'+ fsnL10n.edit +'</a><a href="#" class="duplicate-tab">'+ fsnL10n.duplicate +'</a><a href="#" class="delete-tab">'+ fsnL10n.delete +'</a></div><a href="#" class="control-icon edit-tab" title="'+ fsnL10n.tab_edit +'"><i class="material-icons md-18">&#xE3C9;</i></a></div></div><div class="tab-wrapper"><div class="tab">'+ content +'</div></div><a href="#" class="fsn-add-element" data-container="tab" title="'+ fsnL10n.element_add +'"><i class="material-icons md-18">&#xE147;</i></a></div></div>';
	return output;
}

//get new element
function fsnGetElement(type, name, content) {
	if (content == undefined || content === '<br />\n') {
		var content = '';
	}
	var output = '<div class="fsn-element '+ type +'" data-shortcode-tag="'+ type +'"><div class="element-controls"><span class="element-controls-toggle" title="'+ fsnL10n.element_options +'"><i class="material-icons md-18">&#xE5D3;</i></span><div class="element-controls-dropdown collapsed"><a href="#" class="edit-element">'+ fsnL10n.edit +'</a><a href="#" class="duplicate-element">'+ fsnL10n.duplicate +'</a><a href="#" class="delete-element">'+ fsnL10n.delete +'</a></div><a href="#" class="control-icon edit-element" title="'+ fsnL10n.element_edit +'"><i class="material-icons md-18">&#xE3C9;</i></a></div><div class="element-label" title="'+ name +'">'+ name +'</div><div class="element-text-holder">'+ content +'</div></div>';
	return output;
}

//global events
jQuery(document).ready(function() {
	//close menus
	jQuery('body').on('click', function() {
		jQuery('.row-controls-dropdown, .column-controls-dropdown, .tabs-controls-dropdown, .tab-controls-dropdown, .element-controls-dropdown').addClass('collapsed');
		jQuery('.row-controls-toggle, .column-controls-toggle, .tabs-controls-toggle, .tab-controls-toggle, .element-controls-toggle').removeClass('open');
	});
	jQuery('body').on('click', '.control-icon', function(e) {
		try {
			jQuery(this).tooltip('close');
		} catch(err) {}
	});
});

function fsnCloseDropdowns(trigger, target) {
	var triggers = jQuery('.row-controls-toggle, .column-controls-toggle, .tabs-controls-toggle, .tab-controls-toggle, .element-controls-toggle, .template-controls-toggle');
	var targets = jQuery('.row-controls-dropdown, .column-controls-dropdown, .tabs-controls-dropdown, .tab-controls-dropdown, .element-controls-dropdown, .template-controls-dropdown');
	triggers.not(trigger).removeClass('open');
	targets.not(target).addClass('collapsed');
}

//instance events
function fsnInitUIevents(instance) {

	//get instance parent
	if (instance.attr('id') == 'fsn-main-ui') {
		instanceParent = jQuery('.fsn-editor');
	} else {
		instanceParent = jQuery('#edit_component');
	}

	//toggle row controls
	instance.on('click', '.row-controls-toggle', function(e) {
		e.stopPropagation();
		var trigger = jQuery(this);
		var target = trigger.next('.row-controls-dropdown');
		fsnCloseDropdowns(trigger, target);
		trigger.toggleClass('open');
		target.toggleClass('collapsed');
	});

	//toggle column controls
	instance.on('click', '.column-controls-toggle', function(e) {
		e.stopPropagation();
		var trigger = jQuery(this);
		var target = trigger.next('.column-controls-dropdown');
		fsnCloseDropdowns(trigger, target);
		trigger.toggleClass('open');
		target.toggleClass('collapsed');
	});

	//toggle tabs controls
	instance.on('click', '.tabs-controls-toggle', function(e) {
		e.stopPropagation();
		var trigger = jQuery(this);
		var target = trigger.next('.tabs-controls-dropdown');
		fsnCloseDropdowns(trigger, target);
		trigger.toggleClass('open');
		target.toggleClass('collapsed');
	});

	//single tab
	instance.on('click', '.tab-controls-toggle', function(e) {
		e.stopPropagation();
		var trigger = jQuery(this);
		var target = trigger.next('.tab-controls-dropdown');
		fsnCloseDropdowns(trigger, target);
		trigger.toggleClass('open');
		target.toggleClass('collapsed');
	});

	//on switch tab
	instance.on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
		var incomingTab = e.target // newly activated tab
		var outgoingTab = e.relatedTarget // previous active tab
		fsnAddColFields(instance);
		fsnResize();
	});

	//toggle element controls
	instance.on('click', '.element-controls-toggle', function(e) {
		e.stopPropagation();
		var trigger = jQuery(this);
		var target = trigger.next('.element-controls-dropdown');
		fsnCloseDropdowns(trigger, target);
		trigger.toggleClass('open');
		target.toggleClass('collapsed');
	});

	//add row to visual editor
	instanceParent.on('click', '.fsn-add-row', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		try {
			trigger.tooltip('close');
		} catch(err) {}
		//add row to fusion interface
		var rowContent = fsnGetRow();
		trigger.closest('.row-container').after(rowContent);
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//reinit add col fields
		fsnAddColFields(instance);
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
	});

	//delete row from visual editor
	instance.on('click', '.delete-row', function(e) {
		e.preventDefault();
		var targetRow = jQuery(this).closest('.row-container');
		targetRow.fadeOut(400, function() {
			jQuery(this).remove();
			//update content
			fsnUpdateContent(instance);
			if (instance.is(':empty')) {
				var fsnInitContent = fsnGetRow(fsnGetColumn(12, fsnGetElement('fsn_text', fsnL10n.text_label)));
				instance.empty().append(fsnInitContent);
				//reinit sortables and resizables
				initSortables(instance);
				initResizables(instance);
				//reinit add col fields
				fsnAddColFields(instance);
				//init tooltips
				fsnInitTooltips(instance);
			}
		});
	});

	//duplicate row in visual editor
	instance.on('click', '.duplicate-row', function(e) {
		e.preventDefault();
		var targetRow = jQuery(this).closest('.row-container');
		var targetRowData = targetRow.clone();
		targetRowData.find('.ui-resizable-handle').remove();
		targetRow.after(targetRowData);
		//update Tabs Containers IDs
		var newRow = targetRow.next('.row-container');
		var newRowTabsContainers = newRow.find('.tabs-container');
		if (newRowTabsContainers.length > 0) {
			newRowTabsContainers.each(function() {
				var newTabs = jQuery(this);
				var navItems = newTabs.find('.nav-tabs a');
				var tabContainers = newTabs.find('.tab-pane');
				for (i = 0; i < tabContainers.length; i++) {
					var newID = fsnUniqid('tab-');
					navItems.eq(i).attr('href', '#'+ newID);
					tabContainers.eq(i).attr('id', newID);
					tabContainers.eq(i).children('.tab-container').attr('data-tab-id', newID);
				}
			});
		}
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
	});

	//move row in visual editor
	instance.on('click', '.move-row', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var targetRow = trigger.closest('.row-container');
		var moveTo = trigger.data('move');
		switch(moveTo) {
			case 'up':
				var previousRow = targetRow.prev('div');
				if (previousRow.length > 0) {
					targetRow.detach().insertBefore(previousRow);
				}
				break;
			case 'down':
				var nextRow = targetRow.next('div');
				if (nextRow.length > 0) {
					targetRow.detach().insertAfter(nextRow);
				}
				break;
			case 'top':
				var topRow = targetRow.siblings('div').first();
				if (topRow.length > 0) {
					targetRow.detach().insertBefore(topRow);
				}
				break;
			case 'bottom':
				var bottomRow = targetRow.siblings('div').last();
				if (bottomRow.length > 0) {
					targetRow.detach().insertAfter(bottomRow);
				}
				break;
		}
		//update content
		fsnUpdateContent(instance);
	});

	//add column to visual editor
	fsnAddColFields(instance);
	//init tooltips
	fsnInitTooltips(instance);

	instance.on('click', '.fsn-add-col', function() {
		var addColBtn = jQuery(this);
		var colWidth = addColBtn.attr('data-width');
		var colData = fsnGetColumn(colWidth);
		//if this is an offset placeholder
		var nextItem = addColBtn.nextAll('[class*="col-"]').not('.ui-sortable-placeholder').first();
		if (nextItem.length > 0) {
			//remove old offset class and data attr
			var classes = nextItem.attr('class');
			var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
			if (matchedClass != null) {
				nextItem.removeClass(matchedClass[0]);
				nextItem.removeAttr('data-offset');
			}
		}
		jQuery(this).after(colData).remove();
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		fsnResize();
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
	});

	//delete column from visual editor
	instance.on('click', '.delete-col', function(e) {
		e.preventDefault();
		var targetCol = jQuery(this).closest('div[class*="col-"]');
		var targetColWidth = parseInt(targetCol.attr('data-width'));
		var nextItem = targetCol.nextAll('[class*="col-"]').not('.ui-sortable-placeholder').first();
		if (nextItem.length > 0) {
			var itemClasses = nextItem.attr('class');
			var itemColOffsetClass = itemClasses.match(/col-sm-offset-[0-9]+/);
			if (itemColOffsetClass != null) {
				var offsetClassBroken = itemColOffsetClass[0].split('-');
				var offsetColWidthInt = parseInt(offsetClassBroken[3]);
				nextItem.removeClass(itemColOffsetClass[0]);
				nextItem.removeAttr('data-offset');
			} else {
				var offsetColWidthInt = 0;
			}
			var newOffset = targetColWidth + offsetColWidthInt;
			nextItem.addClass('col-sm-offset-'+ newOffset);
			nextItem.attr('data-offset', newOffset);
		}
		targetCol.remove();
		//reinit add col fields
		fsnAddColFields(instance);
		//refenerate content
		fsnUpdateContent(instance);
	});

	//delete tabs from visual editor
	instance.on('click', '.delete-tabs', function(e) {
		e.preventDefault();
		var targetTabs = jQuery(this).closest('.tabs-container');
		targetTabs.fadeOut(400, function() {
			jQuery(this).remove();
			//update content
			fsnUpdateContent(instance);
		});
	});

	//duplicate tabs in visual editor
	instance.on('click', '.duplicate-tabs', function(e) {
		e.preventDefault();
		var targetTabs = jQuery(this).closest('.tabs-container');
		var targetTabsData = targetTabs.clone();
		targetTabsData.find('.ui-resizable-handle').remove();
		targetTabs.after(targetTabsData);
		//update tab IDs
		var newTabs = targetTabs.next('.tabs-container');
		var navItems = newTabs.find('.nav-tabs a');
		var tabContainers = newTabs.find('.tab-pane');
		for (i = 0; i < tabContainers.length; i++) {
			var newID = fsnUniqid('tab-');
			navItems.eq(i).attr('href', '#'+ newID);
			tabContainers.eq(i).attr('id', newID);
			tabContainers.eq(i).children('.tab-container').attr('data-tab-id', newID);
		}
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
	});

	//add tab in visual editor
	instance.on('click', '.fsn-add-tab', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		try {
			trigger.tooltip('close');
		} catch(err) {}
		var tabsNav = trigger.closest('.nav-tabs');
		var targetTabs = trigger.closest('.tabs-container');
		var newTabID = fsnUniqid('tab-');
		var newTab = fsnGetTab(fsnL10n.tab_new, newTabID, true);
		targetTabs.find('.tab-content').append(newTab);
		trigger.parent('li').before('<li><a href="#'+ newTabID +'" data-toggle="tab">'+ fsnL10n.tab_new +'</a></li>');
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
		//target new tab
		trigger.trigger('blur');
		tabsNav.find('li').has('a[data-toggle="tab"]').last().find('a').trigger('click');
	});

	//delete tab from visual editor
	instance.on('click', '.delete-tab', function(e) {
		e.preventDefault();
		var targetTab = jQuery(this).closest('.tab-pane');
		var targetTabID = targetTab.children('.tab-container').attr('data-tab-id');
		var tabNavItem = targetTab.closest('.tabs-wrapper').find('.nav-tabs').find('li').has('a[href="#'+ targetTabID +'"]');
		//get tab to switch to or delete tabs section if no tabs left
		var tabSelect = tabNavItem.prev('li');
		if (tabSelect.length == 0) {
			tabSelect = tabNavItem.next('li');
		}
		targetTab.add(tabNavItem).remove();
		//update content
		fsnUpdateContent(instance);
		tabSelect.children('a').trigger('click');
	});

	//duplicate tab in visual editor
	instance.on('click', '.duplicate-tab', function(e) {
		e.preventDefault();
		var targetTab = jQuery(this).closest('.tab-pane');
		var targetTabID = targetTab.children('.tab-container').attr('data-tab-id');
		var targetTabData = targetTab.clone();
		targetTabData.find('.ui-resizable-handle').remove();
		targetTab.after(targetTabData);
		//update tab ID and add Nav item
		var tabsNav = targetTab.closest('.tabs-wrapper').find('.nav-tabs');
		var newTab = targetTab.next('.tab-pane');
		var newTabTitle = newTab.find('.tab-container').attr('data-tab-title');
		var newID = fsnUniqid('tab-');
		newTab.attr('id', newID);
		newTab.children('.tab-container').attr('data-tab-id',newID);
		tabsNav.find('li').has('a[href="#'+ targetTabID +'"]').after('<li><a href="#'+ newID +'" data-toggle="tab">'+ newTabTitle +'</a></li>');
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//init tooltips
		fsnInitTooltips(instance);
		//update content
		fsnUpdateContent(instance);
		//target new tab
		tabsNav.find('li').has('a[href="#'+ newID +'"]').find('a').trigger('click');
	});

	//delete element from visual editor
	instance.on('click', '.delete-element', function(e) {
		e.preventDefault();
		var targetElement = jQuery(this).closest('.fsn-element');
		targetElement.fadeOut(400, function() {
			jQuery(this).remove();
			//refenerate content
			fsnUpdateContent(instance);
		});
	});

	//duplicate element in visual editor
	instance.on('click', '.duplicate-element', function(e) {
		e.preventDefault();
		var targetElement = jQuery(this).closest('.fsn-element');
		var targetElementData = targetElement.clone();
		targetElement.after(targetElementData);
		//reinit sortables and resizables
		initSortables(instance);
		initResizables(instance);
		//update content
		fsnUpdateContent(instance);
	});

	//sortables
	initSortables(instance);
	instance.find('.sort-row, .sort-col, .sort-element').on('click', function(e) {
		e.preventDefault();
	});

	//resizables
	initResizables(instance);

	//add element
	instance.on('click', '.fsn-add-element', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		try {
			trigger.tooltip('close');
		} catch(err) {}

		var postID = jQuery('input#post_ID').val();

		//row options
		var containerType = trigger.attr('data-container');
		var currentCol = trigger.closest('[class*="col-"]');
		switch(containerType) {
			case 'column':
				var wrapper = currentCol.find('.column-wrapper').first();
				break;
			case 'tab':
				var wrapper = trigger.siblings('.tab-wrapper').find('.tab').first();
				break;
		}

		//get row nesting level
		var colParentRows = currentCol.parents('.row');
		var nestingLevel = colParentRows.length;

		//get tab nesting level
		var tabsNestingLevel = trigger.parents('.tabs-container').length;

		//data to pass to AJAX function
		var data = {
			action: 'add_element_modal',
			nesting_level: nestingLevel,
			tabs_nesting_level: tabsNestingLevel,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#addElementModal');
			modalSelector.modal();
			//update row variables
			modalSelector.on('click', '.element-item', function(e) {
				e.preventDefault();
				//add element container to column
				var elementType = jQuery(this).attr('data-element-type');
				var elementName = jQuery(this).find('.element-name').text();
				//var shortcodeName = 'fsn_'+ elementType;

				switch(elementType) {
					case 'row':
						var rowContent = fsnGetRow();
						wrapper.append(rowContent);
						//reinit add col fields
						fsnAddColFields(instance);
						break;
					case 'tabs':
						var tabsContent = fsnGetTabs();
						wrapper.append(tabsContent);
						break;
					default:
						var elementContent = fsnGetElement(elementType, elementName);
						wrapper.append(elementContent);
				}

				//hide modal and regenerate RTE content
				modalSelector.modal('hide');
				//reinit sortables and resizables
				initSortables(instance);
				initResizables(instance);
				//init tooltips
				fsnInitTooltips(instance);
				//update content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//row modal
	instance.on('click', '.edit-row', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();

		//row options
		var currentContent = trigger.closest('.row-container').find('.row').first();
		var dataAttributes = getDataAttrs(currentContent);

		//data to pass to AJAX function
		var data = {
			action: 'edit_row_modal',
			saved_values: dataAttributes,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#editRowModal');
			modalSelector.modal();
			//init color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//disable incompatible style params
			var disabledSettings = modalSelector.find('input[name="margin_left"], input[name="margin_right"], input[name="margin_xs_left"], input[name="margin_xs_right"], input[name="padding_left"], input[name="padding_right"], input[name="padding_xs_left"], input[name="padding_xs_right"]');
			disabledSettings.each(function() {
				var disabledSetting = jQuery(this);
				disabledSetting.empty().prop('disabled', true);
			});
			//save notice
			fsnSaveNotice(modalSelector);
			//update row variables
			modalSelector.on('hide.bs.modal', function(e) {
				//update box field arrays
				var boxFields = modalSelector.find('.fsn-box-form');
				if (boxFields.length > 0) {
					jQuery(boxFields).each(function() {
						var boxField = jQuery(this);
						fsnUpdateBoxField(boxField);
					});
				}
				//loop through form fields and update data attributes
				var formFields = modalSelector.find('.element-input').not('.content-field');
				formFields.each(function() {
					var fieldType = jQuery(this).attr('type');
					var dataAttributeSuffix = jQuery(this).attr('name').replace(/[_]/g,'-');
					var dataAttribute = 'data-'+ dataAttributeSuffix;
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
							var radioGroupName = jQuery(this).attr('name');
							var checkedRadio = modalSelector.find('input[type="radio"][name="'+ radioGroupName +'"]:checked');
							newParamValue = checkedRadio.val();
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
						currentContent.attr(dataAttribute, newParamValue);
					} else {
						currentContent.removeAttr(dataAttribute);
					}
				});
				//refenerate content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//column modal
	instance.on('click', '.edit-col', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();

		//column options
		var currentContent = trigger.closest('[class*="col-"]');
		var dataAttributes = getDataAttrs(currentContent);

		//data to pass to AJAX function
		var data = {
			action: 'edit_column_modal',
			saved_values: dataAttributes,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#editColModal');
			modalSelector.modal();
			//init color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//save notice
			fsnSaveNotice(modalSelector);
			//update column variables
			modalSelector.on('hide.bs.modal', function(e) {
				//update box field arrays
				var boxFields = modalSelector.find('.fsn-box-form');
				if (boxFields.length > 0) {
					jQuery(boxFields).each(function() {
						var boxField = jQuery(this);
						fsnUpdateBoxField(boxField);
					});
				}
				//loop through form fields and update data attributes
				var formFields = modalSelector.find('.element-input').not('.content-field');
				formFields.each(function() {
					var fieldType = jQuery(this).attr('type');
					var dataAttributeSuffix = jQuery(this).attr('name').replace(/[_]/g,'-');
					var dataAttribute = 'data-'+ dataAttributeSuffix;
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
							var radioGroupName = jQuery(this).attr('name');
							var checkedRadio = modalSelector.find('input[type="radio"][name="'+ radioGroupName +'"]:checked');
							newParamValue = checkedRadio.val();
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
						currentContent.attr(dataAttribute, newParamValue);
					} else {
						currentContent.removeAttr(dataAttribute);
					}
				});
				//refenerate content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//tabs modal
	instance.on('click', '.edit-tabs', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();

		//tabs options
		var currentContent = trigger.closest('.tabs-container');
		var dataAttributes = getDataAttrs(currentContent);

		//data to pass to AJAX function
		var data = {
			action: 'edit_tabs_modal',
			saved_values: dataAttributes,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#editTabsModal');
			modalSelector.modal();
			//init color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//save notice
			fsnSaveNotice(modalSelector);
			//update tabs variables
			modalSelector.on('hide.bs.modal', function(e) {
				//update box field arrays
				var boxFields = modalSelector.find('.fsn-box-form');
				if (boxFields.length > 0) {
					jQuery(boxFields).each(function() {
						var boxField = jQuery(this);
						fsnUpdateBoxField(boxField);
					});
				}
				//loop through form fields and update data attributes
				var formFields = modalSelector.find('.element-input').not('.content-field');
				formFields.each(function() {
					var fieldType = jQuery(this).attr('type');
					var dataAttributeSuffix = jQuery(this).attr('name').replace(/[_]/g,'-');
					var dataAttribute = 'data-'+ dataAttributeSuffix;
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
							var radioGroupName = jQuery(this).attr('name');
							var checkedRadio = modalSelector.find('input[type="radio"][name="'+ radioGroupName +'"]:checked');
							newParamValue = checkedRadio.val();
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
						currentContent.attr(dataAttribute, newParamValue);
					} else {
						currentContent.removeAttr(dataAttribute);
					}
				});
				//refenerate content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//tab modal
	instance.on('click', '.edit-tab', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();

		//tab options
		var currentContent = trigger.closest('.tab-container');
		var dataAttributes = getDataAttrs(currentContent);

		//data to pass to AJAX function
		var data = {
			action: 'edit_tab_modal',
			saved_values: dataAttributes,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#editTabModal');
			modalSelector.modal();
			//init color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//save notice
			fsnSaveNotice(modalSelector);
			//update tab variables
			modalSelector.on('hide.bs.modal', function(e) {
				//loop through form fields and update data attributes
				var formFields = modalSelector.find('.element-input').not('.content-field');
				formFields.each(function() {
					var fieldType = jQuery(this).attr('type');
					var dataAttributeSuffix = jQuery(this).attr('name').replace(/[_]/g,'-');
					var dataAttribute = 'data-'+ dataAttributeSuffix;
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
							var radioGroupName = jQuery(this).attr('name');
							var checkedRadio = modalSelector.find('input[type="radio"][name="'+ radioGroupName +'"]:checked');
							newParamValue = checkedRadio.val();
							break;
						default:
							newParamValue = jQuery(this).val();
					}
					//do not save hidden dependenent field values
					if (jQuery(this).closest('.form-group').hasClass('no-save')) {
						newParamValue = '';
					}
					//update tab title
					if (jQuery(this).attr('name') == 'tab_title') {
						if (newParamValue == '') {
							newParamValue = 'Tab';
						}
						var tabID = currentContent.attr('data-tab-id');
						var tabNavItem = currentContent.closest('.tabs-wrapper').find('.nav-tabs a[href="#'+ tabID +'"]');
						tabNavItem.text(newParamValue);
					}
					if (newParamValue != '') {
						if (jQuery(this).hasClass('encode-base64')) {
							newParamValue = btoa(newParamValue);
						} else if (jQuery(this).hasClass('encode-url')) {
							newParamValue = encodeURIComponent(newParamValue);
						}
						currentContent.attr(dataAttribute, newParamValue);
					} else {
						currentContent.removeAttr(dataAttribute);
					}
				});
				//refenerate content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//element modal
	instance.on('click', '.fsn-element .edit-element', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();
		var shortcodeTag = trigger.closest('.fsn-element').attr('data-shortcode-tag');

		//content options
		var currentContent = trigger.closest('.element-controls').siblings('.element-text-holder');
		var fsnContent = currentContent.html();
		var dataAttributes = getDataAttrs(currentContent);

		//data to pass to AJAX function
		var data = {
			action: shortcodeTag +'_modal',
			content_html: fsnContent,
			saved_values: dataAttributes,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			var modalSelector = jQuery('.modal[id="'+ shortcodeTag +'_modal"]').last();

			//register modal events, open modal, and reinit tinyMCE
			if (jQuery('#fsncontent').length > 0) {
				setUserSetting( 'editor', 'tinymce' );
				modalSelector.on('shown.bs.modal', function() {
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
				}).on('hidden.bs.modal', function() {
          //destroy tinyMCE
					//make compatable with TinyMCE 4 which is used starting with WordPress 3.9
					if(tinymce.majorVersion === "4") {
						tinymce.execCommand('mceRemoveEditor', true, 'fsncontent');
                    } else {
						tinymce.execCommand("mceRemoveControl", true, 'fsncontent');
                    }
				}).modal('show');
			} else {
        modalSelector.modal('show');
      }
			//init color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//save notice
			fsnSaveNotice(modalSelector);
			//update content variables
			modalSelector.on('hide.bs.modal', function(e) {
				//custom save trigger event
				modalSelector.trigger('fsnSave', shortcodeTag);
				if (modalSelector.find('#fsncontent').not('.element-input').length > 0) {
					//update html content
					if ( jQuery('#wp-fsncontent-wrap').hasClass('html-active') ) {
						var htmlEditorVal = switchEditors.wpautop(jQuery('#fsncontent').val());
						tinyMCE.get('fsncontent').setContent(htmlEditorVal);
					}
					var newContent = tinyMCE.get('fsncontent').getContent();
					if (newContent != '') {
						currentContent.html(newContent);
					} else {
						currentContent.empty();
					}
				} else if (modalSelector.find('.content-field').length > 0) {
          var contentField = modalSelector.find('.content-field');
					if (contentField.hasClass('encode-base64')) {
						var newContent = contentField.val();
						var newContent = btoa(newContent);
					} else if (contentField.hasClass('encode-url')) {
						var newContent = contentField.val();
						var newContent = encodeURIComponent(newContent);
					} else if (contentField.is('textarea')) {
						var newContent = fsnautop(contentField.val());
					} else {
						var newContent = contentField.val();
					}
					if (newContent != '') {
						currentContent.html(newContent);
					} else  {
						currentContent.empty();
					}
				}
				//update box field arrays
				var boxFields = modalSelector.find('.fsn-box-form');
				if (boxFields.length > 0) {
					jQuery(boxFields).each(function() {
						var boxField = jQuery(this);
						fsnUpdateBoxField(boxField);
					});
				}
				//loop through form fields and update data attributes
				var formFields = modalSelector.find('.element-input').not('.content-field, .nested');
				formFields.each(function() {
					var fieldType = jQuery(this).attr('type');
					var dataAttributeSuffix = jQuery(this).attr('name').replace(/[_]/g,'-');
					var dataAttribute = 'data-'+ dataAttributeSuffix;
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
							var radioGroupName = jQuery(this).attr('name');
							var checkedRadio = modalSelector.find('input[type="radio"][name="'+ radioGroupName +'"]:checked');
							newParamValue = checkedRadio.val();
							break;
						default:
							if (jQuery(this).attr('id') == 'fsncontent') {
								if ( jQuery('#wp-fsncontent-wrap').hasClass('html-active') ) {
									var htmlEditorVal = switchEditors.wpautop(jQuery('#fsncontent').val());
									tinyMCE.get('fsncontent').setContent(htmlEditorVal);
								}
								newParamValue = tinyMCE.get('fsncontent').getContent();
							} else {
								newParamValue = jQuery(this).val();
							}
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
						currentContent.attr(dataAttribute, newParamValue);
					} else {
						currentContent.removeAttr(dataAttribute);
					}
					//update element label
					if (dataAttributeSuffix == 'element-label') {
						var elementLabel = currentContent.siblings('.element-label');
						if (newParamValue != '') {
							var elementLabelText = newParamValue;
						} else {
							var elementLabelText = elementLabel.attr('title');
						}
						elementLabel.html(elementLabelText);
					}
				});
				//hide modal ensure user editor setting stays as tinymce and regenerate RTE content
				setUserSetting( 'editor', 'tinymce' );
				//refenerate content
				fsnUpdateContent(instance);
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//save template modal
	instanceParent.on('click', '.fsn-save-template', function(e) {
		e.preventDefault();

		var postID = jQuery('input#post_ID').val();

		//data to pass to AJAX function
		var data = {
			action: 'save_template_modal',
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			//open modal
			var modalSelector = jQuery('#save_template_modal');
			modalSelector.modal('show');
			//update content variables
			modalSelector.on('click', '.save-template', function(e) {
				e.preventDefault();
				var templateName = modalSelector.find('input[name="template_name"]').val();
				if (instance.attr('id') == 'fsn-main-ui') {
					var templateData = tinyMCE.get('content').getContent();
				} else {
					var templateData = fsnGetContent(instance);
				}
				var savedata = {
					action: 'save_template',
					template_name: templateName,
					template_data: templateData,
					post_id: postID,
					security: fsnJS.fsnEditNonce
				};
				jQuery.post(ajaxurl, savedata, function(response) {
					modalSelector.find('.notice').remove();
					if (response.status == 'success') {
						modalSelector.find('.modal-body').prepend('<div class="notice notice-success is-dismissible"><p>'+ fsnL10n.template_save_success +'</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">'+ fsnL10n.notice_dismiss +'</span></button></div>');
					} else if (response.status == 'error') {
						modalSelector.find('.modal-body').prepend('<div class="notice notice-error is-dismissible"><p>'+ fsnL10n.template_save_error +'</p><button class="notice-dismiss" type="button"><span class="screen-reader-text">'+ fsnL10n.notice_dismiss +'</span></button></div>');
					}
				});
			});
			//dismiss notices
			modalSelector.on('click', '.notice-dismiss' , function() {
				jQuery(this).closest('.notice').fadeOut(200, function() {
					jQuery(this).remove();
				});
			});
			//delete modal on hidden
			modalSelector.on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			});
		});
	});

	//load template modal
	instanceParent.on('click', '.fsn-load-template' , function(e) {
		e.preventDefault();

		var postID = jQuery('input#post_ID').val();

		//data to pass to AJAX function
		var data = {
			action: 'load_template_modal',
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//append modal to body
			jQuery('body').append(response);
			var modalSelector = jQuery('#load_template_modal');
			//register modal events, open modal, and set template options
			modalSelector.on('shown.bs.modal', function(e) {
				jQuery(this).on('click', '.template-controls-toggle', function(e) {
					e.stopPropagation();
					var trigger = jQuery(this);
					var target = trigger.next('.template-controls-dropdown');
					fsnCloseDropdowns(trigger, target);
					trigger.toggleClass('open');
					target.toggleClass('collapsed');
				});
			}).on('hidden.bs.modal', function(e) {
				jQuery(this).remove();
			}).modal('show');
			//load template
			modalSelector.on('click', '.template-item', function(e) {
				e.preventDefault();
				var templateItem = jQuery(this);
				var templateID = templateItem.attr('data-template-id');

				var data = {
					action: 'load_template',
					template_id: templateID,
					post_id: postID,
					security: fsnJS.fsnEditNonce
				};
				jQuery.post(ajaxurl, data, function(response) {
					if (response == '-1') {
						alert(fsnL10n.error);
						return false;
					}
					//hide modal
					instance.empty().append(response);
					modalSelector.modal('hide');
					//regenerate Tabs IDs
					var tabsContainers = instance.find('.tabs-container');
					if (tabsContainers.length > 0) {
						tabsContainers.each(function() {
							var tabs = jQuery(this);
							var navItems = tabs.find('.nav-tabs a');
							var tabContainers = tabs.find('.tab-pane');
							for (i = 0; i < tabContainers.length; i++) {
								var newID = fsnUniqid('tab-');
								navItems.eq(i).attr('href', '#'+ newID);
								tabContainers.eq(i).attr('id', newID);
								tabContainers.eq(i).children('.tab-container').attr('data-tab-id', newID);
							}
						});
					}
					//reinit sortables and resizables
					initSortables(instance);
					initResizables(instance);
					//init tooltips
					fsnInitTooltips(instance);
					//reinit add col fields
					fsnAddColFields(instance);
					//update content
					fsnUpdateContent(instance);
				});
			});
			//delete template
			modalSelector.on('click', '.delete-template', function(e) {
				e.preventDefault();
				e.stopPropagation();
				var templateItem = jQuery(this).closest('.template-item');
				var templateID = templateItem.attr('data-template-id');
				var data = {
					action: 'delete_template',
					template_id: templateID,
					post_id: postID,
					security: fsnJS.fsnEditNonce
				};
				jQuery.post(ajaxurl, data, function(response) {
					if (response == '-1') {
						alert(fsnL10n.error);
						return false;
					}
					//remove item
					if(response.status == 'success') {
						templateItem.fadeOut(300, function() {
							jQuery(this).remove();
							if (jQuery('.template-item').length == 0) {
								modalSelector.find('.modal-body').append('<p>'+ fsnL10n.template_delete_all +'</p>');
							}
						});
					} else {
						alert(fsnL10n.template_delete_error);
					}
				});
			});
			//load more templates
			modalSelector.on('click', '.fsn-load-more-templates', function(e) {
				e.preventDefault();
				var loadMoreBtn = jQuery(this);
				var nextPage = (loadMoreBtn.data('paged') !== undefined) ? parseInt(loadMoreBtn.data('paged')) : 2;
				var postsPerPage = 20;
				var totalPosts = parseInt(loadMoreBtn.data('total'));
				var totalPages = Math.ceil(totalPosts/postsPerPage);

				var data = {
					action: 'fsn_posts_search',
					page : nextPage,
					posts_per_page : postsPerPage,
					postType : 'template',
					post_id: postID,
					security: fsnJS.fsnEditNonce
				};
				jQuery.post(ajaxurl, data, function(response) {
					if (response == '-1') {
						alert(fsnL10n.error);
						return false;
					}
					//load templates
					var output = '';
					for (i=0; i < response.items.length; i++) {
						output += '<div class="template-item" data-template-id="'+ response.items[i].id +'"><span class="template-name">'+ response.items[i].text +'</span><span class="template-controls-toggle" title="'+ fsnL10n.template_options +'"><i class="material-icons">&#xE5D3;</i></span><div class="template-controls-dropdown collapsed"><a href="#" class="delete-template">'+ fsnL10n.delete +'</a></div></div>';
					}
					loadMoreBtn.before(output);
					//increment page
					if (nextPage < totalPages) {
						nextPage = nextPage + 1;
						loadMoreBtn.data('paged', nextPage);
					} else {
						loadMoreBtn.remove();
					}
				}, 'json');
			});
		});
	});
}

function fsnAddColFields(instance) {
	//remove add col areas
	instance.find('.fsn-add-col').remove();
	//in offset areas
	var colsWithOffset = instance.find('div[class*="col-sm-offset"]');
	colsWithOffset.each(function() {
		var col = jQuery(this);
		var spaceAvailable = col.attr('data-offset');
		var spaceAvailableWidth = (parseInt(col.css('margin-left')) - 8);
		var addColLeft = ( col.offset().left - col.closest('.row').offset().left ) - spaceAvailableWidth - 4;
		col.before('<div class="fsn-add-col" style="width:'+ spaceAvailableWidth +'px; left:'+ addColLeft +'px;" data-width="'+ spaceAvailable +'" title="'+ fsnL10n.column_add +'"><i class="material-icons md-18">&#xE147;</i></div>');
	});
	//after last col
	var rows = instance.find('.row');
	rows.each(function() {
		var usedSpace = 0;
		var row = jQuery(this);
		var cols = row.children('[class*="col-"]');
		cols.each(function() {
			var itemClasses = jQuery(this).attr('class');
			var itemColClass = itemClasses.match(/col-sm-[0-9]+/);
			var classBroken = itemColClass[0].split('-');
			var colWidthInt = parseInt(classBroken[2]);
			var itemColOffsetClass = itemClasses.match(/col-sm-offset-[0-9]+/);
			if (itemColOffsetClass != null) {
				var offsetClassBroken = itemColOffsetClass[0].split('-');
				var offsetColWidthInt = parseInt(offsetClassBroken[3]);
			} else {
				var offsetColWidthInt = 0;
			}
			usedSpace = usedSpace + colWidthInt + offsetColWidthInt;
		});
		if (usedSpace < 12) {
			spaceAvailable = 12 - usedSpace;
			spaceAvailableWidth = (jQuery(this).width() / 12) * spaceAvailable - 8;
			addColLeft = (jQuery(this).width() / 12) * usedSpace + 4;
			jQuery(this).append('<div class="fsn-add-col" style="width:'+ spaceAvailableWidth +'px; left:'+ addColLeft +'px;" data-width="'+ spaceAvailable +'" title="'+ fsnL10n.column_add +'"><i class="material-icons md-18">&#xE147;</i></div>');
		}
	});
	//init tooltips
	fsnInitTooltips(instance, true);
}

function initSortables(instance) {

	//row sorting
	instance.sortable({
		//connectWith: "#fsn-interface-grid > .row-container > .row-wrapper > .row > [class*='col-'] > .column-container > .column-wrapper",
		cursor: "move",
		items: ".row-container",
		handle: ".row-header",
		placeholder: 'row-sort-placeholder',
		dropOnEmpty: true,
		over: function(event, ui) {
			ui.placeholder.css({width:ui.item.width(), height:ui.item.outerHeight()});
		},
		change: function(event, ui) {
			//reinit add col fields
			//fsnAddColFields(instance);
		},
		update: function(event, ui) {
			//reinit add col fields
			fsnAddColFields(instance);
			//update content
			fsnUpdateContent(instance);
		}
	});

	//column sorting
	var leftStart = 0;
	instance.find('.row').sortable({
		//connectWith: "#fsn-interface-grid .row",
		cursor: "move",
		helper: "clone",
		items: "[class*='col-']",
		handle: ".column-header",
		dropOnEmpty: true,
		over: function(event, ui) {
			ui.placeholder.css({height:ui.item.outerHeight()});
		},
		start: function(event, ui) {
			leftStart = ui.placeholder.offset().left - ui.item.parent('.row').offset().left;
		},
		stop: function(event, ui) {
			//set offset
			var currentItem = ui.item;
			var nextItem = currentItem.nextAll('[class*="col-"]').not('.ui-sortable-placeholder').first();
			var gridWidth = currentItem.parent('.row').width();
			var colWidth = gridWidth / 12;
			var droppedLeft = leftStart + (ui.position.left - ui.originalPosition.left);
			//account for preceding items
			var precedingItems = currentItem.prevAll('[class*="col-"]').not('.ui-sortable-placeholder');
			var colSpace = 0;
			precedingItems.each(function() {
				var itemClasses = jQuery(this).attr('class');
				var itemColClass = itemClasses.match(/col-sm-[0-9]+/);
				var classBroken = itemColClass[0].split('-');
				var colWidthInt = parseInt(classBroken[2]);
				var itemColOffsetClass = itemClasses.match(/col-sm-offset-[0-9]+/);
				if (itemColOffsetClass != null) {
					var offsetClassBroken = itemColOffsetClass[0].split('-');
					var offsetColWidthInt = parseInt(offsetClassBroken[3]);
				} else {
					var offsetColWidthInt = 0;
				}
				colSpace = colSpace + colWidthInt + offsetColWidthInt;
			});

			var offset = Math.round(droppedLeft / colWidth) - colSpace;

			//stop items from pushing out of grid or to next line
			var totalFromLeft = colSpace + offset;
			var currentItemWidth = parseInt(currentItem.attr('data-width'));
			var totalSpaceFront = totalFromLeft + currentItemWidth;

			if (totalSpaceFront > 12) {
				var pullBack = totalSpaceFront - 12;
				offset = offset - pullBack;
			}
			if (offset > 11) {
				offset = 11;
			}
			var totalSpace = totalSpaceFront;
			var succeedingItems = currentItem.nextAll().not('.ui-sortable-placeholder');
			if (succeedingItems.first().hasClass('fsn-add-col')) {
				succeedingItems = succeedingItems.slice(1);
			}
			succeedingItems.each(function() {
				var colWidthInt = parseInt(jQuery(this).data('width'));
				totalSpace = totalSpace + colWidthInt;
			});
			if (totalSpace > 12) {
				var pullBack = totalSpace - 12;
				offset = offset - pullBack;
			}
			if (offset > 11) {
				offset = 11;
			}
			//check for empty space to move into
			if (offset >= 0) {
				//get offset difference
				var oldOffset = parseInt(currentItem.attr('data-offset'));
				if (isNaN(oldOffset)) {
					oldOffset = 0;
				}
				var offsetDifference = oldOffset - offset;
				//remove old offset class and data attr
				var classes = currentItem.attr('class');
				var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
				if (matchedClass != null) {
					currentItem.removeClass(matchedClass[0]);
					currentItem.removeAttr('data-offset');
				}
				//add new offset class and data attr
				if (offset > 0) {
					currentItem.addClass('col-sm-offset-'+ offset);
					currentItem.attr('data-offset', offset);
				}
			}
			//offset next item by difference
			if (nextItem.length != 0) {
				var nextItemClasses = nextItem.attr('class');
				var nextItemMatchedClass = nextItemClasses.match(/col-sm-offset-[0-9]+/);
				if (nextItemMatchedClass != null) {
					//get next item offset
					var nextItemOffset = parseInt(nextItem.attr('data-offset'));
					var nextItemNewOffset = nextItemOffset + offsetDifference;
					if (nextItemNewOffset > 11) {
						nextItemNewOffset = 11;
					}
					//remove old offset class and data attr
					nextItem.removeClass(nextItemMatchedClass[0]);
					nextItem.removeAttr('data-offset');
				} else {
					var nextItemNewOffset = offsetDifference;
				}
				//add new offset class and data attr
				if (nextItemNewOffset > 0) {
					nextItem.addClass('col-sm-offset-'+ nextItemNewOffset);
					nextItem.attr('data-offset', nextItemNewOffset);
				}
			}
			//reinit add col fields
			fsnAddColFields(instance);
			//update content
			fsnUpdateContent(instance);
		}
	});

	//tab sorting
	instance.find('.row [class*="col-"] .column-wrapper .nav-tabs').sortable({
		cursor: "move",
		items: "li:has(a[data-toggle='tab'])",
		axis: "x",
		update: function(event, ui) {
			//reorder tab containers
			var targetMenu = jQuery(event.target);
			var targetMenuItems = targetMenu.find('li');
			var targetItem = jQuery(ui.item);
			var targetItemID = targetItem.find('a').attr('href').replace('#','');
			var targetItemIndex = targetMenuItems.index(targetItem);
			var targetContainers = targetMenu.closest('.tabs-wrapper').find('.tab-content .tab-pane');
			var targetContainer = targetContainers.filter('[id="'+ targetItemID +'"]');
			var targetContainerIndex = targetContainers.index(targetContainer);
			var entryPoint = targetContainers.eq(targetItemIndex);
			var targetContainerData = targetContainer.detach();
			if (targetContainerIndex > targetItemIndex) {
				entryPoint.before(targetContainerData);
			} else if (targetContainerIndex < targetItemIndex) {
				entryPoint.after(targetContainerData);
			}
			//reinit add col fields
			//fsnAddColFields(instance);
			//update content
			fsnUpdateContent(instance);
		}
	});

	//tabs and element sorting
	instance.find('.row [class*="col-"] .column-wrapper, .row [class*="col-"] .column-wrapper .tab').sortable({
		connectWith: ".fsn-interface-grid [class*='col-'] .column-wrapper, .fsn-interface-grid [class*='col-'] .column-wrapper .tab",
		cursor: "move",
		items: ".fsn-element, .row-container, .tabs-container",
		dropOnEmpty: true,
		stop: function(event, ui) {
			var doubleNestedRowContainers = jQuery('.row-container').find('.row-container').find('.row-container');
			if (doubleNestedRowContainers.length > 0) {
				jQuery(this).sortable('cancel')
			}
			var nestedTabsContainers = jQuery('.tabs-container').find('.tabs-container');
			if (nestedTabsContainers.length > 0) {
				jQuery(this).sortable('cancel')
			}
		},
		update: function(event, ui) {
			//update content
			fsnUpdateContent(instance);
		}
	});
}

function initResizables(instance) {
	instance.find('.row [class*="col-"]').resizable({
		handles: 'e, w',
		helper: 'fsn-helper',
		stop: function(event, ui) {
			//reset Resizable outcome
			ui.element.removeAttr('style');
			//set vars
			var originalWidth = ui.originalSize.width;
			var originalTop = ui.originalPosition.top;
			var originalLeft = ui.originalPosition.left;
			var originalHeight = ui.originalSize.height;
			var newWidth = ui.size.width;
			var newHeight = ui.size.height;
			var newTop = ui.position.top;
			var newLeft = ui.position.left;
			//calculate change in column width
			var currentItem = ui.element;
			var gridWidth = currentItem.parent('.row').width();
			var colWidth = gridWidth / 12;
			var widthDifference = newWidth - originalWidth;
			var colDifference = Math.round(widthDifference / colWidth);

			//get dragging direction based on positions
			if (newLeft == originalLeft) {
				//RIGHT HANDLE
				if (colDifference > 0) {
					//EXPANDING
					var nextItem = currentItem.nextAll('[class*="col-"]').not('.ui-sortable-placeholder').first();
					if (nextItem.length > 0) {
						var availableSpace = parseInt(nextItem.attr('data-offset'));
						var nextItemWidth = parseInt(nextItem.attr('data-width'));
						if (isNaN(availableSpace)) {
							availableSpace = 0;
						}
						if (colDifference > availableSpace) {
							colDifference = availableSpace;
						}
						var newOffset = availableSpace - colDifference;
						if ((nextItemWidth + newOffset) > 12) {
							newOffset = 0;
						}
						//remove old offset class and data attr
						var classes = nextItem.attr('class');
						var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
						if (matchedClass != null) {
							nextItem.removeClass(matchedClass[0]);
							nextItem.removeAttr('data-offset');
						}
						//add new offset class and data attr
						if (newOffset > 0) {
							nextItem.addClass('col-sm-offset-'+ newOffset);
							nextItem.attr('data-offset', newOffset);
						}
					}
					//resize item
					var currentItemClasses = currentItem.attr('class');
					var currentItemWidth = parseInt(currentItem.attr('data-width'));
					var prevItems = currentItem.prevAll('[class*="col-"]').not('.ui-sortable-placeholder');
					var prevItemsSpace = 0;
					prevItems.each(function() {
						var prevItemWidth = parseInt(jQuery(this).attr('data-width'));
						if (isNaN(prevItemWidth)) {
							prevItemWidth = 0;
						}
						var prevItemOffset = parseInt(jQuery(this).attr('data-offset'));
						if (isNaN(prevItemOffset)) {
							prevItemOffset = 0;
						}
						prevItemsSpace = prevItemsSpace + (prevItemWidth + prevItemOffset);
					});
					var newWidth = currentItemWidth + colDifference;
					var currentItemOffset = parseInt(currentItem.attr('data-offset'));
					if (isNaN(currentItemOffset)) {
						currentItemOffset = 0;
					}
					if (newWidth + prevItemsSpace + currentItemOffset > 12) {
						newWidth = 12 - (prevItemsSpace + currentItemOffset);
					}
					if (newWidth > 12) {
						newWidth = 12;
					} else if (newWidth <= 0) {
						newWidth = 1;
					}
					var currentItemMatchedClass = currentItemClasses.match(/col-sm-[0-9]+/);
					if (currentItemMatchedClass != null) {
						currentItem.removeClass(currentItemMatchedClass[0]);
						currentItem.removeAttr('data-width');
					}
					currentItem.addClass('col-sm-'+ newWidth);
					currentItem.attr('data-width', newWidth);
				} else {
					//CONTRACTING
					var nextItem = currentItem.nextAll('[class*="col-"]').not('.ui-sortable-placeholder').first();
					if (nextItem.length > 0) {
						var currentOffset = parseInt(nextItem.attr('data-offset'));
						var nextItemWidth = parseInt(nextItem.attr('data-width'));
						if (isNaN(currentOffset)) {
							currentOffset = 0;
						}
						var newOffset = currentOffset - colDifference;
						if (nextItemWidth + newOffset > 12) {
							newOffset = 0;
						}
						//remove old offset class and data attr
						var classes = nextItem.attr('class');
						var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
						if (matchedClass != null) {
							nextItem.removeClass(matchedClass[0]);
							nextItem.removeAttr('data-offset');
						}
						//add new offset class and data attr
						if (newOffset > 0) {
							nextItem.addClass('col-sm-offset-'+ newOffset);
							nextItem.attr('data-offset', newOffset);
						}
					}
					//resize item
					var currentItemClasses = currentItem.attr('class');
					var currentItemWidth = parseInt(currentItem.attr('data-width'));
					var newWidth = currentItemWidth + colDifference;
					if (newWidth < 1) {
						newWidth = 1;
					}
					var currentItemMatchedClass = currentItemClasses.match(/col-sm-[0-9]+/);
					if (currentItemMatchedClass != null) {
						currentItem.removeClass(currentItemMatchedClass[0]);
						currentItem.removeAttr('data-width');
					}
					currentItem.addClass('col-sm-'+ newWidth);
					currentItem.attr('data-width', newWidth);
				}
			} else {
				//LEFT HANDLE
				if (colDifference > 0) {
					//EXPANDING
					var availableSpace = parseInt(currentItem.attr('data-offset'));
					if (isNaN(availableSpace)) {
						availableSpace = 0;
					}
					if (colDifference > availableSpace) {
						colDifference = availableSpace;
					}
					var newOffset = availableSpace - colDifference;
					//remove old offset class and data attr
					var classes = currentItem.attr('class');
					var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
					if (matchedClass != null) {
						currentItem.removeClass(matchedClass[0]);
						currentItem.removeAttr('data-offset');
					}
					//add new offset class and data attr
					if (newOffset > 0) {
						currentItem.addClass('col-sm-offset-'+ newOffset);
						currentItem.attr('data-offset', newOffset);
					}
					//resize item
					var currentItemClasses = currentItem.attr('class');
					var currentItemWidth = parseInt(currentItem.attr('data-width'));
					var newWidth = currentItemWidth + colDifference;
					if (newWidth > 12) {
						newWidth = 12;
					}
					var currentItemMatchedClass = currentItemClasses.match(/col-sm-[0-9]+/);
					if (currentItemMatchedClass != null) {
						currentItem.removeClass(currentItemMatchedClass[0]);
						currentItem.removeAttr('data-width');
					}
					currentItem.addClass('col-sm-'+ newWidth);
					currentItem.attr('data-width', newWidth);
				} else {
					//CONTRACTING
					//resize item
					var currentItemClasses = currentItem.attr('class');
					var currentItemWidth = parseInt(currentItem.attr('data-width'));
					var newWidth = currentItemWidth + colDifference;
					if (newWidth < 1) {
						newWidth = 1;
					}
					var currentItemMatchedClass = currentItemClasses.match(/col-sm-[0-9]+/);
					if (currentItemMatchedClass != null) {
						currentItem.removeClass(currentItemMatchedClass[0]);
						currentItem.removeAttr('data-width');
					}
					currentItem.addClass('col-sm-'+ newWidth);
					currentItem.attr('data-width', newWidth);
					//add offset to fill removed space
					var currentOffset = parseInt(currentItem.attr('data-offset'));
					if (isNaN(currentOffset)) {
						currentOffset = 0;
					}
					var newOffset = currentOffset - colDifference;
					//remove old offset class and data attr
					var classes = currentItem.attr('class');
					var matchedClass = classes.match(/col-sm-offset-[0-9]+/);
					if (matchedClass != null) {
						currentItem.removeClass(matchedClass[0]);
						currentItem.removeAttr('data-offset');
					}
					//add new offset class and data attr
					if (newOffset > 0) {
						currentItem.addClass('col-sm-offset-'+ newOffset);
						currentItem.attr('data-offset', newOffset);
					}
				}
			}
			var currentItemWidth = currentItem.attr('data-width');
			currentItem.find('.column-title .column-width').text(currentItemWidth);
			//reinit add col fields
			fsnAddColFields(instance);
			//update content
			fsnResize();
			fsnUpdateContent(instance);
		}
	});
}

//modal field dependencies
jQuery(document).ready(function() {
	jQuery('body').on('show.bs.modal', function (e) {
		var modal = jQuery(e.target);
		setDependencies(modal);
	});
});

function setDependencies(container) {
	var dependentFields = container.find('.form-group[data-dependency-param]');
	dependentFields.each(function() {
		var currentField = jQuery(this);
		var dependentOn = currentField.attr('data-dependency-param');
		var dependentOnElem = container.find('[name="'+ dependentOn +'"]');
		var notEmpty = currentField.attr('data-dependency-not-empty');
		var value = currentField.attr('data-dependency-value');
		var callback = jQuery(this).attr('data-dependency-callback');
		//not empty hide / show
		if (notEmpty != undefined && notEmpty == 'true') {
			dependentOnElemType = dependentOnElem.attr('type');
			switch(dependentOnElemType) {
				case 'checkbox':
					if (dependentOnElem.is(':checked') == true) {
						currentField.removeClass('no-save').show();
					} else {
						currentField.addClass('no-save').hide();
					}
					break;
				default:
					if (dependentOnElem.val() == '' || dependentOnElem.val() == null) {
						currentField.addClass('no-save').hide();
					} else {
						currentField.removeClass('no-save').show();
					}
			}
		}
		//value hide / show
		if (value != undefined) {
			dependentOnElemType = dependentOnElem.attr('type');
			switch(dependentOnElemType) {
				case 'radio':
					currentField.addClass('no-save').hide();
					try {
						valueArray = JSON.parse(value);
					} catch(err) {
						valueArray = new Array();
						valueArray.push(value);
					}
					for(i = 0; i < valueArray.length; i++) {
						if (dependentOnElem.filter('[value="'+ valueArray[i] +'"]').is(':checked')) {
							currentField.removeClass('no-save').show();
							break;
						}
					}
					break;
				default:
					try {
						valueArray = JSON.parse(value);
					} catch(err) {
						valueArray = new Array();
						valueArray.push(value);
					}
					if (jQuery.inArray(dependentOnElem.val(), valueArray) != -1) {
						currentField.removeClass('no-save').show();
					} else {
						currentField.addClass('no-save').hide();
					}
			}
		}
		//bind listener
		dependentOnElem.on('change.dependency', function(e) {
			//not empty hide / show
			if (notEmpty != undefined && notEmpty == 'true') {
				dependentOnElemType = dependentOnElem.attr('type');
				switch(dependentOnElemType) {
					case 'checkbox':
						if (dependentOnElem.is(':checked') == true) {
							currentField.removeClass('no-save').show();
						} else {
							currentField.addClass('no-save').hide();
						}
						break;
					default:
						if (dependentOnElem.val() == '' || dependentOnElem.val() == null) {
							currentField.addClass('no-save').hide();
						} else {
							currentField.removeClass('no-save').show();
						}
				}
			}
			//value hide / show
			if (value != undefined) {
				dependentOnElemType = dependentOnElem.attr('type');
				switch(dependentOnElemType) {
					case 'radio':
						currentField.addClass('no-save').hide();
						try {
							valueArray = JSON.parse(value);
						} catch(err) {
							valueArray = new Array();
							valueArray.push(value);
						}
						for(i = 0; i < valueArray.length; i++) {
							if (dependentOnElem.filter('[value="'+ valueArray[i] +'"]').is(':checked')) {
								currentField.removeClass('no-save').show();
								break;
							}
						}
						break;
					default:
						try {
							valueArray = JSON.parse(value);
						} catch(err) {
							valueArray = new Array();
							valueArray.push(value);
						}
						if (jQuery.inArray(dependentOnElem.val(), valueArray) != -1) {
							currentField.removeClass('no-save').show();
						} else {
							currentField.addClass('no-save').hide();
						}
				}
			}
			//fire callback
			if (callback != undefined) {
				window[callback](event);
			}
		});
	});
}

//button field
jQuery(document).ready(function() {
	//init modal
	jQuery('body').on('click', '.fsn-add-edit-button', function(e) {
		e.preventDefault();
		var buttonTrigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();
		var buttonSummaryContainer = buttonTrigger.siblings('.button-summary');
		var currentButtonStringField = buttonTrigger.siblings('.button-string');
		currentButtonArray = new Object;
		try {
			var currentButtonArray = JSON.parse(currentButtonStringField.val());
		} catch(err) {}

		var currentLink = currentButtonArray.link;
		var currentLabel = currentButtonArray.label;
    var currentAriaLabel = currentButtonArray.ariaLabel;
		var currentAttached = currentButtonArray.attachedID;
		var currentTarget = currentButtonArray.target;
		var currentType = currentButtonArray.type;
		var currentCollapseID = currentButtonArray.collapseID;
		var currentCollapseLabelShow = currentButtonArray.collapseLabelShow;
		var currentCollapseLabelHide = currentButtonArray.collapseLabelHide;
		var currentComponentID = currentButtonArray.componentID;

		jQuery.post(
		    ajaxurl,
		    {
		        action : 'init-button-modal',
		        post_id: postID,
		        current_link: currentLink,
		        current_label: currentLabel,
            current_aria_label: currentAriaLabel,
		        current_attached: currentAttached,
		        current_target: currentTarget,
		        current_type: currentType,
		        current_collapse_id: currentCollapseID,
		        current_collapse_label_show: currentCollapseLabelShow,
		        current_collapse_label_hide: currentCollapseLabelHide,
		        current_component_id: currentComponentID,
		        security: fsnJS.fsnEditNonce
		    },
		    function( response ) {
			    if (response == '-1') {
					alert(fsnL10n.error);
					return false;
				}
		        jQuery('body').append(response);
		        var buttonModal = jQuery('.button-modal').last();

				//open modal
		        buttonModal.modal();

		        var buttonLink = buttonModal.find('[name="button_link"]');
		        var buttonLabel = buttonModal.find('[name="button_label"]');
            var buttonAriaLabel = buttonModal.find('[name="button_aria_label"]');
		        var buttonTarget = buttonModal.find('[name="button_target"]');
		        var buttonType = buttonModal.find('[name="button_type"]');
		        var buttonCollapseID = buttonModal.find('[name="button_collapse_id"]');
		        var buttonCollapseLabelShow = buttonModal.find('[name="button_collapse_label_show"]');
		        var buttonCollapseLabelHide = buttonModal.find('[name="button_collapse_label_hide"]');
		        var buttonComponentID = buttonModal.find('[name="button_component_id"]');

		        //save notice
				fsnSaveNotice(buttonModal);

		        //select post
		        buttonModal.find('[name="button_attached"]').on('change', function() {
		        	var selectedOption = jQuery(this).find('option:selected');
		        	if (selectedOption.val() != '') {
				        var selectedLabel = jQuery(this).find('option:selected').text();
				        buttonLabel.val(selectedLabel);
			        } else {
				        buttonLabel.val('');
			        }
		        });

		        //save modal
		        buttonModal.on('hide.bs.modal', function(e) {
			        var buttonLinkVal = String.prototype.trim ? buttonLink.val().trim() : buttonLink.val().replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
			        var buttonLabelVal = buttonLabel.val();
              var buttonAriaLabelVal = buttonAriaLabel.val();
			        var attachedItem = jQuery('[name="button_attached"]').find('option:selected');
			        var buttonTargetVal = buttonTarget.val();
			        var buttonTypeVal = buttonType.find('option:selected').val();
			        var buttonCollapseIDval = buttonCollapseID.val();
			        var buttonCollapseLabelShowVal = buttonCollapseLabelShow.val();
			        var buttonCollapseLabelHideVal = buttonCollapseLabelHide.val();
			        var buttonComponentIDval = buttonComponentID.val();

			        //empty non-relevant fields
			        switch(buttonTypeVal) {
			        	case 'external':
			        		attachedItem = '';
			        		buttonCollapseIDval = '';
			        		buttonCollapseLabelShowVal = '';
			        		buttonCollapseLabelHideVal = '';
			        		buttonComponentIDval = '';
			        		break;
			        	case 'internal':
			        		buttonLinkVal = '';
			        		buttonCollapseIDval = '';
			        		buttonCollapseLabelShowVal = '';
			        		buttonCollapseLabelHideVal = '';
			        		buttonComponentIDval = '';
			        		break;
			        	case 'collapse':
			        		attachedItem = '';
			        		buttonLinkVal = '';
			        		buttonLabelVal = '';
			        		buttonTargetVal = '';
			        		break;
			        	case 'modal':
			        		attachedItem = '';
			        		buttonLinkVal = '';
			        		buttonTargetVal = '';
			        		buttonCollapseIDval = '';
			        		buttonCollapseLabelShowVal = '';
			        		buttonCollapseLabelHideVal = '';
			        		break;
			        }

			        //set outer modal hidden input value (for shortcode param)
					var buttonArray = new Object;

					if (buttonLinkVal != '') {
				        buttonArray["link"] = buttonLinkVal;
			        }
			        if (buttonLabelVal != '') {
				        buttonArray["label"] = buttonLabelVal;
			        }
			        if (buttonAriaLabelVal != '') {
				        buttonArray["ariaLabel"] = buttonAriaLabelVal;
			        }
			        if (attachedItem.length > 0) {
				        var attachedItemID = attachedItem.val();
				        buttonArray["attachedID"] = attachedItemID;
			        }
			        if (buttonTargetVal != '') {
				        buttonArray["target"] = buttonTargetVal;
			        }
			        if (buttonTypeVal != '') {
				        buttonArray["type"] = buttonTypeVal;
			        }
			        if (buttonCollapseIDval != '') {
				        buttonArray["collapseID"] = buttonCollapseIDval;
			        }
			        if (buttonCollapseLabelShowVal != '') {
				        buttonArray["collapseLabelShow"] = buttonCollapseLabelShowVal;
			        }
			        if (buttonCollapseLabelHideVal != '') {
				        buttonArray["collapseLabelHide"] = buttonCollapseLabelHideVal;
			        }
			        if (buttonComponentIDval != '') {
				        buttonArray["componentID"] = buttonComponentIDval;
				    }

			        var buttonJSON = JSON.stringify(buttonArray);

			        currentButtonStringField.val(buttonJSON);

			        //update trigger button text
			        buttonTrigger.find('.button-verb').html(buttonTrigger.attr('data-isset'));
			        buttonTrigger.siblings('.fsn-remove-button').removeClass('deactivated');

			        //set Button summary
			        var buttonSummary = '';
			        switch(buttonTypeVal) {
			        	case 'external':
			        		buttonSummary += '<p>'+ fsnL10n.button_summary_type +': <strong>'+ fsnL10n.button_summary_external +'</strong></p>';
							buttonSummary += buttonLinkVal != '' ? '<p>'+ fsnL10n.button_summary_link +': <strong>'+ buttonLinkVal +'</strong></p>' : '';
							buttonSummary += buttonLabelVal != '' ? '<p>'+ fsnL10n.button_summary_label +': <strong>'+ buttonLabelVal +'</strong></p>' : '';
              buttonSummary += buttonAriaLabelVal != '' ? '<p>'+ fsnL10n.button_summary_aria_label +': <strong>'+ buttonAriaLabelVal +'</strong></p>' : '';
							switch(buttonTargetVal) {
								case '_blank':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_blank +'</strong></p>';
									break;
								case '_parent':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_parent +'</strong></p>';
									break;
								case '_top':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_top +'</strong></p>';
									break;
								default:
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_default +'</strong></p>';
							}
			        		break;
			        	case 'internal':
			        		buttonSummary += '<p>'+ fsnL10n.button_summary_type +': <strong>'+ fsnL10n.button_summary_internal +'</strong></p>';
							buttonSummary += attachedItem.length > 0 ? '<p>'+ fsnL10n.button_summary_link +': <strong>'+ attachedItem.text() +'</strong></p>' : '';
							buttonSummary += buttonLabelVal != '' ? '<p>'+ fsnL10n.button_summary_label +': <strong>'+ buttonLabelVal +'</strong></p>' : '';
              buttonSummary += buttonAriaLabelVal != '' ? '<p>'+ fsnL10n.button_summary_aria_label +': <strong>'+ buttonAriaLabelVal +'</strong></p>' : '';
							switch(buttonTargetVal) {
								case '_blank':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_blank +'</strong></p>';
									break;
								case '_parent':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_parent +'</strong></p>';
									break;
								case '_top':
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_top +'</strong></p>';
									break;
								default:
									buttonSummary += '<p>'+ fsnL10n.button_summary_target +': <strong>'+ fsnL10n.button_summary_target_default +'</strong></p>';
							}
			        		break;
			        	case 'collapse':
			        		if (buttonComponentIDval != '') {
				        		buttonCollapseIDval = buttonComponentID.find('option:selected').text();
			        		}
			        		buttonSummary += '<p>'+ fsnL10n.button_summary_type +': <strong>'+ fsnL10n.button_summary_collapse +'</strong></p>';
							buttonSummary += buttonCollapseIDval != '' ? '<p>'+ fsnL10n.button_summary_opens +': <strong>'+ buttonCollapseIDval +'</strong></p>' : '';
              buttonSummary += buttonAriaLabelVal != '' ? '<p>'+ fsnL10n.button_summary_aria_label +': <strong>'+ buttonAriaLabelVal +'</strong></p>' : '';
							buttonSummary += buttonCollapseLabelShowVal != '' ? '<p>'+ fsnL10n.button_summary_collapse_show +': <strong>'+ buttonCollapseLabelShowVal +'</strong></p>' : '';
							buttonSummary += buttonCollapseLabelHideVal != '' ? '<p>'+ fsnL10n.button_summary_collapse_hide +': <strong>'+ buttonCollapseLabelHideVal +'</strong></p>' : '';
			        		break;
			        	case 'modal':
			        		if (buttonComponentIDval != '') {
				        		buttonModalIDval = buttonComponentID.find('option:selected').text();
			        		} else {
				        		buttonModalIDval = '';
			        		}
			        		buttonSummary += '<p>'+ fsnL10n.button_summary_type +': <strong>'+ fsnL10n.button_summary_modal +'</strong></p>';
							buttonSummary += buttonModalIDval != '' ? '<p>'+ fsnL10n.button_summary_opens +': <strong>'+ buttonModalIDval +'</strong></p>' : '';
							buttonSummary += buttonLabelVal != '' ? '<p>'+ fsnL10n.button_summary_label +': <strong>'+ buttonLabelVal +'</strong></p>' : '';
              buttonSummary += buttonAriaLabelVal != '' ? '<p>'+ fsnL10n.button_summary_aria_label +': <strong>'+ buttonAriaLabelVal +'</strong></p>' : '';
			        		break;
			        }
			        buttonSummaryContainer.html(buttonSummary);
		        });

		        //hide / destroy modal
				buttonModal.on('hidden.bs.modal', function(e) {
					jQuery(this).remove();
				})
		    }
		);
	});
	//remove button
	jQuery('body').on('click', '.fsn-remove-button', function(e) {
		e.preventDefault();
		var clearButton = jQuery(this);
		var editButton = clearButton.siblings('.fsn-add-edit-button');
        editButton.find('.button-verb').html(editButton.attr('data-empty'));
        clearButton.addClass('deactivated');
		clearButton.siblings('.button-string').val('');
		clearButton.siblings('.button-summary').empty();
	});
});

//custom list field
jQuery(document).ready(function() {
	//add custom list item
	jQuery('body').on('click', '.add-custom-list-item', function(e) {
		e.preventDefault();

		var customListItemsContainer = jQuery(this).siblings('.custom-list-sort');
		var customListID = customListItemsContainer.attr('data-list-id');
		var postID = jQuery('input#post_ID').val();

		//check if list is sortable and initialize if not
		if (customListItemsContainer.sortable('instance') === undefined) {
			customListItemsContainer.sortable();
		}

		var data = {
			action: 'custom_list_add_item',
			listID: customListID,
			post_id: postID,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			customListItemsContainer.append(response);
			//initialize color pickers
			jQuery('.fsn-color-picker').wpColorPicker();
			//set dependencies
			setDependencies(customListItemsContainer);
			//trigger item added event
			customListItemsContainer.trigger('fsnAddListItem');
		});
	});
	//drag and drop sorting
	jQuery('body').on('shown.bs.modal', '.modal' , function (e) {
		var sortableCustomList = jQuery('.custom-list-sort');
		if (sortableCustomList.length > 0) {
			sortableCustomList.sortable();
		}
	});
	//remove custom list item
	jQuery('body').on('click', '.remove-custom-list-item', function(e) {
		e.preventDefault();
		var targetCustomListItem = jQuery(this).parents('.custom-list-item');
		targetCustomListItem.fadeOut(500, function() {
			jQuery(this).remove();
		});
	});
	//toggle single item
	jQuery('body').on('click', '.collapse-custom-list-item', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		var targetListItem = jQuery(this).parents('.custom-list-item');
		if (targetListItem.hasClass('collapse-active')) {
			targetListItem.removeClass('collapse-active');
			trigger.text(fsnL10n.custom_list_item_collapse);
		} else {
			targetListItem.addClass('collapse-active');
			trigger.text(fsnL10n.custom_list_item_expand);
		}
	});
	//expand all
	jQuery('body').on('click', '.expand-all-list-items', function(e) {
		e.preventDefault();
		var listItems = jQuery(this).siblings('.custom-list-sort').find('.custom-list-item');
		listItems.each(function() {
			var listItem = jQuery(this);
			listItem.removeClass('collapse-active');
			listItem.find('.collapse-custom-list-item').text(fsnL10n.custom_list_item_collapse);
		});
	});
	//collapse all
	jQuery('body').on('click', '.collapse-all-list-items', function(e) {
		e.preventDefault();
		var listItems = jQuery(this).siblings('.custom-list-sort').find('.custom-list-item');
		listItems.each(function() {
			var listItem = jQuery(this);
			listItem.addClass('collapse-active');
			listItem.find('.collapse-custom-list-item').text(fsnL10n.custom_list_item_expand);
		});
	});
	//generate custom list item shortcode (uses custom save event)
	jQuery('body').on('fsnSave', function(e, shortcodeTag) {
    var modal = jQuery(e.target);
		var customList = modal.find('.custom-list-sort');
		if (customList.length > 0) {
			customListItemShortcodes(modal);
		}
	});
	//Init select2 fields inside custom list items
	jQuery('body').on('fsnAddListItem', function(e) {
		fsnInitPostSelect();
	});
});

function customListItemShortcodes(modal) {
	var customListItemsContainer = modal.find('.custom-list-sort');
	var customListID = customListItemsContainer.attr('data-list-id');
	var shortcodesString = '';
	var customListItems = modal.find('.custom-list-item');
	customListItems.each(function() {
		shortcodesString += '[fsn_custom_list_item list_id="'+ customListID +'"';
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
	});
	var customListInput = modal.find('.custom-list-items');
	customListInput.val(shortcodesString);
}

//update box field
function fsnUpdateBoxField(field) {

	//set hidden input value (for shortcode param)
	var boxArray = new Object;
	var boxStringField = field.next('.box-string');

	var boxTopVal = field.find('.box-top').val();
	var boxRightVal = field.find('.box-right').val();
	var boxBottomVal = field.find('.box-bottom').val();
	var boxLeftVal = field.find('.box-left').val();

	if (boxTopVal != '') {
        boxArray["top"] = boxTopVal;
    }
    if (boxRightVal != '') {
        boxArray["right"] = boxRightVal;
    }
    if (boxBottomVal != '') {
        boxArray["bottom"] = boxBottomVal;
    }
    if (boxLeftVal != '') {
        boxArray["left"] = boxLeftVal;
    }

    var boxJSON = JSON.stringify(boxArray);

    if (boxJSON == '{}') {
	   boxJSON = '';
    }

    boxStringField.val(boxJSON);
}

//init select2 fields inside modals
jQuery(document).ready(function() {
	jQuery('body').on('show.bs.modal', '.modal', function() {
		var modal = jQuery(this);
		fsnInitPostSelect();
	});
});

function fsnInitPostSelect() {
	var postID = jQuery('input#post_ID').val();
	var select2Elements = jQuery('.select2-posts-element');
	select2Elements.each(function() {
		var select2Element = jQuery(this);
		if (select2Element.prop('multiple') === true) {
			var allowClear = false;
		} else {
			var allowClear = true;
		}
		var postsPerPage = 30;
		var postType  = select2Element.data('postType');
		var hierarchical = select2Element.data('hierarchical');
		select2Element.select2({
			allowClear: allowClear,
			ajax: {
				url: ajaxurl,
				dataType: 'json',
				method: 'POST',
			    delay: 250,
			    data: function (params) {
					return {
						q: params.term, // search term
						page: params.page,
						action: 'fsn_posts_search',
						posts_per_page: postsPerPage,
						postType: postType,
						post_id: postID,
						hierarchical : hierarchical,
						security: fsnJS.fsnEditNonce,
					};
			    },
			    processResults: function (data, params) {
					params.page = params.page || 1;
					return {
						results: data.items,
						pagination: {
							more: (params.page * postsPerPage) < data.total_count
						}
					};
				},
			},
			minimumInputLength: 1,
			language: {
				inputTooShort: function(args) {
					return fsnL10n.search;
				}
			},
			escapeMarkup: function (text) {
				return text;
			}
		});
	});
}

//create JS object from data attributes
function getDataAttrs(obj) {
	var allAttrs = obj[0].attributes;
	var attrsObject = new Object();
	for (var i = 0; i < allAttrs.length; i++) {
		if (allAttrs[i].nodeName != 'class') {
			var attrName = allAttrs[i].nodeName.replace('data-','');
			attrsObject[attrName] = allAttrs[i].nodeValue;
		}
	}
	return attrsObject;
}

//get unique ID. mirrors PHP uniqid() function
function fsnUniqid(prefix, more_entropy) {
	if (typeof prefix === 'undefined') {
		prefix = '';
	}

	var retId;
	var formatSeed = function (seed, reqWidth) {
		seed = parseInt(seed, 10)
			.toString(16); // to hex str
		if (reqWidth < seed.length) {
			// so long we split
			return seed.slice(seed.length - reqWidth);
		}
		if (reqWidth > seed.length) {
			// so short we pad
			return Array(1 + (reqWidth - seed.length))
				.join('0') + seed;
		}
		return seed;
	};

	// BEGIN REDUNDANT
	if (!this.php_js) {
		this.php_js = {};
	}
	// END REDUNDANT
	if (!this.php_js.uniqidSeed) {
		// init seed with big random int
		this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
	}
	this.php_js.uniqidSeed++;

	// start with prefix, add current milliseconds hex string
	retId = prefix;
	retId += formatSeed(parseInt(new Date()
		.getTime() / 1000, 10), 8);
	// add seed hex string
	retId += formatSeed(this.php_js.uniqidSeed, 5);
	if (more_entropy) {
		// for more entropy we add a float lower to 10
		retId += (Math.random() * 10)
		.toFixed(8)
		.toString();
	}

	return retId;
}

//resizing
jQuery(document).ready(function() {
	fsnResize();
	jQuery(window).on('resize', fsnDebounce(fsnResize, 50));
	jQuery(window).on('resize', fsnThrottle(fsnResizeColFields, 100));
});
function fsnResizeColFields() {
	var interfaceUIs = jQuery('.fsn-interface-grid');
	interfaceUIs.each(function() {
		var instance = jQuery(this);
		fsnAddColFields(instance);
	});
}
function fsnResize() {
	var interfaceUIs = jQuery('.fsn-interface-grid');
	interfaceUIs.each(function() {
		var instance = jQuery(this);
		var cols = instance.find('[class*="col-"]');
		var elements = instance.find('.fsn-element');
		cols.each(function() {
			var col = jQuery(this);
			var colWidth = col.width();
			var colTitle = col.find('.column-title');
			var colTitleWidth = colTitle.width();
			var editIcon = col.find('.control-icon');
			if (colWidth < 130) {
				editIcon.css('visibility','hidden');
				colTitle.css('visibility','hidden');
			} else {
				editIcon.css('visibility','visible');
				colTitle.css('visibility','visible');
			}
		});
		elements.each(function() {
			var element = jQuery(this);
			var elementWidth = element.width();
			var elementTitle = element.find('.element-label');
			var elementTitleWidth = elementTitle.width();
			var editIcon = element.find('.control-icon');
			if (elementWidth < 140) {
				editIcon.css('visibility','hidden');
			} else {
				editIcon.css('visibility','visible');
			}
			if (elementWidth < elementTitleWidth + 80) {
				elementTitle.css('visibility','hidden');
			} else {
				elementTitle.css('visibility','visible');
			}
		});
	});
}

//HTML special character encoding
function fsnCustomEntitiesEncode(str) {
    return String(str)
	    .replace(/"/g, '#fsnquot;')
	    .replace(/\[/g, '#fsnsqbl;')
	    .replace(/\]/g, '#fsnsqbr;')
	    .replace(/\</g, '#fsnlt;')
	    .replace(/\>/g, '#fsngt;');
}

//Add HTML line breaks and paragraph tags in place of single and double line breaks.
//Similar to wpautop() in WordPress editor.js except will add paragraph tags around a single paragraph.
function fsnautop( text ) {
	if ( text == '' ) {
		return text;
	}
	var preserve_linebreaks = false,
		preserve_br = false,
		blocklist = 'table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre' +
			'|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section' +
			'|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary';

	// Normalize line breaks
	text = text.replace( /\r\n|\r/g, '\n' );

	if ( text.indexOf( '<object' ) !== -1 ) {
		text = text.replace( /<object[\s\S]+?<\/object>/g, function( a ) {
			return a.replace( /\n+/g, '' );
		});
	}

	text = text.replace( /<[^<>]+>/g, function( a ) {
		return a.replace( /[\n\t ]+/g, ' ' );
	});

	// Protect pre|script tags
	if ( text.indexOf( '<pre' ) !== -1 || text.indexOf( '<script' ) !== -1 ) {
		preserve_linebreaks = true;
		text = text.replace( /<(pre|script)[^>]*>[\s\S]*?<\/\1>/g, function( a ) {
			return a.replace( /\n/g, '<wp-line-break>' );
		});
	}

	// keep <br> tags inside captions and convert line breaks
	if ( text.indexOf( '[caption' ) !== -1 ) {
		preserve_br = true;
		text = text.replace( /\[caption[\s\S]+?\[\/caption\]/g, function( a ) {
			// keep existing <br>
			a = a.replace( /<br([^>]*)>/g, '<wp-temp-br$1>' );
			// no line breaks inside HTML tags
			a = a.replace( /<[^<>]+>/g, function( b ) {
				return b.replace( /[\n\t ]+/, ' ' );
			});
			// convert remaining line breaks to <br>
			return a.replace( /\s*\n\s*/g, '<wp-temp-br />' );
		});
	}

	text = text + '\n\n';
	text = text.replace( /<br \/>\s*<br \/>/gi, '\n\n' );
	text = text.replace( new RegExp( '(<(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '\n$1' );
	text = text.replace( new RegExp( '(</(?:' + blocklist + ')>)', 'gi' ), '$1\n\n' );
	text = text.replace( /<hr( [^>]*)?>/gi, '<hr$1>\n\n' ); // hr is self closing block element
	text = text.replace( /\s*<option/gi, '<option' ); // No <p> or <br> around <option>
	text = text.replace( /<\/option>\s*/gi, '</option>' );
	text = text.replace( /\n\s*\n+/g, '\n\n' );
	text = text.replace( /([\s\S]+?)\n\n/g, '<p>$1</p>\n' );
	text = text.replace( /<p>\s*?<\/p>/gi, '');
	text = text.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );
	text = text.replace( /<p>(<li.+?)<\/p>/gi, '$1');
	text = text.replace( /<p>\s*<blockquote([^>]*)>/gi, '<blockquote$1><p>');
	text = text.replace( /<\/blockquote>\s*<\/p>/gi, '</p></blockquote>');
	text = text.replace( new RegExp( '<p>\\s*(</?(?:' + blocklist + ')(?: [^>]*)?>)', 'gi' ), '$1' );
	text = text.replace( new RegExp( '(</?(?:' + blocklist + ')(?: [^>]*)?>)\\s*</p>', 'gi' ), '$1' );

	// Remove redundant spaces and line breaks after existing <br /> tags
	text = text.replace( /(<br[^>]*>)\s*\n/gi, '$1' );

	// Create <br /> from the remaining line breaks
	text = text.replace( /\s*\n/g, '<br />\n');

	text = text.replace( new RegExp( '(</?(?:' + blocklist + ')[^>]*>)\\s*<br />', 'gi' ), '$1' );
	text = text.replace( /<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi, '$1' );
	text = text.replace( /(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi, '[caption$1[/caption]' );

	text = text.replace( /(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g, function( a, b, c ) {
		if ( c.match( /<p( [^>]*)?>/ ) ) {
			return a;
		}

		return b + '<p>' + c + '</p>';
	});

	// put back the line breaks in pre|script
	if ( preserve_linebreaks ) {
		text = text.replace( /<wp-line-break>/g, '\n' );
	}

	if ( preserve_br ) {
		text = text.replace( /<wp-temp-br([^>]*)>/g, '<br$1>' );
	}

	return text;
}

//Save notice
function fsnSaveNotice(modal) {
	modal.on('focus', 'input, select, textarea', function() {
		modal.find('.save-notice').addClass('active');
	});
	modal.on('click', '.add-custom-list-item, .add-gallery-item, .remove-gallery-item, .remove-custom-list-item, .fsn-remove-image, .fsn-remove-video, .fsn-add-edit-button, .fsn-remove-button', function() {
		modal.find('.save-notice').addClass('active');
	});
	modal.on('sortupdate', '.custom-list-sort, .gallery-sort', function(event, ui) {
		modal.find('.save-notice').addClass('active');
	});
	if (modal.find('.wp-editor-wrap').length > 0) {
		modal.find('.save-notice').addClass('active');
	}
}

//regenerate TinyMCE content
function fsnGetContent(instance) {
	var interfaceGrid = instance;
	var outerRows = interfaceGrid.children('.row-container');
	var output = '';
	outerRows.each(function() {
		//build outer row shortcodes
		var row = jQuery(this).find('.row').first();
		var dataAttributes = getDataAttrs(row);
		var rowParams = '';
		if (dataAttributes.length != 0) {
			for (var k in dataAttributes) {
				if (dataAttributes.hasOwnProperty(k)) {
					var paramName = k.replace(/[-]/g,'_');
					var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
					rowParams += ' '+ paramName +'="'+ paramValue +'"';
			    }
			}
		}
		output += '[fsn_row'+ rowParams +']';
		var rowChildren = row.children('[class*="col-"]');
		rowChildren.each(function() {
			//build outer column shortcodes
			var column = jQuery(this);
			var dataAttributes = getDataAttrs(column);
			var columnParams = '';
			if (dataAttributes.length != 0) {
				for (var k in dataAttributes) {
					if (dataAttributes.hasOwnProperty(k)) {
						var paramName = k.replace(/[-]/g,'_');
						var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
						columnParams += ' '+ paramName +'="'+ paramValue +'"';
				    }
				}
			}
			output += '[fsn_column'+ columnParams +']';
			//column children (elements and nested rows)
			var columnChildren = jQuery(this).children('.column-container').children('.column-wrapper').children();
			columnChildren.each(function() {
				var currentChild = jQuery(this);
				if (currentChild.hasClass('fsn-element')) {
					//build elements
					var element = jQuery(this).find('.element-text-holder');
					if (element.length != 0) {
						element.each(function() {
							var currentElement = jQuery(this);
							var textContent = currentElement.html();
							var shortcodeTag = currentElement.parent('.fsn-element').attr('data-shortcode-tag');
							var dataAttributes = getDataAttrs(currentElement);
							var elementParams = '';
							if (dataAttributes.length != 0) {
								for (var k in dataAttributes) {
									if (dataAttributes.hasOwnProperty(k)) {
										var paramName = k.replace(/[-]/g,'_');
										var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
										elementParams += ' '+ paramName +'="'+ paramValue +'"';
								    }
								}
							}
							//if (textContent != '') {
								output += '['+ shortcodeTag + elementParams +']'+ textContent +'[/'+ shortcodeTag +']';
							//} else {
								//output += '['+ shortcodeTag + elementParams +']';
							//}
						});
					}
				} else if (currentChild.hasClass('row-container')) {
					//nested rows
					var innerRows = jQuery(this);
					if (innerRows != undefined) {
						innerRows.each(function() {
							//build inner row shortcodes
							var rowInner = jQuery(this).find('.row').first();
							var dataAttributes = getDataAttrs(rowInner);
							var rowInnerParams = '';
							if (dataAttributes.length != 0) {
								for (var k in dataAttributes) {
									if (dataAttributes.hasOwnProperty(k)) {
										var paramName = k.replace(/[-]/g,'_');
										var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
										rowInnerParams += ' '+ paramName +'="'+ paramValue +'"';
								    }
								}
							}
							output += '[fsn_row_inner'+ rowInnerParams +']';
							var rowInnerChildren = rowInner.find('[class*="col-"]');
							rowInnerChildren.each(function() {
								//build inner column shortcodes
								var columnInner = jQuery(this);
								var dataAttributes = getDataAttrs(columnInner);
								var columnInnerParams = '';
								if (dataAttributes.length != 0) {
									for (var k in dataAttributes) {
										if (dataAttributes.hasOwnProperty(k)) {
											var paramName = k.replace(/[-]/g,'_');
											var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
											columnInnerParams += ' '+ paramName +'="'+ paramValue +'"';
									    }
									}
								}
								output += '[fsn_column_inner'+ columnInnerParams +']';
								//build elements
								var element = jQuery(this).find('.element-text-holder');
								if (element.length != 0) {
									element.each(function() {
										var currentElement = jQuery(this);
										var textContent = currentElement.html();
										var shortcodeTag = currentElement.parent('.fsn-element').attr('data-shortcode-tag');
										var dataAttributes = getDataAttrs(currentElement);
										var elementParams = '';
										if (dataAttributes.length != 0) {
											for (var k in dataAttributes) {
												if (dataAttributes.hasOwnProperty(k)) {
													var paramName = k.replace(/[-]/g,'_');
													var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
													elementParams += ' '+ paramName +'="'+ paramValue +'"';
											    }
											}
										}
										//if (textContent != '') {
											output += '['+ shortcodeTag + elementParams +']'+ textContent +'[/'+ shortcodeTag +']';
										//} else {
											//output += '['+ shortcodeTag + elementParams +']';
										//}
									});
								}
								output += '[/fsn_column_inner]';
							});
							output += '[/fsn_row_inner]';
						});
					}
				} else if (currentChild.hasClass('tabs-container')) {
					//tabs
					var tabsSection = jQuery(this);
					if (tabsSection != undefined) {
						tabsSection.each(function() {
							//build tabs shortcodes
							var tabsContainer = jQuery(this);
							var dataAttributes = getDataAttrs(tabsContainer);
							var tabsContainerParams = '';
							if (dataAttributes.length != 0) {
								for (var k in dataAttributes) {
									if (dataAttributes.hasOwnProperty(k)) {
										var paramName = k.replace(/[-]/g,'_');
										var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
										tabsContainerParams += ' '+ paramName +'="'+ paramValue +'"';
								    }
								}
							}
							output += '[fsn_tabs'+ tabsContainerParams +']';
							var tabs = tabsContainer.find('.tab-container');
							tabs.each(function() {
								//build inner column shortcodes
								var tabContainer = jQuery(this);
								var dataAttributes = getDataAttrs(tabContainer);
								var tabContainerParams = '';
								if (dataAttributes.length != 0) {
									for (var k in dataAttributes) {
										if (dataAttributes.hasOwnProperty(k)) {
											var paramName = k.replace(/[-]/g,'_');
											var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
											tabContainerParams += ' '+ paramName +'="'+ paramValue +'"';
									    }
									}
								}
								output += '[fsn_tab'+ tabContainerParams +']';
								//build tab content
								var tabChildren = tabContainer.find('.tab').children();
								tabChildren.each(function() {
									var currentChild = jQuery(this);
									if (currentChild.hasClass('fsn-element')) {
										//build elements
										var element = jQuery(this).find('.element-text-holder');
										if (element.length != 0) {
											element.each(function() {
												var currentElement = jQuery(this);
												var textContent = currentElement.html();
												var shortcodeTag = currentElement.parent('.fsn-element').attr('data-shortcode-tag');
												var dataAttributes = getDataAttrs(currentElement);
												var elementParams = '';
												if (dataAttributes.length != 0) {
													for (var k in dataAttributes) {
														if (dataAttributes.hasOwnProperty(k)) {
															var paramName = k.replace(/[-]/g,'_');
															var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
															elementParams += ' '+ paramName +'="'+ paramValue +'"';
													    }
													}
												}
												//if (textContent != '') {
													output += '['+ shortcodeTag + elementParams +']'+ textContent +'[/'+ shortcodeTag +']';
												//} else {
													//output += '['+ shortcodeTag + elementParams +']';
												//}
											});
										}
									} else if (currentChild.hasClass('row-container')) {
										//nested rows
										var innerRows = jQuery(this);
										if (innerRows != undefined) {
											innerRows.each(function() {
												//build inner row shortcodes
												var rowInner = jQuery(this).find('.row').first();
												var dataAttributes = getDataAttrs(rowInner);
												var rowInnerParams = '';
												if (dataAttributes.length != 0) {
													for (var k in dataAttributes) {
														if (dataAttributes.hasOwnProperty(k)) {
															var paramName = k.replace(/[-]/g,'_');
															var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
															rowInnerParams += ' '+ paramName +'="'+ paramValue +'"';
													    }
													}
												}
												output += '[fsn_row_inner'+ rowInnerParams +']';
												var rowInnerChildren = rowInner.find('[class*="col-"]');
												rowInnerChildren.each(function() {
													//build inner column shortcodes
													var columnInner = jQuery(this);
													var dataAttributes = getDataAttrs(columnInner);
													var columnInnerParams = '';
													if (dataAttributes.length != 0) {
														for (var k in dataAttributes) {
															if (dataAttributes.hasOwnProperty(k)) {
																var paramName = k.replace(/[-]/g,'_');
																var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
																columnInnerParams += ' '+ paramName +'="'+ paramValue +'"';
														    }
														}
													}
													output += '[fsn_column_inner'+ columnInnerParams +']';
													//build elements
													var element = jQuery(this).find('.element-text-holder');
													if (element.length != 0) {
														element.each(function() {
															var currentElement = jQuery(this);
															var textContent = currentElement.html();
															var shortcodeTag = currentElement.parent('.fsn-element').attr('data-shortcode-tag');
															var dataAttributes = getDataAttrs(currentElement);
															var elementParams = '';
															if (dataAttributes.length != 0) {
																for (var k in dataAttributes) {
																	if (dataAttributes.hasOwnProperty(k)) {
																		var paramName = k.replace(/[-]/g,'_');
																		var paramValue = fsnCustomEntitiesEncode(dataAttributes[k]);
																		elementParams += ' '+ paramName +'="'+ paramValue +'"';
																    }
																}
															}
															//if (textContent != '') {
																output += '['+ shortcodeTag + elementParams +']'+ textContent +'[/'+ shortcodeTag +']';
															//} else {
																//output += '['+ shortcodeTag + elementParams +']';
															//}
														});
													}
													output += '[/fsn_column_inner]';
												});
												output += '[/fsn_row_inner]';
											});
										}
									}
								});
								output += '[/fsn_tab]';
							});
							output += '[/fsn_tabs]';
						});
					}
				}
			});
			output += '[/fsn_column]';
		});
		output += '[/fsn_row]';
	});

	return output;
}

function fsnUpdateContent(instance) {
	if (instance.attr('id') == 'fsn-main-ui') {
		content = fsnGetContent(instance);
		//refocus on main content editor
		if (tinymce.get( 'content' ).isHidden()) {
			tinymce.get( 'content' ).show();
		}
		tinyMCE.get('content').focus();
		//send content to TinyMCE
		tinyMCE.activeEditor.setContent(content);
	}
}

//allow multiple modals to be open at once without recursion errors
jQuery.fn.modal.Constructor.prototype.enforceFocus = function () {};

//toggle alternate modal-open class to prevent WordPress conflicts
jQuery(document).ready(function() {
	var body = jQuery('body');
	body.on('shown.bs.modal', function (e) {
		if (body.hasClass('bs-modal-open') === false) {
			body.addClass('bs-modal-open');
		}
		if (body.hasClass('modal-open') === true) {
			body.removeClass('modal-open');
		}
	});
	body.on('hidden.bs.modal', function (e) {
		var visibleModals = jQuery('.modal:visible');
		if (visibleModals.length === 0) {
			body.removeClass('bs-modal-open');
		}
	});
});

//fix valHooks to not strip line breaks from textareas
jQuery.valHooks.textarea = {
  get: function( elem ) {
    return elem.value.replace( /\r?\n/g, "\r\n" );
  }
};

/**
 * Components
 */

jQuery(document).ready(function() {
	//add new component
	jQuery('body').on('click', '.component-add-new', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		trigger.siblings('.component-select').addClass('active');
		launchComponentsModal();
	});
	//edit component
	jQuery('body').on('click', '.component-edit', function(e) {
		e.preventDefault();
		var trigger = jQuery(this);
		trigger.siblings('.component-select').addClass('active');
		var componentID = trigger.siblings('.component-select').children('select').val();
		launchComponentsModal(componentID);
	});
});

function launchComponentsModal(id) {
	var postID = jQuery('input#post_ID').val();

	//data to pass to AJAX function
	var data = {
		action: 'components_modal',
		component_id: id,
		post_id: postID,
		security: fsnJS.fsnEditNonce
	};
	jQuery.post(ajaxurl, data, function(response) {
		if (response == '-1') {
			alert(fsnL10n.error);
			return false;
		}
		//append modal to body
		jQuery('body').append(response);
		//open modal
		var componentsModal = jQuery('#componentsModal').last();
		//register modal events, open modal, and init Fusion UI events on show
		componentsModal.on('shown.bs.modal', function(e) {
			var componentInterfaceGrid = componentsModal.find('.fsn-interface-grid');
			if (componentInterfaceGrid.is(':empty')) {
				var fsnInitContent = fsnGetRow(fsnGetColumn(12, fsnGetElement('fsn_text', fsnL10n.text_label)));
				componentInterfaceGrid.empty().append(fsnInitContent);
			}
			fsnInitUIevents(componentInterfaceGrid);
		}).on('hidden.bs.modal', function(e) {
      //delete modal on hidden
			jQuery(this).remove();
			jQuery('.component-select').removeClass('active');
		}).modal('show');
		//dismiss notices
		componentsModal.on('click', '.notice-dismiss' , function() {
			jQuery(this).closest('.notice').fadeOut(200, function() {
				jQuery(this).remove();
			});
		});
	});
}

//update components
jQuery(document).ready(function() {
	jQuery('body').on('click', '.fsn-save-component', function(e) {
		e.preventDefault();

		var editForm = jQuery(this).closest('#edit_component');
		var instance = editForm.find('.fsn-interface-grid');

		var postID = jQuery('input#post_ID').val();
		var componentID = editForm.find('input[name="component_id"]').val();
		var componentTitle = editForm.find('input[name="component_title"]').val();
		var componentContent = fsnGetContent(instance);

		editForm.addClass('saving');

		//data to pass to AJAX function
		var data = {
			action: 'update_component',
			post_id: postID,
			component_id: componentID,
			component_title: componentTitle,
			component_content: componentContent,
			security: fsnJS.fsnEditNonce
		};
		jQuery.post(ajaxurl, data, function(response) {
			if (response == '-1') {
				alert(fsnL10n.error);
				return false;
			}
			//update message
			editForm.prev('.notice').remove();
			editForm.before(response).removeClass('saving');
			//update component selectors on add new component
			newComponentID = editForm.prev('.notice').attr('data-new-component-id');
			var componentSelectors = jQuery('.component-select select');
			if (newComponentID !== undefined)	{
				editForm.find('input[name="component_id"]').val(newComponentID);
				componentSelectors.each(function() {
					var componentSelector = jQuery(this);
					componentSelector.prepend('<option value="'+ newComponentID +'">'+ componentTitle +'</option>');
					if (componentSelector.parent('.component-select').hasClass('active'))	{
						componentSelector.find('option').first().prop('selected', true);
					}
					componentSelector.trigger('change.select2');
				});
			} else {
				componentSelectors.each(function() {
					var componentSelector = jQuery(this);
					componentSelector.find('option[value="'+ componentID +'"]').text(componentTitle);
					componentSelector.select2('destroy');
					fsnInitPostSelect();
				});
			}
		});
	});
});

/**
 * Access WordPress Media Uploader
 */

jQuery(document).ready(function() {
	//add image button
	jQuery('body').on('click', '.fsn_upload_image', function(e) {
		e.preventDefault();
		var buttonTrigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();
		var targetField = buttonTrigger.siblings('.element-input');

	    // If the media frame already exists, reopen it.
	    if ( frame ) {
			frame.open();
			return;
	    }
	    // Create a new media frame
	    var frame = wp.media({
	        title: fsnL10n.media_image_select,
	        button: {
	            text: fsnL10n.media_image_use,
	        },
	        multiple: false // Set this to true to allow multiple files to be selected
	    });
	    // Select Image
	    frame.on('select', function() {
	        var attachment = frame.state().get('selection').first().toJSON();
	        targetField.val(attachment.id);
	        //data to pass to AJAX function
			var data = {
				action: 'update_image_preview',
				id: attachment.id,
				post_id: postID,
				security: fsnJS.fsnEditNonce
			};
			jQuery.post(ajaxurl, data, function(response) {
				if (response == '-1') {
					alert(fsnL10n.error);
					return false;
				}
				if (targetField.siblings('.image-field-preview').length != 0) {
					targetField.siblings('.image-field-preview').remove();
				}
				targetField.after(response);
				//update trigger button text
		        buttonTrigger.find('.button-verb').html(buttonTrigger.attr('data-isset'));
		        buttonTrigger.siblings('.fsn-remove-image').removeClass('deactivated');
			});
	    });
	    //Preselect Image if already set
	    frame.on('open', function() {
            var selection = frame.state().get('selection');
            var id = targetField.val();
            if ( '' !== id && -1 !== id ) {
				attachment = wp.media.attachment(id);
				attachment.fetch();
				selection.reset( attachment ? [ attachment ] : [] );
            }
	    });
	    frame.open();
    });
    //remove image button
    jQuery('body').on('click', '.fsn-remove-image', function(e) {
	    e.preventDefault();
	    var button = jQuery(this);
	    var editButton = button.siblings('.fsn_upload_image');
        editButton.find('.button-verb').html(editButton.attr('data-empty'));
	    button.addClass('deactivated');
	    button.siblings('.image-field-preview').remove();
	    button.siblings('.element-input').val('');
    });


    //add video button
	jQuery('body').on('click', '.fsn_upload_video', function(e) {
		e.preventDefault();
		var buttonTrigger = jQuery(this);
		var postID = jQuery('input#post_ID').val();
		var targetField = buttonTrigger.siblings('.element-input');

		// If the media frame already exists, reopen it.
	    if ( frame ) {
			frame.open();
			return;
	    }
	    // Create a new media frame
	    var frame = wp.media({
	        title: fsnL10n.media_video_select,
	        button: {
	            text: fsnL10n.media_video_select,
	        },
	        multiple: false // Set this to true to allow multiple files to be selected
	    });
	    // Select Video
	    frame.on('select', function() {
	        var attachment = frame.state().get('selection').first().toJSON();
	        targetField.val(attachment.id);
	        //data to pass to AJAX function
			var data = {
				action: 'update_video_preview',
				id: attachment.id,
				post_id: postID,
				security: fsnJS.fsnEditNonce
			};
			jQuery.post(ajaxurl, data, function(response) {
				if (response == '-1') {
					alert(fsnL10n.error);
					return false;
				}
				if (targetField.siblings('.video-field-preview').length != 0) {
					targetField.siblings('.video-field-preview').remove();
				}
				targetField.after(response);
				//update trigger button text
		        buttonTrigger.find('.button-verb').html(buttonTrigger.attr('data-isset'));
		        buttonTrigger.siblings('.fsn-remove-video').removeClass('deactivated');
			});
	    });
	    //Preselect Video if already set
	    frame.on('open', function() {
            var selection = frame.state().get('selection');
            var id = targetField.val();
            if ( '' !== id && -1 !== id ) {
				attachment = wp.media.attachment(id);
				attachment.fetch();
				selection.reset( attachment ? [ attachment ] : [] );
            }
	    });
	    frame.open();
    });
    //remove video button
    jQuery('body').on('click', '.fsn-remove-video', function(e) {
	    e.preventDefault();
	    var button = jQuery(this);
	    var editButton = button.siblings('.fsn_upload_video');
        editButton.find('.button-verb').html(editButton.attr('data-empty'));
	    button.addClass('deactivated');
	    button.siblings('.video-field-preview').remove();
	    button.siblings('.element-input').val('');
    });
});

//In throttling, the code execution is limited to once in a specified time period.
function fsnThrottle(callback, wait) {
    var time,
    go = true;
    return function() {
        if(go) {
            go = false;
            time = setTimeout(function(){
                time = null;
                go = true;
                callback.call();
            }, wait);
        }
    }
}

//In debouncing, the code is not executed until the event has not been fired for a set amount of time.
function fsnDebounce(callback, wait) {
    var time;
    return function() {
        clearTimeout(time);
        time = setTimeout(function() {
            time = null;
            callback.call();
        }, wait);
    }
}
