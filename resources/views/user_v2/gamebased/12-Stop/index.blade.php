@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/12-Stop/css/index.css')}}"> 

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
                                For each trial, you will be presented with a <span class="gg__circles" ><img src="{{asset('gamebased/12-Stop/img/green.png')}}"></span> or a <span class="gg__circles" ><img src="{{asset('gamebased/12-Stop/img/red.png')}}"></span><br>

                                Press the <span class="gg_space_bar" >spacebar</span> when you see a
                                <span class="text-danger"><b><span>red</span></b></span> circle.<br>

                                Do not do anything when you see a <span class="text-green"><b><span class="text-success">green</span></b></span> circle.<br><br>
                                Please respond as quickly and accurately as possible

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
                        
                        <div class="text-center" id="signal">
                         
                            
                        </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/12-Stop/img/correct.png')}}" width="180">
                                    <h3 class="text-success1">Test Completed !</h3>                            
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
<script src="{{asset('gamebased/12-Stop/js/index.js')}}"></script>
@endPushOnce