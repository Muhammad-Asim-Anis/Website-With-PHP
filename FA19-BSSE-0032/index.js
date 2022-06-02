var navitemm = document.getElementById("nav2");
var navitemm2 = document.getElementById("nav3");


if(window.matchMedia("(max-width:557px)"))
{
    navitemm.classList.toggle('nav-block');
    navitemm2.classList.toggle('nav-block');
    document.getElementById('button').addEventListener("click",
    
    () =>  {
   
   
        if(navitemm.style.display == "block")
        {
            navitemm.classList.toggle('nav');
            navitemm2.classList.toggle('nav');

        }
        else
        {
            navitemm.classList.toggle('nav-block');
            navitemm2.classList.toggle('nav-block');
        
        }
      

});
    
}





