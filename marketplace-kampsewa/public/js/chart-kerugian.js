const kerugian = document.getElementById("chart-kerugian");

const dataChartKerugian = {
    labels: ["Kerugian", "Max Kerugian"],
    datasets: [
        {
            label: "Kerugian",
            data: [20, 80],
            backgroundColor: [
                "rgb(54, 162, 235)",
                "#F2F5FD",
            ],
            hoverOffset: 4,
            borderRadius : 10,
        },
    ],
};


const configKerugian = {
    type: "doughnut",
    data: dataChartKerugian,
    options: {
        plugins: {
            legend: {
                display: false,
            },
        },
    },
};

new Chart(kerugian, configKerugian);
