
window.onload = function() {
    var loader = document.getElementById("loader_home");
    loader.style.display = "none";
};


function getTimeRemaining(endtime) {
    const total = Date.parse(endtime) - Date.parse(new Date());
    const seconds = Math.floor((total / 1000) % 60);
    const minutes = Math.floor((total / 1000 / 60) % 60);
    const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    const days = Math.floor(total / (1000 * 60 * 60 * 24));
    
    return {
      total,
      days,
      hours,
      minutes,
      seconds
    };
  }
  
  function initializeClock(id, endtime) {
    const clock = document.getElementById(id);
    const daysSpan = clock.querySelector('.days');
    const hoursSpan = clock.querySelector('.hours');
    const minutesSpan = clock.querySelector('.minutes');
    const secondsSpan = clock.querySelector('.seconds');
  
    function updateClock() {
      const t = getTimeRemaining(endtime);
  
      daysSpan.innerHTML = t.days;
      hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
      minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
      secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
  
      if (t.total <= 0) {
        clearInterval(timeinterval);
      }
    }
  
    updateClock();
    const timeinterval = setInterval(updateClock, 1000);
  }
  const deadline = new Date(2024,4,13,8); //new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
  initializeClock('clockdiv', deadline);


  function getCleanPath(url) {
    var urlObj = new URL(url);
    var pathname = urlObj.pathname;
    if (pathname.charAt(0) === '/') {
        pathname = pathname.substr(1);
    }
    return pathname;
}
var workshopname = 'Heal Yourself Challenge';
var current_url_path = '/';
var current_url_protocol = 'URL_PREFIX';
var current_domain ='heal.satvicmovement.org';
var current_url = 'https://heal.satvicmovement.org/';
var source_page = getCleanPath(current_url);