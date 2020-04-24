var ctx = document.getElementById("trendChart").getContext("2d");

var colours = new Map();
colours.set("Mumbai", "rgba(255, 99, 132, 1)");
colours.set("Sydney", "rgba(54, 162, 235, 1)");
colours.set("NewYork", "rgba(255, 206, 86, 1)");
colours.set("New York", "rgba(255, 206, 86, 1)");
colours.set("Tokyo", "rgba(75, 192, 192, 1)");

function myAjaxFunction() {
  var select = document.getElementById("deal");
  var selection = select.value;

  var startMonth = document.getElementById("starting-month").value;
  var endMonth = document.getElementById("ending-month").value;
  var chartType = document.getElementById("chartType").value;

  var chosenMonths = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];

  if (chosenMonths.indexOf(startMonth) > chosenMonths.indexOf(endMonth)) {
    alert(
      "Oops! 😞\nPlease select a starting month that is before the ending month."
    );

    startMonth = chosenMonths[0];
    $("#starting-month").val("January");
  }

  chosenMonths = chosenMonths.filter(function (month, index) {
    //check if current index is more than or equal to chosenMonths.indexOf(startMonth) && it is less than or equal to chosenMonths.indexOf(endMonth) to return true
    return (
      index >= chosenMonths.indexOf(startMonth) &&
      index <= chosenMonths.indexOf(endMonth)
    );
  });

  if (selection == "all" || selection == "") {
    var link = "http://localhost/DataVis-UX-travelDealsTrend/allDeals.php";
  } else {
    var link =
      "http://localhost/DataVis-UX-travelDealsTrend/singleDeal.php?deal='" +
      selection +
      "'";
  }

  $.ajax({
    url: link,
    method: "GET",
    success: function (data = this.responseText) {
      var months = [];
      var dataSets = [];

      for (var i in data) {
        var touristCounts = [];
        data[i].months.forEach(function ({ month, touristCount }) {
          //if month is in array of chosen months
          if (chosenMonths.indexOf(month) !== -1) {
            //do the following
            months.push(month);
            touristCounts.push(touristCount);
          }
        });

        if (chartType == "line") {
          dataSets.push({
            label: data[i].dealDestination,
            labels: [data[i].dealDestination],
            data: touristCounts,
            fill: false,
            borderColor: colours.get(data[i].dealDestination),
            pointBackgroundColor: colours.get(data[i].dealDestination),
            type: "line",
            order: 2,
          });
        } else {
          dataSets.push({
            label: data[i].dealDestination,
            labels: [data[i].dealDestination],
            data: touristCounts,
            backgroundColor: colours.get(data[i].dealDestination),
            borderWidth: "2",
            borderColour: "white",
            hoverBorderColor: "grey",
          });
        }
      }

      createChart(months, dataSets);
    },
    error: function (data = this.responseText) {
      console.err;
      console.log(data);
      document.body.innerHTML = data.responseText;
    },
  });
}

function createChart(month, dataSets) {
  var universalOptions = {
    maintainAspectRatio: false,
    responsive: true,
    title: {
      display: true,
      text: "Total Visits Predicted in 2020 for Deals of the Month",
      fontSize: 16,
      fontStyle: "bold",
    },
    legend: {
      display: true,
    },
    scales: {
      yAxes: [
        {
          display: true,
          scaleLabel: {
            display: true,
            labelString: "Tourist Count (in Thousands)",
          },
          ticks: {
            beginAtZero: true,
          },
        },
      ],
      xAxes: [
        {
          display: true,
          scaleLabel: {
            display: true,
            labelString: "Month(s)",
          },
        },
      ],
    },
    tooltips: {
      callbacks: {
        label: function (tooltipItem, data) {
          var dataset = data.datasets[tooltipItem.datasetIndex];
          var index = tooltipItem.index;
          return dataset.label + ": " + dataset.data[index];
        },
      },
    },
  };

  var barchartdata = {
    datasets: dataSets,
    labels: Array.from(new Set(month)),
  };

  //to stop overlap
  $("select").on("change", function () {
    barGraph.destroy();
  });

  var barGraph = new Chart(ctx, {
    type: "bar",
    data: barchartdata,
    options: universalOptions,
  });
}
