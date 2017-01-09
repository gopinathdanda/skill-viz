
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
		
		function replace_underscore(str){
			return str.replace(/_/g, ': ');
		}
		
		
		$.ajax({
			type: "POST",
			url: 'get_score_list.php',
			datatype: "json",
			data: {paodnwpaks: 872934},
			success: function(data){
				var arr = $.parseJSON(data);
				var el = '';
				for(var i in arr){
					console.log(replace_underscore(convert_camel(arr[i])));
					el += '<option value='+arr[i]+'>'+convert_camel(replace_underscore(arr[i]))+'</option>';
				}
				$('#student').append(el);
			},
			error: function(xhr, status, errorThrown) {console.log(errorThrown);}
		});
		
			
				
				$('#load').on('click', function(e){
					e.preventDefault();
					var id = $('#student').val();
					$.ajax
				    	({
				        	type: "POST",
					        url: 'get_score.php',
					        data: { fname: id, paodnwpaks: 872934 },
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
				
				$('#score-form').on('submit', function(e){
					e.preventDefault();
					var data = $(this).serializeJSON();
					var arr = $.map(data, function(el) { return el });
					var st_name = $('#student-name').val();
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





