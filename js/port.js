$(document).ready(function(){



/* Button Actions */

$('button').css('display', 'initial');

    var $button = $(this);
    
var $getA = $('#web');

var $getPound = $getA.find('a[href="#"]');

$($getPound).css({
      "cursor" : "default",
      "text-decoration" : "none",
      "color" : '#333'
    });

$getPound.css('cursor', 'default');




$('button').click(function() {

    $('#portfolio').show();
    $('#web').show();

    if($(this).hasClass('active')){
        $(this).removeClass('active');
        $('#portfolio').show();
        $('#web').show(); 
    }
    else{
        $('button').removeClass('active');
       switch(this.id) {
         case 
            'webDesign': 
            $(this).addClass('active');
            $("#portfolio").hide();
            $('#web').show();
            $graphic.removeClass('active');
            break; //notice BREAK
         case 
            'graphic': 
            $(this).addClass('active');
            $("#web").hide();
            $('#portfolio').show();
            
            break; //notice BREAK
       }
    }
 });




var apiKey  = 'jZ3cXttGPtVbq7N3F7xMptr2k7w7osi8';
var userID  = 'mat335d077';


    //Header image
(function() {
    var behanceUserAPI = 'https://www.behance.net/v2/users/'+ userID +'?callback=?&api_key='+ apiKey;
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
    var behanceProjectAPI = 'https://www.behance.net/v2/users/'+ userID +'/projects?callback=?&api_key=' + apiKey + '&per_page=' + perPage;
 
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
    

$('#portfolio').on('click', '.portfolio-cover', function() {
    var $this = $(this),
        projectID = $this.data('project-id'),
        beProjectContentAPI = 'https://www.behance.net/v2/projects/'+ projectID +'?callback=?&api_key=' + apiKey,
        keyName = 'behanceProjectImages-' + projectID;

    function showGallery(dataSource) { 

        $this.magnificPopup({
            items: dataSource,
            gallery: {
                enabled: true
            },
            type: 'image'
        }).magnificPopup('open');
    };
 
    if(localStorage.getItem(keyName)) {
        var srcItems = JSON.parse(localStorage.getItem(keyName));
        showGallery(srcItems);
    } else {
        $.getJSON(beProjectContentAPI, function(projectContent) {
            var src = [];
            $.each(projectContent.project.modules, function(index, mod) {
                if(mod.src != undefined) {
                    src.push({ src: mod.src }); 
                }
            });
            showGallery(src);
            var data = JSON.stringify(src);
            localStorage.setItem(keyName, data);

        });
    };
});



});
