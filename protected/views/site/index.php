<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<br/>
<!-- BEGIN : HIGHCHARTS -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-graph font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Line Chart</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php
                $this->Widget('ext.highcharts.HighchartsWidget', array(
                    'options' => array(
                        'chart' => array('type' => 'spline'),
                        'title' => array('text' => 'Fruit Consumption'),
                        'subtitle' => array( 'text' => 'Source: thesolarfoundation.com'),
                        'xAxis' => array(
                            'categories' => array('Apples', 'Bananas', 'Oranges')
                        ),
                        'yAxis' => array(
                            'title' => array('text' => 'Fruit eaten')
                        ),
                        'series' => $data
                    )
                ));
                ?>
            </div>
        </div>
    </div>
</div>


