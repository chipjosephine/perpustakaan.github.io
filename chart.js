    var anggota = document.getElementById('anggota').getContext('2d');
    var pengunjung = document.getElementById('pengunjung').getContext('2d');
    var peminjaman = document.getElementById('peminjaman').getContext('2d');
    var pengembalian = document.getElementById('pengembalian').getContext('2d');

    //Anggota//
    var anggota = new Chart(anggota, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Anggota',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                'rgba(255, 222, 89, 1)',
                'rgba(231, 111, 81, 1)',
                'rgba(42, 157, 143, 1)',
                'rgba(0, 150, 199, 1)',
                'rgba(123, 44, 191, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });

    //Pengunjung//
    var pengunjung = new Chart(pengunjung, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Pengunjung',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });

    //Peminjaman//
    var peminjaman = new Chart(peminjaman, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Buku Dipinjam',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                'rgba(255, 222, 89, 1)',
                'rgba(231, 111, 81, 1)',
                'rgba(42, 157, 143, 1)',
                'rgba(0, 150, 199, 1)',
                'rgba(123, 44, 191, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });


 //Pengembalian//
    var pengembalian = new Chart(pengembalian, {
        type: 'bar',
        data : {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
            datasets: [{
                label: 'Buku Dikembalikan',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
        }]
    },
    options: {
        scales: {
            y: {
                    beginAtZero: true
                }
            }
        }
    });
