$(document).ready(function(){
    $("#myForm").validate({
    rules :{
        "name" : {
            required : true,
            minlength : 5,
            maxlength : 10,
            lettersonly : true
        },
        "email" : {
            required : true,
            email : true
        },
        "password" : {
            required : true,
            minlength : 5,
            maxlength : 10,
        },
        "phone" : {
            required : true,
            minlength : 10,
            maxlength : 10,
            number : true
        },
        "att" : {
            required : true,
        }
    },
    messages :{
        "name" : {
            required : "name is required",
            minlength : "minimum 5 character",
            maxlength : "maximum 10 character",
            lettersonly : "only alphabet allow"
        },
        "email" : {
            required : "email is required",
            email : "enter a valid email"
        },
        "password" : {
            required : "password is required",
            minlength : "minimum 5 character",
            maxlength : "maximum 10 character",
        },
        "phone" : {
            required : "phone number is required",
            minlength : "minimum 10 digits",
            maxlength : "maximum 10 digits",
            number : "enter valid number"
        },
        "att" : {
            required : "image is required",
        }
    }
    });
});

$(document).ready(function(){
    $("#registration").validate({
    rules :{
        "name" : {
            required : true,
            minlength : 5,
            maxlength : 10,
            lettersonly : true
        },
        "email" : {
            required : true,
            email : true
        },
        "password" : {
            required : true,
            minlength : 5,
            maxlength : 10,
        },
        "phone" : {
            required : true,
            minlength : 10,
            maxlength : 10,
            number : true
        },
        "att" : {
            required : true,
        }
    },
    messages :{
        "name" : {
            required : "name is required",
            minlength : "minimum 5 character",
            maxlength : "maximum 10 character",
            lettersonly : "only alphabet allow"
        },
        "email" : {
            required : "email is required",
            email : "enter a valid email"
        },
        "password" : {
            required : "password is required",
            minlength : "minimum 5 character",
            maxlength : "maximum 10 character",
        },
        "phone" : {
            required : "phone number is required",
            minlength : "minimum 10 digits",
            maxlength : "maximum 10 digits",
            number : "enter valid number"
        },
        "att" : {
            required : "image is required",
        }
    }
    });
});