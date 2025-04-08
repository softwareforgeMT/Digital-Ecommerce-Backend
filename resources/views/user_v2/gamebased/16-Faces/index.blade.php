@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/16-Faces/css/index.css')}}"> 

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
                                You will be shown photographs of people with different facial expressions. Choose the word you believe best describes what the person is feeling.<br><br>
                                Some photographs will be accompanied by a short story describing a situation, where you will have 30 seconds to answer. Other photographs will be presented alone, where you will have 7 seconds to answer. <br>
                                Make sure to read each story completely: some of them may appear similar, but are in fact telling different stories.
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
                            <div class="timer text-white fs-20 d-flex"><img src="{{asset('gamebased/16-Faces/img/timer.png')}}" width="30" class="me-2"> <span>0.05</span></div>

                            <div class="d_attempts">
                              <p class="game-button"><span class="attempts__done"></span>/<span class="total__attempts"></span></p>
                            </div>
                         </div>

                        
                        <div class="text-center" >                           
                           <div class="game-step__board text-center mt-5">
                                <div class="board__content">

                                    
                                        <div class="board__image-container">
                                            <img id="board-image" src="">
                                        </div>
                                       
                                </div> 
                                <div class="board__question">What emotion is the Face feeling?</div>
    
                            </div>

                        </div>

                        <!-- Emotion Buttons -->
                        <div class="game-step__buttons button-group  mt-5">
                            <!-- Example buttons for emotions -->

                            <button class="game-button" data-emotion="Angry">Anger</button>
                            <button class="game-button" data-emotion="Calm">Calm</button>
                            <button class="game-button" data-emotion="Determination">Determination</button>
                            <button class="game-button" data-emotion="Disgusted">Disgust</button>
                            <button class="game-button" data-emotion="Fear">Fear</button>
                            <button class="game-button" data-emotion="Happy">Happiness</button>
                            <button class="game-button" data-emotion="Hope">Hope</button>
                            <button class="game-button" data-emotion="Pain">Pain</button>
                            <button class="game-button" data-emotion="Sad">Sadness</button>
                            <button class="game-button" data-emotion="Surprized">Surprise</button>
                            <button class="game-button" data-emotion="Puzzlement">Puzzlement</button>


                            <!-- Add more emotion buttons as required -->
                        </div>

                        <!-- Button Group -->
                       <!--  <div class="button-group d-flex justify-content-around mt-5">
                            display emotion buttons here  
                        </div> -->

                        
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
<script src="{{asset('gamebased/16-Faces/js/index.js')}}"></script>
@endPushOnce