@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/14-Lengths/css/index.css')}}"> 

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
                                
                                You will see one of two faces: 
                                <span class="gg_lengths__faces" ><img src="{{asset('gamebased/14-Lengths/img/little_mouth.png')}}"></span>
                                <span class="gg_lengths__faces" ><img src="{{asset('gamebased/14-Lengths/img/long_mouth.png')}}"></span><br>

                                If you think the face has a little mouth,<span class="gg_lengths__faces" ><img src="{{asset('gamebased/14-Lengths/img/little_mouth.png')}}"></span> press 
                                <span class="gg__arrow"> ← </span><br>

                                If you think the face has a big mouth, <span class="gg_lengths__faces" ><img src="{{asset('gamebased/14-Lengths/img/long_mouth.png')}}"></span> press <span class="gg__arrow"> → </span><br><br>

                                If you get it right, you may be rewarded with some money.<br>Try to earn as much as you can.<br>(Note the <b>LITTLE</b> and <b>BIG</b> mouths have a slight difference in their measurements.)
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
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="balance text-white fs-20 d-flex">
                                <img src="{{asset('gamebased/14-Lengths/img/dollar.png')}}" width="30" class="me-2"> 
                                <span></span>
                            </div>
                            <div class="d_attempts">
                                  <p class="game-button"><span class="attempts__done"></span>/<span class="total__attempts"></span></p>
                            </div>
                        </div>

                        <div class="text-center" id="shapes__container">
                            <!-- <img src="{{asset('gamebased/14-Lengths/img/correct.png')}}" width="100">
                            <p class="text-white fs-20"> Reward: 20</p> -->
                            <!-- Show mouth img here & if user press right option the show "img/success.png')}}" & with text of reward if any -->
                            <!-- <img src="{{asset('gamebased/14-Lengths/img/little_mouth.png')}}"> -->
                           
                        </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/14-Lengths/img/correct.png')}}" width="180">
                                    <h3 class="text-success">Test Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>

                                    <p class="text-white" id="result_msg">
                                        
                                    </p>
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
<script src="{{asset('gamebased/14-Lengths/js/index.js')}}"></script>
@endPushOnce