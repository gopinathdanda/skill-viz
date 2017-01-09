
	$(document).ready(function() {
		
		function toTitleCase(str) {
		    return str.replace(/(?:^|\s)\w/g, function(match) {
		        return match.toUpperCase();
		    });
		}
		
		function convert_camel(str){
			return toTitleCase(str.replace(/-/g, ' '));
		}
		
		function convert_dash(str){
			return str.toLowerCase().replace(/ /g, '-');
		}
		
		
		$.ajax({
			type: "POST",
			url: 'get_data_list.php',
			datatype: "json",
			data: {paodnwpaks: 872934},
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
		
				
				$('#load').on('click', function(e){
					e.preventDefault();
					var id = $('#skillsets').val();
					$.ajax
				    	({
				        	type: "POST",
					        url: 'get_data.php',
					        data: { fname: id, paodnwpaks: 872934 },
					        success: function (data) { 
								var arr = $.parseJSON(data)[0];
								var skillset = arr.name;
								$('.skillset').text(skillset);
								$('#skillset-value').text(convert_dash(skillset));
								var num = arr.num;
								var el = '<input type="hidden" name="student[num]" value="'+num+'">';
								el += '<input type="hidden" name="student[skillset]" value="'+skillset+'">';
								for(var i = 1; i<=num; i++){
									var sk = 'skill'+i;
									var skillId = arr[sk].id;
									el += '<div class="skill-item"><h4>'+arr[sk].name+'</h4>';
									el += '<div class="row"><div class="form-group col-sm-2">';
									el += '<label for="student[skill'+i+']" class="sr-only">Score of '+arr[sk].name+'</label>';
									el += '<div class="input-group">';
									el += '<input type="number" step="any" class="form-control" name="student[skill'+i+'][score]" placeholder="Score">';
									el += '<input type="hidden" name="student[skill'+i+'][id]" value="'+skillId+'">';
									el += '<input type="hidden" name="student[skill'+i+'][max]" value="'+arr[sk].max+'">';
									el += '<input type="hidden" name="student[skill'+i+'][desc]" value="'+arr[sk].desc+'">';
									el += '<div class="input-group-addon">out of '+arr[sk].max+'</div>';
									el += '</div></div><div class="col-sm-10">';
									el += '<p>'+arr[sk].desc+'</p>';
									el += '</div></div></div>';
								}
								$('.skill-item').remove();
								$('#score-form-buttons').show();
								$('#score-form-buttons').before(el);
								$('#add-score-modal').modal('hide');
							},
					        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
					    });
				});
				
				$('#score-form').on('submit', function(e){
					e.preventDefault();
					var data = $(this).serializeJSON();
					var arr = $.map(data, function(el) { return el });
					var st_name = $('#student-name').val()+'_'+$('#skillset-value').text();
					$.ajax
					    ({
					        type: "POST",
					        url: 'save_scores.php',
					        data: { data: JSON.stringify(arr), fname: convert_dash(st_name), paodnwpaks: 872934 },
					        success: function (data) { $('#saved').modal('show'); console.log(data)},
					        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
					    });
				});
				
	
    });





