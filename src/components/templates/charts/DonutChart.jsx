import { Doughnut } from "react-chartjs-2";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";

ChartJS.register(ArcElement, Tooltip, Legend);

const attributeData = [
  // { title: "Total Jobs", total: 55, percent: +8.2, clr: "#f8d065" },
  { title: "Complete Jobs", total: 35, percent: +8.2, clr: "#b78b16" },
  { title: "In Progress Jobs", total: 4, percent: +8.2, clr: "#d8b454" },
  { title: "Cancelled Jobs", total: 3, percent: -6.5, clr: "#836a29" }
];

const DoughnutChart = ({ totalData }) => {


  const data = {
    labels: totalData.map((item) => item.title),
    datasets: [
      {
        data: totalData.map((item) => {
          if (item?.title !== "Total Jobs")
            return item.value

        }),
        backgroundColor: totalData.map((item) => attributeData.find(i => i.title === item?.title)?.clr),
        hoverBackgroundColor: totalData.map((item) => attributeData.find(i => i.title === item?.title)?.clr)
      }
    ]
  };

  const options = {
    responsive: true,
    cutout: "70%",
    plugins: {
      tooltip: {
        callbacks: {
          label: (tooltipItem) => {
            const dataset = tooltipItem.dataset;
            const currentValue = dataset.data[tooltipItem.dataIndex];
            const total = dataset.data.reduce((sum, value) => sum + value, 0);
            const percentage = ((currentValue / total) * 100).toFixed(2);
            return `${tooltipItem.label}: ${currentValue} (${percentage}%)`;
          }
        }
      },
      legend: {
        display: false
      }
    }
  };



  return (
    <div
      className={`chart grid grid-cols-1 lg:grid-cols-4 flex-col sm:flex-row  pt-4 gap-y-16 md:gap-y-0 gap-x-0 lg:gap-x-16 `}
    >
      <div className={`  flex justify-center items-center`}>
        <Doughnut data={data} options={options} />
      </div>

      <div className={`w-full md:col-span-3`}>
        <ul className="flex flex-col gap-4">
          {data.labels.map((label, index) => {
            const value = data.datasets[0].data[index];
            const percentage = ((value / (totalData?.[0]?.value || 1)) * 100).toFixed(0);
            return (
              <li
                key={label}
                className="flex justify-between items-center gap-2"
              >
                <div className="flex items-center gap-2">
                  <span
                    style={{
                      color: data.datasets[0].backgroundColor[index],
                      fontSize: "1.5rem"
                    }}
                  >
                    ●
                  </span>
                  <span
                    className={`text-[1.2rem] lg:text-[1.4rem] xl:text-[1.8rem] text-text-secondary font-semibold truncate`}
                  >
                    {label}
                  </span>
                </div>
                <div className="flex items-center gap-1">
                  <span
                    className={`text-[1.2rem] lg:text-[1.4rem] xl:text-[1.8rem] font-semibold text-text-secondary`}
                  >
                    {label == "Total Jobs" ? totalData?.[0]?.value :
                      value}
                  </span>
                  <span
                    className={`bg-text-primary w-14
                      text-card font-medium py-1 px-4 rounded-full text-[1rem]`}
                  >
                    {label == "Total Jobs" ? " " :
                      `${percentage}%`
                    }
                  </span>
                </div>
              </li>
            );
          })}
        </ul>
      </div>
    </div>
  );
};

export default DoughnutChart;
