
	$(document).ready(function() {
		
		function toTitleCase(str) {
		    return str.replace(/(?:^|\s)\w/g, function(match) {
		        return match.toUpperCase();
		    });
		}
		
		function convert_camel(str){
			return toTitleCase(str.replace(/-/g, ' '));
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
		
	
				$('.skillsPieChart').radarChart({
				size: [380, 300],
				step: 1,
				fixedMaxValue:5,
				showAxisLabels: true
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
								var num = arr.num;
								var el = '';
								for(var i = 1; i<=num; i++){
									var sk = 'skill'+i;
									var skillId = arr[sk].id;
									el += '<div class="skill-item"><h4>'+arr[sk].name+'</h4>';
									el += '<div class="row"><div class="form-group col-sm-2">';
									el += '<label for="'+skillId+'" class="sr-only">Score of '+arr[sk].name+'</label>';
									el += '<div class="input-group">';
									el += '<input type="text" class="form-control" name="'+skillId+'" id="'+skillId+'" placeholder="Score">';
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
				})
				
	
    });





