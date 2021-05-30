<?php require APPROOT . '/views/inc/header.php'; ?>



<table>
    <tr><th>Posts List</th></tr>
    <tr>
        <th>Month</th>
        <th>Average</th>
    </tr>
    <?php

    foreach ($data['postByMonthAvg'] as $row) {
        echo "
		     <tr>
				 <td>($row->month)</td>
				 <td>$row->average</td>
			</tr>";
    }
    ?>
</table>



<?php require APPROOT . '/views/inc/footer.php'; ?>

















