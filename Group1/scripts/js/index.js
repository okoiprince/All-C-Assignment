
window.onscroll = function () {
      
      scrollFunction();
};

function scrollFunction () {
      if (document.body.scrollTop >20 || document.documentElement.scrollTop >20)
      {
            document.getElementById("topbtn").style.display="block";
      }
      else
      {
            document.getElementById("topbtn").style.display = "none";
      }
}


function clickTop()
{
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
}

function clickBottom()
{
       document.getElementById("footer_img").style.display ="block";
}