$('.wizard-steps li a').click(function(event){ 					
					
					<!-- CHANGE THE CHEVRON COLOR ON SELECTION -->
					var chkFlag = $(this).parent().hasClass("completed-step");
					var chkIndex = $(this).parent().index(); 
					if(chkIndex == 0){
						$(this).parent().nextAll().removeClass();
					}
					if(chkIndex > 0){
						$(this).parent().removeClass().addClass("active-step");
						$(this).parent().prevAll().removeClass().addClass("completed-step");
						$(this).parent().nextAll().removeClass();				 
					}
					event.preventDefault(); 		   
				});