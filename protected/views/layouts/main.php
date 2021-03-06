<style>
    .dropdown-submenu {
    position: relative;
}
 
.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}
 
.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}
 
.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}
 
.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}
 
.dropdown-submenu.pull-left {
    float: none;
}
 
.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

</style>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css">
       
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/icono.png" type="image/x-icon" /> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/navbar.css" rel="stylesheet">
        
    </head>
    
    

    <body>
        
        <div class="container" id="page"
>
            
            <div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->



            <?php 
    //        $self="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI']; //obtengo la URL donde estoy
    //        header("refresh:2; url=$self"); //Refrescamos cada 10 segundos


            $usuario = new Usuario();
            $usuario=Usuario::model()->find();

            ob_start(); ?>
            <?php $alarmas = ob_get_contents();

            $PREalarmas = Alarma::model()->findAllByAttributes(array('solucionado'=>'0', 'preAlarma'=>'1'));
            $alarmas = Alarma::model()->findAllByAttributes(array('solucionado'=>'0', 'preAlarma'=>'0'));
            $asiganciones = Asignarinspector::model()->findAllByAttributes(array('finalizado'=>'0'));
            ?>
          <script type="text/javascript">
              
              
              
             
              
              $(document).ready(function(){
                        setInterval(alertFunc, 3000);
                        setInterval(asignarInspector, 3000);
                        setInterval(setValoresNavbar, 3000);
    //                      setInterval(contarPREAlarmas, 3000);
    //                      setInterval(asignarCantAlarmas, 3500);
                });
                function alertFunc() {
                    $.ajax({
                        type: "POST",
                        url:    '<?php echo Yii::app()->createUrl('DetalleDispo/ValidarEstado'); ?>',
    //                    data:  {val1:1,val2:2},

                        complete: function(msg){  

                            },
                        error: function(xhr){
    //                    alert("failure"+xhr.readyState+this.url)

                        }
                      });                
                }
                function asignarInspector() {
                    $.ajax({
                        type: "POST",
                        url:    '<?php echo Yii::app()->createUrl('alarma/AsignarInspector'); ?>',
    //                    data:  {val1:1,val2:2},

                        complete: function(msg){                 

                            },
                        error: function(xhr){
    //                    alert("failure"+xhr.readyState+this.url)

                        }
                      });                
                }

                             
                function setValoresNavbar() {
                    
                    
                    <?php $PREalarmas = Alarma::model()->findAllByAttributes(array('solucionado'=>'0', 'preAlarma'=>'1'));?>
                    <?php $alarmas = Alarma::model()->findAllByAttributes(array('solucionado'=>'0', 'preAlarma'=>'0'));?>
                    
                    document.getElementById('itemAlarma').getElementsByTagName('*')[0].innerHTML="";
                    
                    var newSpan = document.createElement('span');
                    newSpan.setAttribute('class', 'glyphicon glyphicon-bell');
                    
                    var str = " Alarma (";
                    
                    var texto = document.createTextNode(str.concat(<?php echo count($PREalarmas); ?>," / ",<?php echo count($alarmas); ?>,")"));                    
                    document.getElementById('itemAlarma').getElementsByTagName('*')[0].appendChild(newSpan);
                    document.getElementById('itemAlarma').getElementsByTagName('*')[0].appendChild(texto);
                   
                    
                    <?php $asiganciones = Asignarinspector::model()->findAllByAttributes(array('finalizado'=>'0'));?>
                    document.getElementById('itemAsignacion').getElementsByTagName('*')[0].innerHTML="";
                    
                    var newSpan = document.createElement('span');
                    newSpan.setAttribute('class', 'glyphicon glyphicon-download-alt');
                    
                    var str = " Alarmas asignadas (";
                    
                    var texto = document.createTextNode(str.concat(<?php echo count($asiganciones); ?>,")"));                    
                    document.getElementById('itemAsignacion').getElementsByTagName('*')[0].appendChild(newSpan);
                    document.getElementById('itemAsignacion').getElementsByTagName('*')[0].appendChild(texto);
                    

                }               
          </script>
          
          
            
                <?php   
                    $this->widget(
                            'booster.widgets.TbNavbar', array(
                        'type' => 'inverse',
                        'brand' => 'Inicio',
                        'brandUrl' => Yii::app()->homeUrl . 'index.php',
                        'collapse' => true, // requires bootstrap-responsive.css
                        'fixed' => false,
                        'fluid' => true,
                        'items' => array(
                            array(
                                'class' => 'booster.widgets.TbMenu',
                                'submenuHtmlOptions' => array('class' => 'multi-level'), 
                                'type' => 'navbar',
            //                'htmlOptions' => array('class' => 'pull-right'), //MENU A LA IZQUIERDA
                                'items' => array(
            //                    array('label' => 'Home', 'url' => '#', 'active' => true),
            //                    array('label' => 'Link', 'url' => '#'),

                                    array(
                                        'visible' => !Yii::app()->user->isGuest,
                                        'label' => 'Dispositivo',
                                        'icon'=>'hdd',
                                        'url' => '#',
                                        'items' => array(
                                            array('label' => 'Nuevo dispositivo', 'url' => Yii::app()->homeUrl . 'Dispositivo/create'),
                                            array('label' => 'Calibrar', 'url' => Yii::app()->homeUrl . 'calibracion/create?id_disp'),
                                            array('label' => 'Habilitar Dispositivo', 'url' => Yii::app()->homeUrl . 'Dispositivo/habilitardispositivo'),
                                            array(
            //                                    'visible' => Yii::app()->user->checkAccess('admin'),
                                                'label' => 'Modificar',
                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Listar dispositivos', 'url' => Yii::app()->homeUrl . 'Dispositivo/list'),
                                                    array('label' => 'Modificar valores', 'url' => Yii::app()->homeUrl . 'Dispositivo/admin'),
                                                )
                                            ),



                                            array(
            //                                    'visible' => Yii::app()->user->checkAccess('admin'),
                                                'label' => 'Asignar Dispositivo',
                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Generar Asignacion', 'url' => Yii::app()->homeUrl . 'Histoasignacion/create'),
                                                    array('label' => 'Modificar', 'url' => Yii::app()->homeUrl . 'Histoasignacion/update'),
                                                    array('label' => 'Historial', 'url' => Yii::app()->homeUrl . 'Histoasignacion/list'),
                                                )
                                            ),
                                        )
                                    ),
                                    array(
                                        'visible' => !Yii::app()->user->isGuest,
                                        'label' => 'Empresa',
                                        'icon'=>'briefcase',
                                        'url' => '#',
                                        'items' => array(
                                            array('label' => 'Nueva Empresa', 'url' => Yii::app()->homeUrl . 'empresa/create'),
                                            array('label' => 'Nueva Sucursal', 'url' => Yii::app()->homeUrl . 'sucursal/create'),

                                            array(
                                                'visible' => !Yii::app()->user->isGuest,
                                                'label' => 'Sucursales',
                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Listar Sucursales', 'url' => Yii::app()->homeUrl . 'sucursal/index'),
                                                    array('label' => 'Modificar valores', 'url' => Yii::app()->homeUrl . 'sucursal/admin'),

                                                )
                                            ),

                                             array(
                                                'visible' => !Yii::app()->user->isGuest,
                                                'label' => 'Empresas',
                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Listar Empresas', 'url' => Yii::app()->homeUrl . 'empresa/list'),
                                                    array('label' => 'Modificar valores', 'url' => Yii::app()->homeUrl . 'empresa/admin'),                                    

                                                )
                                            ),



                                        )
                                    ),
                                    array(
                                        'label' => 'Mapa',
                                        'icon'=>'globe',
                                        'url' => Yii::app()->homeUrl . 'Histoasignacion/viewmap',
                                        'visible' => !Yii::app()->user->isGuest
                                    ),
                                    array(
                                        'id'=>'alarma',
                                        'label' => 'Alarma (' . count($PREalarmas) . ' / ' . count($alarmas) . ')',
                                        'icon'=>'bell',
                                        'url' => array('/alarma/admin'),
                                        'visible' => !Yii::app()->user->isGuest,
                                        'itemOptions'=>array('id' => 'itemAlarma')
                                        ),
                                    array(
                                        'label' => 'Alarmas asigandas (' . count($asiganciones) . ')',
                                        'icon'=>'download-alt',
                                        'url' => Yii::app()->homeUrl . 'asignarinspector/index',
                                        'visible' => !Yii::app()->user->isGuest,
                                        'itemOptions'=>array('id' => 'itemAsignacion')
                                    ),

                                    array(
                                        'visible' => !Yii::app()->user->isGuest,
                                        'label' => 'Configuracion',
                                        'icon'=>'cog',
                                        'url' => '#',
                                        'items' => array(
                                            array(
                                                'visible' => !Yii::app()->user->isGuest,
                                                'label' => 'Alarma',

                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Parametros', 'url' => Yii::app()->homeUrl . 'configalarma/create'),
                                                )
                                            ),
                                            array(
                                                'label' => 'Usuario',
                                                'visible' => !Yii::app()->user->isGuest,
                                                'url' => '#',
                                                'items' => array(
                                                    array('label' => 'Nuevo Usuario', 'url' => Yii::app()->homeUrl . 'usuario/create'),                                
                                                    array('label' => 'Generar Permisos', 'url' => Yii::app()->homeUrl . "usuario/index/rol/0"),
                                                    array('label' => 'Listar Usuario', 'url' => Yii::app()->homeUrl . 'usuario/index'),
                                                    array('label' => 'Modificar valores', 'url' => Yii::app()->homeUrl . 'usuario/admin'),
                                                )
                                            ),
                                            array('label' => 'Niveles de Menu', 'url' => Yii::app()->homeUrl . 'nivelesmenu/admin'),                                
                                        )
                                    ),
                                    array(
                                        'label' => 'Ayuda',
                                        'visible' => !Yii::app()->user->isGuest,
                                        'url' => '#',
                                        'icon'=>'flag',
                                        'items' => array(
                                            array('label' => 'Acerca de', 'url' => array('site/about#openModal')),
                                            array('label' => 'Contáctenos', 'url' => Yii::app()->homeUrl . "site/contact"),  
                                            array('label' => 'Manual del Usuario', 'url' => Yii::app()->homeUrl . "manualusuario.pdf"),
                                        )
                                    ),


                                    array(
                                        'label' => 'Cerrar sesión (' . Yii::app()->user->name . ')',
                                         'icon'=>'user',
                                        'url' => array('/site/logout'),
                                        'visible' => !Yii::app()->user->isGuest),
                                        'itemOptions'=>array('class'=>'pull-right'),


                                ),
                            ),
                        ),
                            )
                    );
                    ?>
            
            
            <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'homeLink'=>CHtml::link('Inicio', array('site/index')),
                'links'=>$this->breadcrumbs,
            ));?>
		
            <?php endif?>

            <?php echo $content; ?>

            <div class="clear"></div>
                    
    

            <div id="footer">
                <div class="container">
                        Copyright &copy; <?php echo date('Y'); ?> by Marcos Role.<br/>
                        <a href=<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/SCRM/site/contact"?>>Contátenos.</a> 		
                </div>
            </div><!-- footer -->        
    </div><!-- page -->           
    
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/bootstrap.min.js"></script>             
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/navbar.js"></script>             
    
                
                </body>
                </html>
