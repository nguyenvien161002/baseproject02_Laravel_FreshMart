const labels = ['July', 'August', 'September', 'October', 'November', '	December',];

const data = {
    labels: labels,
    datasets: [
        {
            label: 'Doanh thu tháng',
            data: [0, 350, 550, 680, 230, 800],
            borderColor: "#4e73df",
            backgroundColor: "#4e73df",
            tension: 0.4,
            pointStyle: 'circle',
            pointRadius: 7,
            pointHoverRadius: 15
        },
        {
            label: 'Khách hàng',
            data: [0, 100, 450, 210, 900, 500],
            borderColor: "red",
            backgroundColor: "red",
            tension: 0.4,
            pointStyle: 'circle',
            pointRadius: 7,
            pointHoverRadius: 15
        },
        {
            label: 'Đơn hàng',
            data: [0, 65, 200, 405, 300, 600],
            borderColor: "yellow",
            backgroundColor: "yellow",
            tension: 0.4,
            pointStyle: 'circle',
            pointRadius: 7,
            pointHoverRadius: 15
        }

    ]
};

const configLine = {
    type: 'line',
    data: data,
};

const lineChart = document.querySelector('#line-chart');
if(lineChart) {
    const lineChartOb = new Chart(lineChart, configLine);
}
