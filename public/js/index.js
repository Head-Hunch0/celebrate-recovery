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


document.getElementById("searchInput").addEventListener("input", function (e) {
    const searchTerm = e.target.value.trim();

    // Only search after 2 characters or when empty
    if (searchTerm.length > 2 || searchTerm.length === 0) {
        fetchSearchResults(searchTerm);
    }
});

function fetchSearchResults(searchTerm) {
    fetch(`/admin/search?search=${encodeURIComponent(searchTerm)}`, {
        headers: {
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            updateTable(data.tickets);
        })
        .catch((error) => console.error("Error:", error));
}

function updateTable(tickets) {
    const tableBody = document.getElementById("tableBody");
    const tableContainer = document.getElementById("tableContainer");

    if (!tickets || tickets.length === 0) {
        tableContainer.innerHTML =
            '<p class="mt-4 text-gray-500">No tickets found</p>';
        return;
    }

    // Rebuild the table body
    let html = "";
    tickets.forEach((ticket) => {
        html += `
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${
                ticket.uuid
            }</td>
            <td class="px-6 py-4">${ticket.full_name}</td>
            <td class="px-6 py-4">${ticket.phone_number}</td>
            <td class="px-6 py-4">${new Date(
                ticket.created_at
            ).toLocaleString()}</td>
            <td class="px-6 py-4">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">More</a>
            </td>
        </tr>
        `;
    });

    // If table body exists, update it; otherwise recreate entire table
    if (tableBody) {
        tableBody.innerHTML = html;
    } else {
        tableContainer.innerHTML = `
        <table id="registrationsTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Ticket No.</th>
                    <th scope="col" class="px-6 py-3">Names</th>
                    <th scope="col" class="px-6 py-3">Number</th>
                    <th scope="col" class="px-6 py-3">Time</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                ${html}
            </tbody>
        </table>
        `;
    }
}
