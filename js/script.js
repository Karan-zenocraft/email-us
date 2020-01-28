var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
   
});


$('#form').on('submit', function (e) {
e.preventDefault();
 $("#submit").attr("value", "Loading...");
    $(".spinner-border-sm").css("display", "block");
$.ajax({
    
type:"POST",
url : "../contact-us/php/index.php",
data:new FormData(this),
contentType:false,
processData : false,
success : function(response, status){
console.log(response);
$("#message").show();
$("#message").html(response);
$("#message").fadeOut(3000);
if(response=="Thank you, Our team contact you soon."){
$("#message").css({"background-color": "#333", "color": "#fff"});
$("#form")[0].reset();
$("#submit").attr("value", "Submit");  
$(".spinner-border-sm").css("display", "none");
}else if(response=="Insert Required field"){
    
 $("#submit").attr("value", "Submit");  
$(".spinner-border-sm").css("display", "none");
$("#message").css({"background-color": "red", "color": "#fff"});
    
}
},
failure : function(response, status){
    
    console.log(response + status)
},
    
datatype : "TEXT"

});




});


$("nav ul li a").click(function() {
            $(".Menu").removeClass("change");
            $("nav").css("display", "none");
        });


        function myFunction(x) {
            x.classList.toggle("change");
        }



        var scrollLink = $('.scroll');
        // Smooth scrolling
        scrollLink.click(function(e) {
            e.preventDefault();
            $('body,html').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });



    
        $(document).ready(function() {
            $(".Menu").click(function() {
                $('nav').slideToggle('fast');
            });
        });


        $(window).on('load', function() {
                $('#loading').fadeOut();
                $('#Load').delay(2500).fadeOut('slow');
                $('body').delay(2500).css({
                    'overflow': 'visible'
                });
            })

      

            $(document).ready(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('#scroll').fadeIn();
                    } else {
                        $('#scroll').fadeOut();
                    }
                });
                $('#scroll').click(function() {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 600);
                    return false;
                });
            });


        $(document).ready(function() {
            $('ul li').click(function() {
                $('li').removeClass("active");
                $(this).addClass("active");
            });
        });

   

        var sourceSwap = function() {
            var $this = $(this);
            var newSource = $this.data('alt-src');
            $this.data('alt-src', $this.attr('src'));
            $this.attr('src', newSource);
        };
        $('.social a').hover(function() {
            $('img', this).attr('src', sourceSwap)
        }, function() {
            $('img', this).attr('src', sourceSwap)
        });