<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?=ucfirst(Yii::app()->controller->id)?> Report</title>

    <style type="text/css">
        @page { margin: 10px 30px 10px 20px; }
        body, table th, td{ font-size: 11px; font-family: sans-serif; }
        #header { text-align: center; }
        #content{ background-color:#FFFFFF; }
        #footer { bottom: 30px; font-size: 11px; font-family: sans-serif; text-align:right; }	
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
</head>

<?php
    $user = User::model()->findByPk(Yii::app()->user->id);
?>

<body>
    <table width="100%" cellpadding="2" cellspacing="0">
        <tr>
            <td width="50%" align="left"><b><?=Yii::app()->params['company']?></b></td>
            <td width="50%" align="right">Created : <b><?=ucfirst($user->profile->firstname)?></b> | Print Time : <b><?=date('d F Y H:i:s')?></b></td>
        </tr>
    </table>
    <hr/>
    <div id="header">
        <h2><?=strtoupper(Yii::app()->controller->id)?> REPORT</h2>
    </div>
    <div id="content" style="text-align:center;">
            
        <table width="100%" cellpadding="3" style="border-collapse: collapse; border-spacing: 0;">
            <tr>
                <th style="border-bottom: 1px solid #000;">No</th>
                <th style="border-bottom: 1px solid #000;">Brand Name</th>
                <th style="border-bottom: 1px solid #000;">Brand Type</th>
                <th style="border-bottom: 1px solid #000;">Date Created</th>
                <th style="border-bottom: 1px solid #000;">Created By</th>
            </tr>
            <?php
            if(count($data) > 0){
                $no = 1;
                foreach ($data as $row) {
                    echo 
                    '<tr>' .
                        '<td style="border-bottom: 1px solid #000;" align="center">' . $no++ . '</td>' .
                        '<td style="border-bottom: 1px solid #000;">' . $row['brand_name'] . '</td>' .
                        '<td style="border-bottom: 1px solid #000;">' . $row['brand_type'] . '</td>' .
                        '<td style="border-bottom: 1px solid #000;" align="center">' . $row['time_created'] . '</td>' .
                        '<td style="border-bottom: 1px solid #000;">' . $row['user_created'] . '</td>' .
                    '</tr>';
                }
            }
            else{
                echo '<tr>
                        <td style="border-bottom: 1px solid #000;margin: 0px" align="center" colspan="5">No Data Available.</td>
                    </tr>';
            }
            ?>

        </table>

    </div>
</body>
</html>
