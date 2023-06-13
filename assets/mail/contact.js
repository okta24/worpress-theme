jQuery(function () {

    jQuery("#contactForm input, #contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function (jQueryform, event, errors) {
        },
        submitSuccess: function (jQueryform, event) {
            event.preventDefault();
            var name = jQuery("input#name").val();
            var email = jQuery("input#email").val();
            var subject = jQuery("input#subject").val();
            var message = jQuery("textarea#message").val();

            jQuerythis = jQuery("#sendMessageButton");
            jQuerythis.prop("disabled", true);

            jQuery.ajax({
                url: "contact.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message
                },
                cache: false,
                success: function () {
                    jQuery('#success').html("<div class='alert alert-success'>");
                    jQuery('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    jQuery('#success > .alert-success')
                            .append("<strong>Your message has been sent. </strong>");
                    jQuery('#success > .alert-success')
                            .append('</div>');
                    jQuery('#contactForm').trigger("reset");
                },
                error: function () {
                    jQuery('#success').html("<div class='alert alert-danger'>");
                    jQuery('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                    jQuery('#success > .alert-danger').append(jQuery("<strong>").text("Sorry " + name + ", it seems that our mail server is not responding. Please try again later!"));
                    jQuery('#success > .alert-danger').append('</div>');
                    jQuery('#contactForm').trigger("reset");
                },
                complete: function () {
                    setTimeout(function () {
                        jQuerythis.prop("disabled", false);
                    }, 1000);
                }
            });
        },
        filter: function () {
            return jQuery(this).is(":visible");
        },
    });

    jQuery("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        jQuery(this).tab("show");
    });
});

jQuery('#name').focus(function () {
    jQuery('#success').html('');
});
