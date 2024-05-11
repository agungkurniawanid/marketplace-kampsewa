const labels = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "Mei",
    "Jun",
    "Jul",
    "Ag",
    "Sep",
    "Okt",
    "Nov",
    "Des",
];


const dataPenghasilanPertahun = {
    labels: labels,
    datasets: [
        {
            label: "My First Dataset",
            data: [
                43_540_293, 65_034_839, 23_843_313, 19_274_452, 87_346_133,
                35_453_134, 22_349_546, 55_245_654, 74_453_394, 39_544_425,
                41_503_452, 121_341_143,
            ],
            fill: true,
            borderWidth: 3,
            borderColor: "rgb(124,169,207)",
            tension: 0.4,
            backgroundColor: createGradient(),
        },
    ],
};

function createGradient() {
    const ctx = document.getElementById("penghasilan").getContext("2d");
    const gradient = ctx.createLinearGradient(0, 0, 0, 300); // Sesuaikan lebar gradien dengan ukuran grafik Anda
    gradient.addColorStop(0, "rgb(124,169,207)"); // Warna atas
    gradient.addColorStop(1, "rgba(255,255,255,0)"); // Transparansi putih di bagian bawah
    return gradient;
}

const configPenghasilanPertahun = {
    type: "line",
    data: dataPenghasilanPertahun,
    options: {
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0,
            },
        },
        tooltips: {
            line: false,
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        scales: {
            x: {
                grid: {
                    display: false,
                },
                border: {
                    display: false,
                },
            },
            y: {
                ticks: {
                    callback: function (value) {
                        // Hanya tampilkan label jika nilainya bukan 0
                        if (value !== 0) {
                            return value;
                        }
                    },
                },
                beginAtZero: true,
                border: {
                    display: false,
                },
                grid: {
                    display: false, // hilangkan garis vertikal
                },
            },
        },
    },
};
const penghasilan = document.getElementById("penghasilan");
new Chart(penghasilan, configPenghasilanPertahun);
