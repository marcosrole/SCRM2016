

<div class="form">    
    <?php $form= $this->beginWidget('booster.widgets.TbActiveForm',array('id' => 'verticalForm',)); ?>
    <div class="label_original">
        <h2>Dispositivo: <?php echo $dispositivo_original ?> </h2>            
    </div>
    <div class="dato_nuevo">
        <?php 
                $this->widget('booster.widgets.TbGridView', array(
                    'id' => 'empresa-grid-list',
                    'dataProvider' => $dataProviderDispositivo,
                    'filter' => $dispositivo,
                    'columns' => array(                        
                        array(
                            'name' => 'id',
                            'header'=>'ID',                                                        
                        ),
                        array(
                            'name' => 'mac',
                            'header'=>'MAC'
                        ),
                         array(
                            'id' => 'selectedDispositivo',
                            'class' => 'CCheckBoxColumn',
                            'selectableRows' => 1, //Numero de filas que se pueden seleccionar
                        ),                        
                    ),
                    
                ));                
            ?>   
    </div>
    <div class="dato_nuevo">
        <?php echo $form->textAreaGroup(
			$histoasignacion,
			'observacion',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				)
			)
		); ?>
    </div>
    
       
    <div class="boton">
        <?php $this->widget('booster.widgets.TbButton', 
                array(
                    'label' => 'Actualizar',
                    'context' => 'success',                    
                    'buttonType'=>'submit', 
                    
                    )); 
        ?>        
    </div>
    <?php $this->endWidget(); ?>    
</div>

