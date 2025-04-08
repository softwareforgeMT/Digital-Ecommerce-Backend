@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/1-Sequence/css/index.css')}}"> 

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

                                A sequence of icons <span class="tutotial_img"><img src="{{asset('gamebased/1-Sequence/img/stamp.png')}}"></span> will appear to show user the order in which the invitations needs to be send.<br>
                                Ignore this icon <span class="tutotial_img"><img src="{{asset('gamebased/1-Sequence/img/distractor.png')}}"></span>, this is just a distractor.<br>
                                Memorize the sequence of icons <span class="tutotial_img"><img src="{{asset('gamebased/1-Sequence/img/stamp.png')}}"></span>, repeat the sequence by clicking on the icons in the correct order.<br><br>

                                Once done we will show correct <span class="tutotial_img"><img src="{{asset('gamebased/1-Sequence/img/correct.png')}}"></span> or incorrect <span class="tutotial_img"><img src="{{asset('gamebased/1-Sequence/img/incorrect.png')}}"></span> on last mark by anaylizing if you has follow same order or not.
                               
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
                            
                            <div class="">
                                <!-- Loop to add rows of 5 images each -->
                                <?php for ($row = 1; $row <= 3; $row++): ?>
                                  <div class="row m-auto img-container">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                      <div class="col-2 pollars" >
                                        <div class="position-relative">
                                         <img src="{{asset('gamebased/1-Sequence/img/blank.png')}}" class="img-fluid1 original-image image">

                                         <img src="{{asset('gamebased/1-Sequence/img/stamp.png')}}" class="img-fluid1 stamp-image image-container">
                                         </div>
                                      </div>
                                    <?php endfor; ?>
                                  </div>
                                <?php endfor; ?> 
                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/1-Sequence/img/correct.png')}}" width="180">
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
<script src="{{asset('gamebased/1-Sequence/js/index.js')}}"></script>
@endPushOnce