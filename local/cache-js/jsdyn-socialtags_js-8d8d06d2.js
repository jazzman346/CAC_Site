/* #PRODUIRE{fond=socialtags.js}
   md5:169e61424b0f4dc5ef47631a5e66e728 */
// socialtags.js

// 'ajouter un bookmark' ne marche que sous IE
// les tuyaux trouves pour FF
//	window.sidebar.addPanel(t,u,'');
//	cf https://bugzilla.mozilla.org/show_bug.cgi?id=214530
// ou Opera sont creves
;var socialtags_addfavorite = function(u,t){
	if(document.all)window.external.AddFavorite(u,t);
};

(function($) {
	var socialtags_init = function() {
		var selector = $('#socialtags');
		if (!selector.length) return;
		var socialtags = [
{ a: 'delicious', n: 'Del.icio.us', i: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAADFBMVEUAAAD////d3d0AAP/uIk3bAAAAE0lEQVQIW2MMZVjFwEgEwUAcAQBKIg1ZuD9zCgAAAABJRU5ErkJggg==', u: 'http://delicious.com/save?url=%u&title=%t&notes=%d', u_site: 'http://coeuracoeur.net'},
{ a: 'facebook', n: 'Facebook', i: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAABnRSTlMAAAAAAABupgeRAAAAV0lEQVR42mNgIAMkVq6xjpxBEAGVQTUQoxqCCGhIqFj9+t2X/2BAlAa4amI1ICultob/GICABqDr4R6AsAfcDwQ0uCbNy23ZgokgGuBcoDJyNZCc+EgCALf2LCgEnyVyAAAAAElFTkSuQmCC', u: 'http://www.facebook.com/sharer/sharer.php?u=%u&t=%t', u_site: 'http://coeuracoeur.net'},
{ a: 'google', n: 'Google bookmarks', i: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAB+ElEQVR42pXS22vTUBwH8P1LUfogKCqK6IMdjM0xK8PLUx9WQQX7IHTqplBh4IU4hTEvaOdwzLoyL2v2IJINjBinTkM1totbNhuX206SJjnnt7RLdCIO/ZKnc36fc8nvNNH0PP2B/vevKQCW42BCMMYABABMi3wsm9wndfarqWj+2iAhRNWW5+kGCKqhEcOFayNzzacmW05PtKaf7+56tivFpq5UCmzV9cCyVkLg+8EyIFahI83sPdzPTJeR7Xo+kb6b2dsc1f6A2tkz9aaCPTsEANh04dhFfmtLr7SgwO9JZkaydN7HBCH9JyBjnEvF6YEcA3/E9aIDG1oIXJ9k7six5uyXsgx/j6FHoKrjzgvCjo4+TUcbAF2LgChbe0683dLWJ84tbQjUEMiKvT8tbDpwK1fg11d8lr37jFLkrcfs8tCTWeWHEoKgaSdpafOh8XjynmY4a9XBTW8WFs8NCsfpEtWW67k67ljmr7/EvtdjRyapRL7r0jSqkfX7PGRtKj4w8WKG+FEfPM8LJm6MClT7MNU6nMhwRU5XdHAxKAacHyxR286OFXniW1Gn66+oHmZKTHY/2t55PZa4uy/1NJF5ebCbPXom33t5VJK1mo1CoGoqqmeFYMe2TLFceT0jvOJL3DtRWlhEyCDErTlIlr81wP+87QCsAnW5ZGMUWDV8AAAAAElFTkSuQmCC', u: 'http://www.google.com/bookmarks/mark?op=edit&bkmk=%u&title=%t', u_site: 'http://coeuracoeur.net'},
{ a: 'netvibes', n: 'Netvibes', i: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAFfKj/FAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAF1QTFRF////AKMAAKgCAKwFALEEALUEALkCAL0BAL0CAMIAA8UAB74FIq8vKbMyK84KOdIbQNUkQNUmQdUmQ9UnRNYpTtofWd4ZZOEPZeERcOYLgu8flPFFlPgwovhQ////K6jB0gAAAAF0Uk5TAEDm2GYAAAB9SURBVBgZXcHRFoIgFEXBnSmEWlImZtL5/8/sruChmoFMEDmjQEpKtIac84tkCFKgNWwVl3i7K94mnJFzjnNT8MofsFWklJQMU5x1neOFEGRCwDknZ2grmuLM/vyxsxaPtWIppKWgN6p6g/d+GE5e8gVdIXUFxz8wHr6MvAFKvA8gnLCOBQAAAABJRU5ErkJggg==', u: 'http://www.netvibes.com/subscribe.php?url=%u', u_site: 'http://coeuracoeur.net'}
];
		var title = $('title').text() ||'';
		var description = ($('meta[name=description]').attr('content') || '').substr(0,250);
		var cano = $('link[rel=canonical]')[0];
		var url = cano ? cano.href : document.location.href;
		var ul = $('<ul><\/ul>');
		var esc = function(x){return encodeURIComponent(x).replace(/\s/g,' ');};
		var ref = document.referrer.match(/^.*\/\/([^\/]+)\//);

		if (ref && ref[1].match(/\.facebook\./))
			$.cookie('social_facebook', 1, { path: '/', expires: 30 }); // 30 jours

		$.each(socialtags, function(){ if (this.u) {
			if (this.a == 'bookmark' && !document.all) return;

			

			$('<a rel="nofollow"><img class="socialtags-hovers" src="'+ this.i +'" alt="'+this.a+'"\/><\/a>')
			.attr('href',
				this.u
				.replace(/%u/g, esc(url))
				.replace(/%t/g, esc(title))
				.replace(/%d/g, esc(description))
				.replace(/%u_site/g, esc(this.u_site))
			)
			.attr('title', this.n).wrap('<li class="'+this.a+'"><\/li>')
			.parent().appendTo(ul);
		}});
		selector.after(ul.wrap('<div class="socialtags"><\/div>').parent());
		
		};
	$(function(){
		$(socialtags_init);
	});
})(jQuery);
