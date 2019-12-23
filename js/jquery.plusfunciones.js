$(function() {
		/*------------------------------------------------------*/
		/* FUNCIONES JQUERY - GIOVANNY TATIFEÑO - PLUSWEB.CL    */
		/*------------------------------------------------------
				
		/*------------------------------------------------------
		Maneja Carruosel */
		
		if ($('#carrousel_1').length)
		{

			$("#carrousel_1").carouFredSel({
				circular: true,
				infinite: true,
				auto 	: true,
				scroll	: {
					items	: "page"
				},
				prev	: {	
					button	: "#carrousel_1_prev",
					key		: "left"
				},
				next	: { 
					button	: "#carrousel_1_next",
					key		: "right"
				}
			});
			
		}

		if ($('#carrousel_2').length)
		{

			$("#carrousel_2").carouFredSel({
				circular: true,
				infinite: true,
				auto 	: false,
				scroll	: {
					items	: "page"
				},
				prev	: {	
					button	: "#carrousel_2_prev",
					key		: "left"
				},
				next	: { 
					button	: "#carrousel_2_next",
					key		: "right"
				}
			});
			
		}		

		if ($('#carrousel_3').length)
		{

			$("#carrousel_3").carouFredSel({
				circular: true,
				infinite: true,
				auto 	: false,
				scroll	: {
					items	: "page"
				},
				prev	: {	
					button	: "#carrousel_3_prev",
					key		: "left"
				},
				next	: { 
					button	: "#carrousel_3_next",
					key		: "right"
				}
			});
			
		}

		if ($('#carrousel_4').length)
		{

			$("#carrousel_4").carouFredSel({
				circular: true,
				infinite: true,
				auto 	: false,
				scroll	: {
					items	: "page"
				},
				prev	: {	
					button	: "#carrousel_4_prev",
					key		: "left"
				},
				next	: { 
					button	: "#carrousel_4_next",
					key		: "right"
				}
			});
			
		}		
	    /*----------------------------------------------------
	    Fancybox para Iframes*/
	    $("a.iframe").fancybox({
				fitToView	: true,
				autoSize	: true,				
				width		: '90%',
				height		: '90%',
				closeClick	: true,
				openEffect	: 'fade',
				closeEffect	: 'elastic',
	    		type		: 'iframe',
	    		title		: false
	    	});	
	    
		$("a.popup").fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'elastic',
				closeEffect	: 'elastic'	
		});
				

	    $("a.clickcall").fancybox({
				fitToView	: true,
				autoSize	: true,				
				width		: 590,
				height		: 410,
				closeClick	: true,
				openEffect	: 'fade',
				closeEffect	: 'elastic',
	    		type		: 'iframe',
	    		scrolling	: 'no',
	    		padding		: 0,
	    		margin 		: 0
	    	});	

		$("a.fancybox").fancybox({
				closeClick	: true,
				autoSize	: false,	
				openEffect	: 'fade',
				closeEffect	: 'elastic',
				nextEffect	: 'none',
				prevEffect	: 'none',
				openSpeed	: 700,
				nextSpeed	: 500,
				prevSpeed	: 500,
				width		: 500,
				height		: 350
		});
		/*-------------------------------------------------*/

		if ($('#slider').length)
		{	    
			$('#slider').nivoSlider({effect: 'fade',pauseTime: 6000});
	    }

	    /*----------------------------------------------------
	    Valida fecha de nacimiento */ 
		if ($('#cliente_fecnac').length)
		{
			$('#cliente_fecnac').on('blur', function() {
			    if ( validaFechaDDMMAAAA( $('#cliente_fecnac').val() )==false) 
			    {
				    alert("Fecha de Nacimiento ingresada es incorrecta, ocupe formato: DD/MM/AAAA");
			    };
			    
			});
		} 
		
	    /*-------------------------------------------------
	    Maneja efectos de tooltiptext */		
		$('.tooltip').tipsy({gravity: $.fn.tipsy.autoNS, fade: true}); //$.fn.tipsy.autoNS
		
	    /*-------------------------------------------------
	    Inicia Tab */
	    $(".tab_content").hide();
	    $("ul.tabs li a:first").addClass("active").show();
	    $(".tab_content:first").show();
	
	    $("ul.tabs li").click(function()
	    {
	    	$("ul.tabs li a").removeClass("active");
	    	$(this).find("a").addClass("active");
	    	$(".tab_content").hide();
	
	    	var activeTab = $(this).find("a").attr("href");
	    	if (activeTab.substr(0, 1)=="#")
	    	{
	    	$(activeTab).fadeIn();
	    	return false;
	    	}
	    });
	    
    	/*-------------------------------------------------
	    Inicia Cortinas de Portada */	
		$(".FeaturedLinks").bind({
		    mouseenter: function(e) {
		    	e.preventDefault();	
		            $(this).find(".texto").stop().animate({
		        "margin-top": "-1px",
		        "height": "164px"
		      },100);
		    },
		    mouseleave: function(e) {
			  e.preventDefault();	  
		      $(this).find(".texto").stop().animate({
		        "margin-top": "145px",
		        "height": "18px"
		      },100);
		    }
		  });
		  
	    /*----------------------------------------------------
	    Inicia Mensajes Informativos (alert) */		
	    var $alert = $('#alert');
		if($alert.length)
		{
			var alerttimer = window.setTimeout(function () {
				$alert.trigger('click');
			}, 4000);
			$alert.animate({height: $alert.css('line-height') || '80px'}, 500)
			.click(function () {
				window.clearTimeout(alerttimer);
				$alert.animate({height: '0'}, 300);
			});
		}		
		
		$('#productosRelacionados').slimscroll({
		  height: '370px'
		}); 

		/* Rut Cliente en Registro */
		if($('#cliente_rut').length){
			
            $("#cliente_rut").Rut({
            	format: false,
                on_error: function () {
                    $("#cliente_rut_error").html("Ingrese un RUT válido, Ej.: 15098123-K");
                    $("#cliente_rut_error").addClass('vanadium-advice');
                    $("#cliente_rut_error").addClass('vanadium-invalid');
                    
                    $("#cliente_rut").addClass('vanadium-invalid');
                    $("#cliente_rut").focus();
                },
                on_success: function() {
                	$("#cliente_rut_error").html("");

					//---Verifica que el rut tenga guion
					if($('#cliente_rut').val().indexOf('-') == -1){
						
		                $("#cliente_rut_error").html("Falta el guión en el RUT, Ej.: 15098123-K");
		                $("#cliente_rut_error").addClass('vanadium-advice');
		                $("#cliente_rut_error").addClass('vanadium-invalid');
		                
		                $("#cliente_rut").addClass('vanadium-invalid');
		                $("#cliente_rut").focus();
		                return false;
		                
					}
					                	
                }
            });
        }

		/* Rut Empresa en Registro */
		if($('#cliente_empresa_rut').length){
            $("#cliente_empresa_rut").Rut({
            	format: false,
                on_error: function () {
                    $("#cliente_empresa_rut_error").html("Ingrese un RUT válido, Ej.: 76223987-K");
                    $("#cliente_empresa_rut_error").addClass('vanadium-advice');
                    $("#cliente_empresa_rut_error").addClass('vanadium-invalid');
                    
                    $("#cliente_empresa_rut").addClass('vanadium-invalid');
                    $("#cliente_empresa_rut").focus();
                },
                on_success: function() {
                	$("#cliente_empresa_rut_error").html("");
                	
					//---Verifica que el rut tenga guion
					if($('#cliente_empresa_rut').val().indexOf('-') == -1){
						
		                $("#cliente_empresa_rut_error").html("Falta el guión en el RUT, Ej.: 76223987-K");
		                $("#cliente_empresa_rut_error").addClass('vanadium-advice');
		                $("#cliente_empresa_rut_error").addClass('vanadium-invalid');
		                
		                $("#cliente_empresa_rut").addClass('vanadium-invalid');
		                $("#cliente_empresa_rut").focus();
		                return false;
		                
					}
					                	
                }
            });
        }        
        

	    /*----------------------------------------------------
	    Muestra sitio segun la seleccion del pais del usuario */		
	    $('#selecciona-pais').bind('change', function () {
	          var url = $(this).val(); // get selected value
	          if (url) { // require a URL
	              window.location = url; // redirect
	          }
	          return false;
	    });		 
			
 		
});    

function agregar_carro(id, url, cantidad, accion)
{	
	
	//Rescata Cantidad de Productos
	if ($('#productoCantidad').length)
	{
		var can = $("#productoCantidad").val();
	}else{
		var can = cantidad;
	}
				
	jQuery.ajax({
			url: url+'global/gl-ajax.php',
			beforeSend: function(objeto){
				 jQuery("#loadingcarro").show();
			},
			complete: function(objeto, exito){
				jQuery("#loadingcarro").hide(); 
			},			
			type: 'post',
			dataType: "json",
			data: 'accion=carrito&id='+id+'&can='+can,
			error: function(objeto, quepaso, otroobj){
				var title	= 'Carro de Compra';
				var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+quepaso+'</span><center>';
				new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});	
			},			
			success: function(data)
			{
				if (data!="")
				{
					var title	= 'Carro de Compra';
					var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+data+'</span><center>';
					new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});		
				}	
				if (data=="")
				{
					
					//---Actualiza numero de productos en el carro
					$("#carroCAN").html( parseInt( $("#carroCAN").html() ) +  parseInt(can) );
					$(".carrito").prop('title', 'Tiene '+ parseInt( $("#carroCAN").html() ) +' productos en su carro de compras');;
					$(".carrito").prop('href', '/carro-cliente.html');

					
					if (accion=="ADD")
					{
					var title	= 'Producto agregado al carro';
					var msg 	= '<br/><img src="'+url+'css/images/ico-carrocompra.png" align="left" style="margin-left:25px"/><br/><center><img src="'+url+'css/images/ico-mini-atras.gif" align="absmiddle"/> <a href="#" onclick="javascript:$(\'.messi,.messi-modal\').remove(); return false">Agregar más Productos </a> | <a href="'+url+'carro-cliente.html">Ir al Carro de Compras</a> <img src="'+url+'css/images/ico-mini-adelante.gif" align="absmiddle"/></center><br/><br/>';
					
					new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'success', animate: { open: 'bounceInLeft', close: 'bounceOutRight' }, buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});	
					}else{
						//Actualiza el Carro
						location.href=url+'carro-cliente.html';	
					}				
				}																	
			},
			timeout: 50000
		});	
		
}	

function borrar_producto(id, url)
{
	var title	= 'Carro de Compra';
	var msg 	= '<p><center><span style="font-size:18px">¿Seguro que desea eliminar el producto del carro?</span><br/><center></p>';
	new Messi(msg, {title: title,  animate: { open: 'bounceInLeft', close: 'bounceOutRight' }, titleClass: 'success', buttons: [{id: 0, label: 'Si', val: 'S', class: 'btn-success'}, {id: 1, label: 'No', val: 'N', class: 'btn-danger'}], callback: function(val)
	{	
	
	if (val=="S") //Si la respuesta es SI desea eliminar el producto del carro.
		{
		jQuery.ajax({
				url: url+'global/gl-ajax.php',
				beforeSend: function(objeto){
					 jQuery("#loadingcarro").show();
				},
				complete: function(objeto, exito){
					jQuery("#loadingcarro").hide(); 
					if(exito=="success")
					{					
						location.href=url+'carro-cliente.html';		
					}
				},			
				type: 'post',
				dataType: "json",
				data: 'accion=borrar_producto&id='+id,
				error: function(objeto, quepaso, otroobj){
					var title	= 'Carro de Compra';
					var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+quepaso+'</span><center>';
					new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});	
				},			
				success: function(data)
				{
					if (data!="")
					{
						var title	= 'Carro de Compra';
						var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+data+'</span><center>';
						new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});									
					}																		
				},
				timeout: 30000
			});	
		 }
	 	
	 }});		
}

function vaciar_carro(url)
{
	var title	= 'Vaciar Carro de Compra';
	var msg 	= '<p><center><span style="font-size:20px">¿Seguro que desea Vaciar el Carro de Compra?</span><br/><center></p>';
	new Messi(msg, {title: title, titleClass: 'success', buttons: [{id: 0, label: 'Si', val: 'S', class: 'btn-success'}, {id: 1, label: 'No', val: 'N', class: 'btn-danger'}], callback: function(val)
	{	
	
	if (val=="S") //Si la respuesta es SI desea vaciar el carro.
		{
		jQuery.ajax({
				url: url+'global/gl-ajax.php',
				beforeSend: function(objeto){
					 jQuery("#loadingcarro").show();
				},
				complete: function(objeto, exito){
					jQuery("#loadingcarro").hide(); 
					if(exito=="success")
					{
						location.href= url+'carro-cliente.html';		
					}
				},			
				type: 'post',
				dataType: "json",
				data: 'accion=vaciar_carrito',
				error: function(objeto, quepaso, otroobj){
					var title	= 'Carro de Compra';
					var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+quepaso+'</span><center>';
					new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});	

				},			
				success: function(data)
				{
					if (data!="")
					{
						var title	= 'Carro de Compra';
						var msg 	= '<center><span style="color:#E14E4E; font-size:18px">Error: '+data+'</span><center>';
						new Messi(msg, {modal: true, modalOpacity:'.4', title: title, titleClass: 'error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});					
					}																		
				},
				timeout: 30000
			});			

		 }
	 	
	 }});

}	

/*-------------------------------------------------
Maneja Placeholder en IEs */		
$('input[placeholder], textarea[placeholder]').placeholder();

/*-------------------------------------------------
Valida fechas  */		
function validaFechaDDMMAAAA(fecha){
	var dtCh= "/";
	var minYear=1900;
	var maxYear=2100;
	function isInteger(s){
		var i;
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (((c < "0") || (c > "9"))) return false;
		}
		return true;
	}
	function stripCharsInBag(s, bag){
		var i;
		var returnString = "";
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
			if (bag.indexOf(c) == -1) returnString += c;
		}
		return returnString;
	}
	function daysInFebruary (year){
		return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
	}
	function DaysArray(n) {
		for (var i = 1; i <= n; i++) {
			this[i] = 31
			if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
			if (i==2) {this[i] = 29}
		}
		return this
	}
	function isDate(dtStr){
		var daysInMonth = DaysArray(12)
		var pos1=dtStr.indexOf(dtCh)
		var pos2=dtStr.indexOf(dtCh,pos1+1)
		var strDay=dtStr.substring(0,pos1)
		var strMonth=dtStr.substring(pos1+1,pos2)
		var strYear=dtStr.substring(pos2+1)
		strYr=strYear
		if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
		if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
		for (var i = 1; i <= 3; i++) {
			if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
		}
		month=parseInt(strMonth)
		day=parseInt(strDay)
		year=parseInt(strYr)
		if (pos1==-1 || pos2==-1){
			return false
		}
		if (strMonth.length<1 || month<1 || month>12){
			return false
		}
		if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
			return false
		}
		if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
			return false
		}
		if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
			return false
		}
		return true
	}
	if(isDate(fecha)){
		return true;
	}else{
		return false;
	}
}

/*-------------------------------------------------
 Inicia notificaciones push */
var OneSignal = window.OneSignal || [];
OneSignal.push(["init", {
	appId: '8eeb6fbf-6712-44a0-b9ce-54aa4f6c456c',
	safari_web_id: 'web.onesignal.auto.3182d724-6e8d-450b-a283-f7f35292ae01', 
	autoRegister: true, 
	persistNotification: false,
		
	/* notificacion de bienvenida */
	welcomeNotification:{
		title: 'tablerosginesjara.cl',
		message: 'Gracias por suscribirte',
		url: '127.0.0.1'  
	},
         
	notifyButton: {
		enable: true, 
		position: 'bottom-left', 
		theme: 'default', 
		size: 'medium',
		prenotify: true,
		showCredit: false,
		text: {
			'tip.state.unsubscribed': 'Suscribete para recibir notificaciones',
			'tip.state.subscribed': "Ya estás suscrito a notificaciones",
			'tip.state.blocked': "Bloqueaste las notificaciones",
			'message.prenotify': 'Haz click para recibir notificaciones',
			'message.action.subscribed': "Gracias por suscribirte!",
			'message.action.resubscribed': "Ya estás suscrito a notificaciones",
			'message.action.unsubscribed': "No volverás a recibir notificaciones",
			'dialog.main.button.subscribe': 'SUSCRIBETE',
			'dialog.main.title': 'ADMINISTRADOR DE NOTIFICACIONES',
			'dialog.main.button.unsubscribe': 'CANCELAR SUSCRIPCIÓN',
			'dialog.blocked.title': 'Desbloquear notificaciones',
			'dialog.blocked.message': "Sigue estas instrucciones para bloquear las notificaciones"
		},
		
	    colors: { // Customize the colors of the main button and dialog popup button
			'circle.background': 'rgb(152,202,2)',
			'circle.foreground': 'white',
			'badge.background': 'rgb(152,202,2)',
			'badge.foreground': 'white',
			'badge.bordercolor': 'white',
			'pulse.color': 'white',
			'dialog.button.background.hovering': 'rgb(152,202,2)',
			'dialog.button.background.active': 'rgb(152,202,2)',
			'dialog.button.background': 'rgb(152,202,2)',
			'dialog.button.foreground': 'white'
		},
  	},
	promptOptions: {
		//actionMessage: "quiere enviarte notificaciones...",
		acceptButtonText: "Aceptar",
		cancelButtonText: "No, gracias",
		//siteName: '',
		//exampleNotificationTitle: "",
		exampleNotificationMessage: "Este es un ejemplo de notificación",
		exampleNotificationCaption: "Puedes desuscribirte cuando quieras",        
		acceptButtonText: "Aceptar",
		cancelButtonText: "No, Gracias"
	}
  
}]);


function documentInitOneSignal() {
    var oneSignal_elements = document.getElementsByClassName("OneSignal-prompt");

    var oneSignalLinkClickHandler = function(event) { OneSignal.push(['registerForPushNotifications']); event.preventDefault(); }; for(var i = 0; i < oneSignal_elements.length; i++)
          oneSignal_elements[i].addEventListener('click', oneSignalLinkClickHandler, false);
}

if (document.readyState === 'complete') {
        documentInitOneSignal();
}
else {
    window.addEventListener("load", function(event){
    documentInitOneSignal();
});
}