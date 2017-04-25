$(document).ready(function(){

//https://webdesign.tutsplus.com/tutorials/how-to-use-the-behance-api-to-build-a-custom-portfolio-web-page--cms-20884

var apiKey  = 'hv4e3aXYnB4FC5J1zHCJcK9bofZXuEXN';
var userID  = 'mat335';

(function() {
    var behanceUserAPI = 'http://www.behance.net/v2/users/'+ userID +'?callback=?&api_key='+ apiKey;
    function setUserTemplate() {
        var userData    = JSON.parse(sessionStorage.getItem('behanceUser')),
        getTemplate = $('#profile-template').html(),
        template    = Handlebars.compile(getTemplate),
        result      = template(userData);
        $('#header').html(result);
    };
    if(sessionStorage.getItem('behanceUser')) {
        setUserTemplate();
    } else {
        $.getJSON(behanceUserAPI, function(user) {
            var data = JSON.stringify(user);
            sessionStorage.setItem('behanceUser', data);
            setUserTemplate();
        });
    };
})();


});
