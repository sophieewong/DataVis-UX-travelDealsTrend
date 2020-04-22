window.onload = function() {
  var trendChart = document.getElementById("trendChart").getContext("2d");
  var months = [
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
    "December"
  ];

  var deals = [
    "Mumbai, India",
    "Sydney, Australia",
    "New York, USA",
    "Tokyo, Japan"
  ];

  var stars = [1358, 5212, 1825, 1639];
  var a = [1250, 521, 1425, 1639];
  var b = [1230, 122, 148, 16];
  var c = [13550, 521, 1425, 639];

  var data = {
    type: "bar",
    data: {
      labels: months,
      datasets: [
        {
          label: deals[0],
          backgroundColor: ["rgba(255, 99, 132, 0.2)"],
          borderColor: ["rgba(255, 99, 132, 1)"],
          borderWidth: 1,
          data: stars
        },
        {
          label: deals[1],
          backgroundColor: ["rgba(54, 162, 235, 0.2)"],
          borderColor: ["rgba(54, 162, 235, 1)"],
          borderWidth: 1,
          data: a
        },
        {
          label: deals[2],
          backgroundColor: ["rgba(255, 206, 86, 0.2)"],
          borderColor: ["rgba(255, 206, 86, 1)"],
          borderWidth: 1,
          data: b
        },
        {
          label: deals[3],
          backgroundColor: ["rgba(75, 192, 192, 0.2)"],
          borderColor: ["rgba(75, 192, 192, 1)"],
          borderWidth: 1,
          data: c
        }
      ]
    },
    options: {
      responsive: true,
      legend: {
        position: "bottom"
      },
      title: {
        display: true,
        text: "Total Visits Predicted in 2020 for Deals of the Month!!!!!!!!!"
      }
    }
  };

  window.myBar = new Chart(trendChart, data);
};
