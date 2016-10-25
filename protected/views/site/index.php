<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
    background-color: white;
   
}

    .formulario{
        width: 40%;        
        float: right;
        height: 90%;
    }
    
    .jumbotron img{
        width: 50%;
	position:absolute;
        right: 44%;
        top: 20%;
	
   }
     .imgLogeado img {
	width: 60%;
	position:absolute;
	left:16%;
        top: 25%;
	}
    
</style>
   
 
<div class="jumbotron">  
     <div class="imgLogeado">
                
            </div>
            <?php if(!$welcome && Yii::app()->user->isGuest){ ?> 
            <div class="imgNoLogeado">  
                <img src="images/SCRMTitulo.png" class="img-responsive" >
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
                <img src="images/SCRMTitulo.png" class="img-responsive" >                
            </div>
             <?php }  ?>
</div>  



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

