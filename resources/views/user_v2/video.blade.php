@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
<style type="text/css">
    #video-preview {
      width: 100%;
      height: 100%;

    }

    #video-container {
      width: 300px;
      height: 230px;
      position: relative;
    }

    .video-elements {
      position: absolute;
      color: #fff;
      bottom: 20px;
      left: 20px;
      cursor: pointer;
    }

    #voice-toggle {
      font-size: 24px;
      cursor: pointer;
      background: #14213d;
      border-radius: 5px;
      padding: 6px;
      z-index: 1;
      position: relative;
    }

    #uncover {
      margin-left: 20px;
    }

    .blur-screen {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 90%;
      background-size: cover;
      filter: blur(3px);
      /*  z-index: 1;*/
    }

    #success-screen {
      width: 100%;
      height: 100%;
      background-color: rgba(128, 128, 128, 0.8);
      color: white;
      font-size: 24px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
</style>
@endsection
@section('content')

    
    <div class="countdown d-flex align-items-center gap-2 mb-3">
      <h4 class="m-0 countdown-text">Get Ready  ... </h4>
      <div class="fs-3 border border-primary bg-soft-primary rounded-2 d-flex align-items-center gap-2 justify-content-center px-2 fw-medium" >
        <i class="ri-timer-fill"></i>
        <span id="countdown" style="width:70px">00:00</span>
      </div>
    </div> 

    <div id="video-container">
      <div class="video-elements">
        <i class="ri-mic-fill" id="voice-toggle"></i>
        <span id="uncover"></span>     
      </div>   
      <video id="video-preview" class="blur-screen" style="background-image:url({{ asset('images/blur.png') }})" autoplay muted></video>
    </div>

    <button id="finish" type="button" class="btn btn-soft-secondary waves-effect waves-light mt-3" disabled="">Finish Recording</button>
    

@endsection



@section('script')
<script type="text/javascript">
const videoContainer = document.getElementById('video-container');
const videoPreview = document.getElementById('video-preview');
const uncover = document.getElementById('uncover');
const voiceToggle = document.getElementById('voice-toggle');
const finish = document.getElementById('finish');


let isVoiceOn = true;
let isRecording = false;

let stream = null;
let recorder = null;
let chunks = [];

startCountdown(10, "countdown", function() {
  var countdowntext=document.querySelector(".countdown-text");
  startRecording();
  countdowntext.textContent="Recording Time ...";
  startCountdown(5, "countdown", function() {
     stopRecording();    
  });
});

function startCountdown(duration, display, action) {
  var timer = duration, display = document.getElementById(display);
  var countdownInterval = setInterval(function () {
      var minutes = Math.floor(timer / 60),
          seconds = timer % 60;

      minutes = (minutes < 10 ? "0" : "") + minutes;
      seconds = (seconds < 10 ? "0" : "") + seconds;

      display.textContent = minutes + ":" + seconds;
      timer--;

      if (timer < 0) {
          clearInterval(countdownInterval);
          action();
      }
  }, 1000);
}

function checkCameraClarity(videoPreview) {
  return new Promise((resolve, reject) => {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    // Set the canvas size to match the video
    canvas.width = videoPreview.videoWidth;
    canvas.height = videoPreview.videoHeight;
    // Draw the video frame on the canvas
    ctx.drawImage(videoPreview, 0, 0);
    // Get the image data from the canvas
    try {
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      // Calculate the average brightness of the image
      let brightnessSum = 0;
      for (let i = 0; i < imageData.data.length; i += 4) {
        const r = imageData.data[i];
        const g = imageData.data[i + 1];
        const b = imageData.data[i + 2];
        const brightness = (0.2126 * r) + (0.7152 * g) + (0.0722 * b);
        brightnessSum += brightness;
      }
      const averageBrightness = brightnessSum / (imageData.data.length / 4);
      // Check if the video is clear enough
      if (averageBrightness > 100) {
        // console.log('Starting clarity check interval10');
        resolve();
      } else {
        // console.log('Starting clarity check interval11');
        reject("Uncover Your Camera");
      }
    } catch (error) {
      // console.log('Starting clarity check interval12');
      reject(error);
    }
  });
}

async function startRecording() {
  try {   
    stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: isVoiceOn });
    videoPreview.classList.remove('blur-screen');
    videoPreview.removeAttribute('style');

     videoPreview.srcObject = stream;
     await videoPreview.play();

    function checkClarity() {
      checkCameraClarity(videoPreview)
        .then(() => {
          uncover.textContent = '';
        })
        .catch((error) => {
          // console.error(error);
          uncover.textContent="Please Uncover Your Camera";
        });
    }
    // Check camera clarity before starting the recording
    checkClarity();
    // Set interval to check clarity every 3 seconds
    clarityCheckInterval = setInterval(checkClarity, 3000);

    recorder = new MediaRecorder(stream, { mimeType: 'video/webm' });
    chunks = [];

    recorder.addEventListener('dataavailable', event => chunks.push(event.data));
    recorder.addEventListener('stop', () => {
      clearInterval(clarityCheckInterval);

      const blob = new Blob(chunks, { type: 'video/webm' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'video.webm';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      videoPreview.srcObject = null;
      finish.style.display = 'none';
      videoContainer.innerHTML = `
        <div id="success-screen">
          Video exported successfully!
        </div>
      `;
    });
    

    // Enable the finish button after 5 seconds
    setTimeout(() => {
      finish.disabled = false;
    }, 5000);


    recorder.start();
  } catch (error) {
    if (error.name === 'NotAllowedError') {
          // Show permission popup instead of alert
        alert('Please allow camera access to use this feature & refresh page then.');
    } else {
      console.error(error);
    }
  }
}

// Toggle voice recording
function toggleVoiceRecording() {
  if (stream) {
    const tracks = stream.getAudioTracks();
    if (tracks.length > 0) {
      tracks[0].enabled = !tracks[0].enabled;
      isVoiceOn = tracks[0].enabled;
    }
  }
}

// Add event listeners
voiceToggle.addEventListener('click', () => {
  voiceToggle.classList.toggle('ri-mic-fill');
  voiceToggle.classList.toggle('ri-mic-off-fill');
  toggleVoiceRecording();
});

// Stop recording and cleanup resources
function stopRecording() {
  if (recorder !== null && recorder.state === 'recording') {
    recorder.stop();
    stream.getTracks().forEach(track => {
      track.stop();
    });
    stream = null;
    recorder = null;
  }
}
// Add event listener for "finish" button
finish.addEventListener('click', stopRecording);


</script>
@endsection
