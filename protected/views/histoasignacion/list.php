<?php
/* @var $this HistoasignacionController */
/* @var $model Histoasignacion */

$this->breadcrumbs=array(
	'Histoasignacions'=>array('index'),
	
);

$this->menu=array(
	
	array('label'=>'Generar Asignacion', 'url'=>array('create')),
//	array('label'=>'Update Histoasignacion', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Histoasignacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Asignaciones', 'url'=>array('update')),
        
);
?>

<div class="form">    
    <?php $form= $this->beginWidget('booster.widgets.TbActiveForm',array('id' => 'verticalForm',)); ?>            
    <div class="campo">
        <?php 
                $this->widget('booster.widgets.TbGridView', array(
                    'id' => 'dispositivo-grid-list',
                    'dataProvider' => $dataProviderHistoAsig,
                    'summaryText'=>'Página {page}-{pages} de {count} resultados.',
                    'columns' => array(                        
                        array(
                            'name' => 'dispositivo',
                            'header'=>'Dispositivo',                                                       
                        ), 
                        array(
                            'name' => 'sucursal',
                            'header'=>'Sucursal',                                                       
                        ), 
                        array(
                            'name' => 'empresa',
                            'header'=>'Empresa',                                                       
                        ), 
                        array(
                            'name' => 'fechaAlta',
                            'header'=>'Fecha de Alta',
                            'value' => 'Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($data["fechaAlta"]))'
                        ),
                        array(
                            'name' => 'fechaModif',
                            'header'=>'Fecha de Modificacion',
                            'value' => 'Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($data["fechaModif"]))'
                        ),
                        array(
                            'name' => 'fechaBaja',
                            'header'=>'Fecha de Baja',
                            'value' => 'Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($data["fechaBaja"]))'
                        ),
                        array(
                            'name' => 'observacion',
                            'header'=>'Obervaciones'
                        ),                                                 
                    ),                    
                ));                
            ?> 
    </div>    
        <?php $this->endWidget(); ?>
        
    </div>
