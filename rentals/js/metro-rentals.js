(function($){

	var metrolove_data,
			lines = {
			'Red':[
				"Rockville",
				"Grosvenor-Strathmore",
				"Bethesda",
				"Friendship Heights",
				"Tenleytown-AU",
				"Van Ness-UDC",
				"Cleveland Park",
				"Woodley Park-Zoo/Adams Morgan",
				"Dupont Circle",
				"Farragut North",
				"Metro Center",
				"Gallery Place-Chinatown",
				"Judiciary Square",
				"Union Station",
				"NoMa-Gallaudet U",
				"Rhode Island Avenue",
				"Brookland-CUA",
				"Takoma",
				"Silver Spring",
				"Forest Glen",
				"Wheaton"],
			'Orange':[
				"East Falls Church", 
				"Ballston", 
				"Virginia Square", 
				"Clarendon", 
				"Court House", 
				"Rosslyn", 
				"Foggy Bottom", 
				"Farragut West", 
				"McPherson Square", 
				"Metro Center", 
				"Federal Triangle", 
				"Smithsonian", 
				"L'Enfant Plaza", 
				"Federal Center SW", 
				"Capitol South", 
				"Eastern Market", 
				"Potomac Avenue", 
				"Stadium-Armory", 
				"Deanwood"],
			'Yellow':[
				"Gallery Place-Chinatown", 
				"L'Enfant Plaza", 
				"King Street-Old Town", 
				"Braddock Road", 
				"Ronald Reagan Washington National Airport", 
				"Crystal City", 
				"Pentagon City", 
				"Pentagon", 
				"Georgia Ave-Petworth", 
				"Columbia Heights", 
				"U Street", 
				"Shaw-Howard U", 
				"Mt. Vernon Square", 
				"Archives"],
			'Green':[
				"College Park", 
				"Prince George's Plaza", 
				"Georgia Ave-Petworth", 
				"Columbia Heights", 
				"U Street", 
				"Shaw-Howard U", 
				"Mt. Vernon Square", 
				"Gallery Place-Chinatown", 
				"Archives", 
				"L'Enfant Plaza", 
				"Waterfront", 
				"Navy Yard-Ballpark", 
				"Anacostia"
			],
			'Blue':[
				"King Street-Old Town", 
				"Braddock Road", 
				"Ronald Reagan Washington National Airport", 
				"Crystal City", 
				"Pentagon City", 
				"Pentagon", 
				"Arlington Cemetery", 
				"Rosslyn", 
				"Foggy Bottom", 
				"Farragut West", 
				"McPherson Square", 
				"Metro Center", 
				"Federal Triangle", 
				"Smithsonian", 
				"L'Enfant Plaza", 
				"Federal Center SW", 
				"Capitol South", 
				"Eastern Market", 
				"Potomac Avenue", 
				"Stadium-Armory"
			]
		},
		stations = {},
		cl,
		cs,
		tweetsURL = "http://echoapi.arktan.com/v1/search?q=((childrenof:http://www.washingtonpost.com/id_Metro_Dates -state:ModeratorDeleted,SystemFlagged,CommunityFlagged,ModeratorFlagged -user.state:ModeratorBanned)) safeHTML:false children:1 -state:ModeratorDeleted,SystemFlagged,ModeratorFlagged -user.state:ModeratorBanned childrenSortOrder:reverseChronological childrenItemsPerPage:2 itemsPerPage:4+&appkey=prod.washpost.com";
	$(document).ready(function() {
		SimpleTable.init( { key: '0AkUM9lIYPg3idEtfYnhRWmx1Y0lROGVMY1FNX29vRXc', cached: true, callback: callback_test} );

		$('.stationicon').hover(function() {
			$('#station-info').find('p:first-child').html($(this).attr('data-station'));
			$('#station-info').css({left: theX + 15, top: theY + 15});
			$('#station-info').show();
		}, function() {
			$('#station-info').hide();
		});

		$('.stationicon').click(function() {
			$('#station-info').hide();
			$('#landing').hide();
			$('#interior').show();
			cl = $(this).attr('data-line');
			$('#' + cl + '-button').click();
			cs = $(this).attr('data-station');
			gotoStop(cs);
		});

		$(document).mousemove(function(e) {
			theX = e.pageX;
			theY = e.pageY;
		});

		$.each(lines, function(index, item) {
			var left_array = [], 
				right_array = [],
				full_array = [];
			if (!isMobile) {
				for (var i = 0; i < lines[index].length / 2; i++) {
					left_array.push('<li><a href="#"><p data-line=' + index + '>' + lines[index][i] + '</p></a></li>');
				}
				if (lines[index].length % 2 == 0) {
					for (var i = lines[index].length / 2; i < lines[index].length; i++) {
						right_array.push('<li><a href="#"><p data-line=' + index + '>' + lines[index][i] + '</p></a></li>');
					}
				} else {
					for (var i = lines[index].length / 2 + .5; i < lines[index].length; i++) {
						right_array.push('<li><a href="#"><p data-line=' + index + '>' + lines[index][i] + '</p></a></li>');
					}
				}
				$('#' + index.toLowerCase() + '-left-list').html(left_array.join(''));
				$('#' + index.toLowerCase() + '-right-list').html(right_array.join(''));
			} else {
				for (var i = 0; i < lines[index].length; i++) {
					full_array.push('<li><a href="#"><p data-line=' + index + '>' + lines[index][i] + '</p></a></li>');
				}
				$('#' + index.toLowerCase() + '-full-list').html(full_array.join(''));
			}

		});

		$('#list-view-container').find('a').click(function(e) {
			e.preventDefault();
			$('#interior').show();
			$('#landing').hide();
			$.scrollTo($('#interior .filters'), 500, {offset: {top: -30}});
			cl = $(this).children('p').attr('data-line');
			$('#' + cl + '-button').click();
			cs = $(this).children('p').html();
			gotoStop(cs);
		});

		$('select#jump-menu').combobox();
		placeholderCompatibility();	

		$('.filters').find('a').click(function(e) {
			e.preventDefault();
			var temporary_array = []
			$('.filters').find('a').removeClass('active');
			$(this).addClass('active');
			cl = $(this).attr('id').split('-')[0];
			cs = lines[cl][0];
			gotoStop(cs);
			$.each(lines[cl], function(index, item) {
				temporary_array.push('<option value="'+ item +'">' + item + '</option>');
			});
			$('#jump-menu').html(temporary_array.join(''));	
			$('#jump-menu>option').tsort();
		});

		$('#show-landing').hover(function() {
			$('#show-landing img').css('opacity', '1');
		}, function() {
			$('#show-landing img').css('opacity', '.5');
		});

		$('#show-landing').click(function(e) {
			e.preventDefault();
			$('#interior').hide();
			$('#landing').show();
		});

		$('#banner-next').click(function(e) {
	    	e.preventDefault();
	    	gotoStop(lines[cl][lines[cl].indexOf(cs) + 1]);
	    	cs = lines[cl][lines[cl].indexOf(cs) + 1];
	    	$('#jump-container').find('.ui-combobox').find('input').val('');
    	});	

    	$('#banner-prev').click(function(e) {
	    	e.preventDefault();
	    	gotoStop(lines[cl][lines[cl].indexOf(cs) - 1]);
	    	cs = lines[cl][lines[cl].indexOf(cs) - 1];
	    	$('#jump-container').find('.ui-combobox').find('input').val('');
    	});	

    	if (!isMobile) {
    		getTweets();
    	}
	});

	function callback_test (data) {
		metrolove_data = data;
		$.each(data, function(index, item) {
			if (!stations[item['stationname']]) {
					stations[item['stationname']] = [];
			}
			stations[item['stationname']].push({
				'placename': item['placename'],
				'address': item['placeaddress'],
				'description': item['description'], 
				'placeurl': item['placeurl']
			});
		}); 
	}

    function runFilter(val) {
    	cs = $(val).val();
    	gotoStop(cs);
    }

    function gotoStop(station) {
		$('#currentstop').html(station);
		if (lines[cl].indexOf(station) == 0) {
			$('#next-stopname').html(lines[cl][lines[cl].indexOf(station) + 1]);
			$('#prev p').html('');
			$('#next-text').html('Next stop:');
			$('#banner-prev img').css('visibility', 'hidden');
			$('#banner-next img').css('visibility', 'visible');
		} else if (lines[cl].indexOf(station) == (lines[cl].length - 1)) {
			$('#prev-stopname').html(lines[cl][lines[cl].indexOf(station) - 1]);
			$('#next p').html('');
			$('#prev-text').html('Previous stop:');
			$('#banner-prev img').css('visibility', 'visible');
			$('#banner-next img').css('visibility', 'hidden');
		} else {
			$('#prev-stopname').html(lines[cl][lines[cl].indexOf(station) - 1]);
			$('#next-stopname').html(lines[cl][lines[cl].indexOf(station) + 1]);
			$('#next-text').html('Next stop:');
			$('#prev-text').html('Previous stop:');
			$('#banner-prev img').css('visibility', 'visible');
			$('#banner-next img').css('visibility', 'visible');
		}
		$('#interior-banner').removeClass();
		$('#interior-banner').addClass(cl.toLowerCase());
		var temporary_array = [];
		$.each(stations[station], function(index, item) {
			temporary_array.push('<h3 class="datespot"><a href="' + item['placeurl'] + '" target="blank">' + item['placename'] + '</a></h3><p class="address">' + item['address'] + '</p> <p class="body datespot-description">' + item['description'] + '</p>');
		});
		$('#datespot-container').html(temporary_array.join(''));
    }

    $.widget("ui.combobox",{_create:function(){var a,b=this,c=this.element.hide(),d=c.children(":selected"),e=d.val()?d.text():"",f=$("<span>").addClass("ui-combobox").insertAfter(c);a=$("<input />").appendTo(f).val(e).addClass("ui-state-default").autocomplete({delay:0,minLength:0,source:function(a,b){var d=new RegExp($.ui.autocomplete.escapeRegex(a.term),"i");b(c.children("option").map(function(){var b=$(this).text();if(this.value&&(!a.term||d.test(b)))return{label:b.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)("+$.ui.autocomplete.escapeRegex(a.term)+")(?![^<>]*>)(?![^&;]+;)","gi"),"$1"),value:b,option:this}}))},select:function(a,c){c.item.option.selected=true;b._trigger("selected",a,{item:c.item.option});runFilter(c.item.option)},change:function(b,d){if(!d.item){var e=new RegExp("^"+$.ui.autocomplete.escapeRegex($(this).val())+"$","i"),f=false;c.children("option").each(function(){if($(this).text().match(e)){this.selected=f=true;return false}});if(!f){$(this).val("");c.val("");a.data("autocomplete").term="";return false}}}}).addClass("ui-widget ui-widget-content ui-corner-left");a.data("autocomplete")._renderItem=function(a,b){return $("<li></li>").data("item.autocomplete",b).append("<a>"+b.label+"</a>").appendTo(a)};$("<a>").attr("tabIndex",-1).attr("title","Show All Items").appendTo(f).button({icons:{primary:"ui-icon-triangle-1-s"},text:false}).removeClass("ui-corner-all").addClass("ui-corner-right ui-button-icon").click(function(){if(a.autocomplete("widget").is(":visible")){a.autocomplete("close");return}$(this).blur();a.autocomplete("search","");a.focus()})},destroy:function(){this.wrapper.remove();this.element.show();$.Widget.prototype.destroy.call(this)}})


	function placeholderCompatibility(){
		function add() {
            if($(this).val() == ''){
                $(this).val($(this).attr('placeholder')).addClass('placeholder');
            }
        }

        function remove() {
            if($(this).val() == $(this).attr('placeholder')){
                $(this).val('').removeClass('placeholder');
            }
        }

        // Create a dummy element for feature detection
        if (!('placeholder' in $('<input>')[0])) {

            // Select the elements that have a placeholder attribute
            $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add);

            // Remove the placeholder text before the form is submitted
            $('form').submit(function(){
                $(this).find('input[placeholder], textarea[placeholder]').each(remove);
            });
        }
	}

	function getTweets() {
        $.ajax({
            url: tweetsURL,
            dataType: 'jsonp',
            jsonpCallback: 'jQuery.loadTweets',
            context: document.body
        });
    }

    $.loadTweets = function(data) {
        $.each(data.entries, function(i,t) {
        	var username = t.actor.id.replace('http://twitter.com/',''); // takes out the twitter url leaving you with the twitter handle
            var tweetMeta = {
            	avatar : t.actor.avatar,
            	username : username,
            	user_link : t.actor.id,
                tweet_link : t.object.permalink,
                tweet_time : $.timeago(t.object.published)
            }
            
            var tweet = ich.tweet(tweetMeta);
            $('#tweetContainer').append(tweet);
            $('#tweetContainer').find('.tweet:last').find('.tweet-text').html(t.object.title);
        });
    }

})(jQuery);