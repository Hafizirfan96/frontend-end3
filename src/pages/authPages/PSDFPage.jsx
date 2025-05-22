import { useEffect, useState } from "react";
import { Bar } from "react-chartjs-2";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import { useNavigate } from "react-router-dom";
import ChartDataLabels from "chartjs-plugin-datalabels";
import Heading from "@/components/templates/Heading/Heading";

const PSDFPage = () => {
  const navigate = useNavigate();
  const [year, setYear] = useState("");

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ChartDataLabels
  );

  const labels = [
    "Enrollments",
    "Graduates",
    "UnderTraining",
    "Dropouts",
    "Unsuccessful",
    "",
    "Enrollments",
    "Graduates",
    "UnderTraining",
    "Dropouts",
    "Unsuccessful",
  ];
  const dataGratudes = {
    labels,
    datasets: [
      {
        label: "Male",
        data: [800, 600, 200, 550, 500, null, 900, 650, 150, 600, 550],
        backgroundColor: "rgba(56, 142, 60, 0.85)",
        stack: "stack1",
        barThickness: 40,
      },
      {
        label: "Female",
        data: [700, 600, 300, 550, 500, null, 800, 650, 250, 600, 550],
        backgroundColor: "rgba(230, 81, 0, 0.85)",
        stack: "stack1",
        barThickness: 40,
      },
    ],
  };

  const totalLabelPlugin = {
    id: "totalLabelPlugin",
    afterDatasetsDraw(chart) {
      const {
        ctx,
        chartArea: { top },
        scales: { x, y },
      } = chart;

      const labelIndices = chart.data.labels
        .map((label, i) => i)
        .filter((i) => chart.data.labels[i]);

      labelIndices.forEach((i) => {
        const male = chart.data.datasets[0].data[i];
        const female = chart.data.datasets[1].data[i];

        if (male == null && female == null) return; // skip if both null

        const total = (male || 0) + (female || 0);
        const xPosition = x.getPixelForValue(i);
        const yPosition = y.getPixelForValue(total);

        ctx.save();
        ctx.font = "bold 12px sans-serif";
        ctx.fillStyle = "#000";
        ctx.textAlign = "center";
        ctx.fillText(total, xPosition, yPosition - 10);
        ctx.restore();
      });
    },
  };

  const optionsGratudes = {
    responsive: true,
    plugins: {
      datalabels: {
        anchor: "center",
        align: "center",
        color: "#fff",
        font: {
          weight: "bold",
        },
        display: function (context) {
          return context.dataset.data[context.dataIndex] != null;
        },
        formatter: function (value) {
          return value;
        },
      },

      totalLabelPlugin,
      legend: {
        position: "top",
        weight: "bold",
        font: {
          weight: "bold",
        },
      },
      title: {
        display: false,
      },
      tooltip: {
        mode: "index",
        intersect: false,
      },
    },
    scales: {
      x: {
        stacked: true,
        ticks: {
          callback: function (value, index) {
            return labels[index];
          },
          maxRotation: 0,
          minRotation: 0,
          autoSkip: false,
          padding: 10,
        },
      },
      y: {
        stacked: true,
        beginAtZero: true,
        ticks: {
          precision: 0,
        },
      },
    },
    layout: {
      padding: {
        bottom: 30,
      },
    },
  };

  const groupLabelPlugin = {
    id: "groupLabels",
    afterDraw: (chart) => {
      const {
        ctx,
        chartArea: { bottom },
        scales: { x },
      } = chart;

      const yOffset = 65;
      const midTechnical =
        (x.getPixelForValue(-0.2) + x.getPixelForValue(3.2)) / 2;
      const midVocational =
        (x.getPixelForValue(4.8) + x.getPixelForValue(11.2)) / 2;

      ctx.save();
      ctx.font = "bold 14px Arial";
      ctx.fillStyle = "#000";
      ctx.textAlign = "center";
      ctx.fillText("Public", midTechnical, bottom + yOffset);
      ctx.fillText("Private", midVocational, bottom + yOffset);
      ctx.restore();
    },
  };

  const data1 = {
    labels: [
      "Lahore",
      "Multan",
      "Faisalabad",
      "Gujranwala",
      "Jung",
      "Khanewal",
    ],

    datasets: [
      {
        label: "Male",
        data: [80551, 60000, 55000, 47000, 30000, 28000], // 6 values for 6 cities
        backgroundColor: "rgba(204, 70, 41, 0.85)",
        borderColor: "rgba(204, 70, 41, 0.85)",
        borderWidth: 1,
        barThickness: 30,
      },
      {
        label: "Female",
        data: [206389, 150000, 140000, 125000, 110000, 100000], // 6 values
        backgroundColor: "rgba(41, 128, 204, 0.85)",
        borderColor: "rgba(41, 128, 204, 0.85)",
        borderWidth: 1,
        barThickness: 30,
      },
      {
        label: "Co-Edu",
        data: [20389, 18000, 16000, 14000, 12000, 11000], // 6 values
        backgroundColor: "rgba(30, 154, 78, 0.85)",
        borderColor: "rgba(30, 154, 78, 0.85)",
        borderWidth: 1,
        barThickness: 30,
      },
    ],
  };

  const options1 = {
    responsive: true,
    indexAxis: "y",
    plugins: {
      datalabels: {
        anchor: "end",
        align: "end",
        color: "#000",
        font: {
          weight: "bold",
        },
        formatter: function (value) {
          return value;
        },
      },

      tooltip: {
        mode: "index",
        intersect: false,
      },
    },
    scales: {
      x: {
        stacked: false,
      },
      y: {
        stacked: false,
      },
    },
  };
  const labelsOwner = [
    "Enrollments",
    "Graduates",
    "UnderTraining",
    "Dropouts",
    "Unsuccessful",
    "",
    "Enrollments",
    "Graduates",
    "UnderTraining",
    "Dropouts",
    "Unsuccessful",
  ];

  const totalLabelPluginOwner = {
    id: "totalLabelPluginOwner",
    afterDatasetsDraw(chart) {
      const {
        ctx,
        chartArea: { top },
        scales: { x, y },
      } = chart;

      const labelIndices = chart.data.labels
        .map((label, i) => i)
        .filter((i) => chart.data.labels[i]); // Skip empty labels

      labelIndices.forEach((i) => {
        const male = chart.data.datasets[0].data[i];
        const female = chart.data.datasets[1].data[i];

        if (male == null && female == null) return;

        const total = (male || 0) + (female || 0);
        const xPosition = x.getPixelForValue(i);
        const yPosition = y.getPixelForValue(total);

        ctx.save();
        ctx.font = "bold 12px sans-serif";
        ctx.fillStyle = "#000";
        ctx.textAlign = "center";
        ctx.fillText(total, xPosition, yPosition - 10);
        ctx.restore();
      });
    },
  };

  const dataOwner = {
    labels: labelsOwner,
    datasets: [
      {
        label: "Male",
        data: [750, 580, 150, 520, 490, null, 880, 640, 150, 590, 530],
        backgroundColor: "#8884d8",
        stack: "stack1",
        barThickness: 40,
      },
      {
        label: "Female",
        data: [680, 620, 200, 500, 470, null, 320, 670, 200, 610, 540],
        backgroundColor: "#82ca9d",
        stack: "stack1",
        barThickness: 40,
      },
    ],
  };

  const optionsOwner = {
    responsive: true,
    plugins: {
      datalabels: {
        anchor: "center",
        align: "center",
        color: "#fff",
        font: {
          weight: "bold",
        },
        display: function (context) {
          return context.dataset.data[context.dataIndex] != null;
        },
        formatter: function (value) {
          return value;
        },
      },

      totalLabelPluginOwner,
      legend: {
        position: "top",
        weight: "bold",
        font: {
          weight: "bold",
        },
      },
      title: {
        display: false,
      },
      tooltip: {
        mode: "index",
        intersect: false,
      },
    },
    scales: {
      x: {
        stacked: true,
        ticks: {
          callback: function (value, index) {
            return labels[index];
          },
          maxRotation: 0,
          minRotation: 0,
          autoSkip: false,
          padding: 10,
        },
      },
      y: {
        stacked: true,
        beginAtZero: true,
        ticks: {
          precision: 0,
        },
      },
    },
    layout: {
      padding: {
        bottom: 30,
      },
    },
  };
  const groupLabelPluginOwner = {
    id: "groupLabelsOwner",
    afterDraw: (chart) => {
      const {
        ctx,
        chartArea: { bottom },
        scales: { x },
      } = chart;

      const yOffset = 65;
      const midPublic =
        (x.getPixelForValue(-0.2) + x.getPixelForValue(3.2)) / 2;
      const midPrivate =
        (x.getPixelForValue(4.8) + x.getPixelForValue(11.2)) / 2;

      ctx.save();
      ctx.font = "bold 14px Arial";
      ctx.fillStyle = "#000";
      ctx.textAlign = "center";
      ctx.fillText("GCT", midPublic, bottom + yOffset);
      ctx.fillText("Vocational", midPrivate, bottom + yOffset);
      ctx.restore();
    },
  };
  const totelMale = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      className="w-full h-full"
    >
      <path
        fill="#23704b"
        d="M96 0c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64S60.7 0 96 0m48 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H48c-26.5 0-48 21.5-48 48v136c0 13.3 10.7 24 24 24h16v136c0 13.3 10.7 24 24 24h64c13.3 0 24-10.7 24-24V352h16c13.3 0 24-10.7 24-24V192c0-26.5-21.5-48-48-48z"
      ></path>
    </svg>
  );
  const totelFemale = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      className="w-full h-full"
    >
      <path
        fill="#23704b"
        d="M128 0c35.3 0 64 28.7 64 64s-28.7 64-64 64c-35.3 0-64-28.7-64-64S92.7 0 128 0m119.3 354.2l-48-192A24 24 0 0 0 176 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H80a24 24 0 0 0 -23.3 18.2l-48 192C4.9 369.3 16.4 384 32 384h56v104c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24V384h56c15.6 0 27.1-14.7 23.3-29.8z"
      ></path>
    </svg>
  );
  const totel = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 512 512"
      fill="#267d37de"
    >
      <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
    </svg>
  );
  const cityWiseData = {
    labels: [
      "Lahore",
      "Faisalabad",
      "Rawalpindi",
      "Gujranwala",
      "Multan",
      "Sialkot",
      "Bahawalpur",
      "Sargodha",
      "Sheikhupura",
      "Rahim Yar Khan",
      "Gujrat",
      "Jhelum",
    ],

    datasets: [
      {
        label: "Male",
        data: [700, 200, 500, 500, 700, 800, 950, 1800, 500, 2500, 300, 2000],
        backgroundColor: "#4e73df",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
      {
        label: "Female",
        data: [300, 320, 100, 280, 130, 110, 120, 250, 2500, 1560, 30, 2050],
        backgroundColor: "#ff6384",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const cityWiseOptions = {
    indexAxis: "y",
    responsive: false,
    plugins: {
      datalabels: {
        anchor: "end",
        align: "end",
        color: "#000",
        font: {
          weight: "bold",
        },
        formatter: function (value) {
          return value;
        },
      },
      title: {
        display: false,
      },
      legend: {
        display: true,
        position: "bottom",
      },
    },
    scales: {
      x: {
        beginAtZero: true,
        stacked: false,
      },
      y: {
        stacked: false,
      },
    },
  };

  const QualificationData = {
    labels: [
      "Machine Operator",
      "Stitching Machine Operator",
      "Plumber",
      "Chef",
      "Electrician",
      "Carpenter",
      "Welder",
      "Auto Mechanic",
      "Beautician",
      "Computer Operator",
      "AC Technician",
      "Tailor",
    ],
    datasets: [
      {
        label: "Male",
        data: [700, 200, 500, 500, 700, 800, 950, 1800, 500, 2500, 300, 2000],
        backgroundColor: "rgba(30, 154, 78, 0.85)",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
      {
        label: "Female",
        data: [300, 320, 100, 280, 130, 110, 120, 250, 2500, 1560, 30, 2050],
        backgroundColor: "#ff6384",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const QualificationOptions = {
    indexAxis: "y",
    responsive: false,
    plugins: {
      datalabels: {
        anchor: "end",
        align: "end",
        color: "#000",
        font: {
          weight: "bold",
        },
        formatter: function (value) {
          return value;
        },
      },
      title: {
        display: false,
      },
      legend: {
        display: true,
        position: "bottom",
      },
    },
    scales: {
      x: {
        beginAtZero: true,
        stacked: false,
      },
      y: {
        stacked: false,
      },
    },
  };

  const TradesByLevelData = {
    labels: ["Level 1", "Level 2", "Level 3", "Level 4", "Level 5"],

    datasets: [
      {
        label: "",
        data: [1221, 1093, 526, 429, 803],
        barThickness: 60,

        backgroundColor: [
          "rgba(154, 30, 30, 0.85)",
          "rgba(30, 83, 154, 0.85)",
          "rgba(30, 154, 78, 0.85)",
          "rgba(154, 117, 30, 0.85)",
          "rgba(154, 107, 40, 0.35)",
        ],
        borderColor: [
          "rgba(154, 30, 30, 1)",
          "rgba(30, 83, 154, 1)",
          "rgba(30, 154, 78, 1)",
          "rgba(154, 117, 30, 1)",
          "rgba(154, 107, 40, 0.35",
        ],
        borderWidth: 1,
      },
    ],
  };

  const TradesByLevelOptions = {
    responsive: true,
    indexAxis: "y",
    plugins: {
      legend: {
        display: false,
      },
      datalabels: {
        anchor: "end",
        align: "right",
        color: "#000",
        font: {
          weight: "bold",
        },
        formatter: (value) => value.toLocaleString(), // Optional formatting
      },
    },
    scales: {
      x: {
        beginAtZero: true,
        ticks: {
          callback: (value) => value.toLocaleString(),
        },
      },
    },
  };
  const Card = ({ title, description, bgColor, icon, navigateTo }) => {
    const navigate = useNavigate();

    return (
      <div
        onClick={() => navigate(navigateTo)}
        className={`relative overflow-hidden ${bgColor} text-white flex items-center justify-center p-20 transform transition-transform hover:scale-105 cursor-pointer`}
      >
        <div className="absolute top-0 left-0 w-1/2 h-full bg-black opacity-10 transform -skew-x-12"></div>
        <div className="absolute top-4 left-4 text-4xl opacity-30">{icon}</div>
        <div className="relative text-center">
          <h2 className="text-2xl font-bold mb-2">{title}</h2>
          <p className="text-sm italic">{description}</p>
        </div>
      </div>
    );
  };

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center pt-8">
          <div className=" ml-16 ">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028"
              width="32"
              height="32"
            >
              <path d="M496 128v16a8 8 0 0 1 -8 8h-24v12c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12v-12H24a8 8 0 0 1 -8-8v-16a8 8 0 0 1 4.9-7.4l232-88a8 8 0 0 1 6.1 0l232 88A8 8 0 0 1 496 128zm-24 304H40c-13.3 0-24 10.7-24 24v16a8 8 0 0 0 8 8h464a8 8 0 0 0 8-8v-16c0-13.3-10.7-24-24-24zM96 192v192H60c-6.6 0-12 5.4-12 12v20h416v-20c0-6.6-5.4-12-12-12h-36V192h-64v192h-64V192h-64v192h-64V192H96z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Punjab Skills Development Fund (PSDF)
          </h2>
          <div></div>
        </div>
        <div className="flex px-16  py-8">
          <div className=" p-4">
            <h3
              className=" text-2xl text-white"
              style={
                {
                  // textAlign: "justify",
                  // textJustify: "inter-word",
                }
              }
            >
              PSDF was set up in 2010 as Pakistan’s largest skills development
              fund. It funds training for over 80,000 youth every year in 250+
              demand-driven trades through an ecosystem of 500+ private sector
              training partners. Through PSDF, thousands of young men and women
              now have the skills they need to pursue their careers of choice.,
            </h3>
          </div>
          {/* <div className="w-1/2 p-4">
            <h3
              className="text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              This page provides relevant information in key categories, such as
              gender distribution in terms of institutes, and teachers, male to
              female ratios, provincial and district wise distribution, etc.
              Information on private to public regional distribution of
              vocational and technical institutes helps policy and decision
              makers determine the needs related to kinds and scope of TVET
              education, while taking into account the teachers stats and gender
              trends in each area.
            </h3>
          </div> */}
        </div>
      </div>

      <div className="px-10  ">
        <div className="flex w-full">
          <div className=" mt-16 w-[80%]">
            <div className=" py-10">
              <div className="max-w-[120rem] mx-auto grid grid-cols-1 sm:grid-cols-4 lg:grid-cols-4 px-4">
                <div className="bg-green-50 shadow p-6 flex flex-col items-center text-center">
                  <div className="w-36 h-36 mb-4 mt-14">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 192 512"
                      className="w-full h-full"
                    >
                      <path
                        fill="#23704b"
                        d="M96 0c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64S60.7 0 96 0m48 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H48c-26.5 0-48 21.5-48 48v136c0 13.3 10.7 24 24 24h16v136c0 13.3 10.7 24 24 24h64c13.3 0 24-10.7 24-24V352h16c13.3 0 24-10.7 24-24V192c0-26.5-21.5-48-48-48z"
                      ></path>
                    </svg>
                  </div>

                  <h3 className="text-[18px] text-black  font-bold mb-2">
                    Male Institutes
                  </h3>

                  <div className="pt-52 mb-16">
                    <p className="text-green-700 text-[36px] font-bold">
                      1,395
                    </p>
                  </div>
                </div>

                <div className="bg-white shadow p-6 flex flex-col items-center text-center">
                  <div className="w-36 h-36 mb-4 mt-14">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 193 512"
                      className="w-full h-full"
                    >
                      <path
                        fill="#23704b"
                        d="M128 0c35.3 0 64 28.7 64 64s-28.7 64-64 64c-35.3 0-64-28.7-64-64S92.7 0 128 0m119.3 354.2l-48-192A24 24 0 0 0 176 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H80a24 24 0 0 0 -23.3 18.2l-48 192C4.9 369.3 16.4 384 32 384h56v104c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24V384h56c15.6 0 27.1-14.7 23.3-29.8z"
                      ></path>
                    </svg>
                  </div>

                  <h3 className="text-[18px] text-black  font-bold mb-2">
                    Female Institutes
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">716</p>
                  </div>
                </div>
                <div className="bg-white shadow p-6 flex flex-col items-center text-center">
                  <div className="w-36 h-36 mb-4 mt-14">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 193 512"
                      className="w-full h-full"
                    >
                      <path
                        fill="#23704b"
                        d="M128 0c35.3 0 64 28.7 64 64s-28.7 64-64 64c-35.3 0-64-28.7-64-64S92.7 0 128 0m119.3 354.2l-48-192A24 24 0 0 0 176 144h-11.4c-22.7 10.4-49.6 10.9-73.3 0H80a24 24 0 0 0 -23.3 18.2l-48 192C4.9 369.3 16.4 384 32 384h56v104c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24V384h56c15.6 0 27.1-14.7 23.3-29.8z"
                      ></path>
                    </svg>
                  </div>

                  <h3 className="text-[18px] text-black  font-bold mb-2">
                    Co-Ed Institutes
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      2,548
                    </p>
                  </div>
                </div>

                <div className="bg-green-50 shadow p-6 flex flex-col items-center text-center">
                  <div className="w-36 h-36 mb-4 mt-14">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                      fill="#267d37de"
                    >
                      <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
                    </svg>
                  </div>
                  <h3 className="text-[18px] text-black  font-bold mb-2">
                    Total Institutes
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      4,659
                    </p>
                  </div>
                </div>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  List of Institutes
                </h2>
              </blockquote>

              <div className="overflow-x-auto mt-16 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <div className="text-right mb-8">
                  <h3 className="text-3xl font-semibold">Total: 48394</h3>
                </div>

                <table className="min-w-full bg-white border border-gray-200">
                  <thead className="bg-gray-100">
                    <tr>
                      <th className="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Institute Name
                      </th>
                      <th className="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Ownership
                      </th>
                      <th className="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Institute Type
                      </th>
                      <th className="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Cities
                      </th>
                      <th className="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        District
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        BASE TRAINING SQUADRON PAF MUSHAF, Sargodha CANTT.
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Sargodha
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT TECHNICAL TRAINING CENTRE, SHEHR SULTAN
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Muzaffargarh
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W),
                        Bahawalnagar
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Bahawalnagar
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), BHALWAL,
                        Sargodha
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Khanewal
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), NAUSHERA
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Khushab
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), NAUSHERA,
                        Khushab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Gujranwala
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVT. CENTRE OF AGRICULTURAL MACHINERY INDUSTRIES, MIAN
                        CHANNU
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lahore
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Faisalabad
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Institute City Wise
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={data1}
                  options={options1}
                  width={1024}
                  height={750}
                />
              </div>
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Enrollments and Graduates (Ownership Wise)
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={dataGratudes}
                  options={optionsGratudes}
                  plugins={[groupLabelPlugin, totalLabelPlugin]}
                />
              </div>
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Enrollments and Graduates (GCT VS Vocational)
                </h2>
              </blockquote>
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={dataOwner}
                  options={optionsOwner}
                  plugins={[groupLabelPluginOwner, totalLabelPluginOwner]}
                />
              </div>

              <div className="flex w-full">
                <div className=" mt-16 w-full">
                  <div className="">
                    <div className="bg-white p-10 rounded-xl shadow w-full">
                      <div className="grid grid-cols-4 gap-6 text-center items-center">
                        <div></div>

                        <div className="flex flex-col items-center space-y-2">
                          <div className="w-28 h-28 ml-16">{totelMale}</div>

                          <h3 className="text-[23px] font-medium text-gray-700">
                            Male
                          </h3>
                        </div>

                        <div className="flex flex-col items-center space-y-2">
                          <div className="w-28 h-28 ml-16">{totelFemale}</div>

                          <h3 className="text-[23px] font-medium text-gray-700">
                            Female
                          </h3>
                        </div>

                        <div className="flex flex-col items-center space-y-2">
                          <div className="w-28 h-28 ">{totel}</div>
                          <h3 className="text-[23px] font-medium text-gray-700">
                            Total
                          </h3>
                        </div>

                        <div className="text-left text-3xl font-semibold text-gray-700 pt-4">
                          Enrollments
                        </div>
                        <p className="font-bold text-blue-700 text-[25px] pt-4">
                          123
                        </p>
                        <p className="font-bold text-pink-600 text-[25px] pt-4">
                          100
                        </p>
                        <p className="font-bold text-green-600 text-[25px] pt-4">
                          223
                        </p>

                        <div className="text-left text-3xl font-semibold text-gray-700 pt-4">
                          Graduates
                        </div>
                        <p className="font-bold text-blue-700 text-[25px] pt-4">
                          456
                        </p>
                        <p className="font-bold text-pink-600 text-[25px] pt-4">
                          200
                        </p>
                        <p className="font-bold text-green-600 text-[25px] pt-4">
                          656
                        </p>

                        <div className="text-left text-3xl font-semibold text-gray-700 pt-4">
                          Dropouts
                        </div>
                        <p className="font-bold text-blue-700 text-[25px] pt-4">
                          789
                        </p>
                        <p className="font-bold text-pink-600 text-[25px] pt-4">
                          300
                        </p>
                        <p className="font-bold text-green-600 text-[25px] pt-4">
                          1089
                        </p>

                        <div className="text-left text-3xl font-semibold text-gray-700 pt-4">
                          Unsuccessful
                        </div>
                        <p className="font-bold text-blue-700 text-[25px] pt-4">
                          321
                        </p>
                        <p className="font-bold text-pink-600 text-[25px] pt-4">
                          400
                        </p>
                        <p className="font-bold text-green-600 text-[25px] pt-4">
                          721
                        </p>
                      </div>
                    </div>

                    <Heading title="City Wise Enrollment" />
                    <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                      <Bar
                        data={cityWiseData}
                        options={cityWiseOptions}
                        width={1024}
                        height={850}
                      />
                    </div>

                    <Heading title="Enrollments by Trades - Gender Wise" />
                    <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                      <Bar
                        data={QualificationData}
                        options={QualificationOptions}
                        width={1024}
                        height={750}
                      />
                    </div>
                    <Heading title="Trades by Levels" />
                    <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                      <Bar
                        data={TradesByLevelData}
                        options={TradesByLevelOptions}
                        width={1024}
                        height={750}
                      />
                    </div>
                    <Heading title="Enrollments by Levels" />
                    <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16 mb-16">
                      <table class="min-w-full border border-gray-300">
                        <thead class="bg-green-600">
                          <tr>
                            <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                              NVQF Level
                            </th>
                            <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                              Male Enrollment
                            </th>
                            <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                              Female Enrollment
                            </th>
                            <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                              Total Enrollment
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                          <tr>
                            <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                              Level 1
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              120
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              95
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              215
                            </td>
                          </tr>
                          <tr>
                            <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                              Level 2
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              98
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              105
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              203
                            </td>
                          </tr>
                          <tr>
                            <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                              Level 3
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              143
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              110
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              253
                            </td>
                          </tr>
                          <tr>
                            <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                              Level 4
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              87
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              75
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              162
                            </td>
                          </tr>
                          <tr>
                            <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                              Level 5
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              112
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              130
                            </td>
                            <td class="px-4 py-6 text-2xl border border-gray-300">
                              242
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                {/* <div className="flex justify-center">
                  <div className=" grid-cols-1  ml-10 mt-16">
                    <div className=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)]  ">
                      <div className="text-3xl font-bold">Filters</div>

                      <div>
                        <label className="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                          Select Year
                        </label>
                        <select  onChange={(e) => setYear(e.target.value)} className=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                          <option>Select Year</option>
                          <option>2023</option>
                          <option>2024</option>
                          <option>2025</option>
                        </select>
                      </div>
                      <div className="form-group mt-10 justify-center align-middle flex">
                        <input
                          className="  btn w-[80%] bg-[#478e51] text-white px-4 py-2 rounded hover:bg-[#36713f] transition text-[16px]"
                          type="submit"
                          value="Search"
                        />
                      </div>
                    </div>

                    
                  </div>
                </div> */}
              </div>
            </div>
          </div>

          <div className="grid-cols-1  p-8 mt-16 ">
            <div class=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 ">
              <div class="text-3xl font-bold">Filters</div>

              <div className="mt-6">
                <label class="block text-2xl font-semibold text-gray-700 mb-1 ">
                  Institute Name
                </label>
                <input
                  type="text"
                  placeholder="Search by name"
                  class="form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]"
                />
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Ownership
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select Ownership</option>
                  <option>Private</option>
                  <option>Public</option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Institute Type
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select Institute Type</option>
                  <option>Technical</option>
                  <option>Vocational </option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Cities
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select City</option>
                  <option>Lahore</option>
                  <option>Multan</option>
                  <option>Jhang</option>
                  <option>Faisalabad</option>
                  <option>Kasur</option>
                </select>
              </div>
              <div className="form-group mt-10 justify-center align-middle flex">
                <input
                  className="  btn w-[80%] bg-[#478e51] text-white px-4 py-2 rounded hover:bg-[#36713f] transition text-[16px]"
                  type="submit"
                  value="Search"
                />
              </div>
            </div>

            <div className="mt-28">
              {[
                {
                  title: "TVET Supply",
                  description:
                    "Explore insights on enrollments, gender, providers, and courses.",
                  bgColor: "bg-teal-600",
                  icon: "📈",
                  navigateTo: "/tvet-supply",
                },
                {
                  title: "Employment Projections",
                  description:
                    "Explore skilled workforce projections region, sector and district wise.",
                  bgColor: "bg-purple-600",
                  icon: "📊",
                  navigateTo: "/employment-projections",
                },
                {
                  title: "District Map",
                  description:
                    "Explore district level insights about TVET supply and demand indicators.",
                  bgColor: "bg-indigo-700",
                  icon: "🗺️",
                  // navigateTo: "/district-map",
                },
                {
                  title: "TVET Providers",
                  description:
                    "Explore information on TVET institutes, companies offering training and programmes.",
                  bgColor: "bg-slate-800",
                  icon: "🏫",
                  navigateTo: "/institutes",
                },
                {
                  title: "Growth Sector",
                  description:
                    "Explore insights on growth sectors for employment and skill development.",
                  bgColor: "bg-blue-600",
                  icon: "📚",
                  // navigateTo: "/growth-sector",
                },
                {
                  title: "Employment Trends",
                  description:
                    "Find trending employment opportunities in local and international job markets.",
                  bgColor: "bg-gray-700",
                  icon: "💼",
                  // navigateTo: "/employment-trends",
                },
              ].map((card, index) => (
                <Card
                  key={index}
                  title={card.title}
                  description={card.description}
                  bgColor={card.bgColor}
                  icon={card.icon}
                  navigateTo={card.navigateTo}
                />
              ))}
            </div>
            <div className=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mt-[645%] ">
              <div className="text-3xl font-bold">Filters</div>

              <div>
                <label className="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Select Year
                </label>
                <select
                  onChange={(e) => setYear(e.target.value)}
                  className=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]"
                >
                  <option>Select Year</option>
                  <option>2023</option>
                  <option>2024</option>
                  <option>2025</option>
                </select>
              </div>
              <div className="form-group mt-10 justify-center align-middle flex">
                <input
                  className="  btn w-[80%] bg-[#478e51] text-white px-4 py-2 rounded hover:bg-[#36713f] transition text-[16px]"
                  type="submit"
                  value="Search"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default PSDFPage;
