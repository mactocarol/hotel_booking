/*$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});*/

$(document).ready(function() {
    $("#registration").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            mobile: {
                required: true,
                number: true,

            },
            email: {
                    required: true,
                    email: true,
                    /*remote: {
                            url: "<?= base_url ('registration/register_email_exists'); ?>",
                            type: "post",
                            data: {
                                email: function(){ return $("#email").val(); }
                            }   
                    }*/
            },
            city: "required",
            password: {
                required: true,
                minlength: 6
            },
            repassword: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            //gender: "required"
        },
        messages: {
            first_name: "Please enter  your first name!",
            last_name: "Please enter  your last name!",
            mobile: {
                required: "Please enter your phone number!",
                number: "Please enter only numeric value!"
            },
            email1: {
                required: 'Email address is required',
                email: 'Please enter a valid email address',
                //remote: 'Email already used. Log in to your existing account.'
            },
            city: "Please enter a city name!",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            repassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
            //gender: "gender is required!"
        },
        highlight: function (element) {
            $(element).parent().addClass('error')
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('error')
        }
    });
});