function date_time(id)
{
        var date = new Date;
        var year = date.getFullYear();
        var month = date.getMonth();
        var months = new Array('Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
        var d = date.getDate();
        var day = date.getDay();
        var days = new Array('Sâmbătă', 'Luni', 'Marți', 'Miercuri', 'Joi', 'Vineri', 'Sâmbătă');
        var h = date.getHours();
        if(h<10){
            h = "0"+h;
        }
        var m = date.getMinutes();
        if(m<10){
            m = "0"+m;
        }
        var s = date.getSeconds();
        if(s<10){
           s = "0"+s;
        }
        var result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
$(function(){
    $('#cookie').click(function(){
        var now = new Date();
        now.setTime(now.getTime() + 60000);
        var exp="expires="+now.toUTCString();
        document.cookie = "cookie" + "=" + "none" + ";" + exp + ";path=/";
    });
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("cookie");
        if (user !== "none") {
            $('#warning').show();
        }
    }
    checkCookie();
});