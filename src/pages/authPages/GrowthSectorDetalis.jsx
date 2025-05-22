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
 
  const demanddata = {
  labels: [ "2022", "2023"],
  datasets: [

   {
    label: "Demand Comparison",
    data: [500, 1100],
    backgroundColor: [
      "rgba(30, 83, 154, 0.85)",   
      "rgba(0, 128, 128, 0.85)",  
    ],
    borderColor: [
      "rgba(30, 83, 154, 1)",     
      "rgba(0, 128, 128, 1)",      
    ],
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

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  High Demanded Occupations
                </h2>
              </blockquote>

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

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Major Qualifications and Training Programs
                </h2>
              </blockquote>

              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Chilli
                  Production)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed ">
                  National Vocational Certificate Level 2 in Agriculture (Chilli
                  Processing)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 3 in Agriculture (Farm
                  Supervisor)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Citrus
                  Production)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture (Citrus
                  Processing)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 3 in Agriculture (Farm
                  Supervisor)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 4 in Livestock (Dairy
                  Farm Supervisor)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Tunnel Farming,
                  Green House & Agribusiness
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in (Livestock Farm
                  Attendant)
                </li>
                <li class="text-2xl text-gray-600 leading-relaxed">
                  National Vocational Certificate Level 2 in Agriculture
                  Machinery Technology
                </li>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Training Institutions Offering Courses
                </h2>
              </blockquote>
              <div className="mt-10 overflow-x-auto bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <li className="text-2xl text-gray-600 leading-relaxed">
                  M006-Govt.Technical Training Center AMTS
                </li>
              </div>
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Demand Comparison Yearly
                </h2>
              </blockquote>
            

            
            
            
             
             

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar data={demanddata} options={Demandoptions} />
              </div>
            </div>
          </div>

          <div className=" grid-cols-1  p-8  ">
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
