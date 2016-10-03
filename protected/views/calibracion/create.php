<head>  
  <style>
  .modal-header, h4, .close {
      background-color: #19A3FF;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #19A3FF;
  }
  </style>
</head>

<?php
/* @var $this CalibracionController */
/* @var $model Calibracion */

$this->breadcrumbs=array(
    'Dispositivos'=>array('dispositivo/list'),
	'Calibrar dispositivo',
);

$this->menu=array(
	array('label'=>'Listar Calibraciones', 'url'=>array('list')),
);
?>

<?php
    $this->widget('booster.widgets.TbAlert', array(
        'fade' => true,
        'closeText' => '&times;', // false equals no close link
        'events' => array(),
        'htmlOptions' => array(),
        'userComponentId' => 'user',
        'alerts' => array(// configurations per alert type
            // success, info, warning, error or danger
            'success' => array('closeText' => '&times;'),
            'info', // you don't need to specify full config
            'warning' => array('closeText' => false),
            'error' => array('closeText' => false),
        ),
    ));
?>

<h1>Calibracion de Dispositivo</h1>
<p class="note">Seleccione un dispositivo a calibrar.</p>
<p> <i>Si el dispositivo no se encuentra en la lista, por favor asigne el dispositivo a una sucursal.</i> <a href=<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/SCRM/Histoasignacion/create"?>>Haga clic aquí </a> </p>
<div class="row">
            <?php 
                $this->widget('booster.widgets.TbExtendedGridView', array(
                    'id' => 'dispositivo-grid-list',
                    'dataProvider' => $DataProviderCalibracion,
                    'responsiveTable' => true,
                    'fixedHeader' => true,
                     'summaryText'=>'Pagina {start}-{end} de {count} desultados.',
                    'columns' => array(
                        array(
                            'name'  => 'id',
                            'value' => 'CHtml::link($data["id"], Yii::app()
                                ->createUrl("DetalleDispo/VerDetalle",array("id"=>$data["id"])))',
                            'type'  => 'raw',                            
                            'header'=>'Nro. Identificación'
                        ),
                        array(
                            'name' => 'mac',
                            'header'=>'MAC'
                        ),
                         array(
                            'name' => 'sucursal',
                            'header'=>'Sucursal'
                        ),
                         array(
                            'name' => 'calibrado',
                            'header'=>'Calibrado'
                        ),
                        
                        array(
                            'class' => 'booster.widgets.TbButtonColumn',
                           // 'htmlOptions' => array('width' => '40'), //ancho de la columna
                            'template' => '{calibrar}', // botones a mostrar
                            'buttons'=>array(
                                "calibrar"=>array(
                                    'label'=>'Calibrar',
                                    'icon'=>'glyphicon glyphicon-stats',  
                                     'url'=> 'Yii::app()->createUrl("Calibracion/create", array("id_disp"=> ' . '$data["id"])) ',
                                  
                                        'options'=>array(
                                            'ajax'=>array(
                                                'type'=>'POST',
                                                'url'=>"js:$(this).attr('href')",
                                                'success'=>'function(data) { $("#myModal .modal-body").html(data); $("#myModal").modal(); }'
                                            ),
                                        ),
                                    
                                    )),
                        ),
                    ),
                ));
            ?> 
	</div>


<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'myModal')); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4> Calibrar </h4>
    </div>
    <div class="modal-body">

    </div>
    <div class="modal-footer">

    </div>

<?php $this->endWidget(); ?>

