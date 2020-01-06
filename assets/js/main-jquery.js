jQuery(document).ready(function($){

    
    revealPosts(); /* init function (shortcodes.php) */

    /*helper functions*/
    function revealPosts() {
        $('[data-toggle="tooltip"]').tooltip();//code in shortcodes.php
        $('[data-toggle="popover"]').popover();//code in shortcodes.php
    }
    /* (shortcodes.php) END */


    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all"){
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else {
            // $('.filter[filter-item="'+value+'"]').removeClass('hidden');
            // $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
        $(this).addClass("active");


    /* Sections animation element about.html START */
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                $element.addClass('in-view');
            } else {
                $element.removeClass('in-view');
            }
        });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
    /* Sections animation element about.html END */


    /* portfolio.html image gallery popup START 
    $(document).ready(function () {
        $(".gallery-img").click(function(){
            var image = $(this).attr("src");
            $(".modal-body").html("<img src='"+image+"' class='modal-img'>");
            $("#imageModal").modal();
        });
    });
    /* portfolio.html image gallery popup END */

    /* portfolio.html image gallery popup START */
    $(document).ready(function () {
        $("img").click(function(){
            var image = $(this).attr("src");
            $(".modal-body").html("<img src='"+image+"' class='wp-post-image modal-img'>");
            //$(".modal-body").html($(this).find("gallery-img img"));
            $("#imageModal").modal();
        });
    });
    /* portfolio.html image gallery popup END */
    


    /*Contact form submission START*/ //contact-form.php
    //FILES INCLUDE shortcodes.php, function.php(to add ajax.php), contact-form.php, ajax.php, theme-support.php, custom-post-type.php, contact.scss
    $('#modelingContactForm').on('submit', function(e){//e - means element
        e.preventDefault();//avoid the form when submitting to href to whatever location that is not wanted

       // console.log('Form submitted');//test to check if it works

        $('.has-error').removeClass('has-error');//remove has-error class when input is filled and submitted
        $('.js-form-submission').removeClass('js-form-submission');

        var form = $(this), //$(this) - stands for the parent element in jQuery function (in this case #modelingContactForm)
            name = form.find('#name').val(), //name - the id in the contact-form.php
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url'); //data url must be defined in contact-form.php

            if( name === '' ){
                //console.log('Required inputs are empty');
                $('#name').parent('.form-group').addClass('has-error');//#name - id in contact-form.php
                
                return;//return stops the execution of the script at this point. 
                //It is not going to go on the second line and not going to continue if this if statement is true.
            }

            if( email === '' ){
                $('#email').parent('.form-group').addClass('has-error');//#email - id in contact-form.php
                
                return;
            }

            if( message === '' ){
                $('#message').parent('.form-group').addClass('has-error');//#message - id in contact-form.php
                
                return;
            }

            form.find('input, button, textarea').attr('disabled', 'disabled');//disables input, button, textarea. form - var form = $(this).
            $('.js-form-submission').addClass('js-show-feedback');//class from contact-form.php appears after submit button is pushed

        //console.log(form);
        //console.log(name);

        $.ajax({
            url : ajaxurl,
            type : 'post',// post - the same type that it is seen in a <form> and the post method in ajax is a default type.
            //$_POST (post method) - is a method that passes all the variables hidden inside the reload of the page. These methods are not getting printed anywhere.
            //$_GET (get method) - print the variables inside the url so you will see the variables inside the url. GET method is not safe
            data : { // data contains all the custom data like the array and we can write in the curly brackets and send to the ajax function
 
                name : name,
                email : email,
                message : message,
                action: 'modeling_save_user_contact_form' //function portfolio_save_contact in ajax.php 

            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-form-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        //console.log('Unable to save your message, Please try again later');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);
                } else {

                    setTimeout(function(){
                        //console.log('Message saved!');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    }, 1500);
                }
            }
        });
    });
    /*Contact form submission END*/


});