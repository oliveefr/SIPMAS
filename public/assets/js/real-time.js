function updateTime() {
    const waktu = new Date();
    const options = {
        weekday: 'long',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
        timeZone: 'Asia/Jakarta'
    };
    document.getElementById('current-time').textContent = waktu.toLocaleString('id-ID', options);
}

updateTime(); // initial call
setInterval(updateTime, 1000); 