$(document).ready(function() {
	
	// Load list of skillsets
	$.ajax({
		type: "POST",
		url: 'data_analysis.php',
		datatype: "json",
		data: {paodnwpaks: 872934, fnc: 'get_list', dir: 'data'},
		success: function(data){
			var arr = $.parseJSON(data);
			var el = '';
			for(var i in arr){
				el += '<option value='+arr[i]+'>'+convert_camel(arr[i])+'</option>';
			}
			$('#skillsets').append(el);
		},
		error: function(xhr, status, errorThrown) {console.log(errorThrown);}
	});
	
	// Load selected skillset		
	$('#load').on('click', function(e){
		
		// Prevent default submit
		e.preventDefault();
		
		var id = $('#skillsets').val();
		
		$.ajax
	    	({
	        	type: "POST",
		        url: 'data_analysis.php',
		        data: { fname: id, paodnwpaks: 872934, fnc: 'get', dir: 'data' },
		        success: function (data) {
					var arr = JSON.parse(data)[0];
					var skillset = arr.name;
					var num = arr.num;
					
					$('.skillset').text(skillset);
					$('#skillset-value').text(convert_dash(skillset));
					
					var el = '<input type="hidden" name="student[num]" value="'+num+'">';
					el += '<input type="hidden" name="student[skillset]" value="'+skillset+'">';
					var l = 0;
					for(var k in arr){
						l += 1;
						if(l<=2){
							continue;
						}
						el += '<div class="skill-item"><h4>'+arr[k].name+'</h4>';
						el += '<div class="row"><div class="form-group col-sm-2">';
						el += '<label for="student['+k+']" class="sr-only">Score of '+arr[k].name+'</label>';
						el += '<div class="input-group">';
						el += '<input type="number" step="any" class="form-control" name="student['+k+'][score]" placeholder="Score">';
						el += '<input type="hidden" name="student['+k+'][id]" value="'+arr[k].id+'">';
						el += '<input type="hidden" name="student['+k+'][max]" value="'+arr[k].max+'">';
						el += '<input type="hidden" name="student['+k+'][desc]" value="'+arr[k].desc+'">';
						el += '<div class="input-group-addon">out of '+arr[k].max+'</div>';
						el += '</div></div><div class="col-sm-10">';
						el += '<p>'+arr[k].desc+'</p>';
						el += '</div></div></div>';
					}
					$('.skill-item').remove();
					
					$('#score-form').removeClass('custom-hidden').show();
					$('.alert-info').hide();
					$('#score-form-buttons').show();
					$('#score-form-buttons').before(el);
					$('#add-score-modal').modal('hide');
				},
		        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		    });
	});
	
	// Save student scores
	$('#score-form').on('submit', function(e){
		
		// Prevent default submit
		e.preventDefault();
		
		var data = $(this).serializeJSON();
		var arr = $.map(data, function(el) { return el });
		var st_name = $('#student-name').val()+'_'+$('#skillset-value').text();
		
		$.ajax
		    ({
		        type: "POST",
		        url: 'data_analysis.php',
		        data: { data: JSON.stringify(arr), fname: convert_dash(st_name), paodnwpaks: 872934, fnc: 'save', dir: 'scores' },
		        success: function (data) { $('#saved').modal('show'); console.log(data)},
		        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		    });
	});
	
	// Delete all skillsets
	$('#scores-delete').click(function(){
		$.ajax({
			type: "POST",
			url: 'data_analysis.php',
			data: {paodnwpaks: 872934, fnc: 'delete', dir: 'scores'},
			success: function(data) { $('#clear-scores-modal').modal('hide'); $('#deleted').modal('show'); console.log(data); },
			error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		})
	});
			

});





