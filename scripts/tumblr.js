$(document).ready(function() {
	(function() {
		var blabber_show = 5;
		var blabb0r = function() {
			if (blabber_show-- == 0) {
				tumblr_img();
				return;
			}
			/* lulz */
			$('#tumblr img').fadeOut('slow', function() {
				$('#tumblr img').fadeIn('slow', blabb0r());
			});
		}
		blabb0r();
	})();

	var current = 0;
	var tumblr_img; tumblr_img = function() {
		var max_h = 160;
		var max_w = 250;
		var resize = function(img) {
			console.log("w: "+$(img).width()+" h: "+$(img).height());
			if ($(img).height() > max_h) {
				var h = max_h;
				var w = Math.ceil($(img).width() / $(img).height() * max_h);
			}

			if ($(img).width() > max_w) {
				var w = max_w;
				var h = Math.ceil($(img).height() / $(img).width() * max_w);
			}
				$(img).css({ height: h+'px', width: w+'px' });
			}

			var t = $('<img/>', {
				src: tumblr_api_read.posts[current]['photo-url-250'],
			});

			var inv = $('#invisible').empty();
			t.appendTo($('#invisible')).load(function() {
				resize(t);
				current = ++current % tumblr_api_read.posts.length;
				$('#tumblr img').replaceWith(t).fadeIn('slow');
				setTimeout(function() { tumblr_img() }, 10000);
			});
	};
});
