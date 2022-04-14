$(function(){

  // Add Needed Variables
  let scan_animation = $(".scan-animation");
  let status_container = $(".status-container");
  let status_text = $(".status-text");
  let success_animation = document.querySelector("#success");
  let failed_animation = document.querySelector("#failed");
  let again_button = $("#again");
  let process_container = $(".processing-container");
  let video = document.createElement("video");
  let canvasElement = document.getElementById("canvas");
  let canvas = canvasElement.getContext("2d");
  let canvas_container = $(".canvas-container");
  let reqAnim;
  let once = true;

  // Add Animation when QR Scan Animation is click
  scan_animation.click(()=> {
    scan_animation.addClass("animate__animated animate__bounceOut");
    setTimeout(function(){
      scan_animation.removeClass("animate__animated animate__bounceOut");
      scan_animation.css('display','none');
      $.fn.openCamera();
    },1000);
  });

  // Function that ask permission to open the camera
  $.fn.openCamera = function() {
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      video.srcObject = stream;
      video.setAttribute("playsinline", true);
      video.play();
      reqAnim = requestAnimationFrame($.fn.tick);
    });
  };

  // Function for displaying the video
  $.fn.tick = function() {
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
      canvasElement.hidden = false;
      canvas_container.addClass("animate__animated animate__bounceIn");
      canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
      let imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
      let code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
      });

      // If camera detects a QR Code
      if(code && once){
        canvas_container.addClass("animate__bounceOut");
        once = false;
        setTimeout(function(){
          cancelAnimationFrame(reqAnim);
          video.srcObject.getVideoTracks()[0].stop();
          canvasElement.hidden = true;
          canvas_container.css('display','none');
          canvas_container.removeClass("animate__animated animate__bounceIn animate__bounceOut");
          $.fn.processData();
        },1000);
      }  
    }
    reqAnim = requestAnimationFrame($.fn.tick);
  };

  //Method that process the data with database
  $.fn.processData = function(){
    process_container.removeClass("d-none");
    process_container.addClass("animate__animated animate__bounceIn");

    let bool = [true, false];

    // If process is done code here
    if(bool[Math.floor(Math.random()*bool.length)]){
      process_container.addClass("animate__bounceOut");
      setTimeout(function(){
        process_container.addClass("d-none");
        process_container.removeClass("animate__animated animate__bounceIn animate__bounceOut");
        status_container.removeClass("d-none");
        status_container.addClass("animate__animated animate__bounceIn");
        success_animation.play();
        success_animation.classList.remove("d-none");
        status_text.text("Success");
      },1000);
    } else {
      process_container.addClass("animate__bounceOut");
      setTimeout(function(){
        process_container.addClass("d-none");
        process_container.removeClass("animate__animated animate__bounceIn animate__bounceOut");
        status_container.removeClass("d-none");
        status_container.addClass("animate__animated animate__bounceIn");
        failed_animation.play();
        failed_animation.classList.remove("d-none");
        status_text.text("Failed! Try Again");
      },1000);
    }
  };

  // Scan again the qr code
  again_button.click(()=> {
    once = true;
    status_container.addClass("animate__bounceOut");
    setTimeout(function(){
      status_container.addClass("d-none");
      status_container.removeClass("animate__animated animate__bounceIn animate__bounceOut");

      if(!success_animation.classList.contains("d-none")){
        success_animation.stop();
        success_animation.classList.add("d-none");
      }else if(!failed_animation.classList.contains("d-none")){
        failed_animation.stop();
        failed_animation.classList.add("d-none");
      }
      canvas_container.css("display","block");
      $.fn.openCamera();
    },1000);
  });

});