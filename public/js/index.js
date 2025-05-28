const getChartOptions = () => {
    return {
        series: [90, 85, 70],
        colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
        chart: {
            height: "350px",
            width: "100%",
            type: "radialBar",
            sparkline: {
                enabled: true,
            },
        },
        plotOptions: {
            radialBar: {
                track: {
                    background: "#E5E7EB",
                },
                dataLabels: {
                    show: false,
                },
                hollow: {
                    margin: 0,
                    size: "32%",
                },
            },
        },
        grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -23,
                bottom: -20,
            },
        },
        labels: ["Done", "In progress", "To do"],
        legend: {
            show: true,
            position: "bottom",
            fontFamily: "Inter, sans-serif",
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        yaxis: {
            show: false,
            labels: {
                formatter: function (value) {
                    return value + "%";
                },
            },
        },
    };
};

if (
    document.getElementById("radial-chart") &&
    typeof ApexCharts !== "undefined"
) {
    const chart = new ApexCharts(
        document.querySelector("#radial-chart"),
        getChartOptions()
    );
    chart.render();
}



const options = {
    series: [
        {
            name: "Income",
            color: "#31C48D",
            data: ["1420", "1620", "1820", "1420", "1650", "2120"],
        },
        {
            name: "Expense",
            data: ["788", "810", "866", "788", "1100", "1200"],
            color: "#F05252",
        },
    ],
    chart: {
        sparkline: {
            enabled: false,
        },
        type: "bar",
        width: "100%",
        height: 400,
        toolbar: {
            show: false,
        },
    },
    fill: {
        opacity: 1,
    },
    plotOptions: {
        bar: {
            horizontal: true,
            columnWidth: "100%",
            borderRadiusApplication: "end",
            borderRadius: 6,
            dataLabels: {
                position: "top",
            },
        },
    },
    legend: {
        show: true,
        position: "bottom",
    },
    dataLabels: {
        enabled: false,
    },
    tooltip: {
        shared: true,
        intersect: false,
        formatter: function (value) {
            return "$" + value;
        },
    },
    xaxis: {
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass:
                    "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
            formatter: function (value) {
                return "$" + value;
            },
        },
        categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        axisTicks: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
    },
    yaxis: {
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass:
                    "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
        },
    },
    grid: {
        show: true,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -20,
        },
    },
    fill: {
        opacity: 1,
    },
};

if (document.getElementById("bar-chart") && typeof ApexCharts !== "undefined") {
    const chart = new ApexCharts(document.getElementById("bar-chart"), options);
    chart.render();
}



// donwload users csv 
// function downloadTableAsCSV(tableId, filename = "registrations.csv") {
//     const table = document.getElementById(tableId);
//     const rows = Array.from(table.querySelectorAll("tr"));
//     const csv = [];

//     rows.forEach((row) => {
//         const cells = Array.from(row.querySelectorAll("th, td")).map((cell) => {
//             return `"${cell.textContent.trim().replace(/"/g, '""')}"`;
//         });
//         csv.push(cells.join(","));
//     });

//     const csvString = csv.join("\n");
//     const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
//     const link = document.createElement("a");

//     link.setAttribute("href", URL.createObjectURL(blob));
//     link.setAttribute("download", filename);
//     link.style.display = "none";
//     document.body.appendChild(link);
//     link.click();
//     document.body.removeChild(link);
// }

function downloadTableAsCSV(filename = "tickets.csv") {
    const table = document.getElementById("registrationsTable");
    const rows = Array.from(table.querySelectorAll("tr"));
    const csv = [];

    rows.forEach((row, rowIndex) => {
        const cells = Array.from(row.querySelectorAll("th, td"))
            .filter((cell, idx) => idx < 4) // Only include first 4 columns (UUID, Name, Phone, Created At)
            .map((cell) => `"${cell.textContent.trim().replace(/"/g, '""')}"`);
        csv.push(cells.join(","));
    });

    const csvString = csv.join("\n");
    const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");
    link.setAttribute("href", URL.createObjectURL(blob));
    link.setAttribute("download", filename);
    link.style.display = "none";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}