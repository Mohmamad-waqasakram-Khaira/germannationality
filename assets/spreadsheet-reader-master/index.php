<?php
 include 'header.php'; 
   //echo '==================================================';
   
   // $_SESSION['selection_ouput_madina'] ='';   
   // $_SESSION['hotel_name_makkah'] ='';   
   // $_SESSION['selection_ouput'] ='';   
   // $_SESSION['hotel_name_madina'] ='';   
   $aList = array();   
   // get locations    
   if(isset($GLOBALS['locations'])):   
    foreach($GLOBALS['locations']->data->locations AS $data) :   
     for($i=0;$i<sizeof($data);$i++):   
        $aList[]= $data[$i];   
     endfor;   
    endforeach;   
   endif; 

?>
<style type="text/css">

</style>

<!--<div class="loader"><img src="<?//=__domain?>/loader.gif" > <p>We Are Collecting Data Thanks For Waiting <p></div>-->
<!-- TOP AREA -->
<section class="slider-section">

<div class="top-area show-onload" style="height:auto;">
   <div class="bg-holder full">
   <div class="bg-front bg-front-mob-rel">
    <!--  <div class="bg-mask"></div>
      <div class="bg-parallax" style="background-image:url(images/main-img.jpg);"></div>-->
      <div class="bg-content">
         <div class="container">
           
         
			<?php if(empty($_SESSION['RESELLER']['userid'])){?>
                
            
        <!------------------------------------------------------------------------------------------->
       <!--  <<<<<<<<<<<<<<<<   login form    >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
        <!------------------------------------------------------------------------------------------->
			<div class="home-login-form" id="box">
            		
        	<h3>Agent Login</h3>
            <form id="loginform" action="<?php echo __domain;?>dashboard/index.php?ToDo=processLogin" method="post">
                 <div id="errormessage"><?php echo $_GET['error'] ?></div>
                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                    <label for=""></label>
                    <input class="form-control" name="username" placeholder="Username" type="text">
                </div>
                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                   <label></label>
                    <input class="form-control" type="password" name="userpwd" placeholder="Password">
                </div>
                <div class="checkbox checkbox-small">
                <label style="color: #a9a9a9;">
                    <input class="i-check" type="checkbox" />Remember my password</label>
             </div>
                <input class="btn btn-login" type="submit" value="Login">
            </form>
            <span class="text-center" id="displayMessage" style="color:red"> </span>
             <div class="form-group" id="forgetpassword" style="display:none">
                <label>Your Email</label>
                <input name="your_email" id="youremail" type="text" class="form-control" placeholder="" required value="" ><br />
                <input type="button" class="btn btn-login" onClick="forgetpassword()" value="Submit">
            </div>
            
            <a href="#" class="btn" id="forgetpasslink">Forget Password</a>
            <a href="<?php echo __domain?>index.php?ToDo=user_signup" class="btn btn-reg">Register</a>
        	<div class="text-center"><a href="#" ><img style="width: initial;" src="img/appstore.jpg " alt="app"></a></div>
    	</div>
            
            <?php } else{?>
            
		<!------------------------------------------------------------------------------------------->
       <!--  <<<<<<<<<<<<<<<<   search form show if user is loged in   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>-->
        <!------------------------------------------------------------------------------------------->
             <div id="searchform" class="<?php if($web_search_box_class){?>content-bk <?php }?>">
               <div class="search-tabs search-tabs-bg mt50">
                  <div class="tabbable  <?php if($web_search_box_class){echo 'clearfix tab-theme-1';}else{ echo 'clearfix tab-theme-2';}?>">
                     <ul class="nav nav-tabs" id="myTab">
                      
						<?php if (!array_key_exists("hotel",$aHomePageSetting)){?>
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab">
                                    <div class="search-hotels-bg"> <i class="fa fa-building-o"></i></div>
                                    <span >Hotels</span>
                                </a>
                            </li>
                        <?php }?>
                        
                        <?php if (!array_key_exists("flight",$aHomePageSetting)){?>
                            <li>
                              <a href="#tab-2" data-toggle="tab" onclick="create_seasssion();">                           
                                <div><i class="fa fa-plane"></i></div><span >Flights</span>
                              </a>                           
                            </li>
                        <?php }?>
                        
                        <?php if (!array_key_exists("transfer",$aHomePageSetting)){?> 
                            <li>
                               <a href="#tab-4" data-toggle="tab">
                                  <div><i class="fa fa-car"></i></div>
                                  <span >Transfers</span>
                               </a>
                            </li>
                         <?php }?>
                         
                         
                        <?php if (!array_key_exists("flight_hotel",$aHomePageSetting)){?>   
                            <li>
                              <a href="#tab-44" data-toggle="tab" onclick="create_seasssion();">                           
                                <div><i class="fa fa-plane"></i>&nbsp;&nbsp;<i class="fa fa-building-o"></i></div><span >Flights + Hotels</span>
                              </a>                           
                            </li>
                        <?php }?>
                           
                        <?php if (!array_key_exists("flight_hotel_trasnfer",$aHomePageSetting)){?>
                            <li>
                               <a href="#tab-66" data-toggle="tab">
                                  <div><i class="fa fa-plane"></i>&nbsp;&nbsp;<i class="fa fa-building-o"></i>&nbsp;&nbsp;<i class="fa fa-car"></i></div>
                                  <span >Flights + Hotels + Transfers</span>
                               </a>
                            </li>
                        <?php }?> 
                        
                      
					  <?php if (!array_key_exists("umrah",$aHomePageSetting)){?>
                           <li>
                               <a href="#tab-444" data-toggle="tab">
                                  <div> <i class="fa fa-building-o"></i></div>
                                  <span >Umrah</span>
                               </a>
                            </li>
                       <?php }?>   
                        <!--<li><a href="#tab-5" data-toggle="tab"><i class="fa fa-bolt"></i> <span >Activities</span></a>
                           </li>-->
                     </ul>
                     <div class="tab-content">
                        <?php if (!array_key_exists("hotel",$aHomePageSetting)){?>
                         <div class="tab-pane fade in active" id="tab-1">
                           <h3>Search Top Hotels</h3>
                           <form id="form" action="index.php?ToDo=Hotel_list" method="post">
                              <div class="row clearfix">
                                 <div class="col-xs-6">
                                    <div class="form-group form-group-lg form-group-icon-left">
                                       <i class="fa fa-map-marker input-icon"></i>
                                       <label id="lable1">Where are you going?</label>
                                       <input name="location_from" required class="form-control" placeholder="Makkah" type="text" id="location_from"  autocomplete="off"  onblur="assign_item_home(this.value,'location_from','autocomplete_content')" />
                                       <div id="autocomplete_content" style="display:none;">
                                          <ul>
                                             <li  style="cursor:pointer;" onclick="assign_item_home('Makkah','location_from','autocomplete_content')">Makkah</li>
                                             <li  style="cursor:pointer;" onclick="assign_item_home('Madina','location_from','autocomplete_content')">Madina</li>
                                          </ul>
                                       </div>
                                    </div>
                                 
                                    <div class="input-daterange"   data-date-start-date="0d" data-date-format="yyyy-mm-dd" >
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-in Date</label>
                                                <input  class="date_time_picker_index form-control"  type="text" name="checkin_1"  
                                                   value=""/>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-out Date</label>
                                                <input class="form-control"  type="text" name="checkout_1"   onblur="setWeekDates(this.value,'checkin_2','checkout_2')"/>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Rooms</label>
                                                <select class="form-control" name="room_1">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Guests</label>
                                                <select class="form-control" name="guest_1">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                
                                <div class="col-xs-6">
                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                       <label id="lable2">Where are you going?</label>
                                       <input name="location_to" required class="form-control" placeholder="Madina" type="text" id="location_to"  autocomplete="off"/>                       
                                    </div>
                                    <div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-start-date="0d">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-in Date</label>
                                                <input class="form-control"  type="text" name="checkin_2" />
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-out Date</label>
                                                <input class="form-control"  type="text" name="checkout_2"/>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Rooms</label>
                                                <select class="form-control" name="room_2">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Guests</label>
                                                <select class="form-control" name="guest_2">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                   
                                 </div>
                                 <div class="text-center">
                                  <button class="btn btn-primary btn-lg search_hotels" type="submit">Search for Hotels</button>
                                    <!-- <a href="javascript:void(0);" class="btn btn-primary btn-lg" type="buttom" id="search_hotel">Search for Hotels</a>-->
                                  </div>
                              </div>
                           </form>
                        </div>
                       <?php }?>  
                        <style>
                          .ajexloader {
                              position: absolute;
                              height: 20px;
                              width: 20px;
                              display: none;
                              right: 6px;
                              top: 40px;
                          }
                        </style>
                        
                        <?php if (!array_key_exists("flight",$aHomePageSetting)){?>  
                          <div class="tab-pane fade" id="tab-2">
                           <h3>Search for Cheap Flights</h3>
                           <form action="#" id="chintu">
                              <div class="tabbable">
                                 <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                   <!--  <li class="color-bk">
                                       <a href="#flight-search-1" data-toggle="tab">Round Trip</a>
                                    </li> -->
                                    <li class="active">
                                       <!-- <a href="#flight-search-2" data-toggle="tab">One Way</a> -->
                                    </li>
                                 </ul>
                                 <div>
                                    <div class="tab-pane fade in active" id="flight-search-2">

                                       <div class="row">
                                          <div class="col-sm-12">
                                            
                                              <div class="col-md-4 no-padding">
                                                 <div class="form-group form-group-lg">
                                                    <label>Select Trip Type</label>
                                                    <select name="trip_type" id="trip-details" class="form-control trip-details" display-attr="return-tyep1">
                                                       <option>Select trip</option>
                                                       <option value="Oneway" selected="selected">Oneway</option>
                                                       <option value="Return">Return</option>
                                                       <!-- <option value="add-more">All round</option> -->
                                                    </select>
                                                 </div>
                                              </div>
                                            
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left flight">
                                              <i class="fa fa-map-marker input-icon"></i>
                                                <label>From</label>
                                                <input id="autocom" name="from" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" required data-loader="loader1" data-shotcoade="from_shotcoade" data-checkcode="0"/>
                                                <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader1">
                                                <input class="shrtcode" name="from_shotcoade" type="hidden" id="checkcode0" />
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                <label>To</label>
                                                <input id='auto2' name="to" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" required data-loader="loader2" data-shotcoade="to_shotcoade" data-checkcode="0"/>
                                                <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader2"/>
                                                <input class="shrtcode" name="to_shotcoade" type="hidden" id="checkcode1" />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-3 l flight_departerting">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Departing</label>
                                                <input class="date-pick form-control" name="date" data-date-format="yyyy-mm-dd" data-date-start-date="0d" type="text" />
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Passngers</label>
                                                  <select class="form-control"  name="Passngers">
                                                     <option>1</option>
                                                     <option>2</option>
                                                     <option>3</option>
                                                     <option>4</option>
                                                     <option>5</option>
                                                     <option>6</option>
                                                     <option>7</option>
                                                     <option>8</option>
                                                     <option>9</option>
                                                  </select>
                                              </div> <!--input-daterange data-date-format="yyyy-mm-dd"-->
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group checkcode1" id="hotels_remove" >
                                                  <label>Add Hotel</label>
                                                  <input class="checkbox" id="hotels_also_view" name="hotel" type="checkbox" value="1" />
                                               </div>
                                            </div>
                                          </div>
                                          <div class="row return-tyep1" id="type-return" style="display: none">
                                            <!-- <h3>Return</h3> -->
                                             <div class="col-md-6">
                                               <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                  <label>From</label>
                                                  <input id="rautocom" name="rfrom" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loader3" data-shotcoade="rfrom_shotcoade" data-checkcode="0"/>
                                                  <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader3">
                                                  <input class="shrtcode" name="rfrom_shotcoade" type="hidden" id="checkcode2" />
                                               </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                  <label>To</label>
                                                  <input id='rauto2' name="rto" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loader4" data-shotcoade="rto_shotcoade" data-checkcode="0"/>
                                                  <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader4"/>
                                                  <input class="shrtcode" name="rto_shotcoade" type="hidden" id="checkcode3" />
                                               </div>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                  <label>Departing </label>
                                                  <input class="date-pick form-control" name="Rdate" data-date-format="yyyy-mm-dd" type="text" />
                                               </div>
                                            </div>
                                          </div>

                                          <!-- makkah chakck in -->
                                          <div class="row ffhotals hide0 input-daterange" id="ffhotals2" style="display: none;">
                                            <label>Makkah Hotels</label>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                  <label>Check in tt</label>
                                                  <input class="date-pick form-control" name="hdate" data-date-format="yyyy-mm-dd" type="text" />
                                               </div>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                  <label>Check out</label>
                                                  <input class="date-pick form-control" name="hdate2" data-date-format="yyyy-mm-dd" type="text"  onblur="setWeekDates(this.value,'mhdate','mhdate2')"/>
                                               </div>
                                            </div>
                                            <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Rooms</label>
                                                <select class="form-control" name="hroom_2">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-select-plus">
                                                  <label>Guests</label>
                                                  <select class="form-control" name="hguest_2">
                                                     <?php for($i=1;$i<=14;$i++){ ?>
                                                     <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                     <?php } ?>
                                                  </select>
                                               </div>
                                            </div>
                                          </div>
                                          <!-- makkah chek in close -->
                                          <!-- Madina chek in start -->
                                          <div class="row ffhotals hide0  input-daterange" id="ffhotals" style="display: none;">
                                            <label>Madina Hotel </label>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                  <label>Check in hhh</label>
                                                  <input class="date-pick form-control" name="mhdate" data-date-format="yyyy-mm-dd" type="text" />
                                               </div>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                  <label>Check out hhh</label>
                                                  <input class="date-pick form-control" name="mhdate2" data-date-format="yyyy-mm-dd" type="text" />
                                               </div>
                                            </div>
                                            <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-select-plus">
                                                <label>Rooms</label>
                                                <select class="form-control" name="mhroom_2">
                                                   <?php for($i=1;$i<=14;$i++){ ?>
                                                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                   <?php } ?>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group form-group-lg form-group-select-plus">
                                                  <label>Guests</label>
                                                  <select class="form-control" name="mhguest_2">
                                                     <?php for($i=1;$i<=14;$i++){ ?>
                                                     <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                     <?php } ?>
                                                  </select>
                                               </div>
                                            </div>
                                          </div>
                                          <!-- Madina chek in close -->
                                    </div>
                                 </div>
                              </div>
                              <button class="btn btn-primary btn-lg" type="submit">Search for Flights</button>
                           </form>
                        </div>
                        <?php }?>  
                        
						<?php if (!array_key_exists("flight_hotel",$aHomePageSetting)){?>   
                        	<div class="tab-pane fade" id="tab-44">
                            <h3>Hotels + Flights</h3>
                            <div class="transfer-search-top">
                                <div class="tab-pane">
                                    <form action="#" id="hchintu">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="col-md-4 no-padding">
                                                    <div class="form-group form-group-lg">
                                                        <label>Select Trip Type</label>
                                                        <select name="trip_type" id="trip-details" class="form-control trip-details" display-attr="return-tyep2">
                                                            <option>Select trip</option>
                                                            <option value="Oneway" selected="selected">Oneway</option>
                                                            <option value="Return">Return</option>
                                                            <!-- <option value="add-more">All round</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-6 col-md-4">
                                                <div class="form-group form-group-lg form-group-icon-left flight">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Pick-up Location</label>
                                                    <input id="hautocom" name="from" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" required data-loader="loader10" data-shotcoade="from_shotcoade" data-checkcode="1" />
                                                    <div class="autocomplare"></div>
                                                    <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader10">
                                                    <input class="shrtcode" name="from_shotcoade" type="hidden" id="checkcode10" />
                                                    <input name="hotel_100" type="hidden" value="_true_" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-4">
                                                <div class="form-group form-group-lg form-group-icon-left flight">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Drop-off Location</label>
                                                    <input id='hauto2' name="to" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" required data-loader="loader11" data-shotcoade="to_shotcoade" data-checkcode="1" />
                                                    <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader11">
                                                    <input class="shrtcode" name="to_shotcoade" type="hidden" id="checkcode11" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-2 flight_departerting">
                                                <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                    <label>Pick-up Date</label>
                                                    <input class="date-pick form-control" name="date" data-date-format="yyyy-mm-dd" data-date-start-date="0d" type="text" />
                                                </div>
                                            </div>

                                            <div class="col-xs-6 col-md-2">
                                                <div class="form-group form-group-lg pm-btn">
                                                    <label>Passengers*</label>
                                                    <select class="form-control" name="Passngers">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="return-tyep2" id="type-return" style="display: none">
                                                <!-- <h3>Return</h3> -->
                                                <div class="col-xs-6 col-md-5">
                                                    <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>From</label>
                                                        <input id="r-autocom" name="rfrom" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loader12" data-shotcoade="rfrom_shotcoade" data-checkcode="1" />
                                                        <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader12">
                                                        <input class="shrtcode" name="rfrom_shotcoade" type="hidden" id="checkcode12" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-5">
                                                    <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                        <label>To</label>
                                                        <input id='r-auto2' name="rto" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loader13" data-shotcoade="rto_shotcoade" data-checkcode="1" />
                                                        <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader13" />
                                                        <input class="shrtcode" name="rto_shotcoade" type="hidden" id="checkcode13" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Departing</label>
                                                        <input class="date-pick form-control" name="Rdate" data-date-format="M d, D" type="text" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- makkah chakck in data-date-format="yyyy-mm-dd" data-date-start-date="0d"-->
                                            <div class="hide1 input-daterange" data-date-format="yyyy-mm-dd" data-date-start-date="0d">
                                                <div class="col-sm-12">
                                                  <label>Makkah Hotels</label>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Check in</label>
                                                        <input class="date-pick form-control" name="hdate" type="text" data-date-format="yyyy-mm-dd" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Check out</label>
                                                        <input class="date-pick form-control" name="hdate2" type="text" data-date-format="yyyy-mm-dd" onblur="setWeekDates(this.value,'mhdate','mhdate2')" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Rooms</label>
                                                        <select class="form-control" name="hroom_2">
                                                            <?php for($i=1;$i<=14;$i++){ ?>
                                                                <option value="<?php echo $i; ?>">
                                                                    <?php echo $i; ?>
                                                                </option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Guests</label>
                                                        <select class="form-control" name="hguest_2">
                                                            <?php for($i=1;$i<=14;$i++){ ?>
                                                                <option value="<?php echo $i; ?>">
                                                                    <?php echo $i; ?>
                                                                </option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- makkah chek in close -->
                                            <!-- Madina chek in start data-date-format="yyyy-mm-dd" data-date-start-date="0d"-->
                                            <div class="hide1 input-daterange">
                                              <div class="col-sm-12">
                                                <label >Madina Hotel </label>
                                              </div>
                                                <div class="col-xs-6 col-md-3 ">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Check in</label>
                                                        <input class="date-pick form-control" name="mhdate" data-date-format="yyyy-mm-dd" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Check out</label>
                                                        <input class="date-pick form-control" name="mhdate2" data-date-format="yyyy-mm-dd" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Rooms</label>
                                                        <select class="form-control" name="mhroom_2">
                                                            <?php for($i=1;$i<=14;$i++){ ?>
                                                                <option value="<?php echo $i; ?>">
                                                                    <?php echo $i; ?>
                                                                </option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Guests</label>
                                                        <select class="form-control" name="mhguest_2">
                                                            <?php for($i=1;$i<=14;$i++){ ?>
                                                                <option value="<?php echo $i; ?>">
                                                                    <?php echo $i; ?>
                                                                </option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Madina chek in close -->
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary btn-lg" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php }?> 
                        
                        
                        <?php if (!array_key_exists("flight_hotel_trasnfer",$aHomePageSetting)){?>
                            <!-- transfer + hotel + flight -->
                             <div class="tab-pane fade" id="tab-66">
                               <h3>Flights + Hotels + Transfers</h3>
                               <div class="transfer-search-top">
                                  <div class="tab-pane">
                                    <form action="#" id="htchintu">
                                        <div class="row clearfix">
                                           <div class="col-sm-12">
                                              <div class="col-md-4 no-padding">
                                                 <div class="form-group form-group-lg">
                                                    <label>Select Flight Type</label>
                                                      <select name="trip_type" id="trip-details" class="form-control trip-details" display-attr="return-tyep2">
                                                         <option>Select Option</option>
                                                         <option value="Oneway" selected="selected">Oneway</option>
                                                         <option value="Return">Return</option>
                                                         <!-- <option value="add-more">All round</option> -->
                                                      </select>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="row clearfix">
                                           <div class="col-xs-6 col-md-4">
                                              <div class="form-group form-group-lg form-group-icon-left flight">
                                                 <i class="fa fa-map-marker input-icon"></i>
                                                 <label>Pick-up Airport</label>
                                                 <input id="hautocom" name="from" class="form-control get_result"  placeholder="City, Airport, U.S. Zip" type="text" required data-loader="loaderht0" data-shotcoade="from_shotcoade" data-checkcode="2"/>
                                                 <div class="autocomplare"></div>
                                                 <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loaderht0">
                                                 <input class="shrtcode from_shotcoade" name="from_shotcoade" type="hidden"  id="checkcode21" />
                                                 <input name="hotel_100" type="hidden" value="_true_"  />
                                                 <input name="hotel_transfer_f" type="hidden" value="true"  />
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-4">
                                              <div class="form-group form-group-lg form-group-icon-left flight">
                                                 <i class="fa fa-map-marker input-icon"></i>
                                                 <label>Drop-off Airport</label>
                                                 <input id='hauto2' name="to" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" required  data-loader="loaderht1" data-shotcoade="to_shotcoade" data-checkcode="2"/>
                                                 <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loaderht1">
                                                 <input class="shrtcode to_shotcoade" name="to_shotcoade" type="hidden" id="checkcode22" />
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-2 flight_departerting">
                                              <div class="form-group form-group-lg form-group-icon-left">
                                                 <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                 <label>Pick-up Date</label>
                                                 <input class="date-pick form-control" name="date" data-date-format="yyyy-mm-dd" data-date-start-date="0d" type="text" />
                                              </div>
                                           </div>
                                          
                                           <div class="col-xs-6 col-md-2">
                                              <div class="form-group form-group-lg pm-btn">
                                                <label>Passengers*</label>
                                                <select class="form-control"  name="Passngers">
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                  <option>6</option>
                                                  <option>7</option>
                                                  <option>8</option>
                                                  <option>9</option>
                                                </select>
                                              </div>
                                           </div>
    
                                              <div class="return-tyep2" id="type-return" style="display: none">
                                                <!-- <h3>Return</h3> -->
                                                 <div class="col-xs-6 col-md-5">
                                                   <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                      <label>From</label>
                                                      <input id="r-autocom" name="rfrom" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loadergt2" data-shotcoade="rfrom_shotcoade" data-checkcode="2"/>
                                                      <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loadergt2">
                                                      <input class="shrtcode rfrom_shotcoade" name="rfrom_shotcoade" type="hidden" id="checkcode23" />
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 col-md-5">
                                                   <div class="form-group form-group-lg form-group-icon-left flight"><i class="fa fa-map-marker input-icon"></i>
                                                      <label>To</label>
                                                      <input id='r-auto2' name="rto" class="form-control get_result" placeholder="City, Airport, U.S. Zip" type="text" data-loader="loader13" data-shotcoade="rto_shotcoade" data-checkcode="2"/>
                                                      <img src="<?=__domain?>AjaxLoader.gif" class="ajexloader" id="loader13"/>
                                                      <input class="shrtcode rto_shotcoade" name="rto_shotcoade" type="hidden" id="checkcode24" />
                                                   </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                      <label>Departing</label>
                                                      <input class="date-pick form-control" name="Rdate" data-date-format="M d, D" type="text" />
                                                   </div>
                                                </div>
                                              </div>
    
                                              <!-- makkah chakck in -->
                                              <div class="hide2 input-daterange">
                                                <div class="col-sm-12">
                                                  <label>Makkah Hotels</label>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                      <label>Check in</label>
                                                      <input class="date-pick form-control" name="hdate" data-date-format="yyyy-mm-dd" data-date-start-date="0d" type="text" />
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                      <label>Check out</label>
                                                      <input class="date-pick form-control" name="hdate2" data-date-format="yyyy-mm-dd" data-date-start-date="0d" 
                                                      type="text"  onblur="setWeekDates(this.value,'mhdate','mhdate2')"/>
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-select-plus">
                                                    <label>Rooms</label>
                                                    <select class="form-control" name="hroom_2">
                                                       <?php for($i=1;$i<=14;$i++){ ?>
                                                       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                       <?php } ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-select-plus">
                                                      <label>Guests</label>
                                                      <select class="form-control" name="hguest_2">
                                                         <?php for($i=1;$i<=14;$i++){ ?>
                                                         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                   </div>
                                                </div>
                                              </div>
                                              <!-- makkah chek in close -->
                                              <!-- Madina chek in start -->
                                              <div class="hide2 input-daterange">
                                                <div class="col-sm-12">
                                                  <label>Madina Hotel </label>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                      <label>Check in</label>
                                                      <input class="date-pick form-control" name="mhdate"  data-date-format="yyyy-mm-dd" 
                                                      data-date-start-date="0d" type="text" />
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                      <label>Check out</label>
                                                      <input class="date-pick form-control" name="mhdate2"  data-date-format="yyyy-mm-dd" 
                                                      data-date-start-date="0d" type="text" />
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-select-plus">
                                                    <label>Rooms</label>
                                                    <select class="form-control" name="mhroom_2">
                                                       <?php for($i=1;$i<=14;$i++){ ?>
                                                       <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                       <?php } ?>
                                                    </select>
                                                  </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                   <div class="form-group form-group-lg form-group-select-plus">
                                                      <label>Guests</label>
                                                      <select class="form-control" name="mhguest_2">
                                                         <?php for($i=1;$i<=14;$i++){ ?>
                                                         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                         <?php } ?>
                                                      </select>
                                                   </div>
                                                </div>
                                              </div>
                                              <!-- Madina chek in close -->
                                           <!-- <div class="col-sm-12">
                                              <button class="btn btn-primary btn-lg" type="submit">Search for Transfers</button>
                                           </div> -->
                                        </div>
                                     <!-- <form id="form" action="http://buraqholidays.com/index.php?ToDo=Transport&type=check_search" method="post"> -->
                                      <div class="hide2">
                                        <div class="row clearfix">
                                           <div class="col-sm-12">
                                              <div class="col-md-4 no-padding">
                                                 <div class="form-group form-group-lg">
                                                    <label>Select Trip Type combi</label>
                                                    <select name="transfertrip_type" id="transfertrip_type" class="form-control" >
                                                       <option>Select trip</option>
                                                       <option value="oneway" selected="">One-way</option>
                                                       <option value="return">Return</option>
                                                       <option value="add-more">All round</option>
                                                    </select>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="row clearfix">
                                           <div class="col-xs-6 col-md-3">
                                              <div class="form-group form-group-lg form-group-icon-left">
                                                 <i class="fa fa-map-marker input-icon"></i>
                                                 <label>Pick-up Location</label>
                                                 <input name="thpickup" class=" form-control" placeholder="Enter pickup location..."  type="text" id="pickuplocation1" onkeyup="autocompl(this.value,101);" autocomplete="off" />
                                                 <div id="auto_pickup_101" style="display:none;" class="autocomplete_content">
                                                    <ul>
                                                       <?php 
                                                          for($i=0;$i<sizeof($aList);$i++):
                                                          
                                                           $list =$aList[$i];
                                                          
                                                          ?>
                                                       <li  style="cursor:pointer;" 
                                                          onclick="assign_item('<?php echo $list;?>','pickuplocation1','auto_pickup_101')"><?php echo $list;?></li>
                                                       <?php endfor;?>
                                                    </ul>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-3">
                                              <div class="form-group form-group-lg form-group-icon-left">
                                                 <i class="fa fa-map-marker input-icon"></i>
                                                 <label>Drop-off Location</label>
                                                 <input name="thdropoff" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                    id="droplocation1" onkeyup="autocompl(this.value,201);" autocomplete="off"/>
                                                 <div id="auto_pickup_201" style="display:none;" class="autocomplete_content">
                                                    <ul>
                                                        <?php  
                                                          for($i=0;$i<sizeof($aList);$i++):
                                                            $list =$aList[$i];
                                                        ?>
                                                       <li  style="cursor:pointer;" onclick="assign_item('<?php echo $list;?>','droplocation1','auto_pickup_201')"><?php echo $list;?></li>
                                                       <?php endfor;?>
                                                    </ul>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-2 transfer_detail">
                                              <div class="form-group form-group-lg form-group-icon-left">
                                                 <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                 <label>Pick-up Date</label>
                                                 <input name="thdateonstart"  type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd" 
                                                      data-date-start-date="0d" value="" />
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-2">
                                              <div class="form-group form-group-lg form-group-icon-left">
                                                 <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                 <label>Pick-up time</label>
                                                 <input name="thinitial_time"  type="text" class="timepicker  form-control" 
                                                  value="<?php echo date('h:i a',strtotime('+10 mins'))?>" />
                                              </div>
                                           </div>
                                           <div class="col-xs-6 col-md-2">
                                              <div class="form-group form-group-lg pm-btn">
                                                 <label>Passengers*</label>
                                                 <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                                    <i class="fa fa-minus"></i>
                                                    </button>
                                                    </span>
                                                    <input type="text" name="thquant[1]" id="passengers" class="form-control input-number" value="1" min="1" max="50">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                    <i class="fa fa-plus"></i>
                                                    </button>
                                                    </span>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="hide-box clearfix" id="return">
                                              <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Pick-up Location</label>
                                                    <input name="pickup1" class="form-control" placeholder="Enter pickup location..." type="text"  id="pickuplocation3" 
                                                       onkeyup="autocompl(this.value,3);" autocomplete="off"/>
                                                    <div id="auto_pickup_3" style="display:none;" class="autocomplete_content">
                                                       <ul>
                                                          <?php 
                                                             for($i=0;$i<sizeof($aList);$i++):
                                                             
                                                              $list =$aList[$i];
                                                             
                                                             ?>
                                                          <li  style="cursor:pointer;" 
                                                             onclick="assign_item('<?php echo $list;?>','pickuplocation3','auto_pickup_3')"><?php echo $list;?></li>
                                                          <?php endfor;?>
                                                       </ul>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Drop-off Location</label>
                                                    <input name="dropoff1" class=" form-control" placeholder="Enter drop off location..." type="text"  id="droplocation4"
                                                       onkeyup="autocompl(this.value,4);" autocomplete="off"/>
                                                    <div id="auto_pickup_4" style="display:none;" class="autocomplete_content">
                                                       <ul>
                                                          <?php 
                                                             for($i=0;$i<sizeof($aList);$i++):
                                                             
                                                              $list =$aList[$i];
                                                             
                                                             ?>
                                                          <li  style="cursor:pointer;" 
                                                             onclick="assign_item('<?php echo $list;?>','droplocation4','auto_pickup_4')"><?php echo $list;?></li>
                                                          <?php endfor;?>
                                                       </ul>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2 ziarat_detail">
                                                 <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                    <label>Pick-up Date</label>
                                                    <input name="date1" type="text" class="datepicker form-control"  data-date-format="yyyy-mm-dd" 
                                                    data-date-start-date="0d" value="" />
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                    <label>Pick-up time</label>
                                                    <input name="time1" type="text" class="timepicker form-control"   value="" />
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="input_fields_wrap"></div>
                                           <div class="col-md-12 no-padding" id="makkaha_ziarat" style="display:none;">
                                              <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Pick-up Location</label>
                                                    <input name="pickup_z" class=" form-control" placeholder="Enter pickup location..."  type="text" 
                                                       id="pickuplocation88" onkeyup="autocompl(this.value,88);" autocomplete="off" />
                                                    <div id="auto_pickup_88" style="display:none;" class="autocomplete_content">
                                                       <ul>
                                                          <?php 
                                                             for($i=0;$i<sizeof($aList);$i++):
                                                             
                                                              $list =$aList[$i];
                                                             
                                                             ?>
                                                          <li  style="cursor:pointer;" 
                                                             onclick="assign_item('<?php echo $list;?>','pickuplocation88','auto_pickup_88','droplocation89')"><?php echo $list;?></li>
                                                          <?php endfor;?>
                                                       </ul>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-3 ">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Drop-off Location</label>
                                                    <input name="dropoff_z" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                       id="droplocation89" onkeyup="autocompl(this.value,89);" autocomplete="off"  readonly="readonly"/>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2 ziarat_detail">
                                                 <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                    <label>Pick-up Date</label>
                                                    <input name="date_z"  type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd"
                                                     data-date-start-date="0d" value="" />
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                    <label>Pick-up time</label>
                                                    <input name="time_z" type="text" class="timepicker form-control"   
                                                    value="<?php echo date('h:i a',strtotime('+10 mins'));?>" />
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="col-md-12 no-padding" id="madina_ziarat" style="display:none;">
                                              <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Pick-up Location</label>
                                                    <input name="pickup_z1" class=" form-control" placeholder="Enter pickup location..."  type="text" 
                                                       id="pickuplocation99" onkeyup="autocompl(this.value,99);" autocomplete="off" />
                                                    <div id="auto_pickup_99" style="display:none;" class="autocomplete_content">
                                                       <ul>
                                                          <?php 
                                                             for($i=0;$i<sizeof($aList);$i++):
                                                             
                                                              $list =$aList[$i];
                                                             
                                                             ?>
                                                          <li  style="cursor:pointer;" 
                                                             onclick="assign_item('<?php echo $list;?>','pickuplocation99','auto_pickup_99','droplocation100')"><?php echo $list;?></li>
                                                          <?php endfor;?>
                                                       </ul>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-3">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-map-marker input-icon"></i>
                                                    <label>Drop-off Location</label>
                                                    <input name="dropoff_z1" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                       id="droplocation100" onkeyup="autocompl(this.value,100);" autocomplete="off" readonly="readonly"/>
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2 ziarat_detail">
                                                 <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                    <label>Pick-up Date</label>
                                                    <input name="date_z1"  type="text" class="datepicker form-control" data-date-format="yyyy-mm-dd"
                                                     data-date-start-date="0d" value="" />
                                                 </div>
                                              </div>
                                              <div class="col-xs-6 col-md-2">
                                                 <div class="form-group form-group-lg form-group-icon-left">
                                                    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                    <label>Pick-up time</label>
                                                    <input name="time_z1" type="text" class="timepicker  form-control"    
                                                    value="<?php echo date('h:i a',strtotime('+10 mins'));?>" />
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="col-sm-12">
                                              <select name="addZiyarat" id="ziarat_selection" style="height: 43px; display:none; width:230px; margin-bottom:10px;" class="form-control">
                                                 <option value="">Select Ziyarat</option>
                                                 <option value="madinah_ziyarat">Madinah Ziarat</option>
                                                 <option value="makkah_ziyarat">Makkah Ziarat</option>
                                                 <option value="makkah_and_madinah_ziyarat">Makkah And Madinah Ziarat</option>
                                              </select>
                                           </div>
                                        </div>
                                      </div>
                                        <div class="row">
                                           <div class="col-sm-12">
                                              <button class="add_field_button btn btn-warning btn-lg hide-box" id="add-more">Add More Destinations</button>
                                              <button id="add_ziarat_btn" class="btn btn-primary btn-lg" type="button">Add Ziarat</button>
                                              <button class="btn btn-primary btn-lg" type="submit">Search</button>
                                           </div>
                                        </div> 
                                     </form>
                                  </div>
                               </div>
                            </div>
                            <!-- transfer + hotel + flight -->
                        <?php }?> 
                          
                        <?php if (!array_key_exists("transfer",$aHomePageSetting)){?>
                             <div class="tab-pane fade" id="tab-4">
                           <h3>Search for Transfers</h3>
                          	 
                             <div class="transfer-search-top">
                              <div class="tab-pane">
                                 <form id="form" action="<?php echo __domain?>index.php?ToDo=Transport&type=check_search" method="post">
                                    <div class="row clearfix">
                                       <div class="col-sm-12">
                                          <div class="col-md-4 no-padding">
                                             <div class="form-group form-group-lg">
                                                <label>Select Trip Type</label>
                                                <select name="trip_type" id="tripinfo" class="form-control" >
                                                   <option>Select trip</option>
                                                   <option value="oneway" selected="">One-way</option>
                                                   <option value="return_single">Return</option>
                                                   <option value="add-more_single">All round</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row clearfix">
                                       <div class="col-md-3">
                                          <div class="form-group form-group-lg form-group-icon-left">
                                             <i class="fa fa-map-marker input-icon"></i>
                                             <label>Pick-up Location</label>
                                             <input name="pickup" class=" form-control" placeholder="Enter pickup location..."  type="text" id="pickuplocation" onkeyup="autocompl(this.value,1);" autocomplete="off" />
                                             <div id="auto_pickup_1" style="display:none;" class="autocomplete_content">
                                                <ul>
                                                   <?php 
                                                      for($i=0;$i<sizeof($aList);$i++):
                                                      
                                                       $list =$aList[$i];
                                                      
                                                      ?>
                                                   <li  style="cursor:pointer;" 
                                                      onclick="assign_item('<?php echo $list;?>','pickuplocation','auto_pickup_1')"><?php echo $list;?></li>
                                                   <?php endfor;?>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group form-group-lg form-group-icon-left">
                                             <i class="fa fa-map-marker input-icon"></i>
                                             <label>Drop-off Location</label>
                                             <input name="dropoff" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                id="droplocation" onkeyup="autocompl(this.value,2);" autocomplete="off"/>
                                             <div id="auto_pickup_2" style="display:none;" class="autocomplete_content">
                                                <ul>
                                                    <?php  
                                                      for($i=0;$i<sizeof($aList);$i++):
                                                        $list =$aList[$i];
                                                    ?>
                                                   <li  style="cursor:pointer;" onclick="assign_item('<?php echo $list;?>','droplocation','auto_pickup_2')"><?php echo $list;?></li>
                                                   <?php endfor;?>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2 transfer_detail">
                                          <div class="form-group form-group-lg form-group-icon-left">
                                             <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                             <label>Pick-up Date</label>
                                             <input name="dateonstart"  type="text" class="datepicker form-control"  
                                             data-date-format="yyyy-mm-dd"   data-date-start-date="0d" value="" />
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group form-group-lg form-group-icon-left">
                                             <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                             <label>Pick-up time</label>
                                             <input name="initial_time"  type="text" class="timepicker  form-control" 
                                              value="<?php echo date("H:i a", strtotime("+30 minutes"));?>" />
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group form-group-lg pm-btn">
                                             <label>Passengers*</label>
                                             <div class="input-group">
                                                <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                                <i class="fa fa-minus"></i>
                                                </button>
                                                </span>
                                                <input type="text" name="quant[1]" id="passengers" class="form-control input-number" value="1" min="1" max="50">
                                                <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                                <i class="fa fa-plus"></i>
                                                </button>
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="hide-box clearfix" id="return_single">
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Pick-up Location</label>
                                                <input name="pickup1" class="form-control" placeholder="Enter pickup location..." type="text"  id="pickuplocation3" 
                                                   onkeyup="autocompl(this.value,3);" autocomplete="off"/>
                                                <div id="auto_pickup_3" style="display:none;" class="autocomplete_content">
                                                   <ul>
                                                      <?php 
                                                         for($i=0;$i<sizeof($aList);$i++):
                                                         
                                                          $list =$aList[$i];
                                                         
                                                         ?>
                                                      <li  style="cursor:pointer;" 
                                                         onclick="assign_item('<?php echo $list;?>','pickuplocation3','auto_pickup_3')"><?php echo $list;?></li>
                                                      <?php endfor;?>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Drop-off Location</label>
                                                <input name="dropoff1" class=" form-control" placeholder="Enter drop off location..." type="text"  id="droplocation4"
                                                   onkeyup="autocompl(this.value,4);" autocomplete="off"/>
                                                <div id="auto_pickup_4" style="display:none;" class="autocomplete_content">
                                                   <ul>
                                                      <?php 
                                                         for($i=0;$i<sizeof($aList);$i++):
                                                         
                                                          $list =$aList[$i];
                                                         
                                                         ?>
                                                      <li  style="cursor:pointer;" 
                                                         onclick="assign_item('<?php echo $list;?>','droplocation4','auto_pickup_4')"><?php echo $list;?></li>
                                                      <?php endfor;?>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-2">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Pick-up Date</label>
                                                <input name="date1" type="text" class="datepicker form-control"   value="" />
                                             </div>
                                          </div>
                                          <div class="col-md-2">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                <label>Pick-up time</label>
                                                <input name="time1" type="text" class="timepicker form-control"   value="" />
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="input_fields_wrap"></div>
                                       <div class="col-md-12 no-padding" id="makkahaziarat" style="display:none;">
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Pick-up Location</label>
                                                <input name="pickup_z" class=" form-control" placeholder="Enter pickup location..."  type="text" 
                                                   id="pickuplocation88" onkeyup="autocompl(this.value,88);" autocomplete="off" />
                                                <div id="auto_pickup_88" style="display:none;" class="autocomplete_content">
                                                   <ul>
                                                      <?php 
                                                         for($i=0;$i<sizeof($aList);$i++):
                                                         
                                                          $list =$aList[$i];
                                                         
                                                         ?>
                                                      <li  style="cursor:pointer;" 
                                                         onclick="assign_item('<?php echo $list;?>','pickuplocation88','auto_pickup_88','droplocation89')"><?php echo $list;?></li>
                                                      <?php endfor;?>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Drop-off Location</label>
                                                <input name="dropoff_z" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                   id="droplocation89" onkeyup="autocompl(this.value,89);" autocomplete="off"  readonly="readonly"/>
                                             </div>
                                          </div>
                                          <div class="col-md-2 ziarat_detail">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Pick-up Date</label>
                                                <input name="date_z"  type="text" class="datepicker form-control"  data-date-format="yyyy-mm-dd"
                                                 data-date-start-date="0d" value="" />
                                             </div>
                                          </div>
                                          <div class="col-md-2">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                <label>Pick-up time</label>
                                                <input name="time_z" type="text" class="timepicker form-control"   value="" />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12 no-padding" id="madinaziarat" style="display:none; ">
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Pick-up Location</label>
                                                <input name="pickup_z1" class=" form-control" placeholder="Enter pickup location..."  type="text" 
                                                   id="pickuplocation99" onkeyup="autocompl(this.value,99);" autocomplete="off" />
                                                <div id="auto_pickup_99" style="display:none;" class="autocomplete_content">
                                                   <ul>
                                                      <?php 
                                                         for($i=0;$i<sizeof($aList);$i++):
                                                         
                                                          $list =$aList[$i];
                                                         
                                                         ?>
                                                      <li  style="cursor:pointer;" 
                                                         onclick="assign_item('<?php echo $list;?>','pickuplocation99','auto_pickup_99','droplocation100')"><?php echo $list;?></li>
                                                      <?php endfor;?>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-map-marker input-icon"></i>
                                                <label>Drop-off Location</label>
                                                <input name="dropoff_z1" class=" form-control" placeholder="Enter drop off location..." type="text" 
                                                   id="droplocation100" onkeyup="autocompl(this.value,100);" autocomplete="off" readonly="readonly"/>
                                                                                            </div>
                                          </div>
                                          <div class="col-md-2 ziarat_detail">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Pick-up Date</label>
                                                <input name="date_z1"  type="text" class="datepicker form-control"  data-date-format="yyyy-mm-dd"
                                                 data-date-start-date="0d" value="" />
                                             </div>
                                          </div>
                                          <div class="col-md-2">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                <label>Pick-up time</label>
                                                <input name="time_z1" type="text" class="timepicker  form-control"   value="" />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12"> 
                                          <select name="addZiyarat" id="ziaratselection" style="height: 43px; display:none; width:230px; margin-bottom:10px;" class="form-control">
                                             <option value="">Select Ziyarat</option>
                                             <option value="madinah_ziyarat">Madinah Ziarat</option>
                                             <option value="makkah_ziyarat">Makkah Ziarat</option>
                                             <option value="makkah_and_madinah_ziyarat">Makkah And Madinah Ziarat</option>
                                          </select>
                                       </div>
                                       <div class="col-sm-12">
                                          <button class="add_field_button btn btn-warning btn-lg hide-box" id="add-more_single">Add More Destinations</button>
                                          <button id="add_ziaratbtn" class="btn btn-primary btn-lg" type="button">Add Ziarat</button>
                                          <button class="btn btn-primary btn-lg" type="submit">Search for Transfers</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <?php }?> 
                        
                       
                       <div class="tab-pane fade" id="tab-5">
                           <h2>Search for Activities</h2>
                           <form>
                              <div class="input-daterange" data-date-format="M d, D">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon"></i>
                                          <label>Where are you going?</label>
                                          <input class="typeahead form-control" placeholder="City, Airport, Point of Interest or U.S. Zip Code" type="text" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                          <label>From</label>
                                          <input class="form-control" name="start" type="text" />
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                          <label>To</label>
                                          <input class="form-control" name="end" type="text" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <button class="btn btn-primary btn-lg" type="submit">Search for Activities</button>
                           </form>
                        </div>
                      <?php if (!array_key_exists("umrah",$aHomePageSetting)){?> 
                           <!--new-->
                           <div class="tab-pane fade" id="tab-444">
                          <?php  
                           	if(is_array($GLOBALS['umrah_dates']) && count($GLOBALS['umrah_dates']) > 0)
								{
									$aDate = array();
									foreach($GLOBALS['umrah_dates'] as $dateData): // foreach start
									
										$day =  intval(date("d",strtotime($dateData['check_in'])));
										$month =  intval(date("m",strtotime($dateData['check_in'])));
										$year = date("Y",strtotime($dateData['check_in']));
										$aDateCheckInStr[]  = $day.'-'.$month.'-'.$year;
										
										$aDateCheckInF[]  = date("Y",strtotime($dateData['check_in'])).'-'.date("m",strtotime($dateData['check_in'])).'-'.date("d",strtotime($dateData['check_in']));
										$aDateCheckIn[]  = date("Y",strtotime($dateData['check_in'])).'-'.date("m",strtotime($dateData['check_in'])).'-'.date("d",strtotime($dateData['check_in']));
										
										$aDateCheckOut[]  = $dateData['check_out'];
									
									endforeach;  //foreach end
									$aDateStr =  implode(',',$aDateCheckIn); // for render checkin
									$aDateStr2 =  implode(',',$aDateCheckInStr);
								}
		?>
                           <h3>Search For Umrah</h3>
                           <form id="form" action="" method="get">
                         
                              <input type="hidden" name="ToDo" value="umrah_packages" />
                              <div class="row clearfix">
                                 <div class="col-md-12">
                                    
                                 
                                    <div class="input-daterange" data-date-format="yyyy-mm-dd" data-date-start-date="0d">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-in Date</label>
                                                <input  class="date_time_picker_index form-control"  type="text"  name="checkin_11" id="umrah_checkin"
                                                   value="<?php if(isset($aDateCheckInF[0])) echo $aDateCheckInF[0];?>"  onchange="setUmrahCheckout(this.value)"  readonly="readonly" required />
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                             <div class="form-group form-group-lg form-group-icon-left">
                                                <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                <label>Check-out Date</label>
                                                <input class="form-control"  type="text" name="checkout_11"   value="<?php if(isset( $aDateCheckOut[0])) echo $aDateCheckOut[0];?>" id="umrah_checkout" 
                                                data-date-format="yyyy-mm-dd" readonly="readonly" />
                                             <input class="form-control"  type="hidden" name="checkout_11_hidden"   value="<?php if(isset( $aDateCheckOut[0])) echo $aDateCheckOut[0];?>" id="umrah_checkout_hidden" 
                                             data-date-format="yyyy-mm-dd" readonly="readonly" />
                                             
                                             
                                             
                                             </div>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-group-lg form-group-select-plus">
                                        <label>Departing From</label>
                                       
                                        <select class="form-control" name="country_name">
											<?php foreach($GLOBALS['countries'] as $data){ ?>
                                            <option value="<?php echo $data['country_name']; ?>" 
                                            <?php if(strtolower($data['country_name']) == strtolower('United Kingdom')) echo 'selected="selected"';?> >
                                            <?php echo $data['country_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                               </div>
                              <button class="btn btn-primary btn-lg search_umrah" type="submit" >Search for Umrah</button>
                           </form>
                        </div>
                          <!--new-->
                       <?php }?>   
                     </div>
                  </div>
               </div>
            </div> <?php }?>
         </div>
      </div>
    </div>
 
  <div class="owl-carousel owl-slider owl-1 owl-carousel-area home-page-slider" id="owl-carousel-slider">
   <div class="bg-holder full">
      <div class="bg-mask"></div>
      <div class="bg-blur" style="background-image:url(img/slider-1.png);"></div>
    	
   </div>
   <div class="bg-holder full">
      <div class="bg-mask"></div>
      <div class="bg-blur" style="background-image:url(img/slider-2.jpg);"></div>
   
   </div>
   <div class="bg-holder full">
      <div class="bg-mask"></div>
      <div class="bg-blur" style="background-image:url(img/slider-3.png);"></div>
      
   </div>
   
    <div class="bg-holder full">
      <div class="bg-mask"></div>
      <div class="bg-blur" style="background-image:url(img/slider-4.jpg);"></div>
      
   </div>
   <div class="bg-holder full">
      <div class="bg-mask"></div>
      <div class="bg-blur" style="background-image:url(img/slider-5.png);"></div>
      
   </div>
</div>
<div class="bg-img home-page-bg" style="background-image:url(img/slider-1.png);"></div>
      
      
   </div>
</div>
</section>
 
 
  
  <div class="gap gap-small"></div>
  
  <section class="top-hostels">
    <div class="container-fluid welcome-block">
    <center> <h1><span class="greenish2">TOP HOSTELS &</span> <span class="white"> MAKKAH & MADINAH</span></h1></center>
    <P class="orange2">SEE ALL OFFERS</P>
    <center><div class="h_line"></div></center>
    </div>
  <div class="gap gap-small"></div>
  <div class="container">
 
    <div class="row">
         <div class="col-sm-4">
           <img src="sayhan-img/top-hotels/top-hostal.jpg" >
             <div class="image-effects">
               
                      <div class="col-xs-12 text">Anjum Makkah</div>
                      <div class="fa-stars col-xs-12">
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                      </div>
                      
               </div>
                <div class="image-effects1">
    <div class="text-bottom"><center>From: <span class="color:#fff;">400 SAR</span> </center></div>
    </div>
         </div>
    
    
    
    
    
    <div class="col-sm-4">
           <img src="sayhan-img/top-hotels/top-hostal3.jpg" >
             <div class="image-effects">
               
                      <div class="col-xs-12 text">Pullman Zamzam</div>
                       <div class="fa-stars col-xs-12">
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                      </div>
                      
               </div>
                <div class="image-effects1">
    <div class="text-bottom"><center>From: <span class="color:#fff;">450 SAR</span> </center></div>
    </div>
         </div>
    
    
    
    
    <div class="col-sm-4">
           <img src="sayhan-img/top-hotels/top-hostal1.jpg" >
             <div class="image-effects">
               
                      <div class="col-xs-12 text">Jabal Omar</div>
                       <div class="fa-stars col-xs-12">
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                           <i class="fa fa-star-o" aria-hidden="true"></i>
                      </div>
                      
               </div>
                <div class="image-effects1">
    <div class="text-bottom"><center>From: <span class="color:#fff;">500 SAR</span></center></div>
    </div>
         </div>
    
    
    
   
    </div>
     
  
                             <div class="gap gap-small"></div>
  
                       <div>
                            <center>
                                <button class="button-viewalltours button123" >VIEW ALL HOTELS</button>
                            </center>
                       </div>
                              <div class="gap gap-small"></div>
                
                </div>
  </div>
  </div>
  </section>
  
  
  <section class="transfer">
  <div class="container-fluid welcome-block">
 <center> <h1><span class="greenish2">EXCRUSIONS & </span> <span class="white"> TRANSFERS</span></h1></center>
 <P class="orange2">SEE ALL OFFERS</P>
 <center><div class="h_line"></div></center>
  </div>
  
  
<div class="gap gap-small"></div>
  
  <div class="container">
    <div class="row">
        <div class="col-sm-4">
           <img src="sayhan-img/transfer/transfers-img1.jpg" >
            <div class="image-effects">
               
                <div class="col-xs-12 text">City Tours</div>
             
                      
            </div>
            <div class="image-effects1">
                <div class="text-bottom"><center>From: <span class="color:#fff;">250 SAR</span> </center></div>
            </div>
        </div>
          <div class="col-sm-4">
           <img src="sayhan-img/transfer/transfers-img2.jpg" >
            <div class="image-effects">
               
                <div class="col-xs-12 text">Tranport Services</div>
             
                      
            </div>
            <div class="image-effects1">
                <div class="text-bottom"><center>From: <span class="color:#fff;">200 SAR</span> </center></div>
            </div>
        </div>
        
          <div class="col-sm-4">
           <img src="sayhan-img/transfer/transfers-img3.jpg" >
            <div class="image-effects">
               
                <div class="col-xs-12 text">Luxury Cars</div>
             
                      
            </div>
            <div class="image-effects1">
                <div class="text-bottom"><center>From: <span class="color:#fff;">350 SAR</span> </center></div>
            </div>
        </div>
 
  <div class="gap gap-small"></div>
    <div>
     <center>
     <button class="button-viewalltours button123" >VIEW ALL TOURS</button>
     </center>
    </div>
  <div class="gap gap-small"></div>
  </div>
  </section>
  
  
  
  
<section class="special-price">
     <div class="container-fluid welcome-block">
       <center> <h1><span class="white">Special Prices </span> <span class="white"></h1> </center>
       <P class="orange2">SEE ALL OFFERS</P>
       <center><div class="h_line"></div></center>
     </div>
     
     <div class="gap gap-small"></div>
    
     
     <div class="container">
          <div class="row">
             <div class="col-sm-6">
             
                <div class="row">
                  <div class="col-sm-12">
                   <img src="sayhan-img/prices-img1.jpg">
                  </div>
                </div>
         <div class="gap gap-small"></div>
                <div class="row">
                  <div class="col-xs-6">
                    <button class="button-viewalltours-n button23" style="width:auto;">FOR RESERVATION</button>
                  </div>
                  <div class="col-xs-6 ">
                  <button  class="button-viewalltours-n button23"  style="width:auto;">CHECK HOSTEL LIST</button>
                  </div>
               </div>
              </div>
      
        <div class="col-sm-6 col-xs-12">
    
          <div class="row">
            <div class="col-sm-12 ">
              <img src="sayhan-img/prices-img2.jpg" />
            </div>  
          </div>
      <div class="gap gap-small"></div>
          <div class="row">
             <div class="col-sm-12 ">
              <img src="sayhan-img/prices-img3.jpg" />
             </div>
          </div>
        </div>
        
     </div>
     </div>
 
  
  
     <div class="gap gap-small"></div>
 </section>
  
  
  
  <section class="say-welcome">
  
  
   <div class="container-fluid welcome-block">
   <center> <h1><span class="greenish2">WELCOME TO </span> <span class="white"> SAYHAN</span></h1></center>
   <P class="orange2">TOP RATED SPECIALISTS TO LET YOU FLY</P>
   <center><div class="h_line"></div></center>
   </div>
 
  
  

   <div class="container">
 
   <p>
   <div class="gap gap-small"></div>
  We create specialized generosities to serve our guests. we work hard to preserve our sustainable growth and development, and we work even harder preserve the sustainable growth and development of your businesses, as well as providing quality services. We are honored to serve the guests of the house of Allah, and provide them with all the services from the minute of their arrival, including reception, transportation, accommodation, subsistence, as well as the organization of their trips at the highest levels of services. We provide convenient and safe transportation and a variety of transportation options to suit all of our customers. We provide a wide range of travel and tourism options on a global scale, and the feasibility of booking in more than 1 million hotels around the world, for you our dear client to enjoy high-end services that suits your needs.
  <div class="gap gap-small"></div>
  </p>
  </div>
 
  </section>
  
  
  
  
   <section class="transfer-services">
  <div class="container-fluid1 footer-upon-img">
      <img src="sayhan-img/upon-footer-img.jpg" >
  <div class="transfer-services-content"><h1><span class="orange">TRANSFER</span> <span class="white">SERVICES</span></h1></div>
 
  
  </div>
  

 


 

<?php 
   	
	 ?>
      <div id="div_box">
      <?php 	  
	   for($i=0;$i<sizeof($aDateCheckInF); $i++) 
	   {
	  ?>
    	<input type="hidden" id="check_in_id_<?php echo $i;?>" value="<?php  echo  $aDateCheckInF[$i];?>"> 
     	<input type="hidden" id="check_out_id_<?php echo $i;?>" value="<?php echo  $aDateCheckOut[$i];?>"> 
    
	<?php 
		} 
	 
	
	?>   
    </div>
	<input type="hidden" id="available_dates_str" value='<?php echo $aDateStr;?>'>
    <input type="hidden" id="available_dates_str2" value='<?php echo $aDateStr2;?>'>
<?php include 'footer.php'; ?>
<script>
    $('#loginform').on('submit', function (e) {
    e.preventDefault();
    var username = $('#usernameeng').val();
    var userpwd = $('#passwordeng').val();
    var domain = '<?php echo __domain; ?>';
    var action = $('#action').val();
    $.ajax({
      cache: false,
      type: 'post',
      url: 'form-login.php',
      crossDomain: true,
      async: true,
      data: {username:username, userpwd:userpwd, action:action},
      // data: 'username='+username+'usrpwd='+usrpwd,
      success: function (data) {
        if (data == 'not valid parameters') {
          $('#errormessage').text(data)
        }
        else if (data == 'Invalid credentials') {
          $('#errormessage').text(data)
        }
        else if(data == 'Success'){
          $('#success').text('Successfully Logged in.')
         window.location.replace('dashboard/index.php?ToDo=processLogin')
        }
      }
    })
  })
   $(document).ready(function() {
		var owl = $('.owl-2');
		owl.owlCarousel({
		items: 3,
		loop: true,
        nav:true,    
		margin: 10,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
            responsive : {
                0 : {
                   items: 2

                },
                768 : {
                   items: 3

                }
            }
		});
        
		
		var availableDatesStr = $("#available_dates_str2").val();
		var aavailableDatesStr  = availableDatesStr.split(',');
		var aaSeats =[];
		
		for(var i = 0; i<aavailableDatesStr.length; i++ ){
			aaSeats.push(aavailableDatesStr[i]);	
		}
		
		
		$('#umrah_checkin').datepicker({
			format: 'yyyy-mm-dd',
			beforeShowDay: function (date) {
			var dmy;
			dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
			
				if ($.inArray(dmy, aaSeats) != -1) {
					return true;
				} else {
					return false;
				}
			}
		});
		
		
		$('#forgetpasslink').click(function(){
		    $('#loginform').hide();
		    $('#forgetpassword').show();
		})

   });
   
   
   
   function forgetpassword(){
    var youremail1 = $('#youremail').val();
    if(youremail1==''){
        alert('Please Enter Your Email');
        return;
    }
    var auth_token1 = '<?php echo $_SESSION['Auth_Token']; ?>';
	$.ajax({
	type: "POST",
	url: "http://yourmoroccostay.com/hg_demo/3p_WL_Dashboard/api.php",
	data:  {youremail:youremail1,auth_token:auth_token1, todo:'forget_password'}, 
	success: function(data){
	   var data = $.parseJSON(data);
		$("#displayMessage").append(data.message);

	}
	});
}

$(document).ready(function(){
  $("#button-login").click(function(){
    
    $("#box").fadeIn("slow");
	
  });
  
});
</script>
<style type="text/css">
 td.disabled.day{
  background:#A07F3C !important;
   color:#fff !important;
}
td.day.disabled {
opacity: 0.2;
}
</style>