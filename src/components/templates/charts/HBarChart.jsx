import { Bar } from "react-chartjs-2";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
} from "chart.js";

// Registering necessary chart components
ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
);



const HBarChart = ({ totalData }) => {

  let months = totalData?.reduce((curr, prev) => [...curr, prev.title], []) || []
  months.shift()
  months = [...months,"Total Jobs"]
  let number = totalData?.reduce((curr, prev) => [...curr, prev.value], []) || []
  number.shift()
  number = [...number,totalData?.[0]?.value]
  console.log("months",totalData,totalData?.[0]?.value, number);

  return (
    <div className="chart">
      <Bar
        data={{
          labels: months.map((month) => month),
          datasets: [
            {
              label: "",
              data: months.map(() => 0), // full height
              backgroundColor: "rgba(169, 169, 169, 0.3)",
              borderRadius: 50,
              categoryPercentage: 0.3, // width of the bars
              grouped: false, // behind
              order: 0
            },
            {
              label: "Jobs",
              data: number,
              backgroundColor: ["#f8d065", "rgba(89, 89, 89, 1)"],
              borderRadius: 50,
              categoryPercentage: 0.3,
              order: 1
            }
          ]
        }}
        options={{
          responsive: true,
          maintainAspectRatio: false,
          indexAxis: "y",
          scales: {
            x: {
              beginAtZero: true,
              ticks: {
                font: { size: 10 },
                display: false
              },
              grid: {
                display: false
              }
            },
            y: {
              ticks: {
                font: {
                  size: (context) => {
                    const width = context.chart.width;
                    let size = Math.round(width / 55);
                    return size;
                  }
                }
              },
              grid: {
                display: false
              }
            }
          },
          plugins: {
            legend: {
              display: false,
              position: "top",
              labels: {
                font: { size: 10 }
              },
              Tooltip: {
                enabled: false
              }
            }
          },
          afterFit: (axis) => {
            axis.width = axis.chart.width * 0.5; // Force Y-axis to take up 50% of chart width
          }
        }}
      />
    </div>
  );
};

export default HBarChart;
