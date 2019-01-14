/* Compress using https://jscompress.com/ */

/* nav bar active selector */
navActiveArray.forEach(function(s){$("#"+s).addClass("active");});


/* Shrink the Nav bar once we've scrolled 50px or more down the screen. */
$(window).scroll(function() {
	var scroll = $(window).scrollTop();
	if(scroll >= 50) {
		$("header").addClass("header-scroll");
		$("header img").addClass("header-div-a-img-scroll");
		$("header div button").addClass("header-div-button-scroll");
		$(".scrollToTopButton").addClass("scrollToTopButton-active");
	} else {
		$("header").removeClass("header-scroll");
		$("header img").removeClass("header-div-a-img-scroll");
		$("header div button").removeClass("header-div-button-scroll");
		$(".scrollToTopButton").removeClass("scrollToTopButton-active");
	}

	if(scroll >= 450) {
		$("header img").addClass("header-div-a-img-scroll-dropshadow");
		$(".toggle").addClass("toggle-scroll-dropshadow");
	} else {
		$("header img").removeClass("header-div-a-img-scroll-dropshadow");
		$(".toggle").removeClass("toggle-scroll-dropshadow");
	}
});


/* nav bar controls */
!function(e, n) {
	var i = {
		init: function(n, i) {
			var u = this;
			u.options = e.extend({}, e.fn.nav.options, n),
			u.$body = e("body"),
			u.$nav = e(i),
			u.$menuButton = e(u.options.navButton),
			u.$subMenu = e(u.options.subMenu),
			u.subMenu = u.options.subMenu,
			u.mobileMode = u.isCurrentlyMobile(u),
			u.mouseOver = u.options.mouseOver,
			u.disableSubMenuLink = u.options.disableSubMenuLink,
			u.slideSpeed = u.options.slideSpeed,
			u.collapseSubMenus(u), u.bindEvents(u)
		},
		bindEvents: function(i) {
			i.$menuButton.on("click", function(e) {
				i.toggleNav(i), e.preventDefault()
			}), i.$nav.on("click", i.subMenu + " > a", function(n) {
				var u = e(this);
				i.isSubMenuLinkDisabled(i, u) && (i.toggleSubMenu(i, u.parent()), n.preventDefault())
			}), 1 == i.mouseOver && (i.$nav.on("mouseenter", i.subMenu, function() {
				0 == i.mobileMode && i.openSubMenu(i, e(this))
			}), i.$nav.on("mouseleave", i.subMenu, function() {
				0 == i.mobileMode && i.closeSubMenu(i, e(this))
			})), e(n).on("resize", function() {
				i.resetNav(i)
			})
		},
		isSubMenuLinkDisabled: function(e, n) {
			return "always" == e.disableSubMenuLink || "#" == n.attr("href") || "mobile" == e.disableSubMenuLink && 1 == e.mobileMode || "desktop" == e.disableSubMenuLink && 0 == e.mobileMode
		},
		toggleNav: function(n) {
			n.$nav.stop().clearQueue().slideToggle(n.slideSpeed, function() {
				var i = e(this);
				i.is(":hidden") ? (n.collapseSubMenus(n), e(this).attr("style", "display: none;")) : e(this).attr("style", "display: block;")
			}), n.$body.toggleClass("nav-lock-scroll")
		},
		toggleSubMenu: function(e, n) {
			n.hasClass("nav-active") ? e.closeSubMenu(e, n) : e.openSubMenu(e, n)
		},
		openSubMenu: function(n, i) {
			i.addClass("nav-active").children("ul").stop().clearQueue().slideDown(n.slideSpeed, function() {
				e(this).attr("style", "display: block;")
			}), i.siblings(n.subMenu).removeClass("nav-active").children("ul").slideUp(n.slideSpeed, function() {
				e(this).clearQueue()
			}).find(".nav-active").removeClass("nav-active").children("ul").slideUp(n.slideSpeed, function() {
				e(this).clearQueue()
			})
		},
		closeSubMenu: function(n, i) {
			i.removeClass("nav-active").children("ul").stop().clearQueue().slideUp(n.slideSpeed, function() {
					e(this).attr("style", "display: none;")
			}).find(".nav-active").removeClass("nav-active").children("ul").slideUp(n.slideSpeed, function() {
				e(this).clearQueue()
			})
		},
		resetNav: function(e) {
			var n = e.isCurrentlyMobile(e);
			e.mobileMode !== n && (e.$nav.removeAttr("style").find("ul").removeAttr("style"), e.$body.removeClass("nav-lock-scroll"), e.collapseSubMenus(e), e.mobileMode = n)
		},
		collapseSubMenus: function(e) {
			e.$subMenu.removeClass("nav-active").children("ul").hide()
		},
		isCurrentlyMobile: function(e) {
			return e.$menuButton.is(":visible")
		}
	};
	e.fn.nav = function(e) {
		return this.each(function() {
			var n = Object.create(i);
			n.init(e, this)
		})
	}, e.fn.nav.options = {
		navButton: ".toggle",
		subMenu: ".submenu",
		mouseOver: !0,
		disableSubMenuLink: "always",
		slideSpeed: 300
	}
}(jQuery, window, document), "function" != typeof Object.create && (Object.create = function(e) {	function n() {}	return n.prototype = e, new n	});
$('nav').nav();


/* Disable loading screen. */
window.setTimeout(function(){
	document.getElementById("loading_svg").style.opacity="0";
	window.setTimeout(function(){
		document.getElementById("loading_svg").style.display="none";
	},2000);
},500);
window.setTimeout(function(){document.getElementsByTagName("header")[0].style.opacity="1";},500);


/* MSG popup email form. */
var msgContainer = document.getElementById('msg');
var svgButton = document.getElementById('msg-svg-fill');
function msg_show(){
	document.getElementById("msg-svg-fill").classList.add("hide");
	document.getElementById("msg").classList.remove("hide");
}
function msg_hide(){
	document.getElementById("msg-svg-fill").classList.remove("hide");
	document.getElementById("msg").classList.add("hide");
}
/*document.addEventListener('click',function(e){*/
msgContainer.addEventListener('focusout',function(e){
	/*if(msgContainer!==e.target&&svgButton!==e.target&&!msgContainer.contains(e.target)){*/
		svgButton.classList.remove("hide");
		msgContainer.classList.add("hide");
	/*}*/
}, true);
$.validator.addMethod(
	"badCharRegex",
	function(value,element,regexp){
		var re=new RegExp(regexp);
		return this.optional(element)||re.test(value);
	},
	"Please check your input."
);
$("#msgForm").validate({
	rules:{
		msgName:{
			required:true,
			minlength:2,
			maxlength:32,
			badCharRegex:/^[^\<\>&#]+$/i
		},
		msgEmail:{
			required:true,
			email:true,
			maxlength:256
		},
		msgTextarea:{
			required:true,
			maxlength:512,
			badCharRegex:/^[^\<\>&#]+$/i
		}
	},
	messages:{
		msgName:{
			required:"Please enter your full name.",
			minlength:"This field must be between 2 to 32 characters.",
			maxlength:"This field must be between 2 to 32 characters.",
			badCharRegex:"The following characters are not permited in this form. ( > < & # ) Please remove before submitting."
		},
		msgEmail:{
			required:"Please enter a valid email address.",
			maxlength:"Please try to keep your email address to 256 characters or less."
		},
		msgTextarea:{
			required:"Please include a short message indicating how we can help you.",
			maxlength:"Please try to keep your messages to 512 characters or less.",
			badCharRegex:"The following characters are not permited in this form. ( > < & # ) Please remove before submitting."
		}
	},
	errorPlacement:function($error,$element){
		var name=$element.attr("name");
		$("#error-"+name).append($error);
	},
	submitHandler:function(form){
		var request;
		/* Abort any pending request. */
		if(request) request.abort();
		var $inputs=$(form).find("input,select,textarea,button");
		var serializedData=$(form).serialize();
		/* Disable the inputs for the duration of the ajax request. */
		$inputs.prop("disabled",true);
		request=$.ajax({
			beforeSend:function(XMLHttpRequest){
				$('#msgForm .has-error').removeClass('has-error');
				$('#msgForm .help-block').html('').hide();
				$('#msgFormMessage').removeClass('alert-success').html('');
			},
			cache:false,
			data:serializedData,
			dataType:'json',
			type:"post",
			url:"/{CCMS_LIB:_default.php;FUNC:ccms_lng}/msgForm-ajax.html"
		});
		/* Called on success. */
		request.done(function(json,textStatus) {
			if(json.error){
				/* Error messages */
				if(json.error.msgName){
					$('#msgName').parent().addClass('has-error');
					$('#error-msgName').html(json.error.msgName).slideDown();
				}
				if(json.error.msgEmail){
					$('#msgEmail').parent().addClass('has-error');
					$('#error-msgEmail').html(json.error.msgEmail).slideDown();
				}
				if(json.error.msgTextarea){
					$('#msgTextarea').parent().addClass('has-error');
					$('#error-msgTextarea').html(json.error.msgTextarea).slideDown();
				}
				$inputs.prop("disabled",false);
			}
			if(json.success){
				$('#msgFormMessage').addClass('alert-success').html(json.success).slideDown();
				setTimeout(function(){
					$('#msgFormMessage').slideUp("fast",function(){
						$(this).removeClass('alert-success').html('');
					});
				},5000);
				$('#msgForm').find('.form-control').val('');
				/* reenable the inputs */
				setTimeout(function(){
					$inputs.prop("disabled",false);
				},2000);
			}
		});
		/* Called on failure. */
		request.fail(function(jqXHR,textStatus,errorThrown){
			/* log the error to the console */
			$("#msgForm").html("The following error occurred: "+textStatus,errorThrown);
		});
		/* Called if the request failed or succeeded. */
		request.always(function(){
			/* reenable the inputs */
			setTimeout(function(){
				$inputs.prop("disabled",false);
			},5000);
		});
		/* Prevent default posting of form. */
		return false;
	}
});


/*
Add to Home screen (A2HS) code.
https://developer.mozilla.org/en-US/docs/Web/Apps/Progressive/Add_to_home_screen#How_do_you_make_an_app_A2HS-ready
*/
function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}
let a2Cookie;
let deferredPrompt;
const A2HSbox = document.getElementById("A2HS-box");
const A2HSbox_no = document.getElementById("A2HS-box-no");
const A2HSbox_yes = document.getElementById("A2HS-box-yes");
window.addEventListener("beforeinstallprompt",e => {
	a2Cookie = getCookie("A2HSbox");
	/* Test for A2HSbox cookie. */
	if (a2Cookie == "") {
		/* A2HSbox cookie not found so run 'beforeinstallprompt' event detection code. */
		console.log('A2HSbox cookie not found and "beforeinstallprompt" event detected, dropping A2HS box.');
		/* Prevent Chrome 67 and earlier from automatically showing the prompt. */
		e.preventDefault();
		/* Stash the event so it can be triggered later. */
		deferredPrompt = e;
		/* Update UI to notify the user they can add to home screen. */
		A2HSbox.classList.add("active");

		A2HSbox_no.addEventListener('click',e => {
			console.log('User dismissed A2HS prompt #1.');
			/* hide our user interface that shows our A2HS button. */
			A2HSbox.classList.remove("active");
			/* Set cookie to defer A2HS box apearence in the future.	(15768000 = 6 months) */
			document.cookie = "A2HSbox=1; max-age=15768000; path=/";
			deferredPrompt = null;
		});

		A2HSbox_yes.addEventListener('click',e => {
			console.log('User accepted A2HS prompt #1.');
			/* hide our user interface that shows our A2HS button. */
			A2HSbox.classList.remove("active");
			/* Show the prompt. */
			deferredPrompt.prompt();
			/* Wait for the user to respond to the prompt. */
			deferredPrompt.userChoice.then(choiceResult => {
				if (choiceResult.outcome === 'accepted') {
					console.log('User accepted A2HS prompt #2.');
				} else {
					console.log('User dismissed A2HS prompt #2.');
					/* Set cookie to defer A2HS box apearence in the future.	(15768000 = 6 months) */
					document.cookie = "A2HSbox=1; max-age=15768000; path=/";
				}
				deferredPrompt = null;
			});
		});
	}
});
