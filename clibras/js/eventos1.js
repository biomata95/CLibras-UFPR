jQuery(function() {




	jQuery("#archive-browser select").change(function() {


		jQuery("#archive-pot")

			.empty()

			.html("<div style='text-align: center; padding: 30px;'><img src='http://www.ufpr.br/portalufpr/wp-content/uploads/images/ajax-loader.gif' alt='' /></div>");


		var y = jQuery("#ano").val();
		var m = jQuery("#mes").val();


		jQuery.ajax({


			url: "http://www.ufpr.br/portalufpr/resultado-eventos/", 

			dataType: "html",

			type: "POST",

			data: ({

				"ano": y,

				"mes" : m

			}),

			success: function(data) {

				jQuery("#archive-pot").html(data);

				}
			

		});


	});


});