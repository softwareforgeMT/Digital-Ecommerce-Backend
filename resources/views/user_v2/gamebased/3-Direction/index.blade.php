@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/3-Direction/css/index.css')}}"> 

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
                        <div class="text-center1" >
                             

                            <p class="fs-14 text-white">
                                1- You must guide visitors to the building using the computer terminal.<br>
                                2- The Middle arrow indicates the best route <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_7.png')}}"></span>.<br>
                                3- Press <b>Q</b> on your keyboard if the arrow is pointing to the left <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_5.png')}}"></span>.<br>
                                4- Press <b>P</b> on your keyboard if the arrow is pointing to the right <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_7.png')}}"></span>.<br>
                                5- Sometimes the arrows face in the same direction as the middle arrow <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_7.png')}}"></span>.<br>
                                6- Sometimes they face in the opposite direction <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_4.png')}}"></span>.<br>
                                7- Sometimes surrounding shapes are dashes <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_1.png')}}"></span>.<br>
                                8- You should only focus on the middle arrow <span class="tutotial_img"><img style="width:40px" src="{{asset('gamebased/3-Direction/img/highlight-left.png')}}"></span>.<br>
                                9- However, when the surrounding shapes are <strong>X's, don't press either button </strong> <span class="tutotial_img"><img src="{{asset('gamebased/3-Direction/img/tutorial/dir_6.png')}}"></span>.
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
                                    <div class="card_body" >
                                        <div id="gameArea">
                                            
                                        </div> 
                                        <!-- Loop to add rows of 5 images each -->     
                                    </div>
                                    <div class="g_btns">
                                        <p href="" class="press_btn btn_q">Left <span>Q</span></p>
                                        <p href="" class="press_btn btn_p">Right <span>P</span></p>
                                    </div>
                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/3-Direction/img/correct.png')}}" width="180">
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
<script src="{{asset('gamebased/3-Direction/js/index.js')}}"></script>
@endPushOnce