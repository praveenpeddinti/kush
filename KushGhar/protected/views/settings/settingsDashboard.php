<div class="container">
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active" title="Account"><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>
                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">
                               <li><a href="/admin/dashboard"> <i class="fa fa-users"></i> Invite Friends</a></li>
                                <li><a href="/admin/manage"> <i class="fa fa-users"></i> Invite Management</a></li>
                                <li><a href="/admin/usermanagement"> <i class="fa fa-user"></i> User Management</a></li>
                                <li><a href="/admin/vendormanagement"> <i class="fa fa-user"></i> Vendor Management</a></li>
                                <li><a href="/admin/reviews"> <i class="fa fa-user"></i> Review/Feedback</a></li>
                                <li><a href="/admin/order"> <i class="fa fa-file-text"></i> Orders</a></li>
                                <li><a href="/admin/invoice"> <i class="fa fa-list-alt"></i> Invoice Management</a></li>
                                <li><a href="/admin/payments"> <i class="fa fa-file"></i> Payments</a></li>
                                <li class="active"><a href="/settings/settingsDashboard"> <i class="fa fa-cog"></i> Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <article>
                <div id="priceQuoteDiv" class="row-fluid">
                    <div class="span12">
                            <h4 class="paddingL20">Settings </h4> <hr>
                            <div class="paddinground paddingTop0">
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title  carwash_title2" style="cursor: pointer">
                                        <a data-toggle="collapse" data-parent="#accordion" class="collapsed" style="display:block" onclick="loadCarSettings()">
                                            <span class="pull-left">Car Settings</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title  housecleaning_title2" style="cursor: pointer">
                                        <a data-toggle="collapse" data-parent="#accordion" class="collapsed" style="display:block" onclick="loadCitiesSettings()">
                                            <span class="pull-left">Location Settings</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                    </div>
                </div>
                </div>
            </article>
        </div>
    </section>
</div>
<script>
 function loadCarSettings(){
     window.location.href='carMakes';
 }   
 function loadCitiesSettings(){
     window.location.href='cities';
 }
</script>