var timerId;

function clockdown(end) {
	timerId = countdown(callback, end, countdown.HOURS|countdown.MINUTES|countdown.SECONDS, 2);
}

function callback(ts) {
	document.getElementById("pageTimer").innerHTML = ts.toHTML();
	if (ts.value <= 0) {
		window.clearInterval(timerId);
		document.getElementById("pageTimer").innerHTML = "Over!"
	}
}

