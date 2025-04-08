@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/6-Balloon/css/index.css')}}"> 

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
                        <div class="text-center1 text-white" >
 
                            <p> AssessmentPass is advertising their office spaces to potential companies that are interested in the building.</p>
                            

                            1- You must inflate 45 balloons for their event taking place later today. You can earn money for doing so.<br>
                            2- AssessmentPass has agreed to pay you more money for bigger balloons because their logo will be more prominent.<br>
                            3- Press the space bar to inflate the balloon.<br>
                            <!-- 4- The larger you inflate the balloon, the more money you can earn.<br> -->
                            4- Each pump increases the balloon's value by $0.05.<br>
                            5- Press Enter on your keyboard to exchange the balloon for money and save it to the bank.<br>
                            6- Inflate a balloon too much, and it will burst. You will lose the money that you haven't exchanged.<br>
                            7- Bank as much money as possible.<br>


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

                                <!-- Question -->
                                <div class="row m-auto">
                                  <div class="col-md-12">
                                     <h4 class="text-white"> Banked <span id="bankedMoney"></span></h4>
                                  </div>
                                </div>

                                <div class="row justify-content-center">       
                                    <div class="col-md-6">
                                      <div class="col-md-12">
                                         <div class="text-center" id="balloonImage">
                                             
                                         </div>
                                      </div>
                                     
                                    </div>
                                </div>
                                <!-- Button Group -->
                                <div class="button-group">
                                    <div class="g_btns">
                                      <p class="press_btn btn_space">Inflate <span>Space</span></p>
                                      <h4  class="text-white">Exchange For <span id="currentValue"></span></h4>
                                      <p class="press_btn btn_enter">Exchange <span>Enter</span></p>
                                    </div>
                                </div>

                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/6-Balloon/img/correct.png')}}" width="180">
                                    <h3 class="text-white">Test Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>

                                    <p class="text-white" id="result_msg">
                                        
                                    </p>
                                </div>
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <a href="" class="game-button" disabled>Finish</a> 
                                </div>
                            </div> 
                        </div>
                    </div> 

                </div>
            </div>


        </div>
         
        <!-- Display Message modal -->
        <div class="modal fade game__message_modal" id="game__message" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-3">
                        <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px">
                        </lord-icon>
                        <div class="">
                            <h4></h4>
                            <p class="text-muted"> </p>
                            <!-- Toogle to second dialog -->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                              
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Display Message modal ends-->

        <!-- Blurred overlay -->
        <div id="blurOverlay" class="blur-overlay"></div>


    </div>




@pushOnce('partial_script')
<script src="{{asset('gamebased/6-Balloon/js/index.js')}}"></script>
@endPushOnce