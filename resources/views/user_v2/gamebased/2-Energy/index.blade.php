@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/2-Energy/css/index.css')}}"> 

  <style type="text/css">
      .game-step{
        display: none;
      }
  </style> 
@endPushOnce

    <div class="background-wrapper">
        <div class="container vertical-centered">

            <div class="row justify-content-center" >       
                <div class="">
                    <!-- Instructions -->
                    <div class="game-instructions game-step col-md-12" id="step1">     
                        <h4 class="title text-center text-white mb-5">Instructions</h4>   
                        <div class="text-center" >
                             <p class="fs-18 text-white">

                                The generators produces different amount of powers which dont change.However due to fault they might drain a variable amount of power as well.<br>

                                So with each button press <span class="tutotial_img"><img src="{{asset('gamebased/2-Energy/img/tutorial/power_btn.png')}}"></span>, You will either gain <span class="tutotial_img"><img src="{{asset('gamebased/2-Energy/img/tutorial/up.png')}}"></span> or lose <span class="tutotial_img"><img src="{{asset('gamebased/2-Energy/img/tutorial/down.png')}}"></span> power overall.<br><br>


                                This <img src="{{asset('gamebased/2-Energy/img/tutorial/progress.png')}}" width="200"> meter shows the total amount of power restored.
                                You will given a large number of attempts to generate power, But choose wisely!
                                
                                
                             </p>
                            
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step2" class="game-button next-button">Continue</button>   
                        </div>
                    </div>

                    <div class="game-instructions game-step col-md-12" id="step2">
                        <div class="text-center" >
                             <p class="fs-20 text-white">Press start when you're <br>    ready to continue</p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-around mt-5">
                            <button data-href="step1"   class="game-button back-button">Back</button>   
                            <button data-href="step3"  class="game-button next-button">Start</button>   
                        </div>
                    </div>
                    <div class="game-step col-md-12" id="step3">
                            <div class="d_attempts">
                              <p class="game-button"><span class="attempts__done"></span>/<span class="total__attempts"></span></p>
                            </div>
                            
                            <div class="container vertical-centered">
                                <!-- Power Meter -->
                                <div class="power-meter-container">
                                    <div class="power-progress-bar"></div>
                                    <div class="power-segments">
                                        <span>1000</span>
                                        <span>2000</span>
                                        <span>3000</span>
                                        <span>4000</span>
                                        <span>5000</span>
                                        <span>6000</span>
                                    </div>
                                </div>

                                <!-- Energy Cards -->
                                <div class="energy-cards-container">
                                    <?php for ($i = 0; $i < 4; $i++): ?>
                                        <div class="energy-card">
                                            <div class="energy-card-content">

                                                <!-- Initial State: Light Image -->
                                                <div class="light-indicator">
                                                    <img src="{{asset('gamebased/2-Energy/img/light.png')}}">
                                                </div>

                                                <!-- Power Up/Down Indicators -->
                                                <div class="power-indicators hidden"> <!-- Added "hidden" class to hide initially -->
                                                    <div class="power-up">
                                                        <img src="{{asset('gamebased/2-Energy/img/up.png')}}">
                                                        <span>45</span> <!-- This can be dynamically populated -->
                                                    </div>
                                                    <div class="power-down">
                                                        <img src="{{asset('gamebased/2-Energy/img/down.png')}}">
                                                        <span>5</span> <!-- This can be dynamically populated -->
                                                    </div>
                                                </div>

                                                <!-- Power Button -->
                                                <div class="power-button-container">
                                                    <a href="javascript:void(0);" class="power-button" data-card-id="<?php echo $i; ?>">
                                                        <img src="{{asset('gamebased/2-Energy/img/fingerprint.png')}}" width="100">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/2-Energy/img/correct.png')}}" width="180">
                                    <h3 class="text-white">Test Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>

                                    <p class="text-white" id="result_msg">
                                        
                                    </p>
                                </div>
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <a href=""  class="game-button" disabled>Finish</button> 
                                </div>
                            </div> 
                        </div>
                    </div> 

                </div>
            </div>


        </div>
    </div>

@pushOnce('partial_script')
<script src="{{asset('gamebased/2-Energy/js/index.js')}}"></script>
@endPushOnce