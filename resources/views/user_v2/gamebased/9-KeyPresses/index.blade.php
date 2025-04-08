@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/9-KeyPresses/css/index.css')}}"> 

  <style type="text/css">
      .game-step{
        display: none;
      }
  </style> 
@endPushOnce

   <div class="background-wrapper">
        <div class="container vertical-centered">

            <div class="row justify-content-center" >       
                <div class="col-lg-12 col-md-12 g_border">
                    <!-- Instructions -->
                    <div class="game-instructions game-step col-md-12" id="step1">     
                        <h4 class="title text-center text-white mb-5">Instructions</h4>   
                        <div class="text-center" >
                             <p class="fs-20 text-white">
                                 You will be presented with a countdown timer.<br>
                                 When the message "GO!" appears, repeatedly hit the <span class="gg_space_bar"> spacebar</span> as fast as you can until you are told to stop.<br>
                             </p>
                             <p class="fs-20 text-white  mt-5">
                                  Use the index finger on your dominant hand to press the <span class="gg_space_bar"> spacebar</span>
                             </p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step2" class="game-button next-button">Continue</button>   
                        </div>
                    </div>

                    <div class="game-instructions game-step col-md-12" id="step2">
                        <div class="text-center" >
                             <p class="fs-20 text-white">Are you left or right handed ?</p>
                             <div class="hands">
                                 <img src="{{asset('gamebased/9-KeyPresses/img/left_hand.png')}}">
                                 <img src="{{asset('gamebased/9-KeyPresses/img/right_hand.png')}}">
                             </div>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-around mt-5">
                            <button data-href="step3"   class="game-button next-button">Left </button>   
                            <button data-href="step3"  class="game-button next-button">Right</button>   
                        </div>
                    </div>

                    <div class="game-instructions game-step col-md-12" id="step3">
                        <div class="text-center" >
                             <p class="fs-20 text-white">Press start when you're <br>    ready to continue</p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-around mt-5">
                            <button data-href="step3"   class="game-button back-button">Back</button>   
                            <button data-href="step4"  class="game-button next-button">Start</button>   
                        </div>
                    </div>
                    <div class="game-step col-md-12" id="step4">
                         <div class="d-flex justify-content-between">
                            <div class="timer text-white fs-20 d-flex"><img src="{{asset('gamebased/9-KeyPresses/img/timer.png')}}" width="30" class="me-2"> <span>0.05</span></div>
                         </div>

                        <h4 class="title text-center text-white">Repeatedly press the <span class="gg_space_bar"> spacebar</span> as fast as you can.</h4>      
                        <div class="text-center" >
                             <h1 class="text-success goo_text" style="font-size:10rem">
                                 GO !
                             </h1>     
                             <p class="fs-20 text-danger keypresses__warning">WARNING: No keypresses detected</p>
                        </div>
                         <!-- Button Group -->
                       <!--  <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step4"   class="game-button next-button">Continue</button> 
                        </div> -->
                    </div>


                    <div class="screen_result game-step col-md-12" id="step5">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/9-KeyPresses/img/correct.png')}}" width="180">
                                    <h3 class="text-success">Test Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>
                                    <p class="text-white" id="result_msg"></p>
                                </div>
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <a href=""  class="game-button" disabled>Finish</a> 
                                </div>
                            </div> 
                        </div>
                    </div> 

                </div>
            </div>


        </div>
    </div>

@pushOnce('partial_script')
<script src="{{asset('gamebased/9-KeyPresses/js/index.js')}}"></script>
@endPushOnce