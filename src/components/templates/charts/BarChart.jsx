import { Bar } from "react-chartjs-2"
import { Chart as ChartJS, CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend } from 'chart.js';

// Registering necessary chart components
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);


// const months = ['jan', 'feb', 'mar', 'april', 'may', 'june', 'july', 'aug', 'sep', 'oct', 'nov', 'dec'] 

const gradient = (ctx, chartArea) => {
    const { top, bottom } = chartArea;
    const gradient = ctx.createLinearGradient(0, top, 0, bottom);
    gradient.addColorStop(0, '#836a29');
    gradient.addColorStop(1, '#f8d065');
    return gradient;
}

const data = (months,values) => {
    return {
        labels: months.map(i => i.toUpperCase()),
        datasets: [
            {
                label: "Background Bars",
                // data: months.map(() => 13), // full height
                backgroundColor: 'rgba(169, 169, 169, .3)',
                borderRadius: 50,
                // barThickness: 10,
                categoryPercentage: 0.2, // width of the bars
                // barPercentage: .5, // Ensure the bars fill up the available space
                grouped: false, // behind
                order: 0
            },
            {
                label: "Monthly data",
                data: values.map((v) => v),
                // backgroundColor: totalData.map(clr => clr.clr)
                backgroundColor: function (context) {
                    const { ctx, chartArea } = context.chart;
                    if (!chartArea) {
                        return null;
                    }
                    return gradient(ctx, chartArea);
                },
                borderRadius: 50,
                // barThickness:10,
                categoryPercentage: .2,
                order: 1
            }
        ]
    }
}

const options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            ticks: {
                font: { size: 10 },
            },
            grid: {
                display: false
            }
        },
        y: {
            beginAtZero: true,
            ticks: {
                font: { size: 10 },
            },
            grid: {
                display: false
            },
        },
    },
    plugins: {
        legend: {
            display: false,
            position: 'bottom',
            labels: {
                font: { size: 10 },
            },
            Tooltip: {
                enabled: false
            }
        },
    },
}
const BarChart = ({ totalData }) => {
    const months = totalData?.reduce((curr, prev) => [...curr, prev?.title], []) || []
    const values =  totalData?.reduce((curr, prev) => [...curr, prev?.valus], []) || []
    return (
        <div className="chart">
            <Bar data={data(months,values)} options={options} />
        </div>
    )
}

export default BarChart

