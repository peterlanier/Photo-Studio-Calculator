# Photo Studio Calculator

## Dependencies
* Gravity Forms
* jQuery
* Popper.js
* Tooltip.js
* Hubspot (optional, not required from plugin)

## Structure

##### admin/options.php
Creates an admin page for adding/updating constants
Dashboard => Settings => Photo Studio

##### gforms/confirmation.html
`gforms/confirmation.html` is for reference only
should be copy/pasted into the gravity forms confirmation
/wp-admin/admin.php?page=gf_edit_forms&view=settings&subview=confirmation&id=3

## Integrating with New Forms
If creating a new gravity form, update the gforms/hooks.php
`gform_pre_submission_3` should be updated to match current gform ID.