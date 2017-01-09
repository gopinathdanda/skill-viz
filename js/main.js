$(document).ready(function() {
	
	// Global variable for skill indexing
	var index = 1;
			
	// Add skill to skillset form
	$("#add-skill").on('submit', function(e){
		
		// Prevent default submit
		e.preventDefault();
		
		var skill_name = $('#skill').val();
		var skill_desc = $('#skill-desc').val();
		var skill_max = $('#skill-max-score').val();
		var skill_id = convert_dash(skill_name)
		var num = Number($('#field-nos').val())+1;
		index += 1;
		
		// Create & add skill element, and update number of skills
		if(skill_name != '' && skill_max != ''){
			var el = '<li class="list-group-item skill'+index+'" id="skill'+index+'"><h4>'+skill_name+'</h4><div class="pull-left"><p class="skill-desc">'+skill_desc+'</p><p>Max score: '+skill_max+'</p></div><div class="pull-right"><button class="btn btn-danger skill-del" data="skill'+index+'">Delete skill</button></div><div class="clearfix"></div></li>';
			var inp_name = '<input type="hidden" class="skill'+index+'" name="skillset[skill'+index+'][name]" value="'+skill_name+'" />';
			var inp_desc = '<input type="hidden" class="skill'+index+'" name="skillset[skill'+index+'][desc]" value="'+skill_desc+'" />';
			var inp_max = '<input type="hidden" class="skill'+index+'" name="skillset[skill'+index+'][max]" value="'+skill_max+'" />';
			var inp_id = '<input type="hidden" class="skill'+index+'" name="skillset[skill'+index+'][id]" value="'+skill_id+'" />';
			var inp = inp_name+inp_desc+inp_max+inp_id;
			$('#field-nos').val(num);
			$('#skillset-list').append(el);
			$('#hidden-group').append(inp);
		}
		
	});
	
	// Delete skill from skillset form		
	$('#skillset-list').on('click', '.skill-del', function(){
		var cls = $(this).attr('data');
		
		// Remove skill
		$('.'+cls).remove();
		
		// Update number of skills
		var num = Number($('#field-nos').val())-1;
		$('#field-nos').val(num);
	});
	
	// Change skillset name
	$('#skillset-update').click(function(){
		var val = $('#skillset-name').val();
		if(val != ''){
			$('.skillset').text(val).val(val);
			$('#change-skillset-modal').modal('hide');
		}
	});
	
	// Save skillset to file
	$('#save-skill').on('submit', function(e){
		
		// Prevent default submit
		e.preventDefault();
		
		var data = $(this).serializeJSON();
		var arr = $.map(data, function(el) { return el });
		var skillset = $('.skillset:first').text();
		
		// Save
		$.ajax
		    ({
		        type: "POST",
		        url: 'data_analysis.php',
		        data: { data: JSON.stringify(arr), fname: convert_dash(skillset), paodnwpaks: 872934, fnc: 'save', dir: 'data' },
		        success: function (data) { $('#saved').modal('show'); console.log(data)},
		        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		    });
	});		
});





