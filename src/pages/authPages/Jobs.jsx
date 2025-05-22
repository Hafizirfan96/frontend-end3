import { useEffect } from "react";
import { Bar } from "react-chartjs-2";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import ChartDataLabels from "chartjs-plugin-datalabels";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";

const Jobs = () => {
  ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ChartDataLabels
  );
  
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const provancedata = {
    labels: [
      "Construction Worker",
      "Security Guard",
      "Driver",
      "Private Driver",
      "Class-IV",
      "Bike rider",
      "Data Entry Operator",
      "MOTORCYCLE DRIVER",
      "Steel Fixer",
      "Labour",
    ],

    datasets: [
      {
        label: "Number of Posts",
        data: [8199, 7771, 6797, 4513, 2700, 2687, 2416, 2176, 2073, 1884],
        backgroundColor: [
          "rgba(154, 30, 30, 0.85)",
          "rgba(30, 83, 154, 0.85)",
          "rgba(30, 154, 78, 0.85)",
          "rgba(154, 117, 30, 0.85)",
          "rgba(102, 51, 153, 0.85)",
          "rgba(255, 99, 132, 0.85)",
          "rgba(255, 159, 64, 0.85)",
          "rgba(75, 192, 192, 0.85)",
          "rgba(54, 162, 235, 0.85)",
          "rgba(153, 102, 255, 0.85)",
        ],
        borderColor: [
          "rgba(154, 30, 30, 1)",
          "rgba(30, 83, 154, 1)",
          "rgba(30, 154, 78, 1)",
          "rgba(154, 117, 30, 1)",
          "rgba(102, 51, 153, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(153, 102, 255, 1)",
        ],
        borderWidth: 1,
      },
    ],
  };

  const provanceoptions = {
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
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: "Number of Posts",
        position: "bottom",
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

  const provanceJobdata = {
    labels: [
      "Punjab",
      "Sindh",
      "Federal terrority",
      "Khyber Pakhtunkhwa (Ex FATA)",
      "Khyber Pakhtunkhwa",
      "Balochistan",
      "Azad Jammu Kashmir",
      "Islamabad",
      "Gilgit Baltistan",
    ],

    datasets: [
      {
        label: "Number of Posts",
        data: [73936, 25835, 11827, 7737, 7236, 5053, 1343, 674, 189],
        backgroundColor: [
          "rgba(154, 30, 30, 0.85)",
          "rgba(30, 83, 154, 0.85)",
          "rgba(30, 154, 78, 0.85)",
          "rgba(154, 117, 30, 0.85)",
          "rgba(102, 51, 153, 0.85)",
          "rgba(255, 99, 132, 0.85)",
          "rgba(255, 159, 64, 0.85)",
          "rgba(75, 192, 192, 0.85)",
          "rgba(54, 162, 235, 0.85)",
          "rgba(153, 102, 255, 0.85)",
        ],
        borderColor: [
          "rgba(154, 30, 30, 1)",
          "rgba(30, 83, 154, 1)",
          "rgba(30, 154, 78, 1)",
          "rgba(154, 117, 30, 1)",
          "rgba(102, 51, 153, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(153, 102, 255, 1)",
        ],
        borderWidth: 1,
      },
    ],
  };

  const provanceJoboptions = {
    responsive: true,
    indexAxis: "y", // Keep the bars horizontal
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
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: "Number of Posts",
        position: "bottom",
      },
    },
    scales: {
      x: {
        beginAtZero: true,
        ticks: {
          callback: (value) => value.toLocaleString(), // Add comma separators for numbers
        },
      },
      // y: {
      //   beginAtZero: true,
      // },
    },
  };
  const regionalJobdata = {
    labels: ["Dubai", "Abu Dhabi", "Tokyo", "Berlin", "Sharja"],

    datasets: [
      {
        // label: "Number of Posts",
        data: [73936, 5053, 1343, 674, 189],
        backgroundColor: [
          "rgba(154, 30, 30, 0.85)",
          "rgba(30, 83, 154, 0.85)",
          "rgba(30, 154, 78, 0.85)",
          "rgba(154, 117, 30, 0.85)",
          "rgba(102, 51, 153, 0.85)",
          "rgba(255, 99, 132, 0.85)",
          "rgba(255, 159, 64, 0.85)",
          "rgba(75, 192, 192, 0.85)",
          "rgba(54, 162, 235, 0.85)",
          "rgba(153, 102, 255, 0.85)",
        ],
        borderColor: [
          "rgba(154, 30, 30, 1)",
          "rgba(30, 83, 154, 1)",
          "rgba(30, 154, 78, 1)",
          "rgba(154, 117, 30, 1)",
          "rgba(102, 51, 153, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(75, 192, 192, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(153, 102, 255, 1)",
        ],
        borderWidth: 1,
      },
    ],
  };

  const regionalJoboptions = {
    responsive: true,
    indexAxis: "x",
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
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: "Number of Posts",
        position: "bottom",
      },
    },
    scales: {
      x: {
        ticks: {
          maxRotation: 45,
          minRotation: 0,
          autoSkip: false, // keep all city names visible
        },
      },
      y: {
        beginAtZero: true,
        ticks: {
          callback: (value) => value.toLocaleString(), // add commas to big numbers
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
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028ed"
              width="32" // Set a fixed width
              height="32" // Set a fixed height
            >
              <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
            </svg>
          </div>

          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Employment Trends
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
              Looking at local and global TVET employment trends helps better
              understand shifting workforce dynamics. This page helps map
              trade-wise availability of thousands of jobs, indicating their
              location, gender requirement and job type (Government or
              otherwise). A short list of top 10 occupations helps understand
              the current job trends in TVET sector that can help align thrust
              of TVET sector education accordingly. Coupled with the regional
              distribution of TVET jobs, these stats serve as key information
              for policymakers for refining labour policies and ensuring
              training
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
              that aligns with market requirements. Further, TVET aspirants and
              job seekers gain clarity on key competencies that are trending,
              shaping their choices that would improve chances of employability
              and provide clearer career paths. Other stakeholders can also
              better align their efforts to bridge skill gaps, foster economic
              growth, and keep education and employment strategies in sync with
              real-world needs.
            </h3>
          </div>
        </div>
      </div>

      <div className="px-10  ">
        <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
          <h2 className="text-[28px] text-[#267d37de] font-bold ">Key facts</h2>
        </blockquote>

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
                    Total Male Jobs
                  </h3>

                  <div className="pt-52 mb-16">
                    <p className="text-green-700 text-[36px] font-bold">
                      299,474
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
                    Total Female Jobs
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      3,279
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
                    Total Jobs
                  </h3>
                  <div className="pt-52">
                    <p className="text-green-700 text-[36px] font-bold">
                      302,753
                    </p>
                  </div>
                </div>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Jobs Listings
                </h2>
              </blockquote>

              <div class="overflow-x-auto mt-16 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
                <table class="min-w-full bg-white border border-gray-200">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Title
                      </th>
                      <th class="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Province
                      </th>
                      <th class="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Country
                      </th>
                      <th class="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Gender
                      </th>
                      <th class="px-6 py-3 text-left text-black border-b text-2xl font-bold">
                        Job Type
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        AIRCRAFT CLEANER{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Block Mason
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        HOUSEKEEPER MALE{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        WORKER
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        SECURITY GUARD MALE{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        HEAVY TRUCK DRIVER{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Helpers
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        TRUCK DRIVER{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        SECURITY GUARDS FEMALE
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Lineman{" "}
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Punjab
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Pakistan
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Male
                      </td>
                      <td class="px-6 py-4 text-2xl text-gray-600 border-b">
                        Private
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="flex items-center justify-between mt-8">
                  <div class="text-gray-600 text-lg">
                    {/* Showing 1 to 10 of 10 entries */}
                  </div>
                  <div class="flex space-x-2">
                    <button class="px-4 py-2 text-lg bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                      Previous
                    </button>
                    <button class="px-4 py-2 text-lg bg-[#267d37de] text-white rounded hover:bg-[#267d37de]">
                      1
                    </button>
                    <button class="px-4 py-2 text-lg bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                      Next
                    </button>
                  </div>
                </div>
              </div>

              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Top 10 Occupations
                </h2>
              </blockquote>
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={provancedata}
                  options={provanceoptions}
                  width={1024}
                  height={750}
                />
              </div>
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Provincial Jobs Stats
                </h2>
              </blockquote>
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={provanceJobdata}
                  options={provanceJoboptions}
                  width={1024}
                  height={750}
                />
              </div>
              <blockquote className="border-l-4 pl-4 border-[#e2e028ed] mt-16">
                <h2 className="text-[28px] text-[#267d37de] font-bold ">
                  Regional Job Stats
                </h2>
              </blockquote>
              <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <Bar
                  data={regionalJobdata}
                  options={regionalJoboptions}
                  width={1024}
                  height={750}
                />
              </div>
            </div>
          </div>

          {/* <div className="grid grid-cols-1  p-8 mt-16">
            {[
              {
                title: "TVET Supply",
                description:
                  "Explore insights on enrollments, gender, providers, and courses.",
                bgColor: "bg-teal-600",
                icon: "📈", // Replace with real icon later
              },
              {
                title: "Employment Projections",
                description:
                  "Explore skilled workforce projections region, sector and district wise.",
                bgColor: "bg-purple-600",
                icon: "📊",
              },
              {
                title: "District Map",
                description:
                  "Explore district level insights about TVET supply and demand indicators.",
                bgColor: "bg-indigo-700",
                icon: "🗺️",
              },
              {
                title: "TVET Providers",
                description:
                  "Explore information on TVET institutes, companies offering training and programmes.",
                bgColor: "bg-slate-800",
                icon: "🏫",
              },
              {
                title: "Growth Sector",
                description:
                  "Explore insights on growth sectors for employment and skill development.",
                bgColor: "bg-blue-600",
                icon: "📚",
              },
              {
                title: "Employment Trends",
                description:
                  "Find trending employment opportunities in local and international job markets.",
                bgColor: "bg-gray-700",
                icon: "💼",
              },
            ].map((card, index) => (
              <div
                key={index}
                className={`relative overflow-hidden  ${card.bgColor} text-white flex items-center justify-center p-6 transform transition-transform hover:scale-105`}
              >
                <div className="absolute top-0 left-0 w-1/2 h-full bg-black opacity-10 transform -skew-x-12"></div>
                <div className="absolute top-4 left-4 text-4xl opacity-30">
                  {card.icon}
                </div>
                <div className="relative text-center">
                  <h2 className="text-2xl font-bold mb-2">{card.title}</h2>
                  <p className="text-sm italic">{card.description}</p>
                </div>
              </div>
            ))}
          </div> */}
          <div className=" grid-cols-1  p-8 mt-16 ">
            <div class=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 ">
              <div class="text-3xl font-bold">Filters</div>

              <div className="mt-6">
                <label class="block text-2xl font-semibold text-gray-700 mb-1 ">
                  Occupations
                </label>
                <input
                  type="text"
                  placeholder="Enter Occupations"
                  class="form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]"
                />
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Jobs Type
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select</option>
                  <option>Govt</option>
                  <option>Private</option>
                  <option>International/Oversease</option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Gender
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Both</option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Countries
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option value="">Select Country</option>
                  <option value="173">Pakistan</option>
                  <option value="257">Afghanistan</option>
                  <option value="258">Åland Islands</option>
                  <option value="259">Albania</option>
                  <option value="260">Algeria</option>
                  <option value="261">American Samoa</option>
                  <option value="262">Andorra</option>
                  <option value="263">Angola</option>
                  <option value="264">Anguilla</option>
                  <option value="265">Antarctica</option>
                  <option value="266">Antigua and Barbuda</option>
                  <option value="267">Argentina</option>
                  <option value="268">Armenia</option>
                  <option value="269">Aruba</option>
                  <option value="270">Ascension Island</option>
                  <option value="271">Australia</option>
                  <option value="272">Austria</option>
                  <option value="273">Azerbaijan</option>
                  <option value="274">Bahamas</option>
                </select>
              </div>
              <div className="form-group mt-10 justify-center align-middle flex">
                <input
                  className="  btn w-[80%] bg-[#478e51] text-white px-4 py-2 rounded hover:bg-[#36713f] transition text-[16px]"
                  type="submit"
                  value="Apply"
                />
              </div>
            </div>

            <div className="mt-28  ">
              {[
                {
                  title: "TVET Supply",
                  description:
                    "Explore insights on enrollments, gender, providers, and courses.",
                  bgColor: "bg-teal-600",
                  icon: "📈", // Replace with real icon later
                },
                {
                  title: "Employment Projections",
                  description:
                    "Explore skilled workforce projections region, sector and district wise.",
                  bgColor: "bg-purple-600",
                  icon: "📊",
                },
                {
                  title: "District Map",
                  description:
                    "Explore district level insights about TVET supply and demand indicators.",
                  bgColor: "bg-indigo-700",
                  icon: "🗺️",
                },
                {
                  title: "TVET Providers",
                  description:
                    "Explore information on TVET institutes, companies offering training and programmes.",
                  bgColor: "bg-slate-800",
                  icon: "🏫",
                },
                {
                  title: "Growth Sector",
                  description:
                    "Explore insights on growth sectors for employment and skill development.",
                  bgColor: "bg-blue-600",
                  icon: "📚",
                },
                {
                  title: "Employment Trends",
                  description:
                    "Find trending employment opportunities in local and international job markets.",
                  bgColor: "bg-gray-700",
                  icon: "💼",
                },
              ].map((card, index) => (
                <div
                  key={index}
                  className={`relative overflow-hidden  ${card.bgColor} text-white flex items-center justify-center p-20 transform transition-transform hover:scale-105`}
                >
                  <div className="absolute top-0 left-0 w-1/2 h-full bg-black opacity-10 transform -skew-x-12"></div>
                  <div className="absolute top-4 left-4 text-4xl opacity-30">
                    {card.icon}
                  </div>
                  <div className="relative text-center">
                    <h2 className="text-2xl font-bold mb-2">{card.title}</h2>
                    <p className="text-sm italic">{card.description}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Jobs;
