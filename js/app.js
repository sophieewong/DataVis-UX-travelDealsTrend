var ctx = document.getElementById("trendChart").getContext("2d");

var colours = new Map();
colours.set("Mumbai", "rgba(255, 99, 132, 1)");
colours.set("Sydney", "rgba(54, 162, 235, 1)");
colours.set("New York", "rgba(255, 206, 86, 1)");
colours.set("Tokyo", "rgba(75, 192, 192, 1)");

function myAjaxFunction() {
  var select = document.getElementById("deal");
  var selection = select.value;

  if (selection == "all" || selection == "") {
    var link = "http://localhost/dataVis/allDeals.php";
  } else {
    var link = "http://localhost/dataVis/all.php?deal='" + selection + "'";
  }

  $.ajax({
    url: link,
    method: "GET",
    success: function(data = this.responseText) {
      var months = [];
      var dataSets = [];

      for (var i in data) {
        var touristCounts = [];
        data[i].months.forEach(function({ month, touristCount }) {
          months.push(month);
          touristCounts.push(touristCount);
        });

        dataSets.push({
          label: data[i].dealDestination,
          labels: [data[i].dealDestination],
          data: touristCounts,
          backgroundColor: colours.get(data[i].dealDestination),
          borderWidth: "2",
          borderColour: "white",
          hoverBorderColor: "grey"
        });
      }

      createChart(months, dataSets);
    },
    error: function(data = this.responseText) {
      console.err;
      console.log(data);
      document.body.innerHTML = data.responseText;
    }
  });
}

function createChart(month, dataSets) {
  var universalOptions = {
    maintainAspectRatio: false,
    responsive: false,
    title: {
      display: true,
      text: "Total Visits Predicted in 2020 for Deals of the Month"
    },
    legend: {
      display: true
    },
    scales: {
      yAxes: [
        {
          display: true,
          ticks: {
            beginAtZero: true
          }
        }
      ]
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          var dataset = data.datasets[tooltipItem.datasetIndex];
          var index = tooltipItem.index;
          return dataset.label + ": " + dataset.data[index];
        }
      }
    }
  };

  var chartdata = {
    labels: Array.from(new Set(month)),
    datasets: dataSets
  };

  //to stop overlap
  $("select").on("change", function() {
    barGraph.destroy();
  });

  var update_caption = function(legend) {
    labels[legend.text] = legend.deal;
    var selected = Object.keys(labels).filter(function(key) {
      return labels[key];
    });
  };

  var barGraph = new Chart(ctx, {
    type: "bar",
    data: chartdata,
    options: universalOptions
  });

  console.log(barGraph);
}
