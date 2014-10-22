<div class=container>
<h3>Credit Card Hotlist</h3>
<form action="authenticate/DeleteHotlist.php" method="post">
    <table cellspacing="10">
        <tbody>
        <?php 
            $loopCnt = 1;
            foreach ($ccHotlist as $creditcard) 
            { 
                if( $loopCnt > 3 )
                {   
                    echo "<tr>";
                }
        ?>
        <td width=33%>
            <input  type="checkbox" name="hotlistitem[]" 
                    value=<?php echo $creditcard->credit_card_number; ?> />
            <?php echo $creditcard->credit_card_number; ?> 
        </td>
                        
        <?php 
                if( $loopCnt > 3 )
                {   
                    echo "</tr>";
                    $loopCnt = 0;
                }
                $loopCnt++;
            }
            if( $loopCnt > 3 )
            {   
                echo "<tr>";
            }
        ?>
        </tbody>
    </table>
<input  type="submit"   value="Delete Credit Card" /> 
</form>
</div>
<div class=container>
<h3>Add Credit Card to Hotlist</h3>
<form action="authenticate/AddHotlist.php" method="post">

    Name:<input  type="text" name="credit_card_name" >Number:<input  type="text" name="credit_card_number"><br />

    <input  type="submit"   value="Add Credit Card" /> 
</form>

</div>

