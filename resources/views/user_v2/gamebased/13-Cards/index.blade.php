@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/13-Cards/css/index.css')}}"> 

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
                                


                                The goal of this game is to win as much money as possible by drawing cards. Some <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span> will earn you a reward, but some <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span> will have a penalty and you will lose money. <br><br>You will start with a <strong class=""> $2,000</strong> loan. Click on any of the 
                                <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span>
                                <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span>
                                <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span>
                                <span class="gg_icon__card"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></span>

                                 to draw a card from that deck.<br><br>
                                 You are free to switch from one deck to another at any time, and as often as you wish.<br>
                                 Continue drawing cards until the game is over

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
                         <div class="balance text-white fs-20 d-flex">
                            <img src="{{asset('gamebased/13-Cards/img/dollar.png')}}" width="30" class="me-2"> 
                            <span>$2000.00</span>
                        </div>
                        <div class="text-center" id="cards__container">
                            <div class="gain__loss mb-5 mt-3">
                                <div class="gains row d-flex align-items-center">
                                    <label class="col-md-2">Gains</label>
                                    <div class="col-md-10">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="losses row d-flex align-items-center">
                                    <label class="col-md-2">Losses</label>
                                    <div class="col-md-10">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="display_card mb-5">
                                <div class="card_score">
                                    <p class="text-white fs-20">You won <br>
                                        <span class="price">display amount here</span> 
                                     </p>
                                </div>
                                <a href="javascript:;" class=""><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></a>
                            </div>
                            <div class="card__list">
                                <a href="" data-deck="0"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></a>
                                 <a href="" data-deck="1"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></a>
                                  <a href="" data-deck="2"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></a>
                                   <a href="" data-deck="3"><img src="{{asset('gamebased/13-Cards/img/gen.png')}}"></a>
                            </div>
                           
                        </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img src="{{asset('gamebased/13-Cards/img/correct.png')}}" width="180">
                                    <h3 class="text-success1">Test Completed !</h3>                            
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
<script src="{{asset('gamebased/13-Cards/js/index.js')}}"></script>
@endPushOnce