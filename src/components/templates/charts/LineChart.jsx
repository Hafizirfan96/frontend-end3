import { Line } from "react-chartjs-2"
import { Chart as ChartJS, CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend } from "chart.js";

// Register necessary Chart.js components
ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip, Legend);


const days = ['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun']
const LineChart = ({ totalData }) => {

    return (
        <div className="chart">

            <Line
                data={{
                    labels: days.map(i => i.toUpperCase()),
                    datasets: [
                        {
                            label: 'Daily Accounts',
                            data: totalData.map((v) => v.total),
                            borderColor: "rgba(89,89,89,1)",
                            backgroundColor: "rgba(89,89,89,1)",
                            tension: .4, 
                            fill: false, 
                            borderWidth:2, 
                            pointRadius:0,
                            pointBackgroundColor: "black",
                        }
                    ]
                }}
                options={{
                    responsive: true,  
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: false,
                                text: 'Days of the Week', 
                            },
                            grid: {
                                display: false, 
                            },
                        },
                        y: {
                            title: {
                                display: false,
                                text: 'Total Value', 
                            },
                            beginAtZero: true,
                            grid:{
                                display:true,
                                // backgroundColor: "rgba(89,89,89,1)",
                                // borderColor: "rgba(89,89,89,1)",
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false, 
                        },
                        tooltip: {
                            enabled: true, 
                            backgroundColor: "rgba(89,89,89,1)",
                            titleColor: "#fff",  
                            bodyColor: "#fff",  
                        }
                    }
                }}

            />
        </div>
    )
}

export default LineChart
