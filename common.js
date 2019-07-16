function numbering() {
    let array_time = [toyota_time, honda_time, nissan_time, ferrari_time];

    let toyota = document.getElementById('toyota_time');
    let honda = document.getElementById('honda_time');
    let nissan = document.getElementById('nissan_time');
    let ferrari = document.getElementById('ferrari_time');

    let firstTime = Math.min.apply(null, array_time);

    let toyota_time_html = toyota.innerHTML.replace('時間', '');
    let honda_time_html = honda.innerHTML.replace('時間', '');
    let nissan_time_html = nissan.innerHTML.replace('時間', '');
    let ferrari_time_html = ferrari.innerHTML.replace('時間', '');


    if(firstTime == toyota_time_html) {
        document.getElementById('toyota').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('toyota').style.backgroundColor = 'none';
    }
    
    if(firstTime == honda_time_html) {
        document.getElementById('honda').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('toyota').style.backgroundColor = 'none';
    }
    
    if(firstTime == nissan_time_html) {
        document.getElementById('nissan').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('toyota').style.backgroundColor = 'none';
    }
    
    if(firstTime == ferrari_time_html) {
        document.getElementById('ferrari').style.backgroundColor = 'rgba(20, 150, 30, 0.5)';
    } else {
        document.getElementById('toyota').style.backgroundColor = 'none';
    }
    
}

numbering();
