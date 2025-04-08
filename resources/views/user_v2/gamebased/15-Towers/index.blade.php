@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/15-Towers/css/index.css')}}"> 

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
                                Your goal is to make the bottom towers match the target towers using as few moves as possible. You can only move the top disk on a tower. You can only move one disk at a time.<br><br>
                                Click on a disk to lift it, then click on a tower to place it there.<br>
                                Undo a move by pressing <span class="gg_icon">Undo Move</span>.<br>
                                Start over by pressing <span class="gg_icon">Clear All</span>.
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
                         <div class="d-flex">
                            <div class="timer text-white fs-20 d-flex align-items-center" style="width: 38%;"><img src="{{asset('gamebased/15-Towers/img/timer.png')}}" width="30" class="me-2"> <span>show timer here</span></div>
                            
                            <div class="demo_game_board">        
                                <div class="tower" id="demo_tower1">
                                    <!-- disks here -->
                                </div>
                                <div class="tower" id="demo_tower2"></div>
                                <div class="tower" id="demo_tower3"></div> 
                            </div>
               
                         </div>

                        
                        <div class="text-center mt-5" >                          
                           <div class="game-board">
                                <div class="tower_outer">
                                   <div class="tower" id="game_tower1">
                                        <!-- disks here -->
                                    </div>
                                </div>
                                <div class="tower_outer">
                                    <div class="tower" id="game_tower2"></div>
                                </div>
                                <div class="tower_outer">
                                    <div class="tower" id="game_tower3"></div>
                                </div>                                              
                            </div>     
                        </div>

                        <!-- Button Group -->
                        <div class="button-group d-flex justify-content-around mt-5">
                            <button  class="game-button undo-button">Undo</button>   
                            <button  class="game-button clear-all">Clear All</button>   
                        </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="" width="180">
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
<script src="{{asset('gamebased/15-Towers/js/index.js')}}"></script>
@endPushOnce