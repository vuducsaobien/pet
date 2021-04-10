/* ---------- Define ---------- */
let $btnSearch            = $("button#btn-search");
let $btnClearSearch       = $("button#btn-clear-search");
let $selectChangeAttrAjax = $("select.select-ajax");
let $inputOrdering        = $("input.ordering");
let $inputLink            = $("input.link");
let $btnStatus            = $(".btn-status");
let $btnIsHome            = $(".btn-ishome");
let $inputSearchField     = $("input[name  = search_field]");
let $inputSearchValue     = $("input[name  = search_value]");
let $selectChangeAttr     = $("select[name = select_change_attr]");

let $currency     = $('input.money');
let $price_sale   = $('input[name=price_sale]');
let $price_until  = $('input[name=price_until]');
let $price        = $('input[name=price]');
let $percent      = $('input.percent');
let $accepted_min = $('.accepted_min');
let $accepted_max = $('.accepted_max');

let $date_start = $('input[name=date_start]');
let $date_end   = $('input[name=date_end]');
let $created    = $('input[name=created]');
let $submit     = $('input[type=submit]');

$(document).ready(function() {
	/* ---------- Setting ---------- */

	// File Manager
	$('#lfm').filemanager('image');

	// Tag Input
	$("#tags-input").tagsinput({
		confirmKeys: [32],
	});

	// Auto Select Input
	$('form').find('input[type=text]').filter(':visible:first').focus().select();

	// Active Menu Side Bar
	let child_Li = $(`#sidebar-menu li`);
	var parentDiv = [];
	
	child_Li.each((index, val) => {
		parentDiv.push(val.id);
		// console.log(`key = ${index} - param = ${val}`);
	});

	$(parentDiv).each((index, val) => {
		if(controllerName == val) {
			let choose = $(`#${val}`);
			choose.addClass('current-page');
			choose.parent().css('display', 'block');
			choose.parent().parent().addClass('active');
		}
	});

	// Disable Button Submit When submit Form
	$("form").submit(function () {
        $submit.attr("disabled", true);
        return true;
    });


	// allStorage();
});

