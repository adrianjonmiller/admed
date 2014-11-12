$(document).ready(function(){
	$('select#pppro_id_country').change(function(){
		updateState();
		updateNeedIDNumber();
	});
	updateState();
	updateNeedIDNumber();
});

function updateState()
{
	$('select#pppro_id_state option:not(:first-child)').remove();
	var states = pppro_countries[$('select#pppro_id_country').val()];
	if(typeof(states) != 'undefined')
	{
		$(states).each(function (key, item){
			$('select#pppro_id_state').append('<option value="'+item.id+'"'+ (pppro_idSelectedCountry == item.id ? ' selected="selected"' : '') + '>'+item.name+'</option>');
		});
		
		$('pppro_id_state:hidden').slideDown('slow');
	}
	else
		$('pppro_id_state').slideUp('fast');
}

function updateNeedIDNumber()
{
	var idCountry = parseInt($('select#pppro_id_country').val());
	
	if ($.inArray(idCountry, pppro_countriesNeedIDNumber) >= 0)
		$('fieldset.dni').slideDown('slow');
	else
		$('fieldset.dni').slideUp('fast');
}
