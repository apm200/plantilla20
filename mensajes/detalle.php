<h1><?php echo $title ?></h1>


<script type="text/javascript">
var t_ini = new Date();
</script>
<?php echo  enlaces ( $enviados, $usuario, $mensaje, $url_back_esc ) ?>
<p></p>

<center>
<table class="table table-bordered">
    <tr class="active">
    	<td width=50%>Mensaje <?php if ($enviados==false) echo "de"; else echo "para"; ?>:  <?php echo $this->estilo->NickSeriedad ($usuario->nick_mostrar, $usuario->total_pos, $usuario->total_neg, $usuario->seriedad,
							$usuario->socio, $usuario->ultimo_login,$usuario->velocidad,$usuario->pais_id ) ?></td>
    	<td width=50%>Enviado el: <?php echo $this->estilo->PintaFechaHora($mensaje[0]["f_alta"]) ?></td>
    </tr>
     <tr class="active">
    <td colspan="2"><strong>Asunto:</strong> <?php echo $mensaje[0]["asunto"] ?></td>
    </tr>
    <tr>
    <td colspan="2"><?php echo nl2br($mensaje[0]["texto"]) ?></td>
    </tr>
    </table>
    <p></p>
   

</center>

				
            
            <p class="botonera">

			
		<button class="btn btn-default"> <i class="glyphicon glyphicon-chevron-left"></i> <?php echo $link_back; ?></button>
            
       
<?php
function enlaces ( $enviados, $usuario, $mensaje, $url_back_esc ) {

	echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"]),	'<button class="btn btn-default">Responder</button>',array('class'=>'back')) ;

	if ($enviados==false) {
		 echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],1),'<button class="btn btn-success btn-outline">Aceptar Cambio</button> ',array('class'=>'back')) ;
		?>
		
		
		<div class="btn-group">
		<button class="btn btn-danger btn-outline dropdown-toggle" data-toggle="dropdown">Rechazar Cambio</button>
		
		<ul class="dropdown-menu" role="menu">
    <li><?php echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],-1),'Sin motivo',array('class'=>'back')).'  ' ; ?></li>
    <li><?php echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],-2),'Distinta colecci&oacute;n',array('class'=>'back')).' ' ; ?></li>
    <li><?php echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],-3),'Pocos cromos',array('class'=>'back')).'  ' ; ?></li>
    <li><?php echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],-4),'Estoy negociando',array('class'=>'back')).'  ' ; ?></li>
    <li><?php echo anchor (array ( 'mensajes','Nuevo',$usuario->nick_mostrar,$mensaje[0]["id"],-5),'Descompensado',array('class'=>'back')).'  ' ; ?></li>
    
  </ul>
  </div>
  
  
  
  
            
            
            
            
		<?php
		 switch ($mensaje[0]["estado"]) {
			 case 0:
				echo anchor (array ( 'mensajes','MoverMensaje',$mensaje[0]["id"],2,$url_back_esc),
						'<button class="btn btn-default">Negociando',array('class'=>'back','title'=>'Mover mensaje a la carpeta negociando')).' </button> ';
				echo anchor (array ( 'mensajes','MoverMensaje',$mensaje[0]["id"],4,$url_back_esc),
						'<button class="btn btn-default">Esperando',array('class'=>'back','title'=>'Mover mensaje a la carpeta esperando')).' </button> ';

				break;
			 case 1:
				echo anchor (array ( 'mensajes','MoverMensaje',$mensaje[0]["id"],0,$url_back_esc),
						'<button class="btn btn-default">Mover a Bandeja de Entrada',array('class'=>'back','title'=>'Mover mensaje a la bandeja de entrada')).' </button> ';
				break;
			 case 2:
				echo anchor (array ( 'mensajes','MoverMensaje',$mensaje[0]["id"],4,$url_back_esc),
						'<button class="btn btn-default">Pasar a Esperando',array('class'=>'back','title'=>'Mover mensaje a la carpeta Esperando')).' </button> ';
				break;
		 }
	}
	if ($enviados==false) {
		echo anchor (array ( 'mensajes','BorrarMensaje',
					$mensaje[0]["id"],$url_back_esc ),
			'<button class="btn btn-default">Borrar',array('class'=>'back','title'=>'Mover mensaje a la papelera')). ' </button> ' ;
	} else {
		echo anchor (array ( 'mensajes','BorrarMensaje',
					$mensaje[0]["id"],$url_back_esc ),
			'<button class="btn btn-default">Borrar',array('class'=>'back')). ' </button> ' ;
	}
	if ($enviados==true ||  $mensaje[0]["estado"]!='S') {
		// Si es un mensaje de Spam no podemos meter al usuario en lista negra
		echo anchor (array ( 'social','ListaNegraCrear',
					$usuario->nick ),
			'<button class="btn btn-default">Ignorar Usuario',array('class'=>'back')). ' </button> ' ;
	}



}
?>

