@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/4-Team/css/index.css')}}"> 

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
 
                            <p class="fs-15 text-white">
                                1. At a company, there are two teams, each of which has launched a new tablet computer in the market.<br>
                                2. The profit each team earns is determined by the retail prices both teams set.
                                <!-- <span class="tutotial_img"><img src="{{asset('gamebased/4-Team/img/tutorial/dir_7.png')}}"></span> -->
                                <br>
                                3. You are a member of one team, and your role is to set either a high or low retail price.<br>
                                4. If both teams choose a high price, each will earn a profit of 200.<br>
                                5. However, if you set a high price and the other team sets a low price, your team will earn 0.00 while the other team will earn 300.<br>
                                6. Conversely, if you set a low price and the other team sets a high price, your team will earn 300, and the other team will earn 0.00.<br>
                                7. If both teams set a low price, each will earn a profit of 50.<br>
                                8. The other team will decide independently of your choice, but will adapt based on previous choices.
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
                                    <!-- Results -->
                                    <div class="row text-white">
                                      <div class="col-md-4">
                                         <h5>Your Team</h5>
                                         <h5 id="yourScore">$0.00</h5>
                                      </div>
                                      <div class="col-md-4 text-center">
                                          <h5>Company</h5>
                                          <h5 id="companyScore">$0.00</h5> <!-- The total for the company is not described in the scenario, so it's static -->
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <h5>Other Team</h5>
                                          <h5 id="theirScore">$0.00</h5>
                                      </div>
                                    </div>


                                    <div class="row">
                                    <!-- Pricing Card: High -->
                                    <div class="col-md-6" >
                                      <div class="pricing-card high">
                                        <!-- High-High Scenario -->
                                        <div class="profit-info">
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Your High</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$200.00</h5>
                                          </div>
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Them High</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$200.00</h5>
                                          </div>
                                        </div>
                                        <!-- High-Low Scenario -->
                                        <div class="profit-info mt-3">
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Your High</h5>
                                            <div class="star-container d-flex justify-content-center"></div>
                                            <h5 class="profit-amount">$0.00</h5>
                                          </div>
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Them Low</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$300.00</h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Pricing Card: Low -->
                                    <div class="col-md-6">
                                      <div class="pricing-card low">
                                        <!-- Low-High Scenario -->
                                        <div class="profit-info">
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Your Low</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$300.00</h5>
                                          </div>
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Them High</h5>
                                            <div class="star-container d-flex justify-content-center"></div>
                                            <h5 class="profit-amount">$0.00</h5>
                                          </div>
                                        </div>
                                        <!-- Low-Low Scenario -->
                                        <div class="profit-info mt-3">
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Your Low</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$50.00</h5>
                                          </div>
                                          <div class="profit-scenario text-white">
                                            <h5 class="scenario-title">Them Low</h5>
                                            <div class="star-container d-flex justify-content-center">
                                              <img src="{{asset('gamebased/4-Team/img/star.png')}}">
                                            </div>
                                            <h5 class="profit-amount">$50.00</h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                    <!-- Button Group -->
                                    <div class="mt-3 row high-low">
                                        <div class="col-md-4"><a href="" class="game-button" id="highPriceBtn">High Price</a></div>
                                        <div class="col-md-4 text-center"><a href="" class="game-button confirm-button d-done">Confirm</a></div>
                                        <div class="col-md-4 text-right"><a href="" class="game-button" id="lowPriceBtn">Low Price</a></div>
                                    </div>
                            </div>
                        
                    </div>


                    <div class="screen_result game-step col-md-12" id="step4">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   
                                <div class="text-center">    
                                    <img id="result_img" src="{{asset('gamebased/4-Team/img/correct.png')}}" width="180">
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
        <div class="modal fade game__message_modal" id="game__message" aria-hidden="true" aria-labelledby="..." tabindex="-1">
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
<script src="{{asset('gamebased/4-Team/js/index.js')}}"></script>
@endPushOnce