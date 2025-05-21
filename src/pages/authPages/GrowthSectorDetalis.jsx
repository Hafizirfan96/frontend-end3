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

const GrowthSectorDetalis = () => {
  const navigate = useNavigate();

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
  const Enrollmentlabels = [
    "Enrollment",
    "Graduates",
    "Assessment",
    "Certified",
    "",
    "Enrollment",
    "Graduates",
    "Assessment",
    "Certified",
  ];
  const Enrollmentdata = {
    Enrollmentlabels,
    datasets: [
      {
        label: "Male",
        data: [700, 600, 450, 300, null, 900, 650, 600, 550],
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

  const EnrollmenttotalLabelPlugin = {
    id: "EnrollmenttotalLabelPlugin",
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

  const Enrollmentoptions = {
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

      EnrollmenttotalLabelPlugin,
      legend: {
        position: "top",
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

  const options = {
    responsive: true,
    plugins: {
      datalabels: {
        anchor: "end",
        align: "end",
        color: "#000", // label color
        font: {
          weight: "bold",
        },
        formatter: function (value) {
          return value; // customize as needed
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
            Agriculture
          </h2>
          <div></div>
        </div>
        <div className="flex px-16  py-8">
          <div className="w-1/2 p-4">
            <h3
              className=" text-2xl text-white"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              The agriculture sector is the backbone of Pakistan’s economy,
              contributing significantly to GDP, employment, and food security.
              With around 60% of the population dependent on agriculture for
              their livelihood, the sector plays a crucial role in rural
              development. Modern technologies such as precision farming,
              biotechnology, and AI-driven analytics are gradually being adopted
              to improve productivity. Sustainable practices like water
              conservation, soil management, and
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
              climate-resilient crops are becoming essential to tackle
              environmental challenges. Government initiatives, including
              subsidies, support programs, and investment in irrigation and
              storage infrastructure, further drive growth. As global and
              domestic demand for food and agricultural products increases,
              innovation and efficiency in the sector will be key to ensuring
              long-term sustainability and economic stability in Pakistan.
            </h3>
          </div>
        </div>
      </div>

      <div className="px-10  ">
        <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
          <div className=" flex">
            <h2 className="text-[28px] text-[#267d37de] font-bold ">
              Key Occupations
            </h2>
          </div>
        </blockquote>

        <div className="flex w-full">
          <div className="  w-[100%]">
            <div className=" py-10">
              <div className="overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600">Farmers and Ranchers</li>
                <li className="text-2xl text-gray-600">
                  Agricultural Scientists
                </li>
                <li className="text-2xl text-gray-600">
                  Agricultural Engineers
                </li>
                <li className="text-2xl text-gray-600">
                  Agricultural Managers
                </li>
                <li className="text-2xl text-gray-600">
                  Agricultural Inspectors
                </li>
                <li className="text-2xl text-gray-600">
                  Agricultural Consultants
                </li>
                <li className="text-2xl text-gray-600">
                  Food Scientists and Technologists
                </li>
                <li className="text-2xl text-gray-600">Horticulturists</li>
                <li className="text-2xl text-gray-600">
                  Agricultural Extension Officers
                </li>
                <li className="text-2xl text-gray-600"> Field Assistant</li>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  High Demanded Occupations
                </h2>
              </blockquote>

              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600">Farmers and Ranchers</li>
                <li className="text-2xl text-gray-600">
                 Agricultural Technologists and Technicians

                </li>
                <li className="text-2xl text-gray-600">
                 Agricultural Scientists

                </li>
                <li className="text-2xl text-gray-600">
                 Food Scientists and Technologists

                </li>
                <li className="text-2xl text-gray-600">
                Aquaculture Farmers

                </li>
                <li className="text-2xl text-gray-600">
                 Agricultural Inspectors

                </li>
                <li className="text-2xl text-gray-600">
                 Precision Agriculture Specialists

                </li>
                <li className="text-2xl text-gray-600">Horticulturists</li>
                <li className="text-2xl text-gray-600">
                Urban Farmers

                </li>
                <li className="text-2xl text-gray-600">Agribusiness Managers</li>
                <li className="text-2xl text-gray-600">Farmers and Ranchers</li>
                <li className="text-2xl text-gray-600">Agricultural Scientists</li>
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
                  Institute TVET Bodies
                </h2>
              </blockquote>

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={provancedata} options={provanceoptions} />
              </div>
            </div>
          </div>

          <div className=" grid-cols-1  p-8 mt-16 ">
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
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default GrowthSectorDetalis;
