function numbering() {
    let array_time = [toyota_total_time, honda_total_time, nissan_total_time, ferrari_total_time];

    let toyota = document.getElementById('toyota_time');
    let honda = document.getElementById('honda_time');
    let nissan = document.getElementById('nissan_time');
    let ferrari = document.getElementById('ferrari_time');

    let firstTime = Math.min.apply(null, array_time);
    let hour = Math.floor(firstTime / 60);
    let min = firstTime % 60;
    firstTime = hour + '時間' + min + '分';
    console.log(firstTime);

    let toyota_time_html = toyota.innerHTML;
    let honda_time_html = honda.innerHTML;
    let nissan_time_html = nissan.innerHTML;
    let ferrari_time_html = ferrari.innerHTML;
    console.log(toyota_time_html);

    if(firstTime == toyota_time_html) {
        document.getElementById('toyota').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('toyota').style.backgroundColor = 'none';
    }
    
    if(firstTime == honda_time_html) {
        document.getElementById('honda').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('honda').style.backgroundColor = 'none';
    }
    
    if(firstTime == nissan_time_html) {
        document.getElementById('nissan').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('nissan').style.backgroundColor = 'none';
    }
    
    if(firstTime == ferrari_time_html) {
        document.getElementById('ferrari').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('ferrari').style.backgroundColor = 'none';
    }
    
}

numbering();
