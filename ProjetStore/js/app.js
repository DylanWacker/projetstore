(function($){
	$('.addPanier').click(function(event){
		event.preventDefault();
		$.post("addpanier.php",$( "#formulaire" ).serialize(), function(data){
			if(data.error){
				alert(data.message);
			}else{
				if(confirm(data.message + '. Voulez vous consulter votre panier ?')){
					location.href = 'Panier.php';
				}else{
					$('#total').empty().append(data.total);
					$('#count').empty().append(data.count);
				}
			}
		},'json');
		return false;
	});

})(jQuery);