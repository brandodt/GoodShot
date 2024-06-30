var abc = document.getElementById("orderChart").getContext("2d");
var orderChart = new Chart(abc, {
  type: "line",
  data: {
    labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    datasets: [
      {
        label: "Total Item Sold",
        data: [0, 9, 19, 14, 19, 34, 36, 37],
        borderColor: "rgba(172, 125, 232)",
        backgroundColor: "rgba(172, 125, 232, 0.4)",
        fill: false,
        tension: 0.1, // No curvature
        borderWidth: 5,
      },
    ],
  },
});

var def = document.getElementById("ticketChart").getContext("2d");
var ticketChart = new Chart(def, {
  type: "line",
  data: {
    labels: ["0", "5", "10", "15", "20", "25", "30"],
    datasets: [
      {
        label: "Total Revenue",
        data: [0, 499000, 210000, 510000, 220000, 585000, 685000],
        borderColor: "rgba(172, 125, 232)",
        backgroundColor: "rgba(172, 125, 232, 0.4)",
        tension: 0.1,
        borderWidth: 5,
      },
    ],
  },
  options: {
    scales: {
      y: {
        ticks: {
          callback: function (value, index, values) {
            if (value >= 1000) {
              return value / 1000 + "k";
            }
            return value;
          },
        },
      },
    },
  },
});
var ghi = document.getElementById("barChart").getContext("2d");
var barChart = new Chart(ghi, {
  type: "horizontalBar",
  data: {
    labels: [
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
    ],
    datasets: [
      {
        label: "Important Metric",
        data: [169, 174, 195, 187, 140, 150, 189, 210, 175, 150, 193, 139],
        backgroundColor: [
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
          "rgba(26, 100, 156,0.6)",
          "rgba(71, 175, 225,0.4)",
        ],
      },
    ],
  },
});
