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
import Heading from "@/components/templates/Heading/Heading";

const EmploymentProjections = () => {
  // useEffect(() => {
  //   window.scrollTo(0, 0);
  // }, []);

  ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
  );

  const TradesData = {
    labels: [
      "Machine Operator",
      "Stitching Machine Operator",
      "Mason",
      "Electrician",
      "Waiter",
      "Welder",
      "Nurse",
      "Computer Operator",
      "Plumber",
      "Chef",
      "Quality Assurance",
      "Electrical Technician",
      "Press Machine  Ope...",
      "Polisher",
      "Cook",
    ],
    datasets: [
      {
        label: "Total Demand",
        data: [
          50501, 30203, 23313, 20047, 19243, 18624, 16338, 13908, 13425, 12300,
          11681, 11006, 10803, 10642, 10463,
        ],
        backgroundColor: [
          "#4e73df",
          "#1cc88a",
          "#36b9cc",
          "#f6c23e",
          "#e74a3b",
          "#858796",
          "#20c9a6",
          "#fd7e14",
          "#6f42c1",
          "#00bcd4",
          "#8bc34a",
          "#ff6384",
        ],
        barThickness: 30,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const TradesOptions = {
    indexAxis: "y",
    responsive: false, // Set to false for fixed size
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
        // text: "High Demand Trades",
      },
      legend: {
        display: false, // Only one dataset
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
  const disablejobData = {
    labels: [
      "Packing",
      "Stretching",
      "Machine Operator",
      "Accountant",
      "Electric Technician",
      "Supervisor",
      "Helper",
      "Sales Officer",
      "Receptionist",
      "Packing Material Pac...",
    ],
    datasets: [
      {
        label: "Total Demand",
        data: [
          50501, 30203, 23313, 20047, 19243, 18624, 16338, 13908, 13425, 12300,
        ],
        backgroundColor: [
          "#4e73df",
          "#1cc88a",
          "#36b9cc",
          "#f6c23e",
          "#e74a3b",
          "#858796",
          "#20c9a6",
          "#fd7e14",
          "#6f42c1",
          "#00bcd4",
          "#8bc34a",
          "#ff6384",
        ],
        barThickness: 30,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const disablejobOptions = {
    indexAxis: "y",
    responsive: false, // Set to false for fixed size
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
        // text: "High Demand Trades",
      },
      legend: {
        display: false, // Only one dataset
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

  const SubSectorWiseData = {
    labels: [
      "Manufacturing",
      "Construction",
      "Hospitality & Tourism",
      "Allied Health",
      "Textile & Garments",
      "Services",
      "Renewable energy",
      "Agriculture",
      "Automobile",
      "Printing and Packagi...",
      "Sports Good",
      "Hospitality and Tour...",
      "Mining Sector",
      "Agriculture, forestry...",
      "Surgical Tools",
    ],
    datasets: [
      {
        label: "Total Demand",
        data: [
          260503, 122332, 95091, 80883, 65181, 51778, 46615, 42303, 17235,
          15658, 15218, 10003, 6302, 5785, 5040,
        ],
        backgroundColor: [
          "#4e73df",
          "#1cc88a",
          "#36b9cc",
          "#f6c23e",
          "#e74a3b",
          "#858796",
          "#20c9a6",
          "#fd7e14",
          "#6f42c1",
          "#00bcd4",
          "#8bc34a",
          "#ff6384",
        ],
        barThickness: 30,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const SubSectorWiseOptions = {
    indexAxis: "y",
    responsive: false, // Set to false for fixed size
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
        // text: "Total Demand",
      },
      legend: {
        display: false, // Only one dataset
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
  const highDemanData = {
    labels: [
      "Machine Operator",
      "Stitching Machine Operator",
      "Mason",
      "Electrician",
      "Waiter",
      "Welder",
      "Nurse",
      "Computer Operator",
      "Plumber",
      "Chef",
      "Quality Assurance",
      "Electrical Technician",
      "Press Machine  Ope...",
      "Polisher",
      "Cook",
    ],

    datasets: [
      {
        label: "Male",
        data: [
          700, 200, 500, 500, 700, 800, 950, 1800, 500, 1900, 300, 2000, 400,
          2000, 400,
        ],
        backgroundColor: "#4e73df",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
      {
        label: "Female",
        data: [
          300, 320, 100, 280, 130, 110, 120, 250, 1700, 1560, 30, 2050, 800,
          950, 1800, 500,
        ],
        backgroundColor: "#ff6384",
        barThickness: 20,
        barPercentage: 1.0,
        categoryPercentage: 0.5,
      },
    ],
  };

  const highDemanOptions = {
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
              fill="#e2e028ed"
              width="32"
              height="32"
            >
              <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Employment Projections
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
              Studying demand-trends is essential for forecasting areas of
              high-employment potential for the regional and national demography
              of potential TVET workers. Rational approaches to TVET policy
              making and implementation are possible on the basis of crucial
              data on demands of males and females in jobs, high-demand trades,
              sub-sector wise job demands, etc. Data presented here also
              provides useful information to guide inclusive interventions at
              policy development and end-users levels, by indicating high demand
              trades for males and females. It also helps narrow down key areas
              of work for persons with disabilities to improve their chances of
              inclusion in the economic
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
              development process and relevant policy measures by Government and
              other employers’ ends. This page features key insights,
              information and data drawn from employer skill surveys and
              government repositories. TVET providers, policymakers, and
              planners can use this forward-looking information to shape
              curricula and training initiatives for ensuring that future
              graduates possess needed skills required in both established
              sectors and fast-growing industries. With data-driven guidance,
              stakeholders can shape resilient training programmes more
              responsive to economic and technological shifts.
            </h3>
          </div>
        </div>
      </div>

      <div className="px-10">
        <Heading
          title="Key facts - National"
          description="Source: Employer Skill Survey, Qualification Awarding Bodies -
              2023/2024"
        />

        <div className="flex w-full">
          <div className=" mt-16 w-[100%]">
            <div className=" py-10">
              <div className="max-w-[120rem] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 px-4">
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
                    Male Demand
                  </h3>

                  <div className="pt-52 mb-16">
                    <p className="text-green-700 text-[36px] font-bold">
                      708,470
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
                    Female Demand
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      160,245
                    </p>
                  </div>
                </div>

                <div className="bg-green-50 shadow p-6 flex flex-col items-center text-center">
                  <div className="w-36 h-36 mb-4 mt-5">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                      fill="#267d37de"
                    >
                      <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
                    </svg>
                  </div>
                  <h3 className="text-[18px] text-black  font-bold ">
                    Total Demand
                  </h3>
                  <h3 className="text-[16px] text-black   mb-2">
                    Projection for 2025-2026
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      878,715
                    </p>
                  </div>
                </div>
              </div>

              <Heading title="High Demand Trades" />
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={TradesData}
                  options={TradesOptions}
                  width={1024}
                  height={750}
                />
              </div>

              <Heading title="Sub-sector Wise Total Demand" />

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={SubSectorWiseData}
                  options={SubSectorWiseOptions}
                  width={1024}
                  height={750}
                />
              </div>
              <Heading title="High Demand Trades - Gender Wise" />

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={highDemanData}
                  options={highDemanOptions}
                  width={1024}
                  height={850}
                />
              </div>
              <Heading title="Top 10 Jobs For Person With Disabilities" />

              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={disablejobData}
                  options={disablejobOptions}
                  width={1024}
                  height={850}
                />
                 <Heading title="Demand by Level - Gender Wise" />

               <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16 mb-16">
                <table class="min-w-full border border-gray-300">
                  <thead class="bg-green-600">
                    <tr>
                      <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                        NVQF Level
                      </th>
                      <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                        Male Demand
                      </th>
                      <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                        Female Demand
                      </th>
                      <th class="px-4 py-6 text-left text-2xl font-semibold text-white border border-gray-300">
                        Total Demand
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 1
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        63,328
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        14,070
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        77,398
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 2
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        163,436
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        40,021
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        203,457
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 3
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        181,492
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        42,552
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        224,044
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 4
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        129,311	
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        36,863
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        166,174
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 5
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        70,038
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        16,445
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        86,483
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 6
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        5,214
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        1,985
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        7,199
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 7
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        2700
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        1255
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        3956
                      </td>
                    </tr>
                    <tr>
                      <td class="px-4 py-6 text-2xl font-semibold border border-gray-300">
                        Level 8
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        649
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        598
                      </td>
                      <td class="px-4 py-6 text-2xl border border-gray-300">
                        1247
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>

          <div className=" grid-cols-1  p-8 mt-16 ">
            <div class=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 ">
              <div class="text-3xl font-bold">Filters</div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                 Select Province
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>National</option>
                  <option>Punjab</option>
                  <option>Sindh</option>
                  <option>KPK</option>
                  <option>Balochistan</option>
                  <option>AJK</option>
                  <option>GB</option>
                  <option>Islamabad</option>
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

export default EmploymentProjections;
