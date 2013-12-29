//Sample Team Data
var bracket_id;
var teams;
var score;
var seeds = ['',1,5,7,3,4,8,6,2,2,6,8,4,3,7,5,1];
var Team = function(seed, name, region, rnd, conference, rpi)	{
	this.seed = seed; 
	this.name = name;
	this.region = region;
	this.conference = conference;
	this.rpi = rpi;
	this.rnd = 1; //Round to be changed depending on where user puts them
	this.curRnd = rnd; //What round the team is currently in
}
Team.prototype.get_matchup = function(rd){
	var m = seeds[this.seed];
	 if(rd > 1 && rd < 5)	{
	 	m = Math.ceil(m/Math.pow(2,rd-1));
	 }
	 else if(rd==5)	 {
		 if(this.region == 1 || this.region == 2)
		 	m = 1;
		else
			m = 2;
	 }
	 else if(rd==6||rd==7)
	 	m = 1;
	 return m;
}
Team.prototype.get_slot = function(rd)	{
	var slot = 2;
	 if((rd <= 1 && this.seed < 9) || (rd > 1 && rd < 5 && this.get_matchup(rd-1,this.seed)%2==1) || (rd == 5 && (this.region==1 || this.region == 3)) || (rd == 6 && (this.region == 3 || this.region ==	4)) || rd==7)
		 	slot = 1;
	 return slot;
}
Team.prototype.get_selector = function(rd)	{
	var selector = '#round'+rd;
			 if(rd < 5)
			 	selector = selector + ' .region' + this.region
			 selector = selector + ' .m'+this.get_matchup(rd) + ' .slot' + this.get_slot(rd);
	return selector;
}

var original;
var compareHtml = '<a class="compare"  data-toggle="tooltip" title="Compare"><span class="glyphicon glyphicon-list"></span></a>';
$(document).ready(function(e) {
	original = $('#bracket').html();
	bracket_id = window.location.hash.substring(1);
	load_teams();
	
   
	
	
	//Move team to next round
	$('#bracket').on('click','.team',function()	{
		$(this).move_on();
		build_bracket();
	});
	
	//Compare Modal
	$(document).on('click','.compare',function()	{
		var div = $('#compareModal');
		var div1 = div.find('#team1').empty();
		var div2 = div.find('#team2').empty();
		if($(this).siblings('.slot1').find('.team').data('id') != undefined)	{
			var team1 = teams[$(this).siblings('.slot1').find('.team').data('id')];
				div1.append($('<h3></h3>').text('#' + team1.seed + ' ' + team1.name)) 
				.append($('<p></p>').text('Record: ' + team1.wins + '-' + team1.losses))
				.append($('<p></p>').text('Conference: ' + team1.conference))
				.append($('<p></p>').text('RPI: ' + team1.rpi));
		}
		if($(this).siblings('.slot2').find('.team').data('id') !=undefined)	{
			var team2 = teams[$(this).siblings('.slot2').find('.team').data('id')];
			div2.append($('<h3></h3>').text('#' + team2.seed + ' ' + team2.name))
				.append($('<p></p>').text('Record: ' + team2.wins + '-' + team2.losses))
				.append($('<p></p>').text('Conference: ' + team2.conference))
				.append($('<p></p>').text('RPI: ' + team2.rpi));			
		}
		div.modal('show');
	});
	
	$(document).on('click','#change',function()	{
		var list = $('#bracket_list');
		list.empty().append("<li>Loading</li>");
		$.get('controllers/brackets.php/',function(data)	{
			list.empty();
			$.each(data,function(i,v)	{
				var a = $('<a></a>').attr('href','#' + v.id).data('id',v.id).text(v.name);
				list.append($('<li></li>').append(a));
			});
		},'json');
	});
	$(document).on('click','#save',function()	{
		//Save New Bracket
		if(!bracket_id)	 {
			var name = prompt('What would you like to name your bracket?');
			if(name)	{
				$.ajax({
					method: 'post',
					url: 'controllers/brackets.php/',
					data: {name: name, score: score, teams: JSON.stringify(teams)},
					dataType: 'json',
					success: function(data)	{
						bracket_id = data.id;
						$("#bracket_name").text(name);
						makeNoty('success','Successfully Saved');
					},
					error: function(data)	{
						makeNoty('error',data.responseText);
					}
				});
			}
		}
		//Update Current Bracket
		else	{
			$.ajax({
				url: 'controllers/brackets.php/' + bracket_id,
				method: 'post',
				data: {score: score, teams: JSON.stringify(teams)},
				dataType: 'json',
				success: function(data)	{
					makeNoty('success','Successfully Updated');
				},
				error: function(data)	{
					makeNoty('error',data.responseText);
				}
			});
		}
	});
	$(document).on('click','#create',function()	{
		window.location.hash = '';
		bracket_id = null;
		load_teams();
	});
});
function build_bracket()	{
	score = 0;
	$('#bracket').html(original);
	for (var i = 0; i < teams.length; i++) {
 		 var t = teams[i];
		var end =  ((t.rnd > t.curRnd) ? t.rnd : t.curRnd);
		 for(var daRound = 1; daRound<=end; daRound++)	{
			 var selector = t.get_selector(daRound);
			 var div = $('#bracket').find(t.get_selector(daRound));
			 div.empty();
			 
			 var team =  $("<p>" + t.name + "</p>").addClass('team').data('id',i).data('rnd',daRound);
			 var seed = $("<span></span").addClass('seed').text(t.seed);
			 team.prepend(seed);
			  div.append(team);
			  div.parent('.match').remove('.compare').append(compareHtml);
			
			var correct_team = get_correct_team(selector,daRound);
			//If Game has been decided
			 if(correct_team !=null && daRound > 1)	{
				 //Game has been decided so team can't change
				 div.find('.team').addClass('no-move');
				 //If is incorrect
				 if(correct_team != t)	{
					 //Replace team with what it should be
					div.find('.team').text(correct_team.name).data('id',correct_team.id).addClass('should-be');
					div.find('.team').prepend($("<span></span").addClass('seed').text(correct_team.seed));
				 	var incorrect = $("<p></p>").addClass('incorrect').text(t.name);
				 	div.append(incorrect);
				 }
				 //If is correct

				 else if(t.rnd >= t.curRnd )	{
					 div.find('.team').addClass('correct');
					score = score + ((daRound-1)*10);
				 }
				 else	{
					div.find('.team').css('color','black');
				 }
			 }
			 //Game hasn't been decided
			 else	{
			 }
				 
		 }
	}
		//initialize tooltips
	$('.region1 .compare, .region2 .compare').tooltip({placement: "right"});
	$('.region3 .compare, .region4 .compare').tooltip({placement: "left"});
	$('#bracket_score').text(score);
};
$.fn.move_on = function() { 
//rnd can never be less than curRnd

	var t = teams[this.data('id')];

	var nextDiv = $('#bracket').find(t.get_selector(this.data('rnd')+1) + '  .team');
	if(nextDiv.data('id') != undefined)		{
		var s = teams[nextDiv.data('id')];
		if(!nextDiv.hasClass('no-move') && s!=t)	{
			s.rnd = this.data('rnd');
			t.rnd = this.data('rnd') + 1;
		}
		else if(s==t)	{
			t.rnd = this.data('rnd');
		}
			
	}
	else	{
		t.rnd = this.data('rnd') + 1;
	}
 };
 function load_teams()	{
	teams = Array();
	$('#loading').modal('show');
	 $.ajax({
		 url: 'controllers/teams.php/',
		 method: 'get',
		 dataType: 'json',
		 success: function(data)	{
			$.each(data, function(i,v)	{
				var index = teams.push(new Team(v.seed,v.name,v.region_id,v.round_id,v.conference,v.rpi));
				teams[index - 1].wins = v.wins;
				teams[index - 1].losses = v.losses;
			});
			$('#loading').modal('hide');
			load_bracket();
		 },
		 error: function(data)	{
			 $('#loading').modal('hide');
			 makeNoty(data.responseText);
		 }
	 });
 }
 function load_bracket()	{
	 if(bracket_id)		{
		 $('#loading').modal('show');
		 $.ajax({
			 url: 'controllers/brackets.php/' + bracket_id,
			 method: 'get',
			 dataType: 'json',
			 success: function(data)	{
				 $("#user_name").text(data.user_name);
				 $("#bracket_name").text(data.name);
				$.each(data.rounds,function(i,v)	{
					teams[i].rnd = v;
				});
				build_bracket();
				$('#loading').modal('hide');
			},
			error: function(data)	{
				$('#loading').modal('hide');
				makeNoty('error',data.responseText);
			}
	 	});
	 }
	 //Creating New Bracket
	 else	{
		 $("#bracket_name").text("Untitled Bracket");
		 build_bracket();
	 }	
 }
$(window).on('hashchange', function() {
  bracket_id = window.location.hash.substring(1);
  load_bracket();
});
function get_correct_team(selector, rnd)	{
	for(var i=0; i<teams.length; i++)	{
		var team = teams[i];
		if(team.get_selector(rnd)  == selector)	{
			if(rnd <= team.curRnd)	{
				team.id = i;
				return team;
			}
		}
	}
	return null;
}
function makeNoty(type, message)	{
	var n = noty({
	text: message,
	layout: 'topRight',
	type: type,
	closeWith: ['click'],
	callback: {
		afterShow: function()	{
			setTimeout(function() {$.noty.closeAll()},4000);
		}
	}
});
}