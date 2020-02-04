$(document).ready(function() {
    $(".menu-icon").on("click", function() {
          $("nav ul").toggleClass("showing");
    });
    $(window).scroll(function() {
        /* affix after scrolling 100px */
        if ($(document).scrollTop() > 20) {
          $('.navbar').addClass('affix');
          $('.flip-box-inner').addClass('flipInner');
          $('.flip-box-back').addClass('displaynone');
        } else {
          $('.navbar').removeClass('affix');
          $('.flip-box-inner').removeClass('flipInner');
          $('.flip-box-back').removeClass('displaynone');
        }
    });
});
// function myFunction() { 
//     document.getElementById("flipInner").style.transform = "rotate(20deg)"; 
//   }
//   myFunction();


          //   $(".flip-box-inner").style.transform = "rotateY(360deg)"; 
        //   $(".flip-box-inner").style.width = "300px"; 

      //   flip image
    //   $(window).scroll(function() {
    //     /* affix after scrolling 100px */
    //     if ($(document).scrollTop() > 30) { 
    //        $(".logo-1").style.transform = "rotateY(360deg)"; 
    //      document.getElementById('#flipInner').style.width = "500px"; 
    //     } else {
         
    //     }
    //   });


// var flipInner = document.getElementById('flipInner'),
//     transform = "rotateY(360deg)";

//     flipInner.onmouseover = function(){
//     text.style.transform = transform;
// }
// Scrolling Effect

// $(window).on("scroll", function() {
//     if($(window).scrollTop()) {
//           $('nav').addClass('black');
//     }

//     else {
//           $('nav').removeClass('black');
//     }
// })

