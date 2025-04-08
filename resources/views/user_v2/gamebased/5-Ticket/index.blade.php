@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/5-Ticket/css/index.css')}}"> 

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
                        <div class="text-center1 text-white fs-16" >
 
                            <p>Your task is to sort tickets for staff attending an event. The shape and numbers will guide you to distribute tickets to the appropriate staff.</p>
                            
                            <ol>
                                <li class="">
                                    When a shape appears in the top box:
                                    <ul>
                                        <li>Press the <strong>Q</strong> key on your keyboard if the number on the ticket/image is even.</li>
                                        <li>Press the <strong>P</strong> key on your keyboard if the number is odd.</li>
                                    </ul>
                                </li>
                                <li class="mt-3">
                                    When a shape appears in the bottom box:
                                    <ul>
                                        <li>Press the <strong>Q</strong> key on your keyboard if the shape on the ticket/image has rounded edges.</li>
                                        <li>Press the <strong>P</strong> key on your keyboard if the shape on the ticket/image has sharp edges.</li>
                                    </ul>
                                </li>
                            </ol>

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
                                     <h4 class="text-white question_title"></h4>
                                  </div>
                                </div>

                                <div class="row justify-content-center">       
                                    <div class="col-md-8">
                                      <div class="col-md-12">
                                         <div class="team_card" id="topCard">

                                         </div>
                                      </div>
                                      <div class="col-md-12" >
                                         <div class="team_card" id="bottomCard">
                                                     
                                         </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- Button Group -->
                                <div class="button-group">
                                    <div class="g_btns">
                                      <p href="" class="press_btn btn_correct">Yes <span>Q</span></p>
                                      <p href="" class="press_btn btn_incorrect">No <span>P</span></p>
                                    </div>
                                </div>
                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/5-Ticket/img/correct.png')}}" width="180">
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
    </div>

@pushOnce('partial_script')
<script src="{{asset('gamebased/5-Ticket/js/index.js')}}"></script>
@endPushOnce