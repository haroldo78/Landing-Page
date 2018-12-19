/**********

Author: Haroldo da Costa.
Company: Orb Digital Branding.
Site: 
Location: Fortaleza-CE, Brasil.
Name: San Miguel - Land Page
Last update: 2017/10/24 
Standards: PHP, HTML, CSS, Javascript
Components: jQuery, jQuery Validate, CSS Reset.
Software: Cadastro de novos clientes

**********/

jQuery.noConflict();
(function( $ ) {
  $(function() {

  	$(".cadastro").css("opacity","0.1");
  	$(".cadastro").css("bottom","-100px");

  	/* Add Class Formulários */
	$('input[type="text"],textarea').focus(function(){
		$(this).siblings('label.main').addClass("parcial");
	});

	$('input[type="text"],textarea').keypress(function(){
	    $(this).siblings('label.main').removeClass("parcial");
	    $(this).siblings('label').fadeOut();
	});

	$('input[type="text"]').blur(function(){    
	    if ( $(this).val() === "" || $(this).val() === " " || $(this).val() === "  " )
	    {
	    	$(this).siblings('label').fadeIn();
	    	$(this).siblings('label.main').removeClass("parcial");
	    }else
	    {
	    	$(this).siblings('label.main').removeClass("parcial"); 	
	    }
	});

	/* Valida o formulario no evento keyup */
	var validator = $("#form-cadastro").validate({
		rules: {
			nome: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			nome: {
				required: "Nome obrigatório."
			},
			email: {
				required: "Por favor, informe um endereço de email válido."
			}
		},
		// 
		// submitHandler: function() {
		// 	alert("Cadastro enviado.");
		// }
	});

	$(".sucesso").click(function(argument) {
		$(".container_sucesso").fadeOut("slow", function(){$(".cadastro_inner").fadeIn(800);});
	})

	$(window).load(function(){
		$(".cadastro").animate({"bottom":"0px","opacity":"1.0"}, 700);
	})

  });
})(jQuery);

//Ela válida os números de São Paulo, com o nove precedente, para os demais códigos de área o padrão são oito dígitos. Além disso a expressão regular não aceita a maioria dos códigos de área inválidos, como os começado em zero ou terminados em zero. Se precisar de uma validação forte nos código de área válidos precisa extender e modificar uma pouco a expressão. A máscara utilizada é: (11) 99999-9999 ou (12) 9999-9999.
// ^(\(11\) [9][0-9]{4}-[0-9]{4})|(\(1[2-9]\) [5-9][0-9]{3}-[0-9]{4})|(\([2-9][1-9]\) [5-9][0-9]{3}-[0-9]{4})$
