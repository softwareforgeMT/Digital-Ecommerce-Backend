@pushOnce('partial_css')
  <link rel="stylesheet" href="{{asset('gamebased/8-MoneyExchange/css/index.css')}}"> 

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
                        <div class="text-center" >
                             <p class="fs-20 text-white">For this trial, you will be working with another random participant. Follow the instructions that will be given to you throughout the trial.</p>
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
                    <div class="screen_congrats game-step col-md-12" id="step3">
                        <h4 class="title text-center text-success1">Congratulations</h4>      
                        <div class="text-center" >
                             <p class="fs-16 text-white instructions">You just earned <span class="ur_money1"></span> in game money for agreeing to participate in this game.</p>

                            <div class="apt__player-info  d-block apt__player1" >
                               @include('user.gamebased.8-MoneyExchange.player-info')
                            </div>
                             <p class="fs-16 text-white instructions">In a few moments you will be paired with another random participant</p>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step4"   class="game-button next-button">Continue</button> 
                        </div>
                    </div>

                    <div class="connection game-step col-md-12" id="step4">
                       
                         <div class="me__connection-progress text-center mt-2">
                                
                        </div>
                        <div class="gg_connection" >
                            <div class="apt__player-info apt__player1" >
                                @include('user.gamebased.8-MoneyExchange.player-info')
                            </div>
                               
                           

                            <div class="apt__player-info apt__player2" >
                                @include('user.gamebased.8-MoneyExchange.player-info')
                            </div>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step5"  class="game-button next-button">Continue</button> 
                        </div>
                    </div>
                    <div class="screen_introduction game-step col-md-12" id="step5">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   

                                <div class="apt__player-info apt_top apt__player2" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>
                                <div class="apt__player-info apt_bottom apt__player1" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div> 
                                <div class="text-center" style="margin-top: 150px;">                                
                                    <p class="fs-16 text-white">We found you a partner for this game.<br>Your partner is named <span class="partner_name"></span>. Let's get started. <br>Soon you will have the opportunity to send some of the money you just received (ranging from $0 to <span class="ur_money1"></span> ) to <span class="partner_name"></span>.</p>
                                    <p class="fs-16 text-white mt-5">This is tripled once it's transferred to <span class="partner_name"></span>'s account</p>
                                    <img src="{{asset('gamebased/8-MoneyExchange/img/currency.png')}}" width="100">
                                </div>
                                    
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <button data-href="step6" class="game-button next-button">Continue</button> 
                                </div>
                            </div> 
                        </div>
                    </div> 

                    <div class="screen_introduction game-step col-md-12" id="step6">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   

                                <div class="apt__player-info apt_top apt__player2" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>
                                 <div class="apt__player-info apt_bottom apt__player1" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div> 
                                <div class="text-center" style="margin-top: 150px;">                                
                                    <p class="fs-16 text-white">Then, <span class="partner_name"></span> can return all, some, or none of this money back to you. The amount <span class="partner_name"></span> returns is completely up to <span class="partner_name"></span> to decide.</p>
                                    <p class="fs-16 text-white">Whatever money you get back from <span class="partner_name"></span> is what you get to keep at the end of the day.</p>
                                    <img src="{{asset('gamebased/8-MoneyExchange/img/currency.png')}}" width="100">
                                    
                                </div>
                                    
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <button data-href="step7" class="game-button next-button">Continue</button> 
                                </div>
                            </div> 
                        </div>
                    </div>   

                    <div class="screen_introduction game-step col-md-12" id="step7">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   

                                <div class="apt__player-info apt_top apt__player2" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>
                                 <div class="apt__player-info apt_bottom apt__player1" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>                              

                                <div class="g-text__content">                                
                                    <p class="fs-16 text-white">Now how much (if any) of the <span class="ur_money1"></span> you earned for participating in the game would you like to transfer to <span class="partner_name"></span>?</p>
                                    
                                    
                                    <p class="text-white">You can send $0. You can send $0.01.<br>You can send any amount you choose, up to <span class="ur_money1"></span> </p>
                                    <div class="position-relative d-flex justify-content-center">
                                        <div class="position-relative" style="width:336px">
                                            <input type="number" class="gg__money-input no-border" name="" min="0" max="10" id="moneyInput">
                                            <div class="gg__money-symbol" >$</div>
                                        </div>
                                    </div>

                                    <p class="text-danger d-done" id="validationMessage"></p>
                                   
                                </div>
                                    
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <button data-href="step8" id="sendMoneyBtn" class="game-button next-button" disabled>Send Money</button> 
                                </div>
                            </div> 
                        </div>
                    </div>  

                    <div class="screen_transferring game-step col-md-12" id="step8">
                        <h4 class="title text-center text-white"><span class="">Thank you. Let's wait and see how much <span class="partner_name"></span> sends back to you.</span></h4>
                        <div class="gg_connection" >
                            <div class="apt__player-info apt__player1" >
                                @include('user.gamebased.8-MoneyExchange.player-info')
                            </div>
                               
                            <div class="me__transfer-progress mt-5">
                                
                            </div>

                            <div class="apt__player-info apt__player2" >
                                @include('user.gamebased.8-MoneyExchange.player-info') 
                            </div>
                        </div>
                         <!-- Button Group -->
                        <div class="button-group d-flex justify-content-center mt-5">
                            <button data-href="step9"  class="game-button next-button">Continue</button> 
                        </div>
                    </div>

                    <div class="screen_result game-step col-md-12" id="step9">  
                        <div class="row">
                            <div class="col-md-12 position-relative">                   

                                <div class="apt__player-info apt_top apt__player2" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>
                                 <div class="apt__player-info apt_bottom apt__player1" >
                                    @include('user.gamebased.8-MoneyExchange.player-info')
                                </div>                              

                                <div class="g-text__content">                                
                                    <p class="fs-16 text-white">You received <span id="amountReturned"></span> the back from <span class="partner_name"></span>. </p>

                                </div>
                                    
                                 <!-- Button Group -->
                                <div class="button-group d-flex justify-content-center mt-5">
                                    <a href=""  class="game-button" >Finish</a> 
                                </div>
                            </div> 
                        </div>
                    </div> 

                </div>
            </div>


        </div>
    </div>

@pushOnce('partial_script')
<script src="{{asset('gamebased/8-MoneyExchange/js/index.js')}}"></script>
@endPushOnce