import { useState } from "react";
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";

const ContactUs = () => {
  const [hoveredIndex, setHoveredIndex] = useState(null);
  const bgColors = [
    "bg-red-100",
    "bg-green-100",
    "bg-blue-100",
    "bg-yellow-100",
    "bg-purple-100",
    "bg-pink-100",
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
              viewBox="0 0 512 512"
              width="32"
              height="32"
              fill="#e2e028"
              fillOpacity="0.93"
            >
              <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1 .6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
            </svg>
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white ">
            Contact Us
          </h2>
        </div>
        <div className="h-8" />
      </div>

      <div className="px-10 ">
        <blockquote className="border-l-4 pl-4 border-[#e2e028ed]">
          <h2 className="text-[24px] text-[#267d37de] font-bold ">
            Quick contact
          </h2>
        </blockquote>

        <div className="flex w-full">
          <div className=" mt-4 w-[100%]">
            <form
              // method="POST"
              // action="#"
              // acceptCharset="UTF-8"
              className="bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4"
            >
              <div className="form-row mb-3 flex flex-wrap gap-4">
                <div className="col flex-1 min-w-[200px]">
                  <input
                    className="form-control w-full h-[35px] p-2 border border-gray-300 rounded text-[16px] placeholder:text-[16px]"
                    placeholder="First Name"
                    name="name"
                    type="text"
                  />
                </div>
                <div className="col flex-1 min-w-[200px]">
                  <input
                    className="form-control w-full h-[35px] p-2 border border-gray-300 rounded text-[16px] placeholder:text-[16px]"
                    placeholder="Last Name"
                    name="lastname"
                    type="text"
                  />
                </div>
              </div>

              <div className="form-row mb-3 flex flex-wrap gap-4">
                <div className="col flex-1 min-w-[200px]">
                  <input
                    className="form-control w-full h-[35px] p-2 border border-gray-300 rounded text-[16px] placeholder:text-[16px]"
                    placeholder="abc@example.com"
                    name="email"
                    type="email"
                  />
                </div>
                <div className="col flex-1 min-w-[200px]">
                  <input
                    className="form-control w-full h-[35px] p-2 border border-gray-300 rounded text-[16px] placeholder:text-[16px]"
                    placeholder="Subject of Email"
                    name="subject"
                    type="text"
                  />
                </div>
              </div>

              <div className="form-group mb-3">
                <textarea
                  className="form-control w-full p-2 border border-gray-300 rounded text-[16px] placeholder:text-[16px]"
                  placeholder="Enter your message here"
                  name="text"
                  cols="30"
                  rows="4"
                ></textarea>
              </div>

              <div className="form-group">
                <input
                  className="btn bg-[#478e51] text-white px-4 py-2 rounded hover:bg-[#36713f] transition text-[16px]"
                  type="submit"
                  value="Submit"
                />
              </div>
            </form>
         
              {/* <div className="contact-map bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4 mt-16">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13272.284484090123!2d73.088575!3d33.732977!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfaa4187538a9e6d!2sDistrict%20Headquarters%20Hospital!5e0!3m2!1sen!2sus!4v1666598209730!5m2!1sen!2sus"
                  style={{
                    border: 0,
                    width: "100%",
                    height: "400px",
                    frameborder: "0",
                  }}
                  allowFullScreen=""
                  aria-hidden="false"
                  tabindex="0"
                ></iframe>
              </div> */}
          
          </div>

       

          <div className="grid grid-cols-1 px-8">
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
                className={`relative overflow-hidden  ${card.bgColor} text-white h-80 flex items-center justify-center p-6 transform transition-transform hover:scale-105`}
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
      <Footer />
    </div>
  );
};

export default ContactUs;
