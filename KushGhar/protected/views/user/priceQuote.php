                <div class="row-fluid">
                    <div class="span12">
                        <h4 class="paddingL20">Price Quote</h4>
                        
                        <hr>
                        <div class="paddinground">
                            <table cellpadding="2" cellspacing="2">
                                
                                <tr>
                                    <td>Name of the Customer </td>
                                    <td><?php echo "<b>".$customerDetails->first_name."</b>";?></td>
                                </tr>
                                <tr><td colspan="2"><h5>House Cleaning Service </h5></td></tr>
                                <?php if($HouseCleaning==1){?>
                                <?php if($getServiceDetails['squarefeets']!=0){?>
                                <tr>
                                    <td>Square Feets </td>
                                    <td><?php echo "<b>".$getServiceDetails['squarefeets']."</b>";?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td>Total Living Room(s) </td>
                                    <td><?php echo "<b>".$getServiceDetails['total_livingRooms']."</b>";?></td>
                                </tr>
                                
                                <tr>
                                    <td>Total Bed Rooms(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bedRooms']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>Total Kitchen(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_kitchens']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>Total Bath Rooms(s)</td>
                                    <td><?php echo "<b>".$getServiceDetails['total_bathRooms']."</b>";?></td>
                                </tr>
                                
                                <tr>
                                    <td valign='top'>Additional Services are</td>
                                    <td>
                                        <?php if($getServiceDetails['window_grills']==1) echo "Window grills cleaning</br>" ;?>
                                        <?php if($getServiceDetails['fridge_interior']==1) echo "fridge interior cleaning</br>" ;?>
                                        <?php if($getServiceDetails['microwave_oven_interior']==1) echo "micro wave oven interior cleaning</br>" ;?>
                                        <?php if($getServiceDetails['laundry']==1) echo "Laundry (washing and drying)</br>" ;?>
                                    </td>
                                </tr>
                                <?php }?>
                                <?php if($StewardsCleaning==1){?>
                                <tr><td colspan="2"><h5>Sewards Service </h5></td></tr>
                                <tr>
                                    <td>Event Name </td>
                                    <td>
                                        <?php
                                        if($getStewardsServiceDetails['event_type']==1){$EventName= 'Formal Party';}
                                        if($getStewardsServiceDetails['event_type']==2){$EventName= 'Casual Party';}
                                        if($getStewardsServiceDetails['event_type']==3){$EventName= 'Birthday Party';}
                                        if($getStewardsServiceDetails['event_type']==4){$EventName= 'Anniversary';}
                                        if($getStewardsServiceDetails['event_type']==5){$EventName= 'Funeral';}
                                        if($getStewardsServiceDetails['event_type']==6){$EventName= 'Sporting Event';}
                                        if($getStewardsServiceDetails['event_type']==7){$EventName= $getStewardsServiceDetails['event_name'];}
                                        
                                        echo "<b>".$EventName."</b>";?>
                                </tr>
                                    
                                <tr>
                                    <td>People Attend</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['attend_people']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>How long do you want KushGhar to provide services</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['service_hours']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td>No of Stewards</td>
                                    <td><?php echo "<b>".$getStewardsServiceDetails['no_of_stewards']."</b>";?></td>
                                </tr>
                                <tr>
                                    <td valign='top'>Services Required</td>
                                    <td>
                                        <?php if($getStewardsServiceDetails['appetizers']==1) echo "Appetizers</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dinner']==1) echo "Dinner</br>" ;?>
                                        <?php if($getStewardsServiceDetails['dessert']==1) echo "Dessert</br>" ;?>
                                        <?php if($getStewardsServiceDetails['alcoholic']==1) echo "Beverage</br>" ;?>
                                        <?php if($getStewardsServiceDetails['post_dinner']==1) echo "Coffee / Tea</br>" ;?>
                                    </td>
                                </tr>
                                
                                
                                <?php }?>
                            </table>
                            <div class="row-fluid">
                                <div class="span6"><label>Total Price</label><input type="text" id="price" /></div>
                                <div class="span6">
                                    <div class="pull-right paddingT30">
                                        <input type="button" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </div>
                            
                                                            
                        </div>
                    </div>
                </div>