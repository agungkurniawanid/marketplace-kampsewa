const keuntungan = document.getElementById("chart-keuntungan");

const dataChartKeuntungan = {
    labels: ["keuntungan", "Max keuntungan"],
    datasets: [
        {
            label: "Keuntungan",
            data: [50, 100],
            backgroundColor: [
                "rgb(54, 162, 235)",
                "#F2F5FD",
            ],
            hoverOffset: 4,
            borderRadius : 10,
        },
    ],
};


const configKeuntungan = {
    type: "doughnut",
    data: dataChartKeuntungan,
    options: {
        plugins: {
            legend: {
                display: false,
            },
        },
    },
};

new Chart(keuntungan, configKeuntungan);
