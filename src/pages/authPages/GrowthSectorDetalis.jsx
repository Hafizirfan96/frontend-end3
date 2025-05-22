import { useEffect } from "react";
import { Bar } from "react-chartjs-2";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import ChartDataLabels from "chartjs-plugin-datalabels";
import Card from "@/components/templates/GrowthSector/Card";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import GrowthSectorTitle from "@/components/templates/GrowthSector/GrowthSectorTitle";
import Heading from "@/components/templates/Heading/Heading";

const GrowthSectorDetalis = () => {
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

  const demanddata = {
    labels: ["2022", "2023"],
    datasets: [
      {
        label: "Demand Comparison",
        data: [500, 1100],
        backgroundColor: ["rgba(30, 83, 154, 0.85)", "rgba(0, 128, 128, 0.85)"],
        borderColor: ["rgba(30, 83, 154, 1)", "rgba(0, 128, 128, 1)"],
        borderWidth: 1,
      },
    ],
  };

  const Demandoptions = {
    responsive: true,
    plugins: {
      legend: {
        display: true,
        position: "bottom",
      },
      datalabels: {
        anchor: "end",
        align: "bottom",
        offset: 10,
        color: "#000",
        font: {
          weight: "bold",
        },
        formatter: (value) => value.toLocaleString(),
      },
    },
    scales: {
      x: {
        stacked: false,
        title: {
          display: false,
        },
      },
      y: {
        beginAtZero: true,
        title: {
          display: true,
          text: "Number of Trainees",
        },
        ticks: {
          callback: (value) => value.toLocaleString(),
        },
      },
    },
  };

  const agricultureIcon = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 512 512"
      fill="#e2e028ed"
      width={32}
      height={32}
    >
      <path d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16z"></path>
    </svg>
  );

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <GrowthSectorTitle icon={agricultureIcon} title="Agriculture" />
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
        <Heading title="Key Occupations" />

        <div className="flex w-full">
          <div className="  w-[100%]">
            <div className=" py-10">
              <div className="overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <ul></ul>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Farmers and Ranchers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Scientists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Engineers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Managers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Inspectors
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Consultants
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Food Scientists and Technologists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Horticulturists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Extension Officers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  {" "}
                  Field Assistant
                </li>
              </div>

              <Heading title="High Demanded Occupations" />

              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Farmers and Ranchers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Technologists and Technicians
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Scientists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Food Scientists and Technologists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Aquaculture Farmers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Inspectors
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Precision Agriculture Specialists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Horticulturists
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Urban Farmers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agribusiness Managers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Farmers and Ranchers
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  Agricultural Scientists
                </li>
              </div>

              <Heading title="Major Qualifications and Training Programs" />

              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Chilli
                  Production)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed ">
                  National Vocational Certificate Level 2 in Agriculture (Chilli
                  Processing)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 3 in Agriculture (Farm
                  Supervisor)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Citrus
                  Production)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Citrus
                  Processing)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 3 in Agriculture (Farm
                  Supervisor)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 4 in Livestock (Dairy
                  Farm Supervisor)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Tunnel Farming,
                  Green House & Agribusiness
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in (Livestock Farm
                  Attendant)
                </li>
                <li className="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture
                  Machinery Technology
                </li>
              </div>

              <Heading title="Training Institutions Offering Courses" />

              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600 leading-relaxed">
                  M006-Govt.Technical Training Center AMTS
                </li>
              </div>
            
              <Heading title="Demand Comparison Yearly" />

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={demanddata} options={Demandoptions} />
              </div>
            </div>
          </div>

          <div className=" grid-cols-1  p-8  ">
            <div className=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 ">
              <div className="text-3xl font-bold text-[#478e51]">
                Sector Overview
              </div>

              <div className="mt-6">
                <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                  Annual Growth (%)
                </label>

                <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                  6.25 %
                </label>
              </div>
              <div className=" border mt-4" />
              <div>
                <div className="mt-6">
                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    Workforce Employed
                  </label>

                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    27.6m (38.5% of the total labor force(71.8m))
                  </label>
                </div>
                <div className=" border mt-4" />
              </div>

              <div>
                <div className="mt-6">
                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    Workforce Supply
                  </label>

                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    25,795,000
                  </label>
                </div>
                <div className=" border mt-4" />
              </div>

              <div>
                <div className="mt-6">
                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    Workforce Demand
                  </label>

                  <label className="block text-2xl font-semibold text-gray-700 mb-1 ">
                    1.09m(6.25% - 2.27%)
                  </label>
                </div>
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
