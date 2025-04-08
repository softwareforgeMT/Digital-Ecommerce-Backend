@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/11-Easy-Hard/css/index.css')}}"> 

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
                             <p class="text-white">
                                For each trial, you will choose between two tasks. For the easy task, you have 3 seconds to hit the <span class="gg_space_bar">spacebar</span> 5 times. For the hard task, you have 12 seconds to hit the  <span class="gg_space_bar">spacebar</span> 60 times. Choose <span class="gg-icon__easy">Easy</span> or <span class="gg-icon__easy">Hard</span> to earn <span class="gg-icon__money"><img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}">.</span><br>

                                After 5 seconds, one will be chosen at random for you.<br><br>
                                For the easy task, you can earn <span class="">$1</span> a trial. For the hard task you can earn more from each trial, between <span class="">$1.24</span> and <span class="">$4.30</span>!<br><br>

                                You are not guaranteed to win <span class="gg-icon__money"><img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}">.</span> on every trial, even if you complete the task. At the beginning of each trial, we'll tell you the probability that you get to keep your money earned by completing the task. You have <span class="max_attempts"></span> attempts to earn as much <span class="gg-icon__money"><img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}">.</span> as you can!
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

                    <div class="game-instructions game-step col-md-12" id="step3">
                        <div class="d_attempts">
                          <p class="game-button"><span class="attempts__done"></span>/<span class="total__attempts"></span></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            
                            <div class="balance text-white fs-20 d-flex">
                                <img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}" width="30" class="me-2"> 
                                <span>$0.00</span>
                            </div>
                            <div class="timer text-white fs-20 d-flex"><img src="{{asset('gamebased/11-Easy-Hard/img/timer.png')}}" width="30" class="me-2"> <span class="fixed-width">0.05</span></div>
                         </div>

                        <div class="text-center" >
                             <h1 class="text-white">Choose Your Task</h1>
                             <p class="fs-20 text-white">Probability of winning</p>
                             <div class="w_prop">                               
                                    <span class="winning_chance">set chance here Low/Medium/High</span>
                                    <span class="winning_prop"></span>
                             </div>
                             <div class="tasks_type">
                                
                                 <button data-href="step4" data-task-type="easy" class="task_easy">
                                     <span class="">$1.00</span>
                                     <span>Easy</span>
                                 </button>
                                
                                <button data-href="step4" data-task-type="hard"   class="task_hard">
                                    <span class="hard_reward"></span>
                                    <span>Hard</span>
                                </button>
                                
                             </div>
                             <p class="fs-20 text-white mt-4">If a choice isn't made in 5 seconds, one will be made randomly</p>
                        </div>
                        
                        
                    </div>

                    <div class="game-instructions game-step col-md-12" id="step4">
                        <div class="d_attempts">
                          <p class="game-button"><span class="attempts__done"></span>/<span class="total__attempts"></span></p>
                        </div>
                        <div class="d-flex justify-content-between">                      
                            <div class="balance text-white fs-20 d-flex">
                                <img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}" width="30" class="me-2"> 
                                <span>$0.00</span>
                            </div>
                            <div class="timer text-white fs-20 d-flex"><img src="{{asset('gamebased/11-Easy-Hard/img/timer.png')}}" width="30" class="me-2"> <span class="fixed-width">0.05</span></div>
                         </div>

                        <div class="text-center" >
                             <h1 class="text-white">Easy Task</h1>
                             <p class="fs-20 text-white"><span class="winning_prop"></span> at earnings <span class="gen_reward"></span></p>
                            
                            <div class="space_filler_outer">
                                     <div class="space_filler_inner"></div>
                            </div> 
                            
                             <p class="fs-20 text-white mt-4">
                                 Press the <span class="gg_space_bar">spacebar</span> repeatedly to fill the bar & complete the task
                             </p>
                        </div>                                                
                    </div>
                    <div class="screen_result game-step col-md-12" id="step5">  
                        
                        <div class="balance text-white fs-20 d-flex">
                                <img src="{{asset('gamebased/11-Easy-Hard/img/dollar.png')}}" width="30" class="me-2"> 
                                <span>$0.00</span>
                            </div>
                        <div class="row">

                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    
                                    <div id="result_msg">You SuccessFully completed the task !</div>                            
                                   
                                </div>
                                
                            </div> 
                        </div>
                    </div> 

                    <div class="screen_result game-step col-md-12 " id="step6">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/11-Easy-Hard/img/correct.png')}}" width="180">
                                    <h3 class="text-success1">Game Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>

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
<script src="{{asset('gamebased/11-Easy-Hard/js/index.js')}}"></script>
@endPushOnce