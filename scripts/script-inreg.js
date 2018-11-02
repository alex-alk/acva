$(function(){
    $("#inreg").validate({
            rules:{
                lastname: {required:true},
                firstname:{required:true},
                email:{required:true,email:true},
                telnumber:{required:true},
                password:{required:true},
                passconfirm:{required:true,equalTo:"#password"}    
            },
            messages:{
                lastname: {required:"Câmp obligatoriu"},
                firstname:{required:"Câmp obligatoriu"},
                email:{required:"Câmp obligatoriu",email:"Folosiți o adresă completă"},
                telnumber:{required:"Câmp obligatoriu"},
                passord:{required:"Câmp obligatoriu"},
                passconfirm:{equalTo:"Parolele nu corespund"}
            }
    });
})