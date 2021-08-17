<?php
 ?>

 <script src="/wp-content/themes/tefl-theme/js/libraries/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.18/chance.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
body{
margin:0;
overflow:hidden; /*hide the scroll bar*/
}
</style>
    <script>


 var imageDataArray = [];
 var canvasCount = 35;
 setTimeout(function(){
console.log("starting animation");
var isDevice=false;
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)))
    {

    $(".diss--gap")[0].style.display="none";
    $(".diss--mask")[0].style.display="none";
    $(".diss--container")[0].style.display="none";
    $(".diss")[0].style.display="none";
    $(".diss--after")[0].style.display="block";
    isDevice=true;
}

   if(!isDevice){
   html2canvas($(".diss")[0]).then(canvas => {
     //capture all div data as image
     let ctx = canvas.getContext("2d");
 <!-- note that using images causes cross site contianation	issues -->
     var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
     var pixelArr = imageData.data;
     createBlankImageData(imageData);
     //put pixel info to imageDataArray (Weighted Distributed)
     for (let i = 0; i < pixelArr.length; i+=4) {
       //find the highest probability canvas the pixel should be in
       let p = Math.floor((i/pixelArr.length) *canvasCount);
       let a = imageDataArray[weightedRandomDistrib(p)];
       a[i] = pixelArr[i];
       a[i+1] = pixelArr[i+1];
       a[i+2] = pixelArr[i+2];
       a[i+3] = pixelArr[i+3];
     }
     //create canvas for each imageData and append to target element
     for (let i = 0; i < canvasCount; i++) {
       let c = newCanvasFromImageData(imageDataArray[i], canvas.width, canvas.height);
       c.classList.add("diss--dust");
       $(".diss--container").append(c);
     }
     //clear all children except the canvas
     $(".diss").children().not(".diss--dust").fadeOut(10);
     //apply animation
     $(".diss--dust").each( function(index){
       animateBlur($(this),0.8,800);
       setTimeout(() => {
         animateTransform($(this),100,-100,chance.integer({ min: -15, max: 15 }),800+(110*index));
       }, 70*index);
       //remove the canvas from DOM tree when faded
       $(this).delay(70*index).fadeOut((110*index)+800,"easeInQuint",()=> {$( this ).remove();});

   setTimeout(function(){
     $(".diss--after")[0].style.display="block";
     $(".diss--gap")[0].style.display="none";
     $(".diss--mask")[0].style.display="none";
     $(".diss--container")[0].style.display="none";
     $(".diss")[0].style.display="none";
     document.body.style.overflow="visible";
   },5000);
     });
   });
 }
}, 500);
 function weightedRandomDistrib(peak) {
   var prob = [], seq = [];
   for(let i=0;i<canvasCount;i++) {
     prob.push(Math.pow(canvasCount-Math.abs(peak-i),3));
     seq.push(i);
   }
   return chance.weighted(seq, prob);
 }
 function animateBlur(elem,radius,duration) {
   var r =0;
   $({rad:0}).animate({rad:radius}, {
       duration: duration,
       easing: "easeOutQuad",
       step: function(now) {
         elem.css({
               filter: 'blur(' + now + 'px)'
           });
       }
   });
 }
 function animateTransform(elem,sx,sy,angle,duration) {
   var td = tx = ty =0;
   $({x: 0, y:0, deg:0}).animate({x: sx, y:sy, deg:angle}, {
       duration: duration,
       easing: "easeInQuad",
       step: function(now, fx) {
         if (fx.prop == "x")
           tx = now;
         else if (fx.prop == "y")
           ty = now;
         else if (fx.prop == "deg")
           td = now;
         elem.css({
               transform: 'rotate(' + td + 'deg)' + 'translate(' + tx + 'px,'+ ty +'px)'
           });
       }
   });
 }
 function createBlankImageData(imageData) {
   for(let i=0;i<canvasCount;i++)
   {
     let arr = new Uint8ClampedArray(imageData.data);
     for (let j = 0; j < arr.length; j++) {
         arr[j] = 0;
     }
     imageDataArray.push(arr);
   }
 }
 function newCanvasFromImageData(imageDataArray ,w , h) {
   var canvas = document.createElement('canvas');
       canvas.width = w;
       canvas.height = h;
      let tempCtx = canvas.getContext("2d");
       tempCtx.putImageData(new ImageData(imageDataArray, w , h), 0, 0);

   return canvas;
 }
 </script>

    <div class="diss--gap"></div>
  <div class="diss--container"></div>
  	<div class='diss'>
  		<div class="">TEFL</div>
  		<div class="">EDUCATION</div>
  		<div class="">INSTITIUTE</div>
      <div class="diss--loading">Loading....</div>
  </div>

  <div class="diss--mask"></div>
