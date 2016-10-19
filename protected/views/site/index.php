 <style>    
    .jumbotron {
    position: relative;
    //background: #000 url("jumbotron-bg.png") center center;
    
    width: 100%;
    height: 75%;
    //background-size: cover;
    overflow: hidden;
    
    border-radius: 69px 69px 69px 69px;
    -moz-border-radius: 69px 69px 69px 69px;
    -webkit-border-radius: 69px 69px 69px 69px;
    border: 3px solid #4b6094;
    
    background: url("images/SCRMTitulo.png") center center;
    background-position: 10% 50%;
    background-size: 50%;
    background-repeat: no-repeat;
}

    .formulario{
        width: 40%;        
        float: right;
        height: 90%;
    }
    
    .jumbotron.imgLogeado{
        background: url("images/SCRMTitulo.png") center center;
        background-position: 10% 50%;
        background-size: 50%;
        background-repeat: no-repeat;
    }
    
    .jumbotron.imgNoLogeado{
        background: url("images/SCRMTitulo.png") center center;
        background-position: 10% 50%;
        background-size: 50%;
        background-repeat: no-repeat;
    }
    
</style>
   
 
<div class="jumbotron">             
            <?php if(!$welcome && Yii::app()->user->isGuest){ ?>
            <div class="imgNoLogeado">                 
                <div class="formulario">
                    <?php $this->renderPartial(
                            'login',
                            array(
                                'usuario'=>$usuario,
                                'error'=>$error,
                            )); ?>

                    <?php }else {  ?>
                </div>                
            </div>
            <div class="imgLogeado">
                
            </div>
             <?php }  ?>
</div>  

