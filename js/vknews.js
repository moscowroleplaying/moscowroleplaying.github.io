$(document).ready(function(){
		function GetDate($date){
		var t = new Date( $date*1000 );
		var m = [t.getDate(), months[t.getMonth()],t.getYear()+1900];
		return m;
		}
		var months = ['ЯНВАРЯ','ФЕВАЛЯ','МАРТА','АПРЕЛЯ','МАЯ','ИЮНЯ','ИЮЛЯ','АВГУСТА','СЕНТЯБРЯ','ОКТЯБРЯ','НОЯБРЯ','ДЕКАБРЯ'];
		
		
		function GetPostWall(counts, $offset) {
			var message = [];
			var pinned = false;
			var i = 1;
			var req = "https://api.vk.com/method/wall.get?domain=fresh_rp&offset=" + $offset + "&count=" + (counts+1); // GET запрос по протоколу HTTPS;
			$.ajax({
				url: req,
				type: "GET",
				dataType: "jsonp",
				success: function (msg) {
					items = msg.response;

					
					
					while (i <= counts) {
							
							if (items[i] != undefined){
								if (items[i].text.length > 10){
								message += '<div class="news" id="news-'+i+'"><img src="" class="news-image"><a href=https://vk.com/fresh_rp?w=wall'+ items[i].to_id +'_'+ items[i].id +'>Читать</a><div class="news-text">'+items[i].text +'</div><div class="like"><div class="like-btn"></div>Нравится <b>'+ items[i].likes.count +'</b></div>';
								$("#news").append(message).show('slow');
								message = "";
								};
							}
							i++;

						
						
					};
					
					
					

				}
				
			});
		}
		GetPostWall(3, 1);
		$posts = 3;
		$offsets = 3;
	
		$(window).scroll(function(){ 
		if ($(document).height() - $(window).height() <= $(window).scrollTop() + 2500) { 
			if($offsets < 3){
				GetPostWall($posts, $offsets);
				$offsets = $offsets + $posts;
			}
		} 
		});
	});
	