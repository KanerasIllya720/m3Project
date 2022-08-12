function tick(){
    var month, date, hours, minutes, seconds, ap;
    var intYear, intDate, intMon, intHours, intMinutes, intSeconds;
    var today, timeString, dayString;
    today = new Date();
    intYear = today.getFullYear();
    intDate = today.getDate();
    intMon = today.getMonth() + 1;
    intHours = today.getHours();
    intMinutes = today.getMinutes();
    intSeconds = today.getSeconds();
    if(intMon < 10){
        month = "0" + intMon;
    }else{
        month = intMon;
    }
    if(intDate < 10){
        date = "0" + intDate;
    }else{
        date = intDate;
    }
    if(intHours == 0){
        hours = "12";
        ap = "AM";
    }else if(intHours < 12){
        if(intHours < 10){
            hours = "0" + intHours;
        }else{
            hours = intHours;
        }
        ap = "AM";
    }else if(intHours > 12 && intHours < 24){
        hours = intHours - 12;
        ap = "PM";
    }else{
        hours = "12";
        ap = "PM";
    }
    if(intMinutes < 10){
        minutes = "0" + intMinutes;
    }else{
        minutes = intMinutes;
    }
    if(intSeconds < 10){
        seconds = "0" + intSeconds;
    }else{
        seconds = intSeconds;
    }
    dayString = intYear + "-" + month + "-" + date;
    timeString = hours +":" + minutes + ":" + seconds + " " + ap;
    day.innerHTML = dayString;
    time.innerHTML = timeString;
    window.setTimeout("tick();", 100);
}
window.onload = tick;