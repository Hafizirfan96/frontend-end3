import { useState } from "react";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";
import bureau from "@/assets/bureau.jpeg";

const TevetExplaination = () => {
  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8 py-4">
        <div className="flex items-center">
          <div className=" ml-16">
            <img src={bureau} className="h-28 inline-block" alt="Logo 5" />
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Technical Education and Vocational Training Authority (TEVTA)
          </h2>
        </div>
      </div>

      <div className="px-10 ">
      

        <div className="flex w-full justify-between">
          <div className=" mt-4  mr-8 ">
         <div className="flex ">

            <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)]">
              <h2 className="text-light text-[20px] text-bold ml-3  ">
               Total Number of Enrollees
              </h2>
              <h2 className="text-light text-[20px] text-bold ml-3  ">
              331033
              </h2>
            </div>
            <div className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] ml-8">
              <h2 className="text-light text-[20px] text-bold ml-3  ">
              Total Number of Graduates
              </h2>
              <h2 className="text-light text-[20px] text-bold ml-3  ">
              331033
              </h2>
            </div>
         </div>
            
          </div>

          <div className=" grid-cols-1  w-[20%] mt-4 mb-8 ">
            <div class=" bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)]">
              <div class="text-3xl font-bold">Filters</div>

              <div className="mt-6">
                <label class="block text-2xl font-semibold text-gray-700 mb-1 ">
                  Since, 2020
                </label>
                {/* <input
                  type="text"
                  placeholder="Search by name"
                  class="form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]"
                /> */}
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  From
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Select</option>
                  <option>2021</option>
                  <option>2022</option>
                  <option>2023</option>
                  <option>2024</option>
                  <option>2025</option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  To
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>2021</option>
                  <option>2022</option>
                  <option>2023</option>
                  <option>2024</option>
                  <option>2025</option>
                </select>
              </div>

              <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Trade
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Plumber</option>
                  <option>Electrion</option>
                  <option>Nurse</option>
                </select>
              </div>
               <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  City
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>Lahore</option>
                  <option>Multan</option>
                  <option>Khanewal</option>
                </select>
              </div>
               <div>
                <label class="block text-2xl font-semibold text-gray-700 mb-1 mt-8">
                  Institutes
                </label>
                <select class=" bg-white focus:outline-none mt-2 focus:ring-2 focus:ring-blue-400 form-control w-full h-[32px] p-2 border border-gray-300 rounded text-[14px] placeholder:text-[14px]">
                  <option>SDED</option>
                  <option>PSIS</option>
                  <option>PSDA</option>
                  <option>PVTC</option>
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

export default TevetExplaination;
