//On confirmation
jQuery(document).on("gform_confirmation_loaded", function(event, formId) {
  const pop1 = document.getElementById("pop-1");
  const pop2 = document.getElementById("pop-2");

  const instance1 = new Tooltip(pop1, {
    placement: "right",
    html: true,
    trigger: "hover focus",
    title: tooltips.disc_vol_table
  });

  const instance2 = new Tooltip(pop2, {
    placement: "right",
    html: true,
    trigger: "hover focus",
    title: tooltips.disc_store_table
  });
});

//On page tooltips... just uncomment to use
// jQuery( document ).ready(function() {

// 	jQuery("#field_3_4 label").append(jQuery('<i class="fas fa-question-circle fa-xs form-tooltips" id="pop-3">'));

// 	console.log("fired");
// 	const pop3 = document.getElementById("pop-3");

// 	const instance3 = new Tooltip(pop3, {
// 		placement: "right",
// 		html: true,
// 		trigger: "hover focus",
// 		title: tooltips.backdrops
// 	});

// });

//Specimen of target
//<i class="fas fa-question-circle fa-xs" id="pop-3">

function reloadWithEmail(email) {
	window.location.href = window.location.pathname + "?" + encodeURIComponent("user") + "=" + encodeURIComponent(email) + "#estimate";
	console.log("email", email);
	// window.location.reload(true);
}
