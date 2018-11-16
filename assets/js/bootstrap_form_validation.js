$(document).ready(function() {
	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
    $('#registration').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    },
                }
            },
			last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                    },
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile number required and cannot be empty'
                    },
                    stringLength: {
                        min:10 ,
                        max:10,
                        message: 'The mobile no must be  10 digit'
                    }
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			city: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender required and cannot be empty'
                    },
                }
            },    
			
			password: {
				validators: {
					notEmpty: {
						message : 'The Password Field is required and cannot be empty '
					},
					identical: {
                        field: 'con_pass',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {
					
					notEmpty: {
						message : 'The confirm Password Field is required and cannot be empty '
					},
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });

    $('#profile_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    },
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                    },
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile number required and cannot be empty'
                    },
                    stringLength: {
                        min:10 ,
                        max:10,
                        message: 'The mobile no must be  10 digit'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address required and cannot be empty'
                    },
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },    
            

        }
    });

    // change password validation
    $('#change_password').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            oldpassword: {
                validators: {
                    notEmpty: {
                        message: 'The old password is required and cannot be empty'
                    },
                    stringLength: {
                        min:6 ,
                        message: 'Old Password Shold be contain 6 character.'
                    }
                }
            },
            newpassword: {
                validators: {
                    notEmpty: {
                        message: 'The new password is required and cannot be empty'
                    },
                    stringLength: {
                        min:6 ,
                        message: 'New Password Shold be contain 6 character.'
                    }
                }
            },
            newcpassword: {
                validators: {
                    notEmpty: {
                        message: 'The conformation password required and cannot be empty'
                    },
                    identical: {
                        field: 'newpassword',
                        message: 'The password and its confirm are not the same'
                    },
                    stringLength: {
                        min:6 ,
                        message: 'Confirm Password Shold be contain 6 character.'
                    }
                }
            },

        }
    });


    //Add User Form validation 


    $('#add_user_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    },
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                    },
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile number required and cannot be empty'
                    },
                    stringLength: {
                        min:10 ,
                        max:10,
                        message: 'The mobile no must be  10 digit'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address required and cannot be empty'
                    },
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The city required and cannot be empty'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message : 'The email Field is required and cannot be empty '
                    },
                     remote: {  
                     type: 'POST',
                     url: "http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists",
                     data: function(validator) {
                         return {
                             //email: $('#email').val()
                             email: validator.getFieldElements('email').val()
                             };
                        },
                     message: 'This email is already in use.'     
                     }
                },
            },
            

        }
    });

    //home page_form
     $('#home_page_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            destination: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
            //check_in: {
            //    validators: {
            //        notEmpty: {
            //            message: '* mandatory'
            //        },
            //    }
            //},
            //check_out: {
            //    validators: {
            //        notEmpty: {
            //            message: '* mandatory'
            //        },
            //    }
            //},
            room: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
            adults: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
            children: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
            age_children: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
            nationality: {
                validators: {
                    notEmpty: {
                        message: '* mandatory'
                    },
                }
            },
           
            

        }
    });
    
});