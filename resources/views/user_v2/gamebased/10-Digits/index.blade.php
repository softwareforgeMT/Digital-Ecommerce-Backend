@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/10-Digits/css/index.css')}}"> 

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
                             <p class="fs-16 text-white">
                                A sequence of numbers will appear rapidly, one number at a time.<br>
                                Remember the sequence and enter it as quickly as possible when prompted.
                             </p>
                             <p class="fs-16 text-white  mt-3">
                                 The length of the sequence will increase by one if you get the sequence right, and decrease by one if you get the sequence wrong.
                                The game ends when you get 3 rounds wrong.
                                
                             </p>
                             <p class="fs-16 text-white  mt-3">
                                 Please do not write your answers down while playing.
                             </p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step2" class="game-button next-button">Continue</button>   
                        </div>
                    </div>
                  
                    <div class="game-instructions game-step col-md-12" id="step2">
                        <div class="text-center" >
                             <p class="fs-16 text-white">Press start when you're <br>    ready to continue</p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-around mt-5">
                            <button data-href="step1"   class="game-button back-button">Back</button>   
                            <button data-href="step3"  class="game-button next-button">Start</button>   
                        </div>
                    </div>
                    <div class="screen_congrats game-step col-md-12" id="step3">
                        
                        <div class="text-center" >
                             <h1 class="fss-10 text-white" id="random_number">
                                
                             </h1>     
                        </div>
                    </div>

                    <div class="screen_introduction game-step col-md-12 justify-content-between" id="step4">  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="g-text__content">                                
                                    <p class="fs-16 text-white text-center">Type in the digits you saw and press enter.</p>
                                    <div class="position-relative d-flex justify-content-center">
                                        <div class="position-relative" >
                                            <input type="number" class="gg__digit-input no-border" name="">
                                        </div>
                                    </div>
                                    <div class="text-center" id="validationMessage">
                                      <!-- show correct/icorrect img here      -->
                                    </div>
                                   
                                </div>
                            </div> 
                        </div>
                        <div class="incorrect_answers text-end">
                           <!-- show all incorrect (if there are two incorrect then it will show 2 imgs) -->
                        </div>   
                    </div> 


                    <div class="screen_result game-step col-md-12 " id="step5">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/10-Digits/img/correct.png')}}" width="180">
                                    <h3 class="text-success">Test Completed !</h3>                            
                                    <p class="text-white">Thank you for participating.  </p>

                                    <div id="result_msg">  
                                        <p class="message">You maximum number of correct digits are</p>
                                        <h1 class="digits text-success"></h1>
                                    </div>
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
<script src="{{asset('gamebased/10-Digits/js/index.js')}}"></script>
@endPushOnce