<script type="text/javascript">
    function adminloginhandler(data) {
        if (data.status == 'success') {
            alert("sucesss===========");
            window.location.href = 'dashboard';
        } else {
            var error = [];

            if (typeof (data.error) == 'string') {
                var error = eval("(" + data.error.toString() + ")");
            } else {
                var error = eval(data.error);
            }
            $.each(error, function(key, val) {
                if ($("#" + key + "_em_")) {
                    $("#" + key + "_em_").text(val);
                    $("#" + key + "_em_").show();
                    $('#error').show();
                    $("#" + key).parent().addClass('error');
                }
            });
        }
    }

    function isNumberKey(evt)
    {
        var e = evt || window.event; //window.event is safer, thanks @ThiefMaster
        var charCode = e.which || e.keyCode;

        if (charCode > 31 && (charCode < 45 || charCode > 57))
            return false;
        if (e.shiftKey)
            return false;
        return true;
    }


    function statusChangeUser(rowNos, status) {
        alert(status);
        if (status == 1) {
            var statusData = 'Do you want to change Active to Inactive?';
        } else {
            var statusData = 'Do you want to change Inactive to Active?';
        }
        var r = confirm(statusData);
        if (r == true) {
            var data = "Id=" + rowNos + "&status=" + status;
            alert(data);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo Yii::app()->createAbsoluteUrl("/admin/manageStatus"); ?>',
                data: data,
                success: function(data) {
                    activeFormHandler(data, status, rowNos);
                },
                error: function(data) { // if error occured
                    alert("Error occured.please try again");

                }
            });
        } else {
            alert("Cancel!");
        }
    }



    function activeFormHandler(data, status, rowNos) {
        alert(data);

        if (status == 1) {
            $('#user_' + rowNos).attr('class', 'icon_inactive');
            $('#user_' + rowNos).attr('data-status', '0');
        } else {
            $('#user_' + rowNos).attr('class', 'icon_delete');
            $('#user_' + rowNos).attr('data-status', '1');
        }

        if (data.status == 'success') {
            alert("ok");
        } else {

            alert("else part");

        }
    }

</script>

<div class="container">
    <section>
        <div class="container minHeight">
            <aside>
                <div class="asideBG">
                    <div class="left_nav">
                        <ul class="main">
                            <li class="active"><a href="#"  ><span class="KGservices"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGpayment"> </span></a></li>
                            <li class=""><a href="#" ><span class="KGaccounts"> </span></a></li>
                        </ul>

                    </div>
                    <div class="sub_menu ">
                        <div id="accounts" class="collapse in">
                            <div class="selected_tab">Dashboard</div>
                            <ul class="l_menu_sub_menu">

                                <li class="active"><a href="/admin/dashboard"> <i class="fa fa-user"></i> Invite Friends</a>

                                </li>
                                <li><a href="/admin/manage"> <i class="fa fa-phone"></i> Invite Management</a>

                                </li>

                            </ul>
                        </div>


                    </div>
                </div>
            </aside>
            <article>
                <div class="row-fluid" style="height:480px">
                    <div class="span12">
                        <h4>Invitation Management</h4>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'manage-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            )
                        ));
                        ?>
                        <div class="paddinground">    
                            <fieldset>    
                                <table class="table table-bordered" id="userTable">
                                    <tr>
                                        <th>Email Address</th><th>Status</th>
                                    </tr>
                                        <?php
                                        if (count($userDetails) > 0) {
                                            foreach ($userDetails as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['email_address']; ?></td>
                                            <td><input id="user_<?php echo $row['Id']; ?>" data-id="<?php echo $row['Id']; ?>" data-status="<?php echo $row['status']; ?>" type="button" value=" " class="<? if ($row['status'] == '1') echo 'icon_delete'; if ($row['status'] == '0') echo 'icon_inactive'; ?>" alt="Change Status" title="Change Status"/></td>
                                        </tr>
                                        <?php  }
                                         } else {?>
                                        <tr>
                                            <td colspan="2">No Record(s) are found.</td>
                                        </tr>
                                        <?php } ?>
                                </table>
                                    <?php $this->endWidget(); ?>
                            </fieldset> 
                        </div>
                    </div>    
                </div>
            </article>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#userTable tr td input').live('click', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            statusChangeUser(Number(id), Number(status));
        });
    });
</script>



<div class="items">
        <div class="messages">
                                        <?php
                                        if (count($userDetails) > 0) {
                                            foreach($userDetails->getData() as $i => $item){
                                            //foreach ($userDetails as $row) {
                                        ?>
                                        <div class="item">
                                        <?php echo $item["email_address"]; ?>
                                        <p class="author"><?php echo $item["status"]; ?></p>
                                        <p class="message"><?php echo $item["Id"]; ?></p>
                                        </div>
                                        <?php  }?>
                                        <?php $this->widget("ext.yiinfinite-scroll.YiinfiniteScroller", array("pages" => $userDetails->pagination)); ?>
                                         <?} else {?>
                                        
                                        <?php } ?>
        </div></div>