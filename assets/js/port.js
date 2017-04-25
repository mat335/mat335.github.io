$(document).ready(function(){

//https://webdesign.tutsplus.com/tutorials/how-to-use-the-behance-api-to-build-a-custom-portfolio-web-page--cms-20884

var apiKey  = 'hv4e3aXYnB4FC5J1zHCJcK9bofZXuEXN';
var userID  = 'mat335';

    //Header image
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

    
 //Porfolio Images   
 (function() {
    var perPage = 12;
    var behanceProjectAPI = 'http://www.behance.net/v2/users/'+ userID +'/projects?callback=?&api_key=' + apiKey + '&per_page=' + perPage;
 
    function setPortfolioTemplate() {
        var projectData = JSON.parse(sessionStorage.getItem('behanceProject')),
            getTemplate = $('#portfolio-template').html(),
            template    = Handlebars.compile(getTemplate),
            result      = template(projectData);
        $('#portfolio').html(result);
    };
 
    if(sessionStorage.getItem('behanceProject')) {
        setPortfolioTemplate();
    } else {
        $.getJSON(behanceProjectAPI, function(project) {
            var data = JSON.stringify(project);
            sessionStorage.setItem('behanceProject', data);
            setPortfolioTemplate();
        });
    };
})();   
    
    

});
