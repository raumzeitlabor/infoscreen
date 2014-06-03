$(document).ready(function() {
	var current = 0;
    var image_loaded = false;
	var tumblr_img; tumblr_img = function() {
		var max_h = 160;
		var max_w = 250;
		var resize = function(img) {
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
                image_loaded = 1;
			});
	};

	(function() {
		var blabb0r = function() {
			if (image_loaded == true) return;

			/* lulz */
			$('#tumblr img').fadeOut('slow', function() {
				$('#tumblr img').fadeIn('slow', blabb0r());
			});
		}
        tumblr_img();
		blabb0r();
	})();

    setInterval(function() {
        $.getScript('http://raumzeitlabor.tumblr.com/api/read/json?number=1&type=photo', function(data, textStatus, jqxhr) {
            if (jqxhr.status == 200) {
                current = 0;
            } else {
                console.log("tumblr reload failed");
            }
        });
    }, 1000*60*10);
});
