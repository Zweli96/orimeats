var Chart = require("../../node_modules/chart.js/dist/Chart.js");

$("#inputGroupFile02").on("change", function() {
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this)
        .next(".custom-file-label")
        .html(fileName);
});

var ctx = document.getElementById("donutChart");
var myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Sales Managers", "Drivers"],
        datasets: [
            {
                label: "Registered Personnel",
                data: [12, 19],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)"
                ],
                borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)"],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true
                    }
                }
            ]
        }
    }
});

var ctx1 = document.getElementById("barChart");
var myDoughnutChart = new Chart(ctx1, {
    type: "doughnut",
    data: {
        labels: ["Bacon", "Sausages", "Polony", "Chicken"],
        datasets: [
            {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
                data: [2478, 5267, 734, 784]
            }
        ]
    },
    options: {
        title: {
            display: false,
            text: "Product Orders"
        }
    }
});
