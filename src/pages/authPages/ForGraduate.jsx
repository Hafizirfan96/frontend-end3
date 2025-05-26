import { useState } from "react";
import Select from "react-select";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";

const Graduates = () => {
  const [hoveredIndex, setHoveredIndex] = useState(null);
  const bgColors = [
    "bg-red-100",
    "bg-green-100",
    "bg-blue-100",
    "bg-yellow-100",
    "bg-purple-100",
    "bg-pink-100",
  ];
  const tradeOptions = [
    { value: "electrician", label: "Electrician" },
    { value: "plumber", label: "Plumber" },
    { value: "welder", label: "Welder" },
    { value: "carpenter", label: "Carpenter" },
    { value: "mechanic", label: "Mechanic" },
  ];
  const cityOptions = [
    { value: "lahore", label: "Lahore" },
    { value: "karachi", label: "Karachi" },
    { value: "islamabad", label: "Islamabad" },
    { value: "multan", label: "Multan" },
    { value: "faisalabad", label: "Faisalabad" },
  ];
  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center">
          <div className=" ml-16">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 512"
              fill="#e2e028ed"
              width="32" // Set a fixed width
              height="32"
            >
              <path d="M320 32L0 160l320 128 320-128L320 32zm0 288c-35.3 0-64 28.7-64 64v96h128v-96c0-35.3-28.7-64-64-64z" />
            </svg>
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            For Graduates
          </h2>
        </div>
        <div className="h-8" />
      </div>

      <div>
        <div className="px-32 py-20">
          {/* 🔍 Search Inputs Row */}
          <div className="flex flex-wrap gap-8 mb-10">
            <div className="flex flex-col flex-1 min-w-[200px]">
              <p className="text-xl font-semibold mb-1">Name</p>
              <input
                type="text"
                placeholder="Search by Name"
                className="text-2xl p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
              />
            </div>

            <div className="flex flex-col flex-1 min-w-[200px]">
              <p className="text-xl font-semibold mb-1">Trade</p>
              <Select
                options={tradeOptions}
                placeholder="Search by Trade"
                className="text-2xl"
                classNamePrefix="react-select"
              />
            </div>

            <div className="flex flex-col flex-1 min-w-[200px]">
              <p className="text-xl font-semibold mb-1">City</p>
              <Select
                options={cityOptions}
                placeholder="Search by City"
                className="text-2xl"
                classNamePrefix="react-select"
              />
            </div>
            <div className="flex flex-col flex-1 min-w-[200px]">
              <p className="text-xl font-semibold mb-1">Search</p>
              <button
                type="submit"
                className="text-2xl p-3 bg-[#478e51] text-white rounded-lg shadow-sm hover:bg-[#478e51] focus:outline-none focus:ring-2 focus:bg-[#478e51] transition"
              >
                Search
              </button>
            </div>
          </div>

          {/* 📊 Table */}
          <div className="overflow-x-auto shadow-md rounded-lg">
  <table className="min-w-full text-sm text-left text-gray-700 bg-white divide-y divide-gray-300">
    <thead>
      <tr className="bg-gradient-to-r bg-[#f0f0f0] text-black text-2xl">
        <th className="px-6 py-3 font-bold uppercase">Employer Name</th>
        <th className="px-6 py-3 font-bold uppercase">Sector</th>
        <th className="px-6 py-3 font-bold uppercase">Trade</th>
        <th className="px-6 py-3 font-bold uppercase">City</th>
        <th className="px-6 py-3 font-bold uppercase">Email</th>
        <th className="px-6 py-3 font-bold uppercase">Contact</th>
        <th className="px-6 py-3 font-bold uppercase">Address</th>
      </tr>
    </thead>
    <tbody className="divide-y divide-gray-200 text-2xl">
      <tr className="hover:bg-gray-50">
        <td className="px-6 py-4">Asif</td>
        <td className="px-6 py-4">Technical</td>
        <td className="px-6 py-4">Electrician</td>
        <td className="px-6 py-4">Lahore</td>
        <td className="px-6 py-4">abc@example.com</td>
        <td className="px-6 py-4">0300-1234567</td>
        <td className="px-6 py-4">123 Main Street</td>
      </tr>
      <tr className="hover:bg-gray-50">
        <td className="px-6 py-4">Sajjad</td>
        <td className="px-6 py-4">Sanitary</td>
        <td className="px-6 py-4">Plumber</td>
        <td className="px-6 py-4">Faisalabad</td>
        <td className="px-6 py-4">plumber@mail.com</td>
        <td className="px-6 py-4">0301-7654321</td>
        <td className="px-6 py-4">45 Water Lane</td>
      </tr>
      <tr className="hover:bg-gray-50">
        <td className="px-6 py-4">Tariq</td>
        <td className="px-6 py-4">Manufacturing</td>
        <td className="px-6 py-4">Welder</td>
        <td className="px-6 py-4">Multan</td>
        <td className="px-6 py-4">welder@skills.pk</td>
        <td className="px-6 py-4">0321-9988776</td>
        <td className="px-6 py-4">Industrial Zone</td>
      </tr>
      <tr className="hover:bg-gray-50">
        <td className="px-6 py-4">Numan</td>
        <td className="px-6 py-4">Textile</td>
        <td className="px-6 py-4">Tailor</td>
        <td className="px-6 py-4">Rawalpindi</td>
        <td className="px-6 py-4">tailor@mail.com</td>
        <td className="px-6 py-4">0345-1122334</td>
        <td className="px-6 py-4">7 Bazaar Road</td>
      </tr>
    </tbody>
  </table>
</div>

        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Graduates;
