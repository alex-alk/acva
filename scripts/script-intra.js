$(function(){
    $("#fenter").validate({
            rules:{
                email: {required:true},
                password:{required:true}
            },
            messages:{
                email: {email:"Introduceți adresa completă"},
                password:{required:"Câmp obligatoriu"}
            }
        })
})