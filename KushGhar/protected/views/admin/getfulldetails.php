
<table style="padding: 20px; ">
        <tr><td>Name</td><td>:</td><td><?php echo $userAllDetails['UserName']; ?></td></tr>
        <tr><td>Email </td><td>:</td><td><?php echo $userAllDetails['email_address']; ?></td></tr>
        <tr><td>Phone </td><td>:</td><td> <?php echo $userAllDetails['phone']; ?></td></tr>
        <tr><td>Address </td><td>:</td><td> <?php echo $userAllDetails['Location']; ?></td></tr>
        <tr><td>Registered On </td><td>:</td><td><?php $datee = explode(" ",$userAllDetails['create_timestamp']);echo $datee[0]; ?></td></tr>
        <tr><td>Status </td><td>:</td><td>
    <?php 
        if($userAllDetails['status']==1){$status = 'Active';} 
        if($userAllDetails['status']==0){$status = 'InActive';} 
        echo $status; ?></td>
    
    </tr>
    </table>
    