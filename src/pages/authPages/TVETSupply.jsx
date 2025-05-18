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

const TVETSupply = () => {
  // useEffect(() => {
  //   window.scrollTo(0, 0);
  // }, []);

  ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ChartDataLabels
  );
  const data = {
    labels: ["Public", "Private"], // Only GCT and Vocational streams
    datasets: [
      {
        label: "", // Data for Male gender
        data: [205156, 73912], // Data for Male count in each stream
        // backgroundColor: "rgba(54, 162, 235, 0.8)", // Color fill for Male bars
        backgroundColor: ["#ffc658", "#8884d8"], // Color fill for Male bars
        borderColor: ["#ffc658", "#8884d8"], // Border color for Male bars
        borderWidth: 1, // Border width for Male bars
        barThickness: 50,
      },
    ],
  };

  const options = {
    responsive: true,
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
      legend: false,
      title: {
        display: false,
        // text: "Enrollment Stream & Gender Wise Comparison (GCT and Vocational)",
      },
      tooltip: {
        // mode: "index",
        intersect: false,
      },
    },
    scales: {
      x: {
        stacked: false, // Stack the bars for each stream
      },
      y: {
        stacked: false, // Stack the bars for each gender
      },
    },
  };

  const data1 = {
    labels: ["Private", "Public"], // Institute Types (Private and Public)
    datasets: [
      {
        label: "Male ", // Data for Male enrollment
        data: [500, 400], // Updated Male count in Private and Public institutes
        backgroundColor: "rgba(54, 162, 235, 0.8)", // Color fill for Male bars
        borderColor: "rgba(54, 162, 235, 1)", // Border color for Male bars
        borderWidth: 1, // Border width for Male bars
      },
      {
        label: "Female", // Data for Female enrollment
        data: [450, 350], // Updated Female count in Private and Public institutes
        backgroundColor: "rgba(255, 99, 132, 0.8)", // Color fill for Female bars
        borderColor: "rgba(255, 99, 132, 1)", // Border color for Female bars
        borderWidth: 1, // Border width for Female bars
      },
    ],
  };

  const options1 = {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: "Institute Type Wise Enrollment (Private vs Public)",
      },
      tooltip: {
        mode: "index",
        intersect: false,
      },
    },
    scales: {
      x: {
        stacked: false, // Stack the bars for each institute type
      },
      y: {
        stacked: false, // Stack the bars for each gender
      },
    },
  };

  const data3 = {
    labels: ["Total"],
    datasets: [
      {
        label: "Totel Enrollments",
        data: [317131],
        backgroundColor: "#8884d8",
        barThickness: 80,
        barPercentage: 1.0, // 100% width of each bar within the category
        categoryPercentage: 1.0, // Tight grouping, fills space
      },
      {
        label: "Totel Graduates",
        data: [194088],
        backgroundColor: "#82ca9d",
        barThickness: 80,
        barPercentage: 1.0, // Same width for consistency
        categoryPercentage: 1.0, // Tight grouping, fills space
      },
      {
        label: "Under Trainees",
        data: [123043],
        backgroundColor: "#ffc658",
        barThickness: 80,
        barPercentage: 1.0, // Same width for consistency
        categoryPercentage: 1.0, // Tight grouping, fills space
      },
    ],
  };

  const options3 = {
    indexAxis: "x",
    responsive: true,
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
        // text: "Enrollments vs Graduates vs Trainees",
      },
      legend: {
        position: "top",
      },
    },
    scales: {
      x: {
        stacked: false,
        // Remove the `barPercentage` and `categoryPercentage` here
      },
      y: {
        beginAtZero: true,
        stacked: false,
      },
    },
  };

  const Distdata = {
    labels: [
      "Attock",
      "Bahawalnagar",
      "Bahawalpur",
      "Bhakkar",
      "Chakwal",
      "Chiniot",
      "Dera Ghazi Khan",
      "Faisalabad",
      "Gujranwala",
      "Gujrat",
      "Hafizabad",
      "Jhang",
    ],

    datasets: [
      {
        label: "Male Enrollments",

        data: [400, 300, 600, 420, 50, 500, 600, 700, 600, 450, 350, 500],

        backgroundColor: "#4e73df",
        barThickness: 15,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },

      {
        label: "Female Enrollments",

        data: [332, 282, 492, 368, 263, 405, 550, 593, 507, 403, 341, 496],

        backgroundColor: "#e74a3b",
        barThickness: 15,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const Distoptions = {
    indexAxis: "y",
    responsive: true,

    plugins: {
      title: {
        display: true,
        text: "District Wise Enrollment",
      },
      legend: {
        position: "top",
      },
    },
    scales: {
      x: {
        stacked: false,
      },
      y: {
        beginAtZero: true,
        stacked: false,
      },
    },
  };
  const labels = [
    "Enrolled",
    "Graduated",
    "Assessed",
    "Certified",
    "",
    "Enrolled",
    "Graduated",
    "Assessed",
    "Certified",
  ];
  const labelsOwner = [
    "Enrolled",
    "Graduated",
    "Assessed",
    "Certified",
    "", // Spacer
    "Enrolled",
    "Graduated",
    "Assessed",
    "Certified",
  ];
  const dataGratudes = {
    labels,
    datasets: [
      {
        label: "Male",
        data: [800, 600, 550, 500, null, 900, 650, 600, 550],
        backgroundColor: "rgba(56, 142, 60, 0.85)",
        stack: "stack1",
        barThickness: 40,
      },
      {
        label: "Female",
        data: [700, 600, 550, 500, null, 800, 650, 600, 550],
        backgroundColor: "rgba(230, 81, 0, 0.85)",
        stack: "stack1",
        barThickness: 40,
      },
    ],
  };
  const dataOwner = {
    labels: labelsOwner,
    datasets: [
      {
        label: "Male",
        data: [750, 580, 520, 490, null, 880, 640, 590, 530],
        backgroundColor: "#8884d8",
        stack: "stack1",
        barThickness: 40,
      },
      {
        label: "Female",
        data: [680, 620, 500, 470, null, 320, 670, 610, 540],
        backgroundColor: "#82ca9d",
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
  const groupLabelPlugin = {
    id: "groupLabels",
    afterDraw: (chart) => {
      const {
        ctx,
        chartArea: { bottom },
        scales: { x },
      } = chart;

      const yOffset = 65;
      const midTechnical = (x.getPixelForValue(0) + x.getPixelForValue(3)) / 2;
      const midVocational = (x.getPixelForValue(4) + x.getPixelForValue(7)) / 2;

      ctx.save();
      ctx.font = "bold 14px Arial";
      ctx.fillStyle = "#000";
      ctx.textAlign = "center";
      ctx.fillText("Public", midTechnical, bottom + yOffset);
      ctx.fillText("Private", midVocational, bottom + yOffset);
      ctx.restore();
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
      const midPublic = (x.getPixelForValue(0) + x.getPixelForValue(3)) / 2;
      const midPrivate = (x.getPixelForValue(5) + x.getPixelForValue(8)) / 2;

      ctx.save();
      ctx.font = "bold 14px Arial";
      ctx.fillStyle = "#000";
      ctx.textAlign = "center";
      ctx.fillText("Technical", midPublic, bottom + yOffset);
      ctx.fillText("Vocational", midPrivate, bottom + yOffset);
      ctx.restore();
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

  //   const TradesByLevelData = {
  //   labels: [
  //     "Machine Operator",
  //     "Stitching Machine Operator",
  //     "Plumber",
  //     "Chef",
  //     "Electrician",
  //     "Carpenter",
  //     "Welder",
  //     "Auto Mechanic",
  //     "Beautician",
  //     "Computer Operator",
  //     "AC Technician",
  //     "Tailor",
  //   ],
  //   datasets: [
  //     {
  //       label: "Male",
  //       data: [700, 200, 500, 500, 700, 800, 950, 1800, 500, 2500, 300, 2000],
  //       backgroundColor: "rgba(30, 154, 78, 0.85)",
  //       barThickness: 20,
  //       barPercentage: 1.0,
  //       categoryPercentage: 0.5,
  //     },
  //     {
  //       label: "Female",
  //       data: [300, 320, 100, 280, 130, 110, 120, 250, 2500, 1560, 30, 2050],
  //       backgroundColor: "#ff6384",
  //       barThickness: 20,
  //       barPercentage: 1.0,
  //       categoryPercentage: 0.5,
  //     },
  //   ],
  // };

  //   const TradesByLevelOptions = {
  //   indexAxis: "y",
  //   responsive: false,
  //   plugins: {
  //     datalabels: {
  //       anchor: "end",
  //       align: "end",
  //       color: "#000",
  //       font: {
  //         weight: "bold",
  //       },
  //       formatter: function (value) {
  //         return value;
  //       },
  //     },
  //     title: {
  //       display: false,
  //     },
  //     legend: {
  //       display: true,
  //       position: "bottom",
  //     },
  //   },
  //   scales: {
  //     x: {
  //       beginAtZero: true,
  //       stacked: false,
  //     },
  //     y: {
  //       stacked: false,
  //     },
  //   },
  // };

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
  const provancedata = {
    labels: [
      "Punjab Board of Technical Education",
      "Punjab Trade Testing Board",
      "Punjab Skills Development Fund",
      "Punjab Vocational Training Council",
      "Punjab Skills Development Authority",
    ],

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

  const provanceoptions = {
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

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center pt-8">
          <div className=" ml-16 ">
            {/* <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028"
              width="32"
              height="32"
            >
              <path d="M496 128v16a8 8 0 0 1 -8 8h-24v12c0 6.6-5.4 12-12 12H60c-6.6 0-12-5.4-12-12v-12H24a8 8 0 0 1 -8-8v-16a8 8 0 0 1 4.9-7.4l232-88a8 8 0 0 1 6.1 0l232 88A8 8 0 0 1 496 128zm-24 304H40c-13.3 0-24 10.7-24 24v16a8 8 0 0 0 8 8h464a8 8 0 0 0 8-8v-16c0-13.3-10.7-24-24-24zM96 192v192H60c-6.6 0-12 5.4-12 12v20h416v-20c0-6.6-5.4-12-12-12h-36V192h-64v192h-64V192h-64v192h-64V192H96z"></path>
            </svg> */}
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028ed"
              width="32"
              height="32"
            >
              <path d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            TVET Supply
          </h2>
          <div></div>
        </div>
        <div className="flex px-16 mt-4 py-8">
          <div className="w-1/2 p-4">
            <h3
              className=" text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              Supply side information is crucial to identify quality and number
              gaps in developing and ready human resources to be absorbed in
              TVET sector nationally and internationally. Key policy insights
              are to be had from stats on enrolment numbers, males and female
              enrolments, enrolment in districts and local stakeholders, as well
              as the nature of institutes (Public, Private) included in this
              page. Gaps between numbers of enrolments and graduates given can
              be a crucial indicator for relevant policy making. These insights
              help policymakers, researchers, and stakeholders understand
              current training environments, identify where improvements are
              needed, and develop strategies
            </h3>
          </div>
          <div className="w-1/2 p-4">
            <h3
              className="text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              that strengthen the workforce. By examining these parameters,
              decision-makers can address skill gaps, elevate quality standards,
              and align programmes with evolving market needs. The trends and
              gaps identified from the above facilitate data-driven
              decision-making in TVET development and support effective
              planning, resource allocation, and targeted policy formulation.
              The policy environment is therefore better equipped to address
              needs related to quality training, ensures alignment with changing
              labour market demands, and track progress towards national goals.
            </h3>
          </div>
        </div>
      </div>

      <div className="px-10  ">
        <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
          <div className=" flex">
            <h2 className="text-[28px] text-[#267d37de] font-bold ">
              Key facts -{" "}
            </h2>
            <h2 className="text-[25px] text-[#267d37de] ml-4">
              (Source: Employer Skill Survey, Qualification Awarding Bodies -
              2023/2024)
            </h2>
          </div>
        </blockquote>

        <div className="flex w-full">
          <div className=" mt-16 w-[80%]">
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
                    Enrolled
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
                    Graduated
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
                    Assessed
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
                    Certified
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

              {/* <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  List of Institutes
                </h2>
              </blockquote> */}
              {/* <div className="overflow-x-auto mt-16 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
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
                        Province
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
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT TECHNICAL TRAINING CENTRE, SHEHR SULTAN
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W),
                        Bahawalnagar
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), BHALWAL,
                        Sargodha
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), NAUSHERA
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVERNMENT VOCATIONAL TRAINING INSTITUTE (W), NAUSHERA,
                        Khushab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                    <tr className="hover:bg-gray-50">
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        GOVT. CENTRE OF AGRICULTURAL MACHINERY INDUSTRIES, MIAN
                        CHANNU
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Public
                      </td>
                      <td className="px-6 py-4 text-2xl text-gray-600 border-b">
                        Vocational
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div className="flex items-center justify-between mt-8">
                  <div className="text-gray-600 text-lg">
                    Showing 1 to 10 of 10 entries
                  </div>
                  <div className="flex space-x-2">
                    <button className="px-4 py-2 text-lg bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                      Previous
                    </button>
                    <button class="px-4 py-2 text-lg bg-[#267d37de] text-white rounded hover:bg-[#267d37de]">
                      1
                    </button>
                    <button className="px-4 py-2 text-lg bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                      Next
                    </button>
                  </div>
                </div>
              </div> */}
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Enrollment and Assessment (Ownership Wise)
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
                  Enrollment and Assessment (Trainering Wise)
                </h2>
              </blockquote>
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={dataOwner}
                  options={optionsOwner}
                  plugins={[groupLabelPluginOwner, totalLabelPluginOwner]}
                />
              </div>
              {/* <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Comparison between Enrollments & Graduates
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded  mr-4 mt-16">
                <Bar data={data3} options={options3} />
              </div> */}
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Total Enrollments by Ownership
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={data} options={options} />
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
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Enrollments by Qualification Awarding Bodies
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={provancedata} options={provanceoptions} />
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

              {/*
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Institute Type Wise Enrollment
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={data1} options={options1} />
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  District Wise Enrollment
                </h2>
              </blockquote> */}
              {/* <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={Distdata}
                  options={Distoptions}
                  width={1024}
                  height={750}
                />
              </div> */}
              {/* <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Heading title="Enrollments by Qualification Awarding Bodies" />
                <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={QualificationData}
                  options={QualificationOptions}
                  width={1024}
                  height={750}
                />
              </div>
              </div> */}
            </div>
          </div>

          <div className=" grid-cols-1  p-8 mt-16 ">
            <div class=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)]  ">
              <div class="text-3xl font-bold">Filters</div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Select Year
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
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
                  navigateTo: "/district-map",
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
                  navigateTo: "/growth-sector",
                },
                {
                  title: "Employment Trends",
                  description:
                    "Find trending employment opportunities in local and international job markets.",
                  bgColor: "bg-gray-700",
                  icon: "💼",
                  navigateTo: "/employment-trends",
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
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default TVETSupply;
