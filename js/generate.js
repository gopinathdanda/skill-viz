$(document).ready(function() {
	
	// Load list of student scores
	$.ajax({
		type: "POST",
		url: 'data_analysis.php',
		datatype: "json",
		data: {paodnwpaks: 872934, fnc: 'get_list', dir: 'scores'},
		success: function(data){
			var arr = JSON.parse(data);
			var el = '';
			for(var i in arr){
				console.log(replace_underscore(convert_camel(arr[i])));
				el += '<option value='+arr[i]+'>'+convert_camel(replace_underscore(arr[i]))+'</option>';
			}
			$('#student').append(el);
		},
		error: function(xhr, status, errorThrown) {console.log(errorThrown);}
	});
	
	// Load selected student scores	
	$('#load').on('click', function(e){
		
		// Prevent default submit
		e.preventDefault();
		
		var id = $('#student').val();
		
		$.ajax
	    	({
	        	type: "POST",
		        url: 'data_analysis.php',
		        data: { fname: id, paodnwpaks: 872934, fnc: 'get', dir: 'scores'},
		        success: function (data) { 
					var arr = JSON.parse(data)[0];
					var st_name = arr.name;
					var skillset = arr.skillset;
					$('.student-name').text(st_name);
					$('.skillset').text(skillset);
					var num = arr.num;
					var el = '';
					var data = {};
					var l = 0;
					for(var k in arr){
						l += 1;
						if(l<=3){
							continue;
						}
						
						var skillId = arr[k].id;
						var skillScore = arr[k].score;
						var skillMax = arr[k].max;
						var skillDesc = arr[k].desc;
						var percentage = skillScore/skillMax*100;
						var skillName = convert_camel(skillId);
						
						data[skillName] = percentage/20;
						el += '<h4 class="skill-item">'+skillName+'</h4>';
						el += '<div class="progress skill-item">';
					  	el += '<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="'+percentage+'" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width:'+percentage+'%">';
						el += Math.ceil(percentage)+'%';
					  	el += '</div>';
						el += '</div>';
						
						el += '<div class="custom-hidden '+skillId+' skill-item">';
						el += '<div class="skill">'+skillName+'</div>';
						el += '<div class="score">'+skillScore+'</div>';
						el += '<div class="max">'+skillMax+'</div>';
						el += '<div class="desc">'+skillDesc+'</div>';
						el += '</div>';
					}
					$('.skillsPieChart').attr('data-values', data);
					
					console.log(data);
					
					$('.alert-info').hide();
					$('.skill-item').remove();
					$('.skillsPieChart').hide();
					
					if(num > 2){
						$('.radar-not-shown').hide();
						$('.skillsPieChart').show();
						$('.skillsPieChart').find('canvas').remove();
						$('.skillsPieChart').radarChart({size: [550, 550], step: 1, values:data, fixedMaxValue:5, showAxisLabels: true});
					}else{
						$('.radar-not-shown').show();
						$('.skillsPieChart').hide();
					}
					$('#line-graph').append(el);
					$('#load-student-modal').modal('hide');
				},
		        error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		    });
	});
			

});





